
<?php
require "tables.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home User </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
	
 	 
	</style>
	
	<script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/task.js"></script> 

</head>
<body>
	<div class="container">
	<div class="row"> 
		<div class="col-sm-12"> 
<!---------------------- start nav --------------------------------------->
<br>
<nav  class="navbar navbar-default ">
		<div class="container-fluid ">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#my-navbar">
					<span class="glyphicon glyphicon-align-justify"></span>
				</button>
				
			</div>
			<div class="collapse navbar-collapse" id="my-navbar">
				<ul class="nav navbar-nav">
					<li class="ts active"><a  href="#">Home</a></li>
					<li class="ts" ><a  href="#">Order</a></li>
					
				</ul>
				<ul class="nav navbar-nav navbar-right">

					<li class="ts" ><img src="images/d.jpg" heigth="40px" width="25px"  class="img-rounded" /></li>

					<li class="ts" ><a href="#"><span class="glyphicon "></span> Doaa Negm </a></li>
				
					 <li class="ts" ><a href="#"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
					 
				</ul>	
			</div>
			
		</div>	
	</nav>



<!--------------------------- end Nav ------------------------------------------------>
		</div>
	</div>
<!-------------------------------------------------------------------------->

<br>
	<div class="row"> 
	<div class="col-sm-5" id="divRight"> 
<!---------------------------------- sub row 00 ------------------------------------------>
		<div class="row" >
<br><br>
	<div class="col-sm-1" ></div>
	<div class="col-sm-2" >	
		 <table class="table">
		   
			      <tr>
				<td><h3>tea</h3></td>
				<td><input type="number" name="count" placeholder="counter" min='1' step='1' max='100'></td>
				<td><label name="result"><h3>30</h3></label></td>
				<td><label name="coin"><h3>EGP</h3></label> </td>
			      </tr>

			      <tr>
				<td><h3>tea</h3></td>
				<td><input type="number" name="count1" placeholder="counter" min='1' step='1' max='100'></td>
				<td><label name="result"><h3>30</h3></label></td>
				<td><label name="coin"><h3>EGP</h3></label> </td>
			      </tr>
		
		   
	  	</table>
	</div>
</div>	
<!----------------------------------- end sub row00 ---------------------------------------->
	


<!----------------------- Sub row 3------------------------------>
		<div class="row">
			<div class="col-sm-1"> </div>
		      <label ><h3> Note </h3>  </label >
		</div>
<!---------------------- end sub 3 -------------------------------->
<!----------------------- Sub row 4------------------------------>
		<div class="row">
			<div class="col-sm-1"> </div>
			<div class="col-sm-11"> <textarea  placeholder="Note about order" rows="4" cols="30"></textarea></div>
			
		</div><br>

<!---------------------- end sub 4-------------------------------->
<!---------------------sub row 5 ---------------------------->

<!---------------------- end row------------------------------>
		<div class="row" >
<br>
	<div class="col-sm-3" ></div>
	<div class="col-sm-9" >	
		 <table class="table" align="right">
		   
			      <tr>
				<td><h3>Room</h3></td>
				<td><h3> </h3> </td>
				<td> <h3> </h3></td>
				<td>  <div class="form-group">		
						<div>
							<select class="element select medium  form-control" id="room" name="room" > 
								<option value="Select Room" selected="selected"> Select Room</option>
								<option value="1002" >1002</option>
								<option value="1003" >1003</option>
								<option value="1004" >1004</option>
							</select>
						</div> 	
					</div>
				 </td>
			      </tr>

			      <tr>
				<td><h3>Total</h3></td>
				<td> </td>
				<td><label name="result"><h3>55</h3></label></td>
				<td><label name="coin"><h3>EGP</h3></label> </td>
			      </tr>
		
		   
	  	</table>
	</div>
</div>
<!---------------------sub row 6 ---------------------------->

