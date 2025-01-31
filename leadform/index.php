<?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
        <main class="main">
            <section class="section">
                <h1 class="section__header">Лид–формы</h1>
                <div class="section__text">
                    
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
//$accountId = '123456';

$accountId = $_COOKIE['lead_id'];

try {
    // Запрос данных из таблицы forms
    $stmt = $pdo->prepare("SELECT id, title, address FROM forms WHERE account_id = ?");
    $stmt->execute([$accountId]);
    $forms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Проверка наличия данных
    if (empty($forms)) {
        echo 'У вас нет ни одной активной лид–формы 2.0.';
    } else {
        //echo '<ul>';

        // Вывод данных
        foreach ($forms as $form) {
            $id = htmlspecialchars($form['id']);
            $title = htmlspecialchars($form['title']);
            $address = htmlspecialchars($form['address']);

            //echo "<li>";
			echo "<div class='msg-link'>";
            echo "<a href='https://amotarget.ru/link/" . $address . "'>" . $title . "</a> ";
            echo "<button class='section__btn msg-link__a' onclick=\"location.href='https://amotarget.ru/edit?id=" . $id . "'\">Редактировать</button>";
			echo "</div>";
            //echo "</li>";
        }

        //echo '</ul>';
    }
} catch (PDOException $e) {
    die('Ошибка выполнения запроса: ' . $e->getMessage());
}
?>
                </div>
            </section>
        </main>
        <aside class="aside">
Demo view
        </aside>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/static/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>