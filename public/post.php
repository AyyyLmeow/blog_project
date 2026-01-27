<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\View;
use App\Models\Post;

$id = $_GET['id'] ?? null;
if (!$id) die('Статья не указана');


$post = Post::findById($id);

if($post){
    Post::incrementViews($id);
}else{
    die('Статья не найдена');
}


// Получаем категории статьи
$categories = Post::getCategories($id);

// Получаем 3 похожие статьи
$similar = Post::getSimilar($id);

View::render('post.tpl', [
    'title' => $post['title'],
    'post' => $post,
    'categories' => $categories,
    'similar' => $similar
]);
