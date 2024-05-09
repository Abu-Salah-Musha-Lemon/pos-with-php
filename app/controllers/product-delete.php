<?php


$errors = [];
$id = $_GET['id']?? null;
$products = new Product();

$row = $products->first(['id'=>$id]);

if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
{
	$products->delete($row['id']);
	if (file_exists($row['image'])) {
		unlink($row['image']);
	}

		redirect('admin&tab=products');
	}


// this require is use to lode the file view/products/product-delete 
require_once view_path("./products/product-delete");
