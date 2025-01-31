<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] != 'POST') exit();

//file_put_contents('new.log', file_get_contents('php://input'));

include('rb-mysql.php');
include __DIR__ . '/../sxgeo/SxGeo.php';
include("functions.php");
include("config.php");

R::setup('mysql:host=' . MYSQL_HOSTNAME . ';dbname=' . MYSQL_DBNAME,  MYSQL_USERNAME, MYSQL_PASSWORD);

$datetime = date('Y-m-d H:i:s');

R::exec("DELETE FROM amo WHERE created < DATE_SUB(:datetime, INTERVAL 30 DAY)", array(':datetime' => $datetime));

$amo = R::dispense('amo');

$ym_uid = isset($_POST['_ym_uid']) ? $_POST['_ym_uid'] : '';

if (empty($ym_uid)) {
    print('test_ym');
    exit();
}

if (isset($_POST['current_url'])) {
    $current_url = $_POST['current_url'];
    

$found_ym_uid = R::findOne('amo', '_ym_uid = :_ym_uid ', [':_ym_uid' => $ym_uid]);

if ($found_ym_uid) {
	
	
	if (isset($_POST['land_1'])) {
    $land_1 = $_POST['land_1'];
        $found_ym_uid->land_1 = $land_1;  

	}
	
		if (isset($_POST['land_2'])) {
    $land_2 = $_POST['land_2'];
        $found_ym_uid->land_2 = $land_2;  

	}
	
		if (isset($_POST['land_3'])) {
    $land_3 = $_POST['land_3'];
        $found_ym_uid->land_3 = $land_3;  

	}
	
		if (isset($_POST['land_4'])) {
    $land_4 = $_POST['land_4'];
        $found_ym_uid->land_4 = $land_4;  

	}
	
		if (isset($_POST['land_address'])) {
    $land_address = $_POST['land_address'];
        $found_ym_uid->land_address = $land_address;  

	}
	
		if (isset($_POST['land_view'])) {
    $land_view = $_POST['land_view'];
        $found_ym_uid->land_view = $land_view;  

	}
	
		if (isset($_POST['land_income'])) {
    $land_income = $_POST['land_income'];
        $found_ym_uid->land_income = $land_income;  

	}
	
		if (isset($_POST['land_ogrn'])) {
    $land_ogrn = $_POST['land_ogrn'];
        $found_ym_uid->land_ogrn = $land_ogrn;  

	}
	
		if (isset($_POST['land_ceo'])) {
    $land_ceo = $_POST['land_ceo'];
        $found_ym_uid->land_ceo = $land_ceo;  

	}
	
	if (isset($_POST['land_capital'])) {
    $land_capital = $_POST['land_capital'];
        $found_ym_uid->land_capital = $land_capital;  

	}
	
		if (isset($_POST['land_inn'])) {
    $land_inn = $_POST['land_inn'];
        $found_ym_uid->land_inn = $land_inn;  

	}
	
	if (isset($_POST['land_ogrndate'])) {
	$land_ogrndate = $_POST['land_ogrndate'];
		$found_ym_uid->land_ogrndate = $land_ogrndate;  
	
	}
	
	if (isset($_POST['land_views'])) {
	$land_views = $_POST['land_views'];
		$found_ym_uid->land_views = $land_views;  
	
	}
	
	if (isset($_POST['land_pers'])) {
	$land_pers = $_POST['land_pers'];
		$found_ym_uid->land_pers = $land_pers;  
	
	}
	
	if (isset($_POST['land_type'])) {
	$land_type = $_POST['land_type'];
		$found_ym_uid->land_type = $land_type;  
	
	}
	
	if (isset($_POST['land_email'])) {
	$land_email = $_POST['land_email'];
		$found_ym_uid->land_email = $land_email;  
	
	}
	
	if (isset($_POST['land_phone'])) {
	$land_phone = $_POST['land_phone'];
		$found_ym_uid->land_phone = $land_phone;  
	
	}
	

	
	
$found_ym_uid->isclicked = 1;
$found_ym_uid->url = $current_url; 
$found_ym_uid->created = $datetime;

 R::store($found_ym_uid);
    }
}
