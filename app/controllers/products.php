<?php


$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$products = new Product();
	// $products = $productModel->fetchProducts();
	$_POST['date'] = date("Y-m-d H:i:s");
	$_POST['user_id'] = auth("id");
	$_POST['barcode'] = empty($_POST['barcode']) ? $products->generate_barcode():$_POST['barcode'];
	
	if(!empty($_FILES['image']['name']))
	{
		$_POST['image'] = $_FILES['image'];
	}

	$errors = $products->validate($_POST);
	if(empty($errors)){
		
		$folder = "uploads/";
		if(!file_exists($folder))
		{
			mkdir($folder,0777,true);
		}

		$ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION));

		$destination = $folder . $products->generate_filename($ext);
		move_uploaded_file($_POST['image']['tmp_name'], $destination);
		$_POST['image'] = $destination;

		$products->insert($_POST);

		redirect('admin&tab=products');
	}


}








require_once view_path("./products/products-new");
