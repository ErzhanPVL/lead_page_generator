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

$found_ym_uid = R::findOne('amo', '_ym_uid = :_ym_uid ', [':_ym_uid' => $ym_uid]);



if ($found_ym_uid) {
    print('db_test_ym');
    exit();
}

$cookies = array('_ym_uid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'roistat_visit', 'referrer', 'from', '_ga', '_ym_counter', 'gclid', 'utm_referrer', 'search_phrase', 'gender', 'age', 'geo', 'source', 'rb_clickid', 'rb_clickid', 'device_type', 'matched_keyword', 'match_type', 'position_type', 'source_type', 'region_name', 'campaign_type', 'impression_weekday', 'impression_hour', 'user_timezone', 'gbid', 'adtarget_name', 'version', 'land_address', 'land_inn', 'openstat_source');
                 
print_r($_POST);

foreach ($cookies as $cookie_name) {
    $cookie_value = isset($_POST[$cookie_name]) ? $_POST[$cookie_name] : '';
    if (!empty($cookie_value)) {
        if ($cookie_name == 'roistat_visit') {
            $amo->roistat = urldecode($cookie_value);
        } else {
            $amo->$cookie_name = urldecode($cookie_value);
        }
    }
}


$SxGeo = new SxGeo(__DIR__ . '/../sxgeo/SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);

$ip = get_client_ip();

$sx_geo_data = $SxGeo->getCityFull($ip);

$G_longitude = $sx_geo_data['city']['lon'];
$G_latitude = $sx_geo_data['city']['lat'];

$maps = ("https://yandex.ru/maps/?pt=$G_longitude,$G_latitude&z=9&l=map");

$amo->IP = $ip;
$amo->region =  $sx_geo_data['region']['name_ru'];
$amo->city = $sx_geo_data['city']['name_ru'];
$amo->country =  $sx_geo_data['country']['name_ru'];
$amo->url =  preg_replace('/\?.+$/', '', $_SERVER['HTTP_REFERER']);
$amo->G_latitude = $sx_geo_data['city']['lat'];
$amo->G_longitude = $sx_geo_data['city']['lon'];
$amo->maps = $maps;

$amo->created = $datetime;


R::store($amo);