<?php

include('functions.php');

$subdomain = 'messg';

$headers = amocrm_generate_headers($subdomain, '5c78ee7f-1a43-4d11-96a8-c63a4251b0f5', 'dX8izJr1H7rSf4RsJp2LlCyaps31ktcM25o1POjiKLPigHxWqBGJdPdeYzSDTPk5');

$lead_id = 4052957;

$result = get_lead($headers, $subdomain, $lead_id);


echo find_value_by_field_id($result[1]['custom_fields_values'], 595127);

