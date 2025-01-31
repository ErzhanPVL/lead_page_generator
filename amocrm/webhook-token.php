<?php
include('config.php');
include('functions.php');

// Функция для подключения к базе данных
function connect_to_database($host, $username, $password, $database) {
    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }

    return $connection;
}

// Функция для добавления записи в базу данных
function insert_into_database($connection, $tableName, $lead_id, $last_request, $appeals, $token) {
    $stmt = $connection->prepare("INSERT INTO `$tableName` (`id`, `last_request`, `appeals`, `token`) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("isis", $lead_id, $last_request, $appeals, $token);

        if (!$stmt->execute()) {
            die("Failed to insert record into database: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("Failed to prepare database statement: " . $connection->error);
    }
}

// Проверяем, что запрос пришел методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем URL-кодированные данные вебхука
    $webhook_data = file_get_contents('php://input');

    // Декодируем URL-кодированные данные в массив
    parse_str($webhook_data, $data);

    // Извлекаем ID сделки
    if (isset($data['leads']['status'][0]['id'])) {
        $lead_id = $data['leads']['status'][0]['id'];

        // Получаем заголовки для API запроса
        $subdomain = AMO_SUBDOMAIN;
        $client_id = AMO_CLIENT_ID;
        $client_secret = AMO_CLIENT_SECRET;
        $redirect_to = AMO_REDIRECT_TO;

        $headers = amocrm_generate_headers($subdomain, $client_id, $client_secret, $redirect_to);

        // Получаем информацию о сделке по ID
        list($code, $lead_response) = get_lead($headers, $subdomain, $lead_id);
        if ($code == 200) {
            // Получаем информацию о кастомных полях
            $token = null;  // Инициализируем переменную для пароля клиента

            if (isset($lead_response['custom_fields_values'])) {
                foreach ($lead_response['custom_fields_values'] as $field) {
                    if ($field['field_id'] == 1635391) {
                        $token = $field['values'][0]['value'];  // Получаем значение поля "clientphone"
                    }
                }
            }

            // Подключаемся к базе данных
            $host = "localhost";
            $username = "adreanov_chatgpt";
            $password = "i/f;8*WX/O@gaDv|Cu0&&_11&(eKXCf)";
            $database = "adreanov_chatgpt";
            $tableName = "api_keys";

            $connection = connect_to_database($host, $username, $password, $database);

            // Добавляем запись в базу данных
            $last_request = date('Y-m-d H:i:s');
            $appeals = 0;
            insert_into_database($connection, $tableName, $lead_id, $last_request, $appeals, $token);

            // Закрываем соединение с базой данных
            $connection->close();

        } else {
            die("Failed to get lead data. Response code: $code");
        }

    } else {
        die("No lead ID found in webhook data.");
    }
}
?>
