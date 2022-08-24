<?php

// Set variables for our request
	$shop = $_GET['shop'];
$api_key = "8b70e8213169677499ce51de1c70ad2a";
$scopes = "read_orders,write_products";
$redirect_uri = "https://dev.eworkbridge.com/php-api/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();