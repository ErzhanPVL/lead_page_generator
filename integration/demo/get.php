<?php
include('config.php');
include('functions.php');

$subdomain = AMO_SUBDOMAIN;
$client_id = AMO_CLIENT_ID;
$client_secret = AMO_CLIENT_SECRET;
$redirect_to = AMO_REDIRECT_TO;

$headers = amocrm_generate_headers($subdomain, $client_id, $client_secret, $redirect_to);
  
  
  
$fields = get_custom_fields($headers, AMO_SUBDOMAIN);


foreach ($fields[1]['_embedded']['custom_fields'] as $it){	
	if ($it['name']=="_ym_uid"){
		echo $it['id'];
		
		
		file_put_contents('ym_uid.txt', $it['id']);
		
		
	}
}
?>