<?php

// Подключение к базе данных
$dsn = 'mysql:host=localhost;dbname=adreanov_root;charset=utf8';
$username = 'adreanov_root';
$password = 'z_&WKFQNb4MR1-s&';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Ошибка подключения к базе данных: ' . $e->getMessage());
}

// Создание таблиц
try {
    $queries = [
        "DROP TABLE answers",
		
        "DROP TABLE questions",

		"DROP TABLE forms"
    ];

    foreach ($queries as $query) {
        $pdo->exec($query);
    }

    echo "Таблицы успешно удалены.";
} catch (PDOException $e) {
    die('Ошибка удаления таблиц: ' . $e->getMessage());
}

