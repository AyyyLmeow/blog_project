<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database;

// Подключаемся к базе
$db = Database::get();

// ---------------------
// Сидинги категорий
// ---------------------
$categories = [
    ['PHP', 'Все про PHP'],
    ['MySQL', 'Работа с базами данных MySQL'],
    ['Smarty', 'Шаблонизатор Smarty'],
    ['Docker', 'Контейнеризация проектов'],
    ['JavaScript', 'JS для фронтенда и бэкенда'],
];

foreach ($categories as $cat) {
    $stmt = $db->prepare("INSERT INTO categories (name, description) VALUES (:name, :desc)");
    $stmt->execute([
        ':name' => $cat[0],
        ':desc' => $cat[1],
    ]);
}

// Получаем id всех категорий
$categoryIds = $db->query("SELECT id FROM categories")->fetchAll(PDO::FETCH_COLUMN);

// ---------------------
// Сидинги постов
// ---------------------
$posts = [];
for ($i = 1; $i <= 20; $i++) {
    $title = "Тестовый пост $i";
    $desc = "Краткое описание поста $i";
    $content = "Это полный текст поста $i. Здесь можно написать несколько абзацев и проверить отображение.";
    $image = "placeholder.jpg"; // можно использовать однотипные заглушки
    $views = rand(0, 100);
    $created_at = date('Y-m-d H:i:s', strtotime("-$i days"));

    $posts[] = compact('title', 'desc', 'content', 'image', 'views', 'created_at');

    $stmt = $db->prepare("
        INSERT INTO posts (title, description, content, image, views, created_at)
        VALUES (:title, :desc, :content, :image, :views, :created_at)
    ");

    $stmt->execute([
        ':title' => $title,
        ':desc' => $desc,
        ':content' => $content,
        ':image' => $image,
        ':views' => $views,
        ':created_at' => $created_at,
    ]);

    $postId = $db->lastInsertId();

    // Связь с 1-2 случайными категориями
    $randCats = array_rand($categoryIds, rand(1, 2));
    if (!is_array($randCats)) $randCats = [$randCats];

    foreach ($randCats as $cid) {
        $stmt = $db->prepare("INSERT INTO post_category (post_id, category_id) VALUES (:post_id, :category_id)");
        $stmt->execute([
            ':post_id' => $postId,
            ':category_id' => $categoryIds[$cid],
        ]);
    }
}

echo "Сидинги категорий и постов успешно добавлены.\n";
