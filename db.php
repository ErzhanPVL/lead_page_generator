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



// Вывод содержимого таблиц
try {
	
	    echo "<h2>Содержимое таблицы users</h2>";
    $forms = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
	    foreach ($forms as $form) {
        echo "<tr>";
        foreach ($form as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
	
	
	
	
    echo "<h2>Содержимое таблицы forms</h2>";
    $forms = $pdo->query("SELECT * FROM forms")->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'><tr><th>ID</th><th>Account ID</th><th>Title</th><th>Description</th><th>Form Name</th><th>Address</th><th>Domen</th><th>Metrix</th><th>WhatsApp</th><th>Telegram</th><th>VK</th><th>VKmetrix</th><th>file_path</th><th>Created At</th></tr>";
    foreach ($forms as $form) {
        echo "<tr>";
        foreach ($form as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Содержимое таблицы questions</h2>";
    $questions = $pdo->query("SELECT * FROM questions")->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'><tr><th>ID</th><th>Form ID</th><th>Question Text</th><th>Answer Type</th><th>Created At</th></tr>";
    foreach ($questions as $question) {
        echo "<tr>";
        foreach ($question as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Содержимое таблицы answers</h2>";
    $answers = $pdo->query("SELECT * FROM answers")->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'><tr><th>ID</th><th>Question ID</th><th>Answer Text</th><th>Created At</th></tr>";
    foreach ($answers as $answer) {
        echo "<tr>";
        foreach ($answer as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    die('Ошибка вывода данных: ' . $e->getMessage());
}
