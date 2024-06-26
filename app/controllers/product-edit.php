<?php


$errors = [];
$id = $_GET['id']?? null;
$products = new Product();

$row = $products->first(['id'=>$id]);

if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
{

	$_POST['barcode'] = empty($_POST['barcode']) ? $products->generate_barcode():$_POST['barcode'];
	
	if(!empty($_FILES['image']['name']))
	{
		$_POST['image'] = $_FILES['image'];
	}

	$errors = $products->validate($_POST,$row['id']);
	if(empty($errors)){
		
		$folder = "uploads/";
		if(!file_exists($folder))
		{
			mkdir($folder,0777,true);
		}

		if (!empty($_POST['image'])) {
				$ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION));

				$destination = $folder . $products->generate_filename($ext);
				move_uploaded_file($_POST['image']['tmp_name'], $destination);
				$_POST['image'] = $destination;

						// delete old image
				if (file_exists($row['image'])) {
					unlink($row['image']);
				}
		}

		$products->update($row['id'],$_POST);



		redirect('admin&tab=products');
	}


}







// this require is use to lode the file view/products/product-edit 
require_once view_path("./products/product-edit");
