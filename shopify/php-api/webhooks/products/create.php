<?php
//require_once("./../../inc/functions.php");
define('SHOPIFY_APP_SECRET_KEY', '1c2cfc1b07e7f36db233facbbfe955c9');

function verify_request($data, $hmac) {
$verify_hmac = base64_encode(hash_hmac('sha256', $data, SHOPIFY_APP_SECRET_KEY, true ));
return hash_equals($hmac, $verify_hmac);
}

$my_hmac = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
$response = '';
$data = file_get_contents('php://input');
$utf8 = utf8_encode($data);
$data_json = json_decode($utf8 , true);

$verify_merchant = verify_request($data, $my_hmac);
if($verify_merchant) {
$response = $data_json;
}
else {
$response = "This is not from Shopify, that means this is not a Shopify merchant";
}

$shop_domain = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
$log = fopen($shop_domain . ".create.json", "w") or die("Cannot open or create this file");
fwrite($log, json_encode($response));
fclose($log);

$url = "https://dev.eworkbridge.com/php-api/webhooks/products/storeapitesting.myshopify.com.create.json";
if($url) {
 $file_get = file_get_contents($url);
$str_file = json_decode($file_get, JSON_PRETTY_PRINT);

echo '<ol><li>Last Created Product : Product title:'. $str_file['title'].'  </li>';	
echo '<li>Product Description:'. $str_file['body_html'].'</li>';
 echo '<li>Product Created time:'. $str_file['created_at'].'</li>';
echo '<li>Product Vendor Name:'. $str_file['vendor'].'</li></ol>';
}

?>