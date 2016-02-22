<?php
session_start();
require_once('connection.php');
$uid=$_GET['userId'];
	if(isset($_GET['uid'])){
	
	$uid=$_GET['uid'];
	
	}

	else{
	
	 $uid=$_SESSION['userId'];
	 
	}
$mysqli =connection::createInstance();


 $query = " select products.* from Products products,Orders,orderProducts where Orders.oid = orderProducts.oid and products.pid = orderProducts.pid and Orders.uid = $uid order by Orders.orderDate desc limit 2;";

$res = $mysqli->query($query) or die (mysqli_error($mysqli));
?>

<?php
$count =0;
while($row=mysqli_fetch_array($res))
{
	if($count%3 == 0) echo "<div class='row'>";
?>
<div class="col-sm-3" >
	 <img src="<?php echo $row['productPicture'];?>" class="img-rounded" name="img1"  height="150" width="150" alt="">
</div>
<div class="col-sm-1" ></div>

<?php
$count++;
if ($count%3==0) echo "</div>";
}
?>

</div>
