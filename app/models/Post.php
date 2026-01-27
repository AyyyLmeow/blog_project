<?php

namespace App\models;

use App\Core\Database;
use PDO;

class Post
{
    // Получить одну статью по id
    public static function findById(int $id): ?array
    {
        $stmt = Database::get()->prepare("
            SELECT
            p.id,
            p.title,
            p.description,
            p.content,
            p.image,
            p.views,
            p.created_at,
            GROUP_CONCAT(c.name SEPARATOR ', ') AS categories
        FROM posts p
                 LEFT JOIN post_category pc ON pc.post_id = p.id
                 LEFT JOIN categories c ON c.id = pc.category_id
        WHERE p.id = :id
        GROUP BY p.id
        ");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post ?: null;
    }

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

    // Метод для пагинации и сортировки на странице категории
    public static function getByCategory(int $categoryId, string $sort = 'date', int $page = 1, int $perPage = 5): array
    {
        $order = $sort === 'views' ? 'p.views DESC' : 'p.created_at DESC';
        $offset = ($page - 1) * $perPage;

        $sql = "
            SELECT p.id, p.title, p.description, p.image, p.views, p.created_at
            FROM posts p
            JOIN post_category pc ON pc.post_id = p.id
            WHERE pc.category_id = :category_id
            ORDER BY $order
            LIMIT :perPage OFFSET :offset
        ";

        $stmt = Database::get()->prepare($sql);
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function countByCategory(int $categoryId): int
    {
        $stmt = Database::get()->prepare("
            SELECT COUNT(*) 
            FROM post_category pc
            WHERE pc.category_id = :category_id
        ");
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }

    // Получить категории статьи
    public static function getCategories(int $postId): array
    {
        $stmt = Database::get()->prepare("
            SELECT c.id, c.name
            FROM categories c
            JOIN post_category pc ON pc.category_id = c.id
            WHERE pc.post_id = :post_id
        ");
        $stmt->bindValue(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Получить 3 похожие статьи (по категориям)
    public static function getSimilar(int $postId, int $limit = 3): array
    {
        $stmt = Database::get()->prepare("
        SELECT DISTINCT p2.id, p2.title, p2.image, p2.created_at,p2.description
        FROM post_category pc1
        JOIN post_category pc2 ON pc1.category_id = pc2.category_id
        JOIN posts p2 ON pc2.post_id = p2.id
        WHERE pc1.post_id = :post_id 
          AND p2.id != :post_id
        ORDER BY p2.created_at DESC
        LIMIT :limit
    ");

        $stmt->bindValue(':post_id', $postId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Увеличить количество просмотров
    public static function incrementViews(int $postId): void
    {
        $stmt = Database::get()->prepare("
            UPDATE posts SET views = views + 1 WHERE id = :id
        ");
        $stmt->bindValue(':id', $postId, PDO::PARAM_INT);
        $stmt->execute();
    }
}
