<?php

// Get our helper functions
require_once("inc/functions.php");


//ACCESS TOKEN: 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
// DATABASE NAME: shop_vot
// DATABASE PASSWORD: P9@1yxf0#e4tJ0AM
// Set variables for our request
$api_key = "a55c6ec1c0ea80d50855b48db15ad45c";
$shared_secret = "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";
$params = $_GET; // Retrieve all request parameters
$hmac = $_GET['hmac']; // Retrieve HMAC request parameter

$params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
ksort($params); // Sort params lexographically

$computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);

// Use hmac data to check that the response is from Shopify or not
if (hash_equals($hmac, $computed_hmac)) {

	// Set variables for our request
	$query = array(
		"client_id" => $api_key, // Your API key
		"client_secret" => $shared_secret, // Your app credentials (secret key)
		"code" => $params['code'] // Grab the access key from the URL
	);

	// Generate access token URL
	$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

	// Configure curl client and execute request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $access_token_url);
	curl_setopt($ch, CURLOPT_POST, count($query));
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
	$result = curl_exec($ch);
	curl_close($ch);

	// Store the access token
	$result = json_decode($result, true);
	$access_token = $result['access_token'];

	// Show the access token (don't do this in production!)
	echo $access_token;

} else {
	// Someone is trying to be shady!
	die('This request is NOT from Shopify!');
}
