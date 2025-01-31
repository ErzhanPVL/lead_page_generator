<?php

function has_amocrm_referer($referer) {
    return 'https://www.amocrm.ru/' == $referer;
}

function check_amocrm_oauth_query_string($get_vars) {
    $required_vars = ['code', 'state', 'referer', 'client_id'];
    
    foreach ($required_vars as $required_var) {
        if (!array_key_exists($required_var, $get_vars)) {
            return false;
        }
    }
    return true;
}


function amocrm_create_token($subdomain, $client_secret, $data) {
    $form_data['client_id'] = $data['client_id'];
    $form_data['client_secret'] = $client_secret;
    $form_data['grant_type'] = 'authorization_code';
    $form_data['code'] = $data['code'];
    $form_data['redirect_uri'] = $data['state'];
        
    $link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token';
        
    list($code, $response) = request($link, 'POST', $form_data);
    

    if ($code != 200) {
        return false;
    }

    file_put_contents(TOKEN_FILE, json_encode($response));
    return true;
}

function amocrm_generate_headers($subdomain, $client_id, $client_secret, $redirect_to='') {
    $token_info = json_decode(file_get_contents(TOKEN_FILE));
    $cache_time = 3600; 
    
    if ((time() - $cache_time) < filemtime(TOKEN_FILE)) {
        $access_token = $token_info->access_token;
    } else {
        $link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token';
        $data = array(
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_to,
            'grant_type' => 'refresh_token',
            'refresh_token' => $token_info->refresh_token,
        );
        
        list($code, $response) = request($link, 'POST', $data);

        $access_token = $response['access_token'];
        $refresh_token = $response['refresh_token']; 
        $token_type = $response['token_type'];
        $expires_in = $response['expires_in'];

        if ($access_token) {
            echo  $access_token;
            $data_amocrm = array('access_token' => $access_token,'expires' => $expires_in,'refresh_token' => $refresh_token);
            file_put_contents(TOKEN_FILE, json_encode($data_amocrm));
        }
    }
    
    $headers = array('Authorization: Bearer ' . $access_token,"Content-Type: application/json");
    return $headers;
}

function get_lead($headers, $subdomain, $lead_id) {
    $url = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/' . $lead_id;
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);                
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    $response = json_decode($response, true);
    return array($code, $response);
}

function get_custom_fields($headers, $subdomain) {
    $url = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/custom_fields';
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);                
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    $response = json_decode($response, true);
    return array($code, $response);
}

function update_lead($headers, $subdomain, $lead_id, $data) {
    $url = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/' . $lead_id;
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);                
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
     $response = json_decode($response, true);
    return array($code, $response);
}

function create_system_note($headers, $subdomain, $lead_id, $service, $text) {
    $url = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/'.$lead_id.'/notes';

    $data = array(array(
        'note_type' => 'service_message',
        'params' => [
            'service' => $service,
            'text' => $text,
        ],
        'created_by' => 0,
    ));
    
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER, false);
    curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);                
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    $response = json_decode($response, true);
    return array($code, $response);
}


function find_value_by_field_id($custom_fields_values, $field_id) {
    if (!is_array($custom_fields_values)) return;
    
    foreach ($custom_fields_values as $item) {
        if ($item['field_id'] == $field_id) {
            return $item['values'][0]['value'];
        }
    }
}

function find_value_by_name($field_name, $custom_fields_values) {
    foreach ($custom_fields_values as $item) {
        if ($item['field_name'] == $field_name) {
            return $item['values'][0]['value'];
        }
    }
}


function parse_ga($text) {
    $text = 'http://GA1.2.2135959036.1634656098';

    $found = preg_match('/GA1\.2\.(.+)/', $text, $result);
    
    if ($found) {
        return $result[1];
    }
    
    return $text;

}

function request($url, $method, $data = array(), $headers=array()) {
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER, false);    
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 0);
    
    if (!empty($headers)) {
        curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);       
    }
    
    if (!empty($data)) {
        curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
    }
    
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    $response = json_decode($response, true);
    return array($code, $response);
}

function get_client_ip() {
	$ipaddress = '';
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(!empty($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(!empty($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(!empty($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(!empty($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function logData($data) {
    $logFile = 'log.txt';
    $file = fopen($logFile, 'a');
    if (is_array($data) || is_object($data)) {
        $dataString = print_r($data, true);
    } else {
        $dataString = (string) $data;
    }

    fwrite($file, "[" . date('Y-m-d H:i:s') . "] " . $dataString . "\n");
    fclose($file);
}

