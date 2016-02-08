<?php
    class connection
    {
        static $obj;
        private  function __construct(){
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
			$this->obj = mysqli_connect('localhost','root','','Cafeteria_DataBase');
            if (mysqli_connect_errno()) {
                echo 'Error: Could not connect to database. Please try again later.';
            }
			////create table users
			$sq = "CREATE TABLE IF NOT EXISTS Users (uid int unsigned not null auto_increment primary key,name char(50) not null,email char(50) not null,password char(50) not null,profilePicture char(50) not null,rid int unsigned not null);";
			if ($this->obj->query($sq) === FALSE) {
				echo "Error creating table: " . $this->obj->error;
			}
			////create table products
			$sq = "CREATE TABLE IF NOT EXISTS Products (pid int unsigned not null auto_increment primary key,pname char(50) not null,productPicture char(50) not null,cid int unsigned not null);";
			if ($this->obj->query($sq) === FALSE) {
				echo "Error creating table: " . $this->obj->error;
			}
			////create table Category
			$sq = "CREATE TABLE IF NOT EXISTS Category (cid int unsigned not null auto_increment primary key,categoryName char(50) not null);";
			if ($this->obj->query($sq) === FALSE) {
				echo "Error creating table: " . $this->obj->error;
			}
			////create table Room
			$sq = "CREATE TABLE IF NOT EXISTS Room (rid int unsigned not null auto_increment primary key,roomNumber int not null,EXT int not null);";
			if ($this->obj->query($sq) === FALSE) {
				echo "Error creating table: " . $this->obj->error;
			}
			////create table Order
			$sq = "CREATE TABLE IF NOT EXISTS Orders (uid int unsigned not null,pid int unsigned not null,orderDate date not null,amount int not null);";
			if ($this->obj->query($sq) === FALSE) {
				echo "Error creating table: " . $this->obj->error;
			}
			/////////////////add relationship between tables
			$sq="alter table Users add foreign key (rid)  references Room (rid);";
			$this->obj->query($sq);
			$sq="alter table Products add foreign key (cid)  references Category (cid);";
			$this->obj->query($sq);
			$sq="alter table Orders add foreign key (uid)  references Users (uid);";
			$this->obj->query($sq);
			$sq="alter table Orders add foreign key (pid)  references Products (pid);";
			$this->obj->query($sq);
			$sq="alter table Orders add primary key (uid,pid);";
			$this->obj->query($sq);
        }
        public static function createInstance(){
            if(connection :: $obj)
                return connection :: $obj;
            else {
				connection :: $obj = new connection();
                return connection :: $obj;
            }
        }
    }
connection :: createInstance();
?>
