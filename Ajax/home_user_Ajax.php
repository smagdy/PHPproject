<?php 
require_once('../connection.php');
$mysqli =connection::createInstance();
$product_name=$_GET['value'];
$query = " select * from Products where pname like '".$product_name."%' and available  ='1' ";
$res = $mysqli->query($query) or die (mysqli_error($mysqli));
while($row=mysqli_fetch_array($res))
{

?>
<div class="row">
		<div class="col-sm-3" >
			<div class="row">
			 <img src="images/<?php echo $row['productPicture']; ?>" class="img-rounded" name="img1"  height="125" width="125" alt="">
			 <div>
			  <br><span align="center" name=""><input value="<?php echo $row['price']; ?>" class="price" type="submit"></span>
			 </div>
			</div>
		</div>
</div>
<?php
}
?>



