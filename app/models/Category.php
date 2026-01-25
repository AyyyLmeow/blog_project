<?php

namespace App\models;

use App\core\Database;
use PDO;

class Category
{
    public static function allWithPosts(): array
    {
        $categories = Database::get()
            ->query("SELECT id, name, description FROM categories")
            ->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categories as &$category) {
            $category['posts'] = Post::getLatestByCategory($category['id'], 3);
        }

        return $categories;
    }

    public static function findById(int $id): ?array
    {
        $stmt = Database::get()->prepare("
            SELECT id, name, description
            FROM categories
            WHERE id = :id
        ");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        return $category ?: null;
    }
}
