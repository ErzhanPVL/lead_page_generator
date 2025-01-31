<?php

include('rb-mysql.php');

include('config.php');

R::setup('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DBNAME,  MYSQL_USERNAME, MYSQL_PASSWORD);

$datetime = date('Y-m-d H:i:s');

//R::exec("DELETE FROM amo");

R::exec("DELETE FROM amo WHERE created < DATE_SUB(:datetime, INTERVAL 30 DAY)", array(':datetime' => $datetime));