<?php 
$count=0;
$name_product="";
$price_prodect="";
$category="";
if (isset($_POST["save"]) ){
    
    if(empty($_POST["nameProduct"])){
        $count=$count+1;
         echo "Pleas enter name Product";
    }
  else {
        $name_product=$_POST["nameProduct"];
            
    }
    
    if(empty($_POST["price_prodect"])){
        $count=$count+1;
         echo "Pleas enter price Product";
    } 
    else {
        $price_prodect=$_POST["price_prodect"];
    }
     
    if(empty($_POST["category"])){
        $count=$count+1;
        echo 'please select category';
    }
 else {
    $category=$_POST['category'];    
    }
    
  //////////////////////////////////////////////////////
 if ($_FILES["Pimage"]["type"] != "image/jpeg")
			{
			echo "Problem ";
			exit;
			}
		
			$upimage = '/var/www/html/php/'.$_FILES["Pimage"]["name"];
			if (is_uploaded_file($_FILES['Pimage']['tmp_name'])){
				if(!move_uploaded_file($_FILES['Pimage']['tmp_name'], $upimage)){
				echo "problemrrrtttt";}
				else{
					
					$imgs=$_FILES['Pimage']['name'];
					$img="<img  width=75px , height=75px , src=".$imgs ." > </img>";
					
					echo "done";
					//$copy_file.=$img;
					}
			}
                        
////////////////////////////////////////////////////////////////////////////////////////////////                        
    



}
else{
echo "You much click on Submit";
}



?>
