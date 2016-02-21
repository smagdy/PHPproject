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

$product_name=$_GET['value'];

 $query = " select * from Products p ,orderProducts op where op.pid=p.pid and op.oid in(select oid from Orders where uid='".$uid."' order by orderDate desc); ";

$res = $mysqli->query($query) or die (mysqli_error($mysqli));
?>

<?php
$count =0;
while($row=mysqli_fetch_array($res))
{
f ($count%3==0) echo "<div class='row'>";
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
