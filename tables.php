<?php
    require('connection.php');
    //////////////////////////-----Users--------/////////////////////////////
    class users{
        private $uid,$name,$email,$password,$profilePicture,$EXT,$con;
        function __construct(){
            $this->uid='';$this->name=''; $this->email='';
            $this->password=''; $this->profilePicture=''; $this->EXT='';
            $con=connection :: createInstance();
        }
        function __get($name){
            return $this->$name;
        }
        function __set ($name, $value){
            $this->$name = $value;
        }
        function update(){
            $query="update users set name='".$this->name."',email='".$this->email."',password='".$this->password."',profilePicture='".$this->profilePicture."',EXT='".$this->EXT."' where uid='".$this->uid."';";
            mysqli_query($this->con,$query);
        }
        function insert(){
            $query="insert into users values(null,'".$this->name."','".$this->email."','".$this->password."','".$this->profilePicture."','".$this->EXT."');";
            mysqli_query($this->con,$query);
        }
        function delete(){
            $query="delete from users where uid='".$this->uid."';";
            mysqli_query($this->con,$query);
        }
        function selectbykey(){
            $query="select * from users where uid='".$this->uid."';";
            $result=mysqli_query($this->con,$query);
            return mysqli_fetch_row($result);
        }
        function select(){
            $query="select * from users ;";
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
        private $pid,$pname,$productPicture,$cid,$con;
        function __construct(){
            $this->pid=0;$this->pname='';
            $this->cid=0; $this->productPicture='';
            $con=connection :: createInstance();
        }
        function __get($name){
            return $this->$name;
        }
        function __set ($name, $value){
            $this->$name = $value;
        }
        function update(){
            $query="update Products set pname='".$this->pname."',cid='".$this->cid."',productPicture='".$this->productPicture."' where pid='".$this->pid."';";
            mysqli_query($this->con,$query);
        }
        function insert(){
            $query="insert into Products values(null,'".$this->pname."','".$this->productPicture."','".$this->cid."');";
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
            $query="select * from Products ;";
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
            $con=connection :: createInstance();
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
    /////////////////////-----------Orders--------------///////////////////
    class Orders{
        private $uid,$pid,$orderDate,$amount,$con;
        function __construct(){
            $this->uid=0;$this->pid=0;$this->orderDate=now();$this->amount=0;
            $con=connection :: createInstance();
        }
        function __get($name){
            return $this->$name;
        }
        function __set ($name, $value){
            $this->$name = $value;
        }
        function update(){
            $query="update Orders set uid='".$this->uid."',pid='".$this->pid."',orderDate='".$this->orderDate."',amount='".$this->amount."' where uid='".$this->uid."' and pid='".$this->pid."';";
            mysqli_query($this->con,$query);
        }
        function insert(){
            $query="insert into Orders values('".$this->uid."','".$this->pid."','".$this->orderDate."','".$this->amount."');";
            mysqli_query($this->con,$query);
        }
        function delete(){
            $query="delete from Orders where uid='".$this->uid."' and pid='".$this->pid."';";
            mysqli_query($this->con,$query);
        }
        function selectbykey(){
            $query="select * from Orders where uid='".$this->uid."' and pid='".$this->pid."';";
            $result=mysqli_query($this->con,$query);
            return mysqli_fetch_row($result);
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
/////////////////////-----------Room--------------///////////////////
    class Room{
        private $rid,$roomNumber,$con;
        function __construct(){
            $this->rid=0;$this->roomNumber=0;$this->EXT=0;
            $con=connection :: createInstance();
        }
        function __get($name){
            return $this->$name;
        }
        function __set ($name, $value){
            $this->$name = $value;
        }
        /*function update(){
            $query="update Room set roomNumber='".$this->roomNumber."' where rid='".$this->rid."';";
            mysqli_query($this->con,$query);
        }*/
        function insert(){
            $query="insert into Room values(null,'".$this->roomNumber."');";
            mysqli_query($this->con,$query);
        }
        /*function delete(){
            $query="delete from Room where cid='".$this->rid."';";
            mysqli_query($this->con,$query);
        }*/
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
?>
