<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bootstrap-Table</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery-1.11.2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- script src="js/jscript.js"></script -->
	</head>
	<body>	
		<div class="container-fluid">
			<!-- ############################  Header  ###################################### -->
			<div class="page-header">
			  <h1 class="text-center">Registration</h1>
			</div>
			<br>
			<!-- ############################  Body  ################################# -->
			<form class="form-horizontal" role="form" method="post" action="done.php"  enctype='multipart/form-data'>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-offset-2 col-sm-2">
				  			<label for="name">Name:</label>
						</div>
						<div class="col-sm-6">
				 			 <input type="text" class="form-control" id="name" name="name">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-offset-2 col-sm-2">
							<label for="email">Email:</label>
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="email" name="email">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-offset-2 col-sm-2">
				  				<label for="pwd">Password:</label>
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="pwd" name="pwd">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-offset-2 col-sm-2">
							<label for="profileimage">profileimage:</label>
						</div>
						<div class="col-sm-6">
							<input type="file" class="" id="profileimage" name="profileimage"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-offset-2 col-sm-2">
							<label for="room">Room:</label>
						</div>
						<div class="col-sm-6">
							<select class="form-control" id="room" name="room">
								<option>Select RoomNumber</option>
								<option>101</option>
								<option>102</option>
								<?php

								?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-offset-2 col-sm-2">
							<label for="EXT">EXT:</label>
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="EXT" name="EXT">
						</div>
					</div>
				</div>
				<div class="form-group">
						<div class="row">
						<div class="col-lg-offset-4 col-sm-2">
				  			<input type="submit" class="form-control btn btn-info" value="Submit">
						</div>
						<div class="col-sm-2">
							<input type="reset" class="form-control btn btn-danger" value="Reset">
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
