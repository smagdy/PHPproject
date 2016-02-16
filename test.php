<?php
class changes{
function selectChangeDate($tablename){
$query="select changeDate from changes where tableName=$tablename ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
function selectServerDate($tablename){
$query="select serverDate from changes where tableName=$tablename ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
function updateServerDate($tablename){
$query="update changes set serverName=NOW() where tableName=$tablename ;";
mysqli_query($this->con,$query);
}
/*   function selectProductsChangeDate(){
$query="select changeDate from changes where tableName='Products' ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
function selectCategoryChangeDate(){
$query="select changeDate from changes where tableName='Category' ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
function selectRoomChangeDate(){
$query="select changeDate from changes where tableName='Room' ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}
function selectOrdersChangeDate(){
$query="select changeDate from changes where tableName='Orders' ;";
$result=mysqli_query($this->con,$query);
$i=0;
$data=array();
while($row=$result->fetch_array()){
$data[$i]=$row;
$i++;
}
return $data;
}*/
}
?>
insert into Orders values(1,1,"01/01/2002",4,"done");


