<?php
  $shopify = $_GET;

  echo print_r($shopify);
  header("Location: install.php?shop=" . $shopify['shop']);
  exit();
?>
<body>
