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
            $query="update Users set name='".$this->name."',email='".$this->email."',password='".$this->password."',profilePicture='".$this->profilePicture."',EXT='".$this->EXT."' rid='".$this->rid."'  where uid='".$this->uid."';";
            mysqli_query($this->con,$query);
        }
        function insert(){
            $query="insert into Users values(null,'".$this->name."','".$this->email."','".$this->password."','".$this->profilePicture."','".$this->EXT."','".$this->rid."');";
            //echo $query;
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
        function select(){
            $query="select * from Users ;";
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

    }
/////////////////////-----------Orders--------------///////////////////
class Orders{
    private $uid,$pid,$orderDate,$amount,$status,$con;
    function __construct(){
        $this->uid=0;
        $this->pid=0;
        $this->orderDate=date('Y-m-d H:i:s');
        $this->amount=0;
        $this->status="";
        $this->con=connection :: createInstance();
    }
    function __get($name){
        return $this->$name;
    }
    function __set ($name, $value){
        $this->$name = $value;
    }
    function update(){
        $query="update Orders set uid='".$this->uid."',pid='".$this->pid."',orderDate='".$this->orderDate."',amount='".$this->amount."',status='".$this->status."' where uid='".$this->uid."' and pid='".$this->pid."';";
        mysqli_query($this->con,$query);
    }
    function insert(){
        $query="insert into Orders values('".$this->uid."','".$this->pid."','".$this->orderDate."','".$this->amount."','".$this->status."');";
        mysqli_query($this->con,$query);
    }
    function delete(){
        $query="delete from Orders where uid='".$this->uid."' and pid='".$this->pid."';";
        mysqli_query($this->con,$query);
    }
    function selectbykey($from,$to){
        $query="select * from Orders where uid='".$this->uid."' and orderDate between '".$from."' and '".$to."'  ;";
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
        $query="select * from Orders ;";
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
