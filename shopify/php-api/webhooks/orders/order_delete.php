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
$log = fopen($shop_domain . ".delete.json", "w") or die("Cannot open or create this file");
fwrite($log, json_encode($response));
fclose($log);

$file = "https://dev.eworkbridge.com/php-api/webhooks/orders/storeapitesting.myshopify.com.delete.json";
if($file) {
 $file = file_get_contents($file);
$file = json_decode($file, JSON_PRETTY_PRINT);
echo '<ol><li>Order is Deleted : Order ID:'. $file['id'].'</li><br>';	
}
else { ?>
<h5>recent no product deleted</h5>
<?php }

?>