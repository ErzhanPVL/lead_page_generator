<?php
include('config.php'); // Конфигурационные данные для AmoCRM
include('functions.php'); // Функции для работы с AmoCRM

// Функция для подключения к базе данных
function connect_to_database($host, $username, $password, $database) {
    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }

    return $connection;
}

// Функция для получения текущего значения Appeals из базы данных
function get_current_appeals($connection, $tableName, $lead_id) {
    $stmt = $connection->prepare("SELECT `appeals` FROM `$tableName` WHERE `id` = ?");
    if ($stmt) {
        $stmt->bind_param("i", $lead_id);
        $stmt->execute();
        $stmt->bind_result($current_appeals);
        $stmt->fetch();
        $stmt->close();
        return $current_appeals !== null ? intval($current_appeals) : 0; // Возвращаем 0, если записи нет
    } else {
        die("Failed to prepare SELECT statement: " . $connection->error);
    }
}

// Функция для обновления записи в базе данных
function update_database_record($connection, $tableName, $lead_id, $last_request, $new_appeals) {
    $stmt = $connection->prepare("UPDATE `$tableName` SET `last_request` = ?, `appeals` = ? WHERE `id` = ?");
    if ($stmt) {
        $stmt->bind_param("sii", $last_request, $new_appeals, $lead_id);

        if (!$stmt->execute()) {
            die("Failed to update record in database: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("Failed to prepare UPDATE statement: " . $connection->error);
    }
}

// Проверяем, что запрос пришел методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем URL-кодированные данные вебхука
    $webhook_data = file_get_contents('php://input');

    // Декодируем URL-кодированные данные в массив
    parse_str($webhook_data, $data);

    // Логирование сырых данных
    $webhookLog = 'webhook_log.txt';
    file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] RAW Data: $webhook_data" . PHP_EOL, FILE_APPEND);

    // Извлекаем ID сделки
    if (isset($data['leads']['status'][0]['id'])) {
        $lead_id = $data['leads']['status'][0]['id'];

        // Получаем заголовки для API-запроса
        $subdomain = AMO_SUBDOMAIN;
        $client_id = AMO_CLIENT_ID;
        $client_secret = AMO_CLIENT_SECRET;
        $redirect_to = AMO_REDIRECT_TO;

        $headers = amocrm_generate_headers($subdomain, $client_id, $client_secret, $redirect_to);

        // Получаем информацию о сделке по ID
        list($code, $lead_response) = get_lead($headers, $subdomain, $lead_id);
        if ($code == 200) {
            // Логирование ответа AmoCRM
            file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Lead Response: " . print_r($lead_response, true) . PHP_EOL, FILE_APPEND);

            // Получаем значение поля "appeals" (ID 1635391)
            $appeals_from_amocrm = null;

            if (isset($lead_response['custom_fields_values'])) {
                foreach ($lead_response['custom_fields_values'] as $field) {
                    if ($field['field_id'] == 1637215) {
                        $appeals_from_amocrm = intval($field['values'][0]['value']);
                    }
                }
            }

            if ($appeals_from_amocrm === null) {
                die("Appeals field (ID 1637215) not found in lead data.");
            }

            // Подключаемся к базе данных
            $host = "localhost";
            $username = "adreanov_chatgpt";
            $password = "i/f;8*WX/O@gaDv|Cu0&&_11&(eKXCf)";
            $database = "adreanov_chatgpt";
            $tableName = "api_keys";

            $connection = connect_to_database($host, $username, $password, $database);

            // Получаем текущий Appeals из базы данных
            $current_appeals = get_current_appeals($connection, $tableName, $lead_id);

            // Суммируем значение Appeals
            $new_appeals = $current_appeals + $appeals_from_amocrm;

            // Обновляем запись в базе данных
            $last_request = date('Y-m-d H:i:s');
            update_database_record($connection, $tableName, $lead_id, $last_request, $new_appeals);

            // Логирование успешного обновления
            file_put_contents($webhookLog, "[" . date('Y-m-d H:i:s') . "] Record updated: Lead ID = $lead_id, Last Request = $last_request, Appeals = $new_appeals (Added $appeals_from_amocrm)" . PHP_EOL, FILE_APPEND);

            echo "Запись с ID $lead_id успешно обновлена. Appeals увеличен на $appeals_from_amocrm.";
        } else {
            die("Failed to get lead data. Response code: $code");
        }

    } else {
        die("No lead ID found in webhook data.");
    }
} else {
    die("Unsupported request method.");
}
?>
