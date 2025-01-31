
<?php
include('config.php');
include('functions.php');

// Функция для записи лога
//function write_to_log($message) {
//    $log_file = 'log.txt';  // Путь к файлу
//    //$timestamp = date('Y-m-d H:i:s');  // Текущее время
//    file_put_contents($log_file, "[$timestamp] $message\n", FILE_APPEND);  // Записываем сообщение в лог
//}

// Проверяем, что запрос пришел методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем URL-кодированные данные вебхука
    $webhook_data = file_get_contents('php://input');
    
    // Декодируем URL-кодированные данные в массив
    parse_str($webhook_data, $data);

    // Логируем только важную информацию о вебхуке
    //write_to_log("Webhook received: Lead ID: " . $data['leads']['status'][0]['id']);

    // Извлекаем ID сделки
    if (isset($data['leads']['status'][0]['id'])) {
        $lead_id = $data['leads']['status'][0]['id'];
        write_to_log("Lead ID: $lead_id");

        // Получаем заголовки для API запроса
        $subdomain = AMO_SUBDOMAIN;
        $client_id = AMO_CLIENT_ID;
        $client_secret = AMO_CLIENT_SECRET;
        $redirect_to = AMO_REDIRECT_TO;

        $headers = amocrm_generate_headers($subdomain, $client_id, $client_secret, $redirect_to);
        
        // Получаем информацию о сделке по ID
        list($code, $lead_response) = get_lead($headers, $subdomain, $lead_id);
        if ($code == 200) {
            // Логируем название и статус сделки
            $lead_name = $lead_response['name'];
            $lead_status = $lead_response['status_id'];
            //write_to_log("Lead Data: Name: $lead_name, Status ID: $lead_status");

            // Получаем информацию о кастомных полях
            $clientpassword = null;  // Инициализируем переменную для пароля клиента

            if (isset($lead_response['custom_fields_values'])) {
                foreach ($lead_response['custom_fields_values'] as $field) {
                    if ($field['field_id'] == 1633906) {
                        $clientpassword = $field['values'][0]['value'];  // Получаем значение поля "clientpassword"
                        write_to_log("Client Password: $clientpassword");
                    }
                }
            }
            
            // Получаем информацию о кастомных полях
            $clientphone = null;  // Инициализируем переменную для пароля клиента

            if (isset($lead_response['custom_fields_values'])) {
                foreach ($lead_response['custom_fields_values'] as $field) {
                    if ($field['field_id'] == 940817) {
                        $clientphone = $field['values'][0]['value'];  // Получаем значение поля "clientphone"
                        write_to_log("Client Phone: $clientphone");
                    }
                }
            }
			
			
			
			// Отправка данных на скрипт записи в БД
            $postData = [
                'lead_id' => $lead_id,
                'clientpassword' => $clientpassword,
                'clientphone' => $clientphone
            ];

            $ch = curl_init('https://amotarget.ru/new_user.php');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            $response = curl_exec($ch);
            curl_close($ch);

           
   // Логируем количество контактов
                //write_to_log("Number of contacts linked to the lead: " . count($contacts));

                // Получаем номер телефона у каждого контакта
                //foreach ($contacts as $contact) {
                    // Извлекаем телефон из контакта
                    //if (isset($contact['_embedded']['custom_fields_values'])) {
                        //foreach ($contact['_embedded']['custom_fields_values'] as $field) {
                           // if ($field['field_name'] == 'Телефон') {
                                //$phone_number = $field['values'][0]['value'];
                               // write_to_log("Phone Number: $phone_number");
                            //}
                        //}
                    //}
                //}
            //} else {
                //write_to_log("No contacts linked to the lead.");
            //}

        } else {
            write_to_log("Failed to get lead data. Response code: $code");
        }

    } else {
        write_to_log("No lead ID found in webhook data.");
    }
}
?>
