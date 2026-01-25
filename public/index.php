<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\View;
use App\Models\Category;

$categories = Category::allWithPosts();

View::render('index.tpl', [
    'title' => 'Главная',
    'categories' => $categories
]);
