<?php
// Путь к шаблону страницы
//$accountId = '123456'; // ID аккаунта (может быть динамическим)

$accountId = $_COOKIE['lead_id'];

$templatePath = 'template.php'; // Укажите путь к HTML-шаблону

$randomHash = md5(uniqid(mt_rand(), true));


// Обработка данных формы
$title = htmlspecialchars($_POST['title'] ?? ''); // Заголовок
//$description = htmlspecialchars($_POST['description'] ?? ''); 
$description = nl2br(htmlspecialchars($_POST['description'] ?? '')); // Описание с переносами строк

$formName = htmlspecialchars($_POST['form_name'] ?? ''); // Название формы
$address = htmlspecialchars($_POST['address'] ?? $randomHash); // Адрес лид–формы
//$address = $randomHash;
$domen = htmlspecialchars($_POST['domen'] ?? ''); // Собственный домен
$metrix = htmlspecialchars($_POST['metrix'] ?? ''); // Номер счетчика Яндекс.Метрики
$VKmetrix = htmlspecialchars($_POST['VKmetrix'] ?? '');
$WhatsApp = htmlspecialchars($_POST['WhatsApp'] ?? ''); // WhatsApp
$Telegram = htmlspecialchars($_POST['Telegram'] ?? ''); // Telegram
$VK = htmlspecialchars($_POST['VK'] ?? ''); // VK


$answersType = $_POST['answers-type'] ?? [];
$questions = $_POST['question'] ?? [];
$answers = $_POST['answer'] ?? [];

$metrix0 = $metrix;
$WhatsApp0 = $WhatsApp;
$Telegram0 = $Telegram;
$VK0 = $VK;





















$html = '';

//print_r($_POST);

// Перебираем все вопросы
foreach ($questions as $index => $question) {
    $questionType = $answersType[$index] ?? ''; // Тип ответа
    $questionAnswers = $answers[$index] ?? []; // Возможные ответы
    $questionId = ($index + 1);  // Уникальный идентификатор вопроса

    // Блок с вопросом
    $html .= '<div class="banner2-wrap" style="z-index: 1;">';
    $html .= '<div class="banner2-select-container">';
    $html .= '<span>' . htmlspecialchars($question) . '</span>';

    if ($questionType === 'Выбор одного ответа' or $questionType === 'once-answer') {
        // Если тип ответа "Выбор одного ответа", создаём радио-кнопки
        $html .= '<div class="banner2-radio">';
        foreach ($questionAnswers as $answerIndex => $answer) {
            if (!empty($answer)) { // Проверяем, что ответ не пустой
                $inputId = "radio-{$index}-{$answerIndex}";
                $html .= '<div class="radio">';
                $html .= '<input id="' . $inputId . '" name="land_' . $questionId . '" value="' . htmlspecialchars($answer) . '" type="radio">';
                $html .= '<label for="' . $inputId . '" class="radio-label">' . htmlspecialchars($answer) . '</label>';
                $html .= '</div>';
            }
        }
        $html .= '</div>';
    } elseif ($questionType === 'custom-answer') {
        // Если тип ответа "custom-answer", создаём текстовый input
        $html .= '<div class="banner2-select-wrap">';
        $html .= '<input class="banner2-input" type="text" name="land_' . $questionId . '" placeholder="Введите ваш ответ" />';
        $html .= '</div>';
    }

    $html .= '</div>'; // Закрываем .banner2-select-container
    $html .= '</div>'; // Закрываем .banner2-wrap
}



if(!empty($metrix)){
	$metrix = '<script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(' . $metrix . ', "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, ecommerce:"dataLayer" }); </script><noscript><div><img src="https://mc.yandex.ru/watch/' . $metrix . '" style="position:absolute; left:-9999px;" alt="" /></div></noscript>';
	
}



if(!empty($WhatsApp)){
	$WhatsApp = '<li><a class="whatsapp-button" href="whatsapp://send?text=Получить презентацию технологии&phone=' . $WhatsApp . '"><i><img src="https://amotarget.ru/leadform1/img/wa.svg" alt=""></i><span>WhatsApp</span></a></li>';
}else{
	$WhatsApp = '<li></li>';
}


if(!empty($Telegram)){
	$Telegram = '<li><a class="telegram-button" href="' . $Telegram . '" id="showContent2" onclick="$(' . "'#land_phone'" . ').focus();" id="showContent2"><i><img src="https://amotarget.ru/leadform1/img/tg.svg" alt=""></i><span>Telegram</span></a></li>';
}else{
	$Telegram = '<li></li>';
}
	
if(!empty($VK)){
	$VK = '<li><a class="vk-button" href="' . $VK . '" id="showContent1" onclick="$(' . "'#land_phone'" . ').focus();" id="showContent1"><i><img src="https://amotarget.ru/leadform1/img/vk.svg" alt=""></i><span>ВКонтакте</span></a></li>';
}else{
	$VK = '<li></li>';
}

// Папка для сохранения клонированных страниц
$pagesDir = 'link/'. $address;
if (!is_dir($pagesDir)) {
    mkdir($pagesDir, 0755, true);
}

// Папка для сохранения загруженных файлов
$uploadsDir = 'uploads';
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0755, true);
}


// Обработка загрузки файла
$uploadedFilePath = '';
if (!empty($_FILES['fileUpload']['name'])) {
    $fileName = basename($_FILES['fileUpload']['name']);
    $uploadedFilePath = $uploadsDir . '/' . uniqid() . '_' . $fileName;
    if (!move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadedFilePath)) {
        die('Ошибка при загрузке файла');
    }
}
elseif(!empty($_POST['fileUploadOld'])){
	$uploadedFilePath = $_POST['fileUploadOld'];
}

