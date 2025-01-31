<?php
// Получаем данные из запроса
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['subdomain']) || empty($data['subdomain'])) {
    echo json_encode(['success' => false, 'message' => 'Субдомен не указан']);
    exit;
}

$subdomain = $data['subdomain'];
//$accountId = '123456'; // ID аккаунта (может быть динамическим)
$accountId = $_COOKIE['lead_id'];

// Путь к папке для копирования
$sourceDir = __DIR__ . '/integration/demo';
$targetDir = __DIR__ . '/integration/' . $accountId;

// Копирование папки
if (!is_dir($sourceDir) || !copyDirectory($sourceDir, $targetDir)) {
    echo json_encode(['success' => false, 'message' => 'Ошибка копирования папки']);
    exit;
}

// Путь к config.php
$configPath = $targetDir . '/config.php';

// Загрузка текущего файла
$configContent = file_get_contents($configPath);

if ($configContent === false) {
    echo json_encode(['success' => false, 'message' => 'Ошибка чтения config.php']);
    exit;
}

// Замена значений в config.php
$configContent = preg_replace(
    [
        "/define\('AMO_SUBDOMAIN', '.*?'\);/",
        "/define\('AMO_REDIRECT_TO', '.*?'\);/"
    ],
    [
        "define('AMO_SUBDOMAIN', '$subdomain');",
        "define('AMO_REDIRECT_TO', 'https://amotarget.ru/integration/$accountId');"
    ],
    $configContent
);

// Запись обновленного файла
if (file_put_contents($configPath, $configContent) === false) {
    echo json_encode(['success' => false, 'message' => 'Ошибка записи в config.php']);
    exit;
}


// Возвращаем успешный ответ
echo json_encode(['success' => true]);

// Функция копирования директории
function copyDirectory($source, $destination) {
    if (!is_dir($source)) return false;
    if (!mkdir($destination, 0755, true) && !is_dir($destination)) return false;

    foreach (scandir($source) as $item) {
        if ($item === '.' || $item === '..') continue;
        $src = $source . '/' . $item;
        $dst = $destination . '/' . $item;

        if (is_dir($src)) {
            if (!copyDirectory($src, $dst)) return false;
        } else {
            if (!copy($src, $dst)) return false;
        }
    }
    return true;
}
?>
