<?php 
require('tables.php');
$count=0;
$name_product="";
$price_prodect="";
$category="";
$upimage="";
$img="";
$error="";
if (isset($_POST["save"]) ){
    ////////////////////////////// name producte ///////////////////////////////
    if(empty($_POST["nameProduct"])){
        $count=$count+1;
         $error.="Pleas enter name Product <br>";
    }
  else {
        $name_product=$_POST["nameProduct"];
            
    }
    ////////////////////////////// price ///////////////////////////////////
    if(empty($_POST["price_product"])){
        $count=$count+1;
         $error.="Pleas enter price Product <br>";
    } 
    else {
        $price_product=$_POST["price_product"];
    }
 /////////////////////////// category ///////////////////////////////////    
    if(empty($_POST["category"])){
        $count=$count+1;
        $error.= 'please select category <br>';
    }
 else {
    $category=$_POST['category'];    
    }
    
    
  ////////////////////////////image//////////////////////////
 if ($_FILES["Pimage"]["type"] != "image/jpg" &&$_FILES["Pimage"]["type"] != "image/png" && $_FILES["Pimage"]["type"] != "image/jpeg" && $_FILES["Pimage"]["type"] != "image/gif" )
			{
			$error.="Problem in data type of image <br>";
                        $count=$count+1;
			exit;
			}
		
			$upimage = "http://lions-php08.rhcloud.com/".basename($_FILES["Pimage"]["name"]);
			if (is_uploaded_file($_FILES['Pimage']['tmp_name'])){
				
                            if(!move_uploaded_file($_FILES['Pimage']['tmp_name'], $upimage)){
				
                                    echo "problem";
                                }
				
                                else{
					$imgs=$_FILES['Pimage']['name'];
					$img="<img  width=75px , height=75px , src=".$imgs ." > </img>";
					echo "done";
					//$copy_file.=$img;
					}
			}
                        

////////////////////////////////////////////////////////////////////////////////////////////////                        
if($count==0){
    $Product=new Products();
    $Product->pname=$name_product;
    $Product->productPicture="images/".$_FILES["Pimage"]["name"];
    $Product->price=$price_product; 
    $Product->available='1';
    $Product->cid=$category;
    $Product->insert();
    header('Location:../allProducts.php');
}
 else {
    echo $error;
}
///////////////////// else of submit ////////////////////////                        
}
else{
echo "You much click on Submit";
}















?>
