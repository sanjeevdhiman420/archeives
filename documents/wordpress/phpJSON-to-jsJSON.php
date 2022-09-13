
	<?php
	//php object to js o
    $json_object = '{"product_id":"62","product_quantity":"65"}';
?>
<script>
    var arr;
    arr = <?php echo json_encode(json_decode($json_object,TRUE)); ?>;
    
    //alert(arr.product_id);
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</div>
<script>
	let obj = {
		product_id:62,
		product_quantity:65
	}
	//document.write(obj.product_id);
let json_str = JSON.stringify(obj);
</script>
<?php   
$con = "<script>json_str</script>";
var_dum($con);
//$arry= var_dump(json_decode($con, true));

?>

<?php
// $.ajax({
//     type: 'POST',
//     url: '/wp-content/themes/child-theme/process.php',
//     data: {json: JSON.stringify(obj)},
//     dataType: 'json'
// })
// .done( function( data ) {
//     console.log('done');
//     console.log(data);
// })
// .fail( function( data ) {
//     console.log('fail');
//     console.log(data);
// });

