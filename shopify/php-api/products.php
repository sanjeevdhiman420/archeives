
<style>
.products {
    overflow: scroll;
    height: 500px;
}
</style>
<?php
require_once("inc/functions.php");
 $serializeArray = array_diff_key($requests, array('hmac'=>''));
 ksort($requests);
$token = "shpua_fa6fc894c92a61a8aa0aa5934ccb1d4c";
$shop = "storeapitesting";
$title="";
$image="";
$originalPrice="";
$discountedPrice="";
$product_des="";
$collection_title="";
$collectionList = shopify_call($token, $shop, "/admin/collections.json", array(), 'GET' );
$collectionList = json_decode($collectionList['response'], JSON_PRETTY_PRINT);
$collection_id = $collectionList['collections'][0]['id'];
$collects = shopify_call($token, $shop, "/admin/collects.json", $array = array("collection_id"=>$collection_id), 'GET');
$collects = json_decode($collects['response'], JSON_PRETTY_PRINT); 
//Product without tag or collections
//$remobale_product = shopify_call($token, $shop, "/admin/products.json", array(), 'GET' );
//$remobale_product = json_decode($remobale_product['response'], JSON_PRETTY_PRINT);
?>
<div class="products" role="tabpanel" aria-labelledby="1">
<?php
 foreach($collects as $collect){ 
    foreach($collect as $key => $value){ 

	    $collection = shopify_call($token, $shop, "/admin/collections/".$value['collection_id'].".json", array(), 'GET');
	    $collection = json_decode($collection['response'], JSON_PRETTY_PRINT); 
		
    	$products = shopify_call($token, $shop, "/admin/products/".$value['product_id'].".json", array(), 'GET');
		$products = json_decode($products['response'], JSON_PRETTY_PRINT); 
		
		$images = shopify_call($token, $shop, "/admin/products/".$value['product_id']."/images.json", array(), 'GET');
		$images = json_decode($images['response'], JSON_PRETTY_PRINT); 
		
		$variants = shopify_call($token, $shop, "/admin/products/".$value['product_id']."/variants.json", array(), 'GET');
		$variants = json_decode($variants['response'], JSON_PRETTY_PRINT);
		
		$count = shopify_call($token, $shop, "/admin/products/count.json", array(), 'GET');
		$count = json_decode($count['response'], JSON_PRETTY_PRINT); 
		//$pro_tot = $count['count'];
		
		$events = shopify_call($token, $shop, "/admin/products/events/count.json", array(), 'GET');
		  $events = json_decode($events['response'], JSON_PRETTY_PRINT); 
		?>
		<script>
   //localStorage.setItem('php_var', "<?php //$events;?>");
    //console.log(localStorage.getItem('php_var'));
</script>
		<?php
		$originalPrice = $variants['variants'][0]['compare_at_price'];
		$discountedPrice = $variants['variants'][0]['price'];
		
		$image = $images['images'][0]['src'];
        $title= $products['product']['title']; 
		$html= $products['product']['body_html'];
		$collection_title = $collection['collection']['title'];
		 ?>
		<div class="product_detail">
                <h1 class="title"><?php echo $title; ?></h1>
				<h5 class="text"><?php echo "Collection Tag :". $collection_title; ?></h5>
				<h5 class="text"><?php echo "Orignal Price :". $originalPrice; ?></h5>
				<h5 class="text"><?php echo "Discount Price :". $discountedPrice; ?></h5>
                <img class="span-tag" src="<?php  echo $image; ?>" width="50%" height="100px" />
                <p class="text"><?php  echo $html; ?></p>
		</div>
  <?php
  }
}
?>
 </div>

