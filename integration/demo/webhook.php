<?php


if ($_SERVER['REQUEST_METHOD'] != 'POST') exit();
file_put_contents('index.log', file_get_contents('php://input'));

// код для записи ответа вебхука в БД

$log_contents = file_get_contents('index.log');

parse_str($log_contents, $parsed_data);

$id = $parsed_data['leads']['add'][0]['id'];
$account_id = $parsed_data['account']['id'];
$subdomain = $parsed_data['account']['subdomain'];

$dbHost = 'localhost'; 
$dbName = 'adreanov_leads';
$dbUser = 'adreanov_leads';
$dbPass = '!WaT3ah$h|+FD{=p';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO leads (lead, account, subdomain, url, date) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssss", $id, $account_id, $subdomain, $URL, $currentDate);

$currentDate = date('Y-m-d H:i:s'); 
$URL = 'https://' . $subdomain . '.amocrm.ru/leads/detail/' . $id;

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();




// parse_str('leads%5Badd%5D%5B0%5D%5Bid%5D=5141671&leads%5Badd%5D%5B0%5D%5Bstatus_id%5D=43283812&leads%5Badd%5D%5B0%5D%5Bpipeline_id%5D=4736017&account%5Bid%5D=29752078&account%5Bsubdomain%5D=messengermarketing', $_POST);

//parse_str('leads%5Bstatus%5D%5B0%5D%5Bid%5D=916659&leads%5Bstatus%5D%5B0%5D%5Bstatus_id%5D=45648904&leads%5Bstatus%5D%5B0%5D%5Bpipeline_id%5D=5080363&leads%5Bstatus%5D%5B0%5D%5Bold_status_id%5D=45648901&leads%5Bstatus%5D%5B0%5D%5Bold_pipeline_id%5D=5080363&account%5Bid%5D=29964523&account%5Bsubdomain%5D=messg', $_POST);

//parse_str('leads%5Bstatus%5D%5B0%5D%5Bid%5D=6325593&leads%5Bstatus%5D%5B0%5D%5Bstatus_id%5D=45648904&leads%5Bstatus%5D%5B0%5D%5Bpipeline_id%5D=5080363&leads%5Bstatus%5D%5B0%5D%5Bold_status_id%5D=45648901&leads%5Bstatus%5D%5B0%5D%5Bold_pipeline_id%5D=5080363&account%5Bid%5D=29964523&account%5Bsubdomain%5D=messg', $_POST);

// $text = 'leads%5Bstatus%5D%5B0%5D%5Bid%5D=3029903&leads%5Bstatus%5D%5B0%5D%5Bstatus_id%5D=51725977&leads%5Bstatus%5D%5B0%5D%5Bpipeline_id%5D=5931454&leads%5Bstatus%5D%5B0%5D%5Bold_status_id%5D=51725974&leads%5Bstatus%5D%5B0%5D%5Bold_pipeline_id%5D=5931454&account%5Bid%5D=30519919&account%5Bsubdomain%5D=archibiz';

// parse_str($text, $_POST);


include('rb-mysql.php');
include('config.php');
include('functions.php');

$subdomain = AMO_SUBDOMAIN;
$client_id = AMO_CLIENT_ID;
$client_secret = AMO_CLIENT_SECRET;
$redirect_to = AMO_REDIRECT_TO;

$headers = amocrm_generate_headers($subdomain, $client_id, $client_secret, $redirect_to);


R::setup('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DBNAME,  MYSQL_USERNAME, MYSQL_PASSWORD);



$lead_status_list = array('add', 'status');
$lead_status = '';

foreach ($lead_status_list as $item) {
    if (array_key_exists($item, $_POST['leads'])) {
        $lead_status = $item;
        break;
    }
}

$fields = get_custom_fields($headers, AMO_SUBDOMAIN);

//file_put_contents('debug.log', "Cookies from DB: " . print_r($fields, true) . "\n", FILE_APPEND);

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
                
    $ym_uid = find_value_by_name('_ym_uid', $lead_data_amo[1]['custom_fields_values']);
    
    if (!$ym_uid) {
		
		$currentTime = new DateTime(); 
    $fiveMinutesAgo = $currentTime->sub(new DateInterval('PT9M')); 
    $formattedTime = $fiveMinutesAgo->format('Y-m-d H:i:s'); 

    $cookies_from_db = R::findOne('amo', 'isclicked = 1 AND created > :time ORDER BY created DESC', [':time' => $formattedTime]);
    
	    if ($cookies_from_db) {
            // после отдачи значения из БД, значение sclicked 1 в БД становится 0
            $cookies_from_db->isclicked = 2;
            R::store($cookies_from_db);
        } else {
            echo 'not $ym_uid';
            //continue; 
        }
	
	
	
	
	}else{


    $cookies_from_db = R::findOne('amo', '_ym_uid = :_ym_uid ', [':_ym_uid' => $ym_uid]);
	}
	





	
	
	

    $data = array(
        'custom_fields_values' => array()
    );
	
	
	



$ym_uid_id = 404563;
	
	$data['custom_fields_values'][] = array(
    'field_id' => $ym_uid_id,
    'values' => array(
        array('value' => $cookies_from_db->_ym_uid)
    )
);
	

    foreach ($fields as $field) {
        
        if ($field['name'] == 'gooogleanalytics') {
            $value_from_db = LEAD_FIELDS_GA_LINK_TEXT . parse_ga($cookies_from_db->$key);
        } else {
            $value_from_db = $cookies_from_db->{$field['name']};
        }
        
        $data['custom_fields_values'][] = array(
            'field_id' => $field['id'],
            'values' => array(
                array('value' => $value_from_db)
            )
        );
    }
    
    $response = update_lead($headers, $subdomain, $lead_id,  $data);


}