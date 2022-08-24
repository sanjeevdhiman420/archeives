<?php
require_once("inc/functions.php");

$shop = "storeapitesting";
$token = "shpua_fa6fc894c92a61a8aa0aa5934ccb1d4c";
define('DOMAIN_URL_PROJECT_PATH', 'https://dev.eworkbridge.com/php-api/');
$array_update = array(
'webhook'=>array(
'topic'=>'products/update',
'address'=>DOMAIN_URL_PROJECT_PATH.'webhooks/products/update.php',
'format'=>'json'
)
);
$webhooks_update = shopify_call($token, $shop, "/admin/webhooks.json", $array_update, 'POST');
$webhooks_update = json_decode($webhooks_update['response'], true);
 require_once("./webhooks/products/update.php");
?>