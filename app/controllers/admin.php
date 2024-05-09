<?php
$tab = $_GET['tab']?? null;

if($tab =="products"){
  $productClass = new Product();
  $products = $productClass->query("SELECT * FROM `products` ORDER BY id DESC");
}

require_once view_path("./admin/admin");