<div class="row">
	<div class="col-sm-6"> </div>
	<div >
		<span><input value="Submit" class="myButton" type="submit"></span>
	</div>
	
</div>
<br>
<!---------------- end row 6----------------------------->


	</div> <!---- col---->
<!-- _____________________________________________________________________________________________________________________ -->

<!---------------------------------------------------------------------------------------------------------------------------> 
 <div class="col-sm-1"></div> 
<!---------------------------------------------------------------------------------------------------------------------------> 
<div class="col-sm-6" > 
		<br>
	<div class="row">
		<div class="col-sm-5" > </div>
		<div class="col-sm-6" > 
		 <div class="input-group">
		<input type="text" class="form-control" placeholder="Search ...">
		<span class="input-group-btn">
		  <button class="btn btn-default" type="button " name="Button">
		    <span class="glyphicon glyphicon-search"></span>
		  </button>
		</span>
	      </div>
		</div>
		
	</div>
<br>
<br>
<br>
<!-------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			<h3>Last ORDER </h3>
		</div>
	</div>
	<div class="row">
		
		<div class="col-sm-3" >
			<?php 
			require('tables.php');
                       $new= new Products();
			echo "hjgj";
			/*$result=$new->select();

                       if($result->num_rows ==0){
                          echo "ddd";

                        } */
			?>
			 <img src="images/tea1.jpg" class="img-rounded" name="img1"  height="150" width="150" alt="">
		</div>
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			 <img src="images/tea3.jpg" class="img-rounded" name="img2"   height="150" width="150" alt="">
		</div>
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			 <img src="images/tea5.jpg" class="img-rounded" name="img3"  height="150" width="150" alt="">
		</div>
	</div>
<br>
<!--------------------------------------------------------------------------------------------------------------------------->
<div class="divborder"></div>
<br>
	<div class="row">
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			<h3>MENU </h3>
		</div>
	</div>
	<div class="row">

		<div class="col-sm-3" >
			<div class="row">

			<?php 
		
			 ?>
			 <img src="images/tea2.jpg" class="img-rounded" name="img1"  height="125" width="125" alt="">
			 <div >
				<br><span align="center"><input value="5LE" class="price" type="submit"></span>
			</div>

			</div>
		</div>
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			<div class="row">
			 <img src="images/tea1.jpg" class="img-rounded" name="img1"  height="125" width="125" alt="">
			 <div >
				<br><span align="center"><input value="10LE" class="price" type="submit"></span>
			</div>

			</div>
		</div>
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			<div class="row">
			 <img src="images/tea3.jpg" class="img-rounded" name="img1"  height="125" width="125" alt="">
			 <div >
				<br><span align="center"><input value="15LE" class="price" type="submit"></span>
			</div>

			</div>
		</div>



	</div>
<!--------------------------------------------------------------------------------------------------------------------------->

<br>
	<div class="row">

		<div class="col-sm-3" >
			<div class="row">
			 <img src="images/tea2.jpg" class="img-rounded" name="img1"  height="125" width="125" alt="">
			 <div >
				<br><span align="center"><input value="5LE" class="price" type="submit"></span>
			</div>

			</div>
		</div>
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			<div class="row">
			 <img src="images/tea4.jpg" class="img-rounded" name="img1"   height="125" width="125" alt="">
			 <div >
				<br><span align="center"><input value="10LE" class="price" type="submit"></span>
			</div>

			</div>
		</div>
		<div class="col-sm-1" ></div>
		<div class="col-sm-3" >
			<div class="row">
			 <img src="images/tea1.jpg" class="img-rounded" name="img1"   height="125" width="125" alt="">
			 <div >
				<br><span align="center"><input value="15LE" class="price" type="submit"></span>
			</div>

			</div>
		</div>



	</div>

<!--------------------------------------------------------------------------------------------------------------------------->
	</div> <!---- col---->

	</div> <!---- frist row  -->
<!----------------------------------------------------------------------->
<br>
</div> <!---- >

</body>
</html>