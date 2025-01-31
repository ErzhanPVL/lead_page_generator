<?php


if ($_SERVER['REQUEST_METHOD'] != 'POST') exit();
file_put_contents('index.log', file_get_contents('php://input'));

include('config.php');
include('functions.php');

$subdomain = AMO_SUBDOMAIN;
$client_id = AMO_CLIENT_ID;
$client_secret = AMO_CLIENT_SECRET;
$redirect_to = AMO_REDIRECT_TO;

$headers = amocrm_generate_headers($subdomain, $client_id, $client_secret, $redirect_to);



$lead_status_list = array('add', 'status');
$lead_status = '';

foreach ($lead_status_list as $item) {
    if (array_key_exists($item, $_POST['leads'])) {
        $lead_status = $item;
        break;
    }
}

$fields = get_custom_fields($headers, AMO_SUBDOMAIN);



$fields = array_map(function($item) {
    return ['id' => $item['id'], 'name' => mb_strtolower($item['name'])];
}, $fields[1]['_embedded']['custom_fields']);

$fields = array_filter($fields, function($item) {
    return in_array($item['name'], LEAD_FIELDS_WEBHOOK);
});

$lead_id = 0;

foreach ($_POST['leads'][$lead_status] as $item) {
    $lead_id = $item['id'];
    
    $lead_data_amo = get_lead($headers, $subdomain, $lead_id);
                
    $price = $lead_data_amo[1]['price'];
    $ym_uid = find_value_by_name('_ym_uid', $lead_data_amo[1]['custom_fields_values']);
    
    if (!$ym_uid) {
        echo 'not $ym_uid';

        create_system_note($headers, $subdomain, $lead_id, 'MESSG', 'Ошибка отправки конверсии покупки в VK ADS · отсутствует идентификатор клиента');
        continue;
        
    } else {
        $name = htmlspecialchars($_GET["name"]);
        $url = "https://top-fwz1.mail.ru/tracker?id=3264613;e=RG%3A$price/amocrmpay;userid=$ym_uid";
        
        $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded'
            )
            
        )));

        create_system_note($headers, $subdomain, $lead_id, 'MESSG', 'Конверсия покупки с бюджетом '. $price .'₽ отправлена в VK ADS');
    }    
}