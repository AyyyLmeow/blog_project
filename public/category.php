<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\View;
use App\Models\Category;
use App\Models\Post;

$id   = (int)($_GET['id'] ?? 0);
$sort = $_GET['sort'] ?? 'date';
$page = max(1, (int)($_GET['page'] ?? 1));

$perPage = 3;
$offset  = ($page - 1) * $perPage;

$category = Category::findById($id);
if (!$category) {
    die('Категория не найдена');
}

$totalPosts = Category::countPosts($id);
$totalPages = (int)ceil($totalPosts / $perPage);

$posts = Category::getPostsPaginated($id, $sort, $perPage, $offset);

View::render('category.tpl', [
    'category' => $category,
    'posts' => $posts,
    'sort' => $sort,
    'currentPage' => $page,
    'totalPages' => $totalPages
]);
