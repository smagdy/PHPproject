<?php
session_start();
require_once('../tables.php');
$user=new Users();
$user->uid=$_SESSION['userId'];

?>


<?php
$count =0;
while($row=mysqli_fetch_array($res))
{
    if ($count%3==0) echo "<div class='row'>";

    ?>
    <div class="col-sm-1" ></div>
    <div class="col-sm-3" >
        <div class="row">
            <img src="<?php echo $row['productPicture']; ?>" class="img-rounded" name="<?php echo $row['pname']; ?>" height="125" width="125" alt="">
            <input type="hidden" name="1" value="6" >
            <input type="hidden" name="<?php echo $row['price']; ?>"  value="50" >
            <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
            <input type="hidden" name="uid" value="<?php echo $_SESSION['userId']; ?>">
            <div>
                <br><span align="center" name="<?php echo $row['pname']; ?>"><input value="<?php echo $row['price']; ?>" class="price" type="submit"></span>
            </div>
        </div>
    </div>
    <?php
    $count++;
    if ($count%3==0) echo "</div>";
}
?>


