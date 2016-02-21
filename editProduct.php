<?php
require('tables.php');
if(isset($_GET['pid'])&&isset($_GET['delete'])){
    $product=new Products();
    $product->pid=$_GET['pid'];
    $Op=new orderProducts();
    $Op->pid=$_GET['pid'];
    $Op->deleteByPID();
    $product->delete();
}
if(isset($_GET['pid'])&&isset($_GET['edit'])){
    $product=new Products();
    $product->pid=$_GET['pid'];

//////////////////////
    $Product=new Products();
    $Product->pname=$name_product;
    $Product->productPicture=$upimage;
    $Product->price=$price_prodect;
    $Product->available='1';
    $Product->cid=$category;
    //////////////
    $product->updatecolumn();
}
?>