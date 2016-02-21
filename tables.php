<?php
require('connection.php');
//////////////////////////-----Users--------/////////////////////////////
class Users{
private $uid,$name,$email,$password,$profilePicture,$EXT,$rid,$con;
function __construct(){
$this->uid='';$this->name=''; $this->email='';
$this->password=''; $this->profilePicture=''; $this->EXT='';
$this->con=connection :: createInstance();
}
function __get($name){
return $this->$name;
}
function __set ($name, $value){
$this->$name = $value;
}
function update(){
$query="update Users set name='".$this->name."',email='".$this->email."',password='".$this->password."',profilePicture='".$this->profilePicture."',EXT='".$this->EXT."' rid='".$this->rid."' where uid='".$this->uid."';";
mysqli_query($this->con,$query);
}
function insert(){
$query="insert into Users values(null,'".$this->name."','".$this->email."','".$this->password."','".$this->profilePicture."','".$this->EXT."','".$this->rid."');";
mysqli_query($this->con,$query);
}
function delete(){
$query="delete from Users where uid='".$this->uid."';";
mysqli_query($this->con,$query);
}
function selectbykey(){
$query="select * from Users where uid='".$this->uid."';";
$result=mysqli_query($this->con,$query);
return mysqli_fetch_row($result);
}
function selectbyName(){
$query="select uid,password from Users where name='".$this->name."';";
$result=mysqli_query($this->con,$query);
return mysqli_fetch_row($result);
}
function selectUserName(){
    $query="select uid,name from Users where uid > 1;";
    $result=mysqli_query($this->con,$query);
    $i=0;
    $data=array();
    while($row=$result->fetch_array()){
        $data[$i]=$row;
        $i++;
    }
    return $data;
}
function select(){
$query="select * from Users where uid > 1;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
function selectLimit($limit,$length){
$query="select * from Users where uid > 1 limit ".$limit.",".$length.";";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
}
////////////////////////-----------products--------------///////////////////
class Products{
private $pid,$pname,$productPicture,$cid,$price,$available,$con;
function __construct(){
$this->pid=1;$this->pname='';
$this->cid=1; $this->productPicture='';
$this->available='0';
$this->con=connection :: createInstance();
}
function __get($name){
return $this->$name;
}
function __set ($name, $value){
$this->$name = $value;
}
function update(){
$query="update Products set pname='".$this->pname."',cid='".$this->cid."',productPicture='".$this->productPicture."',price='".$this->price."',available='".$this->available."' where pid='".$this->pid."';";
mysqli_query($this->con,$query);
}
function insert(){
$query="insert into Products values(null,'".$this->pname."','".$this->productPicture."','".$this->price."','".$this->available."','".$this->cid."');";
mysqli_query($this->con,$query);
}
function delete(){
$query="delete from Products where pid='".$this->pid."';";
mysqli_query($this->con,$query);
}
function selectbykey(){
$query="select * from Products where pid='".$this->pid."';";
$result=mysqli_query($this->con,$query);
return mysqli_fetch_row($result);
}
function select(){
$query="select * from Products;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i=$i+1;
}
return $data;
}
function selectLimit($limit,$length){
$query="select * from Products limit ".$limit.",".$length.";";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
}
/////////////////////-----------Orders--------------///////////////////
class Orders{
private $oid,$uid,$orderDate,$amount,$status,$comment,$con;
function __construct(){
$this->oid=0;
$this->uid=0;
$this->orderDate=date('Y-m-d H:i:s');
$this->amount=0;
$this->status="";
$this->comment='';
$this->con=connection :: createInstance();
}
function __get($name){
return $this->$name;
}
function __set ($name, $value){
$this->$name = $value;
}
function update(){
$query="update Orders set uid='".$this->uid."',orderDate='".$this->orderDate."',amount='".$this->amount."',status='".$this->status."',comment='".$this->comment."' where oid='".$this->oid."' and uid='".$this->uid."';";
mysqli_query($this->con,$query);
}
function insert(){
$query="insert into Orders values(null,'".$this->uid."',".$this->orderDate."','".$this->amount."','".$this->status."','".$this->comment."');";
mysqli_query($this->con,$query);
}
function delete(){
$query="delete from Orders where oid='".$this->oid."' and uid='".$this->uid."';";
mysqli_query($this->con,$query);
}
function selectbydate($from,$to){
$query="select * from Orders where uid='".$this->uid."' and orderDate between '".$from."' and '".$to."' ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
    //selectbykey
/*function selectbyId(){
$query="select * from Orders where oid='".$this->oid."';";
$result=mysqli_query($this->con,$query);
return mysqli_fetch_row($result);
}*/
function selectbyId(){
$query="select * from Orders where uid='".$this->uid."' ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
function select(){
    $query="select * from Orders;";
    $result=mysqli_query($this->con,$query);
    $i=0;
    $data=array();
    while($row=$result->fetch_array()){
        $data[$i]=$row;
        $i++;
    }
    return $data;
}
function selectLimit($limit,$length){
//$query="select o.orderDate,u.name,roomNumber,u.EXT,numofItems,productPicture, pname ,p.price,amount from Orders o,Users u,orderProducts op ,Products p,Room r where o.uid=u.uid and op.oid = o.oid and op.pid=p.pid and u.rid = r.rid order by orderDate desc limit ".$limit.",".$length.";";
$query="select o.orderDate,u.name,roomNumber,u.EXT,amount,o.oid from Orders o , Users u,Room r where o.uid = u.uid and u.rid= r.rid limit ".$limit.",".$length.";";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}

}
class orderProducts{
    private $oid,$pid,$numofItems,$con;
    function __construct(){
        $this->oid=0;
        $this->pid=0;
        $this->numofItems=0;
        $this->con=connection :: createInstance();
    }
    function __get($name){
        return $this->$name;
    }
    function __set ($name, $value){
        $this->$name = $value;
    }
    function update(){
        $query="update orderProducts set pid='".$this->pid."',numofItems='".$this->numofItems."' where oid='".$this->oid."' and pid='".$this->pid."';";
        mysqli_query($this->con,$query);
    }
    function insert(){
        $query="insert into orderProducts values('".$this->oid."',".$this->pid."','".$this->numofItems."');";
        mysqli_query($this->con,$query);
    }
    function delete(){
        $query="delete from orderProducts where oid='".$this->oid."' and pid='".$this->pid."';";
        mysqli_query($this->con,$query);
    }
    function select(){
        $query="select * from orderProducts ;";
        $result=mysqli_query($this->con,$query);
        $i=0;
        $data=array();
        while($row=$result->fetch_array()){
            $data[$i]=$row;
            $i++;
        }
        return $data;
    }
    function selectByOrderId(){
        $query="select * from orderProducts where oid='".$this->oid."';";
        $result=mysqli_query($this->con,$query);
        $i=0;
        $data=array();
        while($row=$result->fetch_array()){
            $data[$i]=$row;
            $i++;
        }
        return $data;
    }
}
////////////////////////-----------Category--------------///////////////////
class Category{
private $cid,$categoryName,$con;
function __construct(){
$this->cid=0;$this->categoryName='';
$this->con=connection :: createInstance();
}
function __get($name){
return $this->$name;
}
function __set ($name, $value){
$this->$name = $value;
}
function update(){
$query="update Category set categoryName='".$this->categoryName."' where cid='".$this->cid."';";
mysqli_query($this->con,$query);
}
function insert(){
$query="insert into Category values(null,'".$this->categoryName."');";
mysqli_query($this->con,$query);
}
function delete(){
$query="delete from Category where cid='".$this->cid."';";
mysqli_query($this->con,$query);
}
function selectbykey(){
$query="select * from Category where cid='".$this->cid."';";
$result=mysqli_query($this->con,$query);
return mysqli_fetch_row($result);
}
function select(){
$query="select * from Category ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
}
/////////////////////-----------Room--------------///////////////////
class Room{
private $rid,$roomNumber,$con;
function __construct(){
$this->rid=0;$this->roomNumber=0;$this->EXT=0;
$this->con=connection :: createInstance();
}
function __get($name){
return $this->$name;
}
function __set ($name, $value){
$this->$name = $value;
}
function insert(){
$query="insert into Room values(null,'".$this->roomNumber."');";
mysqli_query($this->con,$query);
}
function selectbykey(){
$query="select * from Room where rid='".$this->rid."';";
$result=mysqli_query($this->con,$query);
return mysqli_fetch_row($result);
}
function select(){
$query="select * from Room ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
class changes
{
private $con;
function __construct(){
$this->con=connection :: createInstance();
}
function selectChangeDate($tablename)
{
$query = "select changeDate from changes where tableName=$tablename ;";
$result = mysqli_query($this->con, $query);
$i = 0;
$data = array();
while ($row = $result->fetch_array()) {
$data[$i] = $row;
$i++;
}
return $data;
}
function selectServerDate($tablename)
{
$query = "select serverDate from changes where tableName=$tablename ;";
$result = mysqli_query($this->con, $query);
$i = 0;
$data = array();
while ($row = $result->fetch_array()) {
$data[$i] = $row;
$i++;
}
return $data;
}
function updateServerDate($tablename)
{
$query = "update changes set serverName=NOW() where tableName=$tablename ;";
mysqli_query($this->con, $query);
}
}
?>

