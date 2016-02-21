<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style1.css">
	<style>

	</style>

	<script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/task.js"></script>
	<script src="js/adminscript.js"></script>
</head>
<body>

<div class="container" >
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

							<li class="ts active"  ><a href="adminHome.php">HOME</a></li>
							<li class="ts" ><a href="allProduct.php">All products</a></li>
							<li class="ts" ><a href="allUser.php">All users</a></li>
							<li class="ts" ><a href="order.php">Orders</a></li>
							<li class="ts "><a href="check.php">Checks</a></li>

						</ul>
						<ul class="nav navbar-nav navbar-right">

							<li class="ts" ><img src="images/d.jpg" heigth="40px" width="25px"  class="img-rounded" ></img></li>

							<li class="ts" ><a href="#"><span class="glyphicon "></span> Admin </a></li>

							<li class="ts" ><a href="#"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>

						</ul>
					</div>

				</div>
			</nav>


		</div>
	<div class="row">
		<div class="col-sm-5" id="divRight">
			<!---------------------------------- sub row 00 ------------------------------------------>
			<div class="row" >
				<br><br>
				<!--<div class="col-sm-1" ></div> -->
				<div class="col-sm-2" >
					<table class="table" id="myOrders">

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
				<div class="col-sm-11"> <textarea  id='comment' placeholder="Note about order" rows="4" cols="30"></textarea></div>

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
									<select class="element select medium  form-control" id="roomNum" name="room" >
										<option value="Select Room" selected="selected"> Select Room</option>

									</select>
								</div>
							</div>
							</td>

						</tr>
						<tr>
							<td><h3>Total</h3></td>
							<td > </td>
							<td><label name="result"><h3 id="mytotal">0</h3></label></td>
							<td><label name="coin"><h3>EGP</h3></label> </td>
						</tr>


					</table>
				</div>
			</div>
			<!---------------------sub row 6 ---------------------------->

			<div class="row">
				<div class="col-sm-6"> </div>
				<div >
					<span><input value="Submit" class="myButton" id="mySubmit" type="submit"></span>
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
						<input type="text" class="form-control" placeholder="Search ..." id="search_input">
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
					<h3>Add to user </h3>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div>
						<select class="element select medium  form-control" id="users" name="users" >
							<option value="Select Room" selected="selected">All User</option>
						</select>
					</div>
				</div>
			</div>
			<br>
			<!---------------------------------------------------------------------------------------------------------------------------
                    <!--------------------------------------------------------------------------------------------------------------------------->
			<div class="divborder"></div>
			<br>
			<div class="row">
				<div class="col-sm-1" ></div>
				<div class="col-sm-3" >
					<h3>MENU </h3>
				</div>
			</div>

			<!--------------------------------------------------------------------------------------------------------------------------->
			<div id="display"></div>
			<br>
		</div>

		<!--------------------------------------------------------------------------------------------------------------------------->
	</div> <!---- col---->

</div> <!---- frist row  -->
<!----------------------------------------------------------------------->
<br>
</div> <!---- >

</body>
</html>