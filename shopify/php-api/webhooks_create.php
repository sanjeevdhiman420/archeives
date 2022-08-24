<?php
require_once("inc/functions.php");

$shop = "storeapitesting";
$token = "shpua_fa6fc894c92a61a8aa0aa5934ccb1d4c";
define('DOMAIN_URL_PROJECT_PATH', 'https://dev.eworkbridge.com/php-api/');
$array_create = array(
'webhook'=>array(
'topic'=>'products/create',
'address'=>DOMAIN_URL_PROJECT_PATH.'webhooks/products/create.php',
'format'=>'json'
)
);
$webhooks_create = shopify_call($token, $shop, "/admin/webhooks.json", $array_create, 'POST');
$webhooks_create = json_decode($webhooks_create['response'], true);
require_once("./webhooks/products/create.php");
?>