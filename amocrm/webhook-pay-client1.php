<?php
// Настройки подключения к базе данных
$host = "localhost";
$username = "adreanov_chatgpt";
$password = "i/f;8*WX/O@gaDv|Cu0&&_11&(eKXCf)";
$database = "adreanov_chatgpt";
$tableName = "api_keys"; // Имя таблицы

// Логирование сырых данных вебхука
$webhookLog = 'webhook_log.txt';

// Получение данных из запроса
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Данные передаются в строке запроса
    $rawData = $_SERVER['QUERY_STRING'];
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] RAW Data (GET): $rawData" . PHP_EOL, FILE_APPEND);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Данные передаются через тело запроса
    $rawData = file_get_contents('php://input');
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] RAW Data (POST): $rawData" . PHP_EOL, FILE_APPEND);
} else {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Error: Unsupported Request Method" . PHP_EOL, FILE_APPEND);
    die('Error: Unsupported Request Method');
}

// Парсинг данных
$parsedData = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Если запрос типа GET, парсим строку запроса
    parse_str($rawData, $parsedData);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Если запрос типа POST и данные передаются как строка запроса
    parse_str($rawData, $parsedData);
}

file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Parsed Data: " . print_r($parsedData, true) . PHP_EOL, FILE_APPEND);

// Проверка структуры данных
if (!isset($parsedData['leads']['status'][0]['id'])) {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Error: ID not found in parsed data" . PHP_EOL, FILE_APPEND);
    die('Error: ID not found in parsed data');
}

$id = intval($parsedData['leads']['status'][0]['id']); // Извлекаем ID и приводим к целочисленному типу

// Логирование извлеченного ID
file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Extracted ID: $id" . PHP_EOL, FILE_APPEND);

// Проверка, что ID является числом
if ($id <= 0) {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Error: Invalid ID value: $id" . PHP_EOL, FILE_APPEND);
    die('Error: Invalid ID value');
}

// Подключение к базе данных
$conn = new mysqli($host, $username, $password, $database);

// Проверка подключения
if ($conn->connect_error) {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] DB Connection Error: " . $conn->connect_error . PHP_EOL, FILE_APPEND);
    die('DB Connection Error');
}

// Получение текущего значения поля appeals
$query = "SELECT `appeals` FROM `$tableName` WHERE `id` = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] SQL Error: " . $conn->error . PHP_EOL, FILE_APPEND);
    die('SQL preparation failed');
}

$stmt->bind_param('i', $id); // Привязка параметра ID

// Логирование запроса
file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Executing query: $query" . PHP_EOL, FILE_APPEND);

if (!$stmt->execute()) {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] SQL Error during execution: " . $stmt->error . PHP_EOL, FILE_APPEND);
    die('Error executing query to fetch appeals');
}

$stmt->bind_result($currentAppeals); // Получаем текущее значение appeals

if (!$stmt->fetch()) {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Error: No record found for ID $id" . PHP_EOL, FILE_APPEND);
    die('No record found for ID');
}

$stmt->close();

// Логирование текущего значения appeals
file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Current appeals value: $currentAppeals" . PHP_EOL, FILE_APPEND);

// Обновление значения appeals, прибавляя 15
$newAppeals = $currentAppeals + 15;
$currentDate = date('Y-m-d H:i:s'); // Текущая дата и время

$query = "UPDATE `$tableName` SET `last_request` = ?, `appeals` = ? WHERE `id` = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] SQL Error: " . $conn->error . PHP_EOL, FILE_APPEND);
    die('SQL preparation failed');
}

$stmt->bind_param('sii', $currentDate, $newAppeals, $id); // Привязка параметров

// Логирование запроса
file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Executing query: $query" . PHP_EOL, FILE_APPEND);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Record with ID $id successfully updated. appeals increased to $newAppeals." . PHP_EOL, FILE_APPEND);
        echo "Запись с ID $id успешно обновлена. Значение appeals увеличено до $newAppeals.";
    } else {
        file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] No rows affected for ID $id." . PHP_EOL, FILE_APPEND);
        echo "Запись с ID $id не найдена.";
    }
} else {
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] SQL Error during execution: " . $stmt->error . PHP_EOL, FILE_APPEND);
    echo "Ошибка при обновлении записи";
}

// Закрытие соединения
$stmt->close();
$conn->close();
?>
