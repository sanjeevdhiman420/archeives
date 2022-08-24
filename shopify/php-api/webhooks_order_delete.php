<?php
require_once("inc/functions.php");

$shop = "storeapitesting";
$token = "shpua_fa6fc894c92a61a8aa0aa5934ccb1d4c";
define('DOMAIN_URL_PROJECT_PATH', 'https://dev.eworkbridge.com/php-api/');
$array_delete = array(
'webhook'=>array(
'topic'=>'orders/delete',
'address'=>DOMAIN_URL_PROJECT_PATH.'webhooks/orders/order_delete.php',
'format'=>'json'
)
);
$webhooks_delete = shopify_call($token, $shop, "/admin/webhooks.json", $array_delete, 'POST');
$webhooks_delete = json_decode($webhooks_delete['response'], true);
 require_once("./webhooks/orders/order_delete.php");
?>