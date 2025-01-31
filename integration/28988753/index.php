<?php

header('Content-Type: text/html; charset=utf-8');

include 'config.php';
include 'functions.php';

//include 'tests-oauth.php';
//exit();

if (!check_amocrm_oauth_query_string($_GET)) {
    exit();
}

if (amocrm_create_token(AMO_SUBDOMAIN, AMO_CLIENT_SECRET, $_GET)) {
    if (file_exists(TOKEN_FILE)) {
        echo '<meta http-equiv="refresh" content="0;URL=/integration/amocrm/status/?r=success"/>';
    } else {
        echo '<meta http-equiv="refresh" content="0;URL=/integration/amocrm/status/?r=error"/>';
    }
} else {
    echo '<meta http-equiv="refresh" content="0;URL=/integration/amocrm/status/?r=error"/>';
}

