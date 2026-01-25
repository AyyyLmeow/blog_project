<?php

namespace App\models;

use PDO;
use App\Core\Database;

class Post
{
    public static function getLatestByCategory(int $categoryId, int $limit = 3): array
    {
        $sql = "
            SELECT p.id, p.title, p.description, p.image, p.views, p.created_at
            FROM posts p
            JOIN post_category pc ON pc.post_id = p.id
            WHERE pc.category_id = :category_id
            ORDER BY p.created_at DESC
            LIMIT :limit
        ";

        $stmt = Database::get()->prepare($sql);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
