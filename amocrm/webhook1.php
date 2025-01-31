<?php
// Устанавливаем путь к файлу для логов
$logFile = 'webhook_log1.txt';

// Получаем содержимое POST-запроса
$webhookData = file_get_contents('php://input');

// Если данные есть, сохраняем их в файл
if ($webhookData) {
    // Формируем строку для записи (добавляем дату и время)
    $logEntry = "[" . date('Y-m-d H:i:s') . "] " . $webhookData . PHP_EOL;

    // Используем file_put_contents с флагом FILE_APPEND для добавления записи
    file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
}

// Возвращаем ответ (например, статус 200 OK)
http_response_code(200);
echo "Webhook received and logged.";
?>
