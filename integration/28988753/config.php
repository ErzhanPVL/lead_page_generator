<?php
define('AMO_SUBDOMAIN', 'messgru');
define('AMO_REDIRECT_TO', 'https://amotarget.ru/integration/28988753');
define('AMO_CLIENT_SECRET', '8pU9kD2XikLL2dt43NxhtUb0Ex6U7tSPWl188vCHdEDJw2nS5kDfsmv7nyn9CgPB');
define('AMO_CLIENT_ID', '39a10a74-6cfe-44ed-be89-d008c9674e02');

define('HTTP_REFERER', 'amotarget.ru');
define('TOKEN_FILE', dirname(__FILE__) . '/token_info.json');

define('YD', '0');
define('VK', '0');
define('MYSQL_HOSTNAME', 'localhost');
define('MYSQL_DBNAME', 'adreanov_messg');
define('MYSQL_USERNAME', 'adreanov_messg');
define('MYSQL_PASSWORD', 'B3/Y(dgIP?S');
define('MYSQL_TABLENAME', 'amo');

const LEAD_FIELDS_WEBHOOK = array(
    'utm_source', 
    'utm_medium', 
    'utm_campaign',      
    'utm_term', 
    'utm_content', 
    'utm_referrer',
    'roistat', 
    'referrer', 
    'from', 
    '_ga',  
    '_ym_counter', 
    'gclid',
    'ip',
    'url',
    'region',
    'country',
    'city',
    'search_phrase',
    'gender',
    'age',
    'geo',
    'created',
    'source',
    'rb_clickid',
    'device_type',
    'matched_keyword',
    'match_type',
    'position_type',
    'source_type',
    'region_name',
    'campaign_type',
    'impression_weekday',
    'impression_hour',
    'user_timezone',
    'gbid',
    'adtarget_name',
    //'gooogleanalytics',
    //'G_latitude',
    //'G_longitude',
    'maps',
    'land_1',
    'land_2',
    'land_3',
    'land_4',
    'land_address',
    'land_inn',
    'land_view',
    'land_views',
    'land_income',
    'land_ogrn',
    'land_ceo',
    'land_capital',
    'land_pers',
    'land_ogrndate',
    'land_type',
    'land_email',
    'land_phone',
    'version'
);

define('LEAD_FIELDS_GA_LINK_TEXT', 'analytics.google.com/analytics/web/#/report/visitors-user-activity/a109833915w163959974p164750196/_r.userId=');

