<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\View;
use App\Models\Category;
use App\Models\Post;

$id = $_GET['id'] ?? null;
$sort = $_GET['sort'] ?? 'date'; // 'date' или 'views'
$page = (int)($_GET['page'] ?? 1);
$perPage = 5;

if (!$id) {
    die('Категория не указана');
}

$category = Category::findById($id);
if (!$category) {
    die('Категория не найдена');
}

$posts = Post::getByCategory($id, $sort, $page, $perPage);
$total = Post::countByCategory($id);
$totalPages = ceil($total / $perPage);

View::render('category.tpl', [
    'title' => $category['name'],
    'category' => $category,
    'posts' => $posts,
    'sort' => $sort,
    'page' => $page,
    'totalPages' => $totalPages
]);
