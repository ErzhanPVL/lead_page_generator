<?php
// Получаем данные из POST-запроса
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['integrationId']) || !isset($data['secretKey'])) {
    echo json_encode(['success' => false, 'message' => 'ID интеграции или ключ не указаны']);
    exit;
}

$integrationId = $data['integrationId'];
$secretKey = $data['secretKey'];

//$accountId = '123456'; // ID аккаунта (может быть динамическим)
$accountId = $_COOKIE['lead_id'];
$targetDir = __DIR__ . '/integration/' . $accountId;

// Путь к config.php
$configPath = $targetDir . '/config.php';

// Проверка существования config.php
if (!file_exists($configPath)) {
    echo json_encode(['success' => false, 'message' => 'Файл config.php не найден']);
    exit;
}

// Чтение содержимого config.php
$configContent = file_get_contents($configPath);

// Замена значений для ID интеграции и ключа
$configContent = preg_replace(
    [
        "/define\('AMO_CLIENT_ID', '.*?'\);/",
        "/define\('AMO_CLIENT_SECRET', '.*?'\);/"
    ],
    [
        "define('AMO_CLIENT_ID', '$integrationId');",
        "define('AMO_CLIENT_SECRET', '$secretKey');"
    ],
    $configContent
);

// Запись изменений обратно в config.php
if (file_put_contents($configPath, $configContent) === false) {
    echo json_encode(['success' => false, 'message' => 'Ошибка записи в config.php']);
    exit;
}

// Возвращаем успешный ответ с динамической ссылкой
echo json_encode([
    'success' => true,
    'redirectLink' => "https://amotarget.ru/integration/amocrm/?id=$accountId"
]);
?>
