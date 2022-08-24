
<!--<div class="">
		 <a href="https://storeapitesting.myshopify.com/admin/draft_orders/new">Create Order</a>
		 </div> -->
<?php
require_once("inc/functions.php");

$requests = $_GET;
$hmac = $_GET['hmac'];
$serializeArray = serialize($requests);
$requests = array_diff_key($requests, array('hmac' => ''));
ksort($requests);
$token ="shpua_fa6fc894c92a61a8aa0aa5934ccb1d4c";
$shop = "storeapitesting";            //no 'myshopify.com' or 'https'
$array = array();
$orders = shopify_call($token, $shop, "/admin/orders.json", $array, 'GET');
$orders = json_decode($orders['response'], JSON_PRETTY_PRINT);

foreach($orders as $order) {
    foreach($order as $key => $value){ ?>
    	
		 <?php echo "<p>Order ID: " . $value['id'] . "</p>"; ?>
	
 <?php   }
}

?>
