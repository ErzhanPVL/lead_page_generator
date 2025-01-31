<?php
// Укажите ваш токен
$botToken = '7691556039:AAFN7tB929Glei3ksz3ZcvYrJ5OcBq3gIA0';
$apiUrl = "https://api.telegram.org/bot$botToken";

// Получаем обновления (webhook или getUpdates)
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Если обновление пустое, прекращаем выполнение
if (!$update) {
    exit;
}

// Получаем данные из обновления
$chatId = $update['message']['chat']['id'] ?? null;
$messageText = $update['message']['text'] ?? '';

// Обработка команды /start
if ($messageText === '/start') {
    sendMessage($chatId, "Добро пожаловать! Я ваш Telegram-бот.");
} elseif ($messageText === '/help') {
    sendMessage($chatId, "Я могу отвечать на ваши сообщения. Попробуйте написать мне что-нибудь!");
} else {
    sendMessage($chatId, "Вы написали: $messageText");
}

// Функция для отправки сообщений
function sendMessage($chatId, $text) {
    global $apiUrl;
    $params = [
        'chat_id' => $chatId,
        'text' => $text
    ];
    file_get_contents($apiUrl . "/sendMessage?" . http_build_query($params));
}
?>