// Загрузка и модификация шаблона
if (!file_exists($templatePath)) {
    die('Шаблон не найден');
}

$templateContent = file_get_contents($templatePath);


// Замена плейсхолдеров в шаблоне
$pageContent = str_replace(
    ['{{form_name}}', '{{title}}', '{{description}}', '{{image}}', '{{metrix}}', '{{WhatsApp}}', '{{Telegram}}', '{{VK}}', '{{questions}}'],
    [$formName, $title, $description, $uploadedFilePath ? '<img src="https://amotarget.ru/' . $uploadedFilePath . '" alt="Обложка">' : '', $metrix, $WhatsApp, $Telegram, $VK, $html],
    $templateContent
);

// Сохранение клонированной страницы
$newPageName = 'index.php';
$newPagePath = $pagesDir . '/' . $newPageName;
file_put_contents($newPagePath, $pageContent);

// Вывод результата
//echo 'Страница успешно создана: <a href="' . $newPagePath . '" target="_blank">' . $newPagePath . '</a>';
//header('Location: https://amotarget.ru/'. $pagesDir);
//exit( );





$targetDir = __DIR__ . '/integration/' . $accountId;

// Путь к config.php
$configPath = $targetDir . '/config.php';

// Проверка существования config.php
if (!file_exists($configPath)) {
    echo '<a href="https://amotarget.ru/connect-crm/"><button>Продолжить</button></a>';
}
else{
	echo '<a href="https://amotarget.ru/' . $pagesDir . '" target="_blank">' . $pagesDir . '</a>';
}













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
        "CREATE TABLE IF NOT EXISTS forms (
            id INT AUTO_INCREMENT PRIMARY KEY,
            account_id VARCHAR(255) NOT NULL,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            form_name VARCHAR(255),
            address VARCHAR(255) UNIQUE,
            domen VARCHAR(255),
            metrix VARCHAR(50),
            WhatsApp VARCHAR(20),
            Telegram VARCHAR(50),
            VK VARCHAR(50),
            VKmetrix VARCHAR(50),
            file_path VARCHAR(255), -- Добавлено поле для пути к файлу
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",

        "CREATE TABLE IF NOT EXISTS questions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            form_id INT NOT NULL,
            question_text TEXT NOT NULL,
            answer_type VARCHAR(50),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (form_id) REFERENCES forms(id) ON DELETE CASCADE
        )",

        "CREATE TABLE IF NOT EXISTS answers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            question_id INT NOT NULL,
            answer_text TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
        )"
    ];

    foreach ($queries as $query) {
        $pdo->exec($query);
    }

    //echo "Таблицы успешно созданы.";
} catch (PDOException $e) {
    die('Ошибка создания таблиц: ' . $e->getMessage());
}

try {
    // Начало транзакции
    $pdo->beginTransaction();

    // Проверка существования записи с таким address
    $stmtCheck = $pdo->prepare("SELECT id FROM forms WHERE address = ?");
    $stmtCheck->execute([$address]);
    $form = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($form) {
        // Обновление существующей записи
        $formId = $form['id'];
        $stmtUpdate = $pdo->prepare("UPDATE forms SET 
            account_id = ?, 
            title = ?, 
            description = ?, 
            form_name = ?, 
            domen = ?, 
            metrix = ?, 
            WhatsApp = ?, 
            Telegram = ?, 
            VK = ?, 
            VKmetrix = ?, 
            file_path = ? 
            WHERE id = ?");
        $stmtUpdate->execute([$accountId, $title, $description, $formName, $domen, $metrix0, $WhatsApp0, $Telegram0, $VK0, $VKmetrix, $uploadedFilePath, $formId]);

        // Удаление старых вопросов и ответов
        $stmtDeleteQuestions = $pdo->prepare("DELETE FROM questions WHERE form_id = ?");
        $stmtDeleteQuestions->execute([$formId]);
    } else {
        // Вставка новой записи
        $stmtInsert = $pdo->prepare("INSERT INTO forms (account_id, title, description, form_name, address, domen, metrix, WhatsApp, Telegram, VK, VKmetrix, file_path) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmtInsert->execute([$accountId, $title, $description, $formName, $address, $domen, $metrix0, $WhatsApp0, $Telegram0, $VK0, $VKmetrix, $uploadedFilePath]);

        // Получение ID новой формы
        $formId = $pdo->lastInsertId();
    }

    // Вставка новых вопросов, типов ответов и ответов
    foreach ($questions as $index => $question) {
        $stmtQuestion = $pdo->prepare("INSERT INTO questions (form_id, question_text, answer_type) VALUES (?, ?, ?)");
        $stmtQuestion->execute([$formId, htmlspecialchars($question), htmlspecialchars($answersType[$index] ?? '')]);

        // Получение ID вставленного вопроса
        $questionId = $pdo->lastInsertId();

        // Вставка ответов для вопроса
        if (isset($answers[$index])) {
            foreach ($answers[$index] as $answer) {
                $stmtAnswer = $pdo->prepare("INSERT INTO answers (question_id, answer_text) VALUES (?, ?)");
                $stmtAnswer->execute([$questionId, htmlspecialchars($answer)]);
            }
        }
    }

    // Завершение транзакции
    $pdo->commit();

    //echo "Данные успешно обновлены.";
} catch (Exception $e) {
    // Откат транзакции в случае ошибки
    $pdo->rollBack();
    die('Ошибка обновления данных: ' . $e->getMessage());
}

