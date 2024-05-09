<?php 

include '../app/core/init.php';
defined("ABSPATH") ? "":die();
$productClass = new Product();

$rows = $productClass->getAll();
// print_r($rows);
show_source($rows);
if($rows){

	foreach ($rows as $key => $row) {
		 
		$rows[$key]['description'] = strtoupper($row['description']);
		$rows[$key]['image'] = crop($row['image']);
	}
	
	echo json_encode($rows);
}
