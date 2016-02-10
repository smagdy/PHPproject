<?php
    class connection
    {
        static $obj;
        private  function __construct(){
			$this->obj = mysqli_connect('localhost','root','','Cafeteria_DataBase');
			if (mysqli_connect_errno()) {
				echo 'Error: Could not connect to database. Please try again later.';
			}
        }
        public static function createInstance(){
            if(connection :: $obj)
                return connection :: $obj;
            else {
				connection :: $obj = new connection();
                return connection :: $obj;
            }
        }
		public static function create(){
			$connect = new mysqli('localhost','root','');
			// Check connection
			if ($connect->connect_error) {
				die("Connection failed: " . $connect->connect_error);
			}
			// Create database
			$sql = "CREATE DATABASE IF NOT EXISTS Cafeteria_DataBase";
			if ($connect->query($sql) === FALSE) {
				echo "Error creating database: " . $connect->error;
			}
			connection :: $obj = mysqli_connect('localhost','root','','Cafeteria_DataBase');
			if (mysqli_connect_errno()) {
				echo 'Error: Could not connect to database. Please try again later.';
			}
			////create table users
			$sq = "CREATE TABLE IF NOT EXISTS Users (uid int unsigned not null auto_increment primary key,name char(50) not null,email char(50) not null,password char(50) not null,profilePicture char(50) not null,EXT char(50) not null,rid int unsigned not null);";
			if (connection :: $obj->query($sq) === FALSE) {
				echo "Error creating table: " . connection :: $obj->error;
			}
			////create table products
			$sq = "CREATE TABLE IF NOT EXISTS Products (pid int unsigned not null auto_increment primary key,pname char(50) not null,productPicture char(50) not null,cid int unsigned not null);";
			if (connection :: $obj->query($sq) === FALSE) {
				echo "Error creating table: " . connection :: $obj->error;
			}
			////create table Category
			$sq = "CREATE TABLE IF NOT EXISTS Category (cid int unsigned not null auto_increment primary key,categoryName char(50) not null);";
			if (connection :: $obj->query($sq) === FALSE) {
				echo "Error creating table: " . connection :: $obj->error;
			}
			////create table Room
			$sq = "CREATE TABLE IF NOT EXISTS Room (rid int unsigned not null auto_increment primary key,roomNumber int not null);";
			if (connection :: $obj->query($sq) === FALSE) {
				echo "Error creating table: " . connection :: $obj->error;
			}
			////////////////////////////////////////////
			////////////////////--Rooms--///////////////
			for($i=1010;$i<2020;$i+=10) {
				$query = "insert into Room values(null,'" . $i . "');";
				mysqli_query(connection :: $obj, $query);
			}
			/////////////--adminRecord--////////////
			$query="insert into users values(null,'admin','admin123@gmail.com',md5('123'),'admin.jpg','1010',1);";
			mysqli_query(connection :: $obj,$query);
			///////////////////////////////////
			////////////////////////////////////////////
			////create table Order
			$sq = "CREATE TABLE IF NOT EXISTS Orders (uid int unsigned not null,pid int unsigned not null,orderDate date not null,amount int not null);";
			if (connection :: $obj->query($sq) === FALSE) {
				echo "Error creating table: " . connection :: $obj->error;
			}
			/////////////////add relationship between tables
			$sq="alter table Users add foreign key (rid)  references Room (rid);";
			connection :: $obj->query($sq);
			$sq="alter table Products add foreign key (cid)  references Category (cid);";
			connection :: $obj->query($sq);
			$sq="alter table Orders add foreign key (uid)  references Users (uid);";
			connection :: $obj->query($sq);
			$sq="alter table Orders add foreign key (pid)  references Products (pid);";
			connection :: $obj->query($sq);
			$sq="alter table Orders add primary key (uid,pid);";
			connection :: $obj->query($sq);
		}
    }
connection :: createInstance();
?>
