<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "a55c6ec1c0ea80d50855b48db15ad45c";
$scopes = "read_orders,write_orders,read_products,write_products";
$redirect_uri = "https://shopifyvotingapp.pbds.dev/token.php";

// Build install/approval URL to redirect to
// $install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
