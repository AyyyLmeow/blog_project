<?php

namespace App\models;

use App\core\Database;
use PDO;

class Category
{
    public static function allWithPosts(): array
    {
        $db = Database::get();

        // Берём только категории, в которых есть хотя бы один пост
        $sql = "
        SELECT c.id, c.name, c.description
        FROM categories c
        WHERE EXISTS (
            SELECT 1
            FROM post_category pc
            JOIN posts p ON p.id = pc.post_id
            WHERE pc.category_id = c.id
        )
        ORDER BY c.name
    ";

        $categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        // Подгружаем по 3 последних поста для каждой категории
        foreach ($categories as &$category) {
            $category['posts'] = self::getLastPosts($category['id'], 3);
        }

        return $categories;
    }

    public static function getLastPosts(int $categoryId, int $limit = 3): array
    {
        $stmt = Database::get()->prepare("
        SELECT p.id, p.title, p.image, p.created_at, p.description, p.views
        FROM posts p
        JOIN post_category pc ON pc.post_id = p.id
        WHERE pc.category_id = :category_id
        ORDER BY p.created_at DESC
        LIMIT :limit
    ");

        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public static function countPosts(int $categoryId): int
    {
        $stmt = Database::get()->prepare("
        SELECT COUNT(DISTINCT p.id)
        FROM posts p
        JOIN post_category pc ON pc.post_id = p.id
        WHERE pc.category_id = :category_id
    ");

        $stmt->execute(['category_id' => $categoryId]);
        return (int)$stmt->fetchColumn();
    }

    public static function getPostsPaginated(int $categoryId, string $sort, int $limit, int $offset): array
    {
        $allowedSort = [
            'date' => 'p.created_at DESC',
            'views' => 'p.views DESC'
        ];

        $orderBy = $allowedSort[$sort] ?? $allowedSort['date'];

        $sql = "
        SELECT DISTINCT p.id, p.title, p.description, p.image, p.views, p.created_at
        FROM posts p
        JOIN post_category pc ON pc.post_id = p.id
        WHERE pc.category_id = :category_id
        ORDER BY $orderBy
        LIMIT :limit OFFSET :offset
    ";

        $stmt = Database::get()->prepare($sql);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
