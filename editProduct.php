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


    $product->updatecolumn();
}
?>