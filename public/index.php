<?php
require("../app/core/init.php");


// security path
defined("ABSPATH",true);

$controller = $_GET['page_name'] ?? 'home';
$controller = strtolower($controller);
// $controller = $_GET['page_name'] ?? 'signup';
$controller = strtolower($controller);

if (file_exists('../app/controllers/'.$controller.'.php')) {
  require('../app/controllers/'.$controller.'.php');
}else{
  echo "controller not found";
}



?>

<link rel="stylesheet" href="">