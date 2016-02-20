<?php
///////////////////////////////////
require('tables.php');
if(isset($_GET['categoryName'])){
	    $category_new=$_GET['categoryName'];
	    $Categorys=new Category();
	    $Categorys->categoryName=$category_new;
	    $Categorys->insert(); 
}

$Categorys=new Category();
$data=$Categorys->select();
$response =json_encode($data);
echo $response;
?>
