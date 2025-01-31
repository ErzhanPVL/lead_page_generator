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

// Параметр Account ID
$accountId = '123456';

try {
    // Запрос данных из таблицы forms
    $stmt = $pdo->prepare("SELECT id, title, address FROM forms WHERE account_id = ?");
    $stmt->execute([$accountId]);
    $forms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Проверка наличия данных
    if (empty($forms)) {
        echo '<p>Нет данных для указанного Account ID.</p>';
    } else {
        echo '<ul>';

        // Вывод данных
        foreach ($forms as $form) {
            $id = htmlspecialchars($form['id']);
            $title = htmlspecialchars($form['title']);
            $address = htmlspecialchars($form['address']);

            echo "<li>";
            echo "<a href='link/" . $address . "'>" . $title . "</a> ";
            echo "<button onclick=\"location.href='https://amotarget.ru/edit?id=" . $id . "'\">Редактировать</button>";
            echo "</li>";
        }

        echo '</ul>';
    }
} catch (PDOException $e) {
    die('Ошибка выполнения запроса: ' . $e->getMessage());
}
