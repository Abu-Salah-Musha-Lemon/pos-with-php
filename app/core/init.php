<?php

require_once("../app/core/init.php ");
// require ('./config.php');
require_once("./function.php");
require_once("./database.php");
require_once("./model.php");

spl_autoload_register('my_function');

function   my_function($classname)  
{
  $filename =  "../app/models/".ucfirst($classname).".php";
  if (file_exists($filename)) {
    require_once $filename;
  }
}












