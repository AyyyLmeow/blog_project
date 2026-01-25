<?php

require_once __DIR__ . '/../app/core/Database.php';

try {
    $pdo = Database::get();

    $stmt = $pdo->query("SELECT id, name FROM categories");

    echo "<h2>Категории из БД:</h2>";

    foreach ($stmt as $row) {
        echo $row['id'] . ' — ' . $row['name'] . "<br>";
    }

} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}
