<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Check Admin </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	 <link href="css/style1.css" rel="stylesheet" type="text/css"  media="all" />
	<style>
	
 	 
	</style>
	
	<script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/task.js"></script> 
	  <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').data();
		 $('#datetimepicker2').data();
            });
        </script>

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
					
					 <li class="ts"  ><a href="">HOME</a></li>
					    <li class="ts" ><a href="allProduct.php">All products</a></li>
					    <li class="ts" ><a href="allUser.php">all users</a></li>
					    <li class="ts" ><a href="order.php">Orders</a></li>
					    <li class="ts active"><a href="check.php">Checks</a></li>	
					
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
<!----------------------------------------------------------------------------------------------------->

<div class="row">

	<p > Checks</p>
</div>
<!----------------------------------------------------------------------------------------------------->
<div class="row">
	<div class='col-sm-1'></div>
        <div class='col-sm-4'>
            <div class="form-group">
                <div class="input-group date" id='datetimepicker1'>
                    <input type='text' placeholder="Date From" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

	 <div class='col-sm-4'>
            <div class="form-group">
                <div class="input-group date" id='datetimepicker2'>
                    <input type='text' placeholder="Date To" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>  
                </div>
            </div>
        </div>
</div>
<br>
<!----------------------------------------------------------------------------------------------------->
<div class="row">
	 <div class='col-sm-1'></div>
	<div class='col-sm-4'>
	   <div class="form-group">		
		<div>
			<select class="element select medium  form-control" id="room" name="room" > 
				<option value="Select Room" selected="selected"> Users</option>
				<option value="Ahmed" >Ahmed </option>
				<option value="Mohamed" >Mohamed </option>
				<option value="Mahmoud" >Mahmoud</option>
			</select>
		</div> 	
	  </div>
	</div>
</div>
<!----------------------------------------------------------------------------------------------------->
<div class="row">

<div class="col-sm-1" ></div>
<div class="col-sm-6" >
<table class="table  table-bordered table-hover">
	  <thead>
		      <tr>
			<th>Name</th>
			
			<th>Total Amount</th>
			
		      </tr>
	    </thead>
	    <tbody>
		       <tr>
			<td>Ahmed  <a href="#"><img src="images/plus.png" heigth="25" width="25" align="right"></img></a></td>
			
			<td>1155 LE </td>
		
    			</tr>

			  <tr>
			<td>Mohamed <a href="#"><img src="images/plus.png" heigth="25" width="25" align="right"></img></a></td>
			
			<td>555 LE</td>
			
    			</tr>

			 <tr>
			<td>Mahmoud  <a href="#"><img src="images/minus.png" heigth="25" width="25" align="right"></img></a></td>
			
			<td>5500 LE</td>
			
    			</tr>
	    </tbody>	
</table>
</div>	
</div>
<br>
<!----------------------------------------------------------------------------------------------------->
<div class="row">

<div class="col-sm-3" ></div>
<div class="col-sm-6" >
<table class="table  table-bordered table-hover">
	  <thead>
		      <tr>
			<th>Order Data</th>
			
			<th>Amount</th>
			
		      </tr>
	    </thead>
	    <tbody>
		       <tr>
			<td>2016/1/12 10:44 AM <a href="#"><img src="images/plus.png" heigth="25" width="25" align="right"></img></a></td>
			
			<td>55 LE </td>
			
    			</tr>

			  <tr>
			<td>2016/1/12 10:44 AM <a href="#"><img src="images/plus.png" heigth="25" width="25" align="right"></img></a></td>
			
			<td>55 LE</td>
			
    			</tr>

			 <tr>
			<td>2016/1/12 10:44 AM <a href="#"><img src="images/minus.png" heigth="25" width="25" align="right"></img></a></td>
			
			<td>55 LE</td>
			
    			</tr>
	    </tbody>	
</table>
</div>	
</div>
<br>


<!---------------------------------------------------------------------------------------------------------------------------------------->
<div class="row">
	<div class="col-sm-4" ></div>
	<div class="col-sm-7 total">
		<br>
		<div class="row">
			<div class="col-sm-3 detail"  >
				 <img src="images/tea1.jpg" class="img-rounded" name="img1"  height="150" width="150" alt="">
				<p> 5 LE </p> 
				<p> # 2</p> 
			</div>
			<div class="col-sm-1 " ></div>
			<div class="col-sm-3 detail" >
				 <img src="images/tea3.jpg" class="img-rounded" name="img2"   height="150" width="150" alt="">
				<p> 15 LE </p> 
				<p> # 1</p> 
			</div>
			<div class="col-sm-1 " ></div>
			<div class="col-sm-3 detail" >
				 <img src="images/tea5.jpg" class="img-rounded" name="img3"  height="150" width="150" alt="">
				<p> 25 LE </p> 
				<p># 2</p> 
			</div>
		</div>
		<br>
	</div>
</div>
<br>
<br>
<br>
<br>
<!----------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------->
  <div class="copy-right navbar-fixed-bottom"  style="margin-bottom:0px ;height:50px">
      <p>&copy; 2016 All Rights Reserved | Designed by <a href="#">LIONS</a></p> 
  </div>
  <br>
</div>  <!---------- container ---------------->
</body>

</html>