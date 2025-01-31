<?php

header('Access-Control-Allow-Origin: *');

include('rb-mysql.php');
include('config.php');

R::setup('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DBNAME,  MYSQL_USERNAME, MYSQL_PASSWORD);


$amo = R::find('amo');

print_r($amo);





