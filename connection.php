<?php
    class connection
    {
        static $obj;
        private  function __construct(){
			self :: $obj = mysqli_connect('localhost','root','','Cafeteria_DataBase');
			if (mysqli_connect_errno()) {
				echo 'Error: Could not connect to database. Please try again later.';
			}
        }
        public static function createInstance(){
            if(self :: $obj)
                return self :: $obj;
            else {
				self :: $obj = new connection();
                return self :: $obj;
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
			$sq = "CREATE TABLE IF NOT EXISTS Products (pid int unsigned not null auto_increment primary key,pname char(50) not null,productPicture char(50) not null,price int not null,available enum('0','1') not null ,cid int unsigned not null);";
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
			for($i=2000,$j=1;$i<2020;$i+=1,$j++) {
				$query = "insert into Room values($j,'" . $i . "');";
				mysqli_query(connection :: $obj, $query);
			}
			/////////////--adminRecord--////////////
			$query="insert into users values(1,'admin','admin123@gmail.com',md5('123'),'admin.jpg','1010',1);";
			mysqli_query(connection :: $obj,$query);
			///////////////////////////////////
			////////////////////////////////////////////
			////create table Order
			$sq = "CREATE TABLE IF NOT EXISTS Orders (uid int unsigned not null,pid int unsigned not null,orderDate date not null,amount int not null,status char(50) not null);";
			if (connection :: $obj->query($sq) === FALSE) {
				echo "Error creating table: " . connection :: $obj->error;
			}
			///////////////////////////////////////////////////create table change
			$sq = "CREATE TABLE IF NOT EXISTS changes (tableName char(20) not null,changeDate date not null,serverDate date not null);";
			if (connection :: $obj->query($sq) === FALSE) {
				echo "Error creating table: " . connection :: $obj->error;
			}
			/////////////--change table data--////////////
			$query="insert into changes values('Users',NOW(),NOW());";
			mysqli_query(connection :: $obj,$query);
			$query="insert into changes values('Products',NOW(),NOW());";
			mysqli_query(connection :: $obj,$query);
			$query="insert into changes values('Category',NOW(),NOW());";
			mysqli_query(connection :: $obj,$query);
			$query="insert into changes values('Room',NOW(),NOW());";
			mysqli_query(connection :: $obj,$query);
			$query="insert into changes values('Orders',NOW(),NOW());";
			mysqli_query(connection :: $obj,$query);
			///////////////////////create trigger to user////////////***************
			$query="DELIMITER //
			CREATE TRIGGER changes BEFORE INSERT ON
			Users FOR EACH ROW BEGIN
						UPDATE changes
			SET changeDate = NOW() where tableName='Users'
			END //
			DELIMITER ;";
			mysqli_query(connection :: $obj,$query);
			///////////////////////create trigger to products////////////***************
			$query="DELIMITER //
			CREATE TRIGGER changes BEFORE INSERT ON
			Products FOR EACH ROW BEGIN
					UPDATE changes
			SET changeDate = NOW() where tableName='Products'
			END //
			DELIMITER ;";
			mysqli_query(connection :: $obj,$query);
			///////////////////////create trigger to category////////////***************
			$query="DELIMITER //
			CREATE TRIGGER changes BEFORE INSERT ON
			Category FOR EACH ROW BEGIN
						UPDATE changes
			SET changeDate = NOW() where tableName='Category'
			END //
			DELIMITER ;";
			mysqli_query(connection :: $obj,$query);
			///////////////////////create trigger to Room////////////***************
			$query="DELIMITER //
			CREATE TRIGGER changes BEFORE INSERT ON
			Room FOR EACH ROW BEGIN
						UPDATE changes
			SET changeDate = NOW() where tableName='Room'
			END //
			DELIMITER ;";
			mysqli_query(connection :: $obj,$query);
			//////////////////////create trigger to Orders////////////***************
			$query="DELIMITER //
			CREATE TRIGGER changes BEFORE INSERT ON
			Orders FOR EACH ROW BEGIN
						UPDATE changes
			SET changeDate = NOW() where tableName='Orders'
			END //
			DELIMITER ;";
			mysqli_query(connection :: $obj,$query);
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
connection :: create();
?>
