<!DOCTYPE>
<?php
session_start();
if(!isset($_COOKIE['admin']))
	if(!isset($_SESSION['admin']))
		header('Location:index.html');
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add User</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.9.0.min.js"></script>
    <script>
        $(function() {
                $.ajax({
                    url: "Ajax/selectRoom.php",
                    method: 'get',
                    data: {
                        "all":"all"
                    },
                    success: function (response) {
                        console.log(response);
                       for(var i=0;i<response.length;i++){
                          $('#roomNum').html($('#roomNum').html()+"<option value= "+(i+1)+" >"+response[i][1]+"</option>");
                       }
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    },
                    complete: function (xhr) {
                        console.log("Complete ");
                    },
                    dataType: 'json',
                    async: true

                });
        });
        </script>
</head>
<script src="js/jquery-1.11.2.js"></script>
<script src="js/bootstrap.min.js" ></script> 
<body>
    <div class="header navbar-fixed-top">
	      <div class="header_top">
	            <div class="menu">
		      <nav>
			  <ul>
				<li><a href="adminHome.php">HOME</a></li>
				<li><a href="allProducts.php">All products</a></li>
				<li class="active" ><a href="allUsers.php">all users</a></li>
				<li><a href="orders.php">Orders</a></li>
				<li><a href="check.php">Checks</a></li>	
			  </ul>
			  <ul class="nav navbar-nav navbar-right" style="margin-right:100px" >
				<li><img src="images/d.jpg" height="50px" width="30px"  class="img-rounded"></img></li>
				<li ><a href="#"><span class="glyphicon "></span> Admin </a></li>				
				<li ><a href="Ajax/logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>				    
			</ul>
		      </nav>		      
	      </div>                 
	    </div>
	</div>
   <div class="container form " style="width:900px ; min-height:400px ; margin:100px 200px">
       <h2>Add User</h2><br/>
       <form class="form-horizontal" method="post" enctype='multipart/form-data' action="Ajax/done.php">
            <div class="row">
                 <span class="col-lg-3"><label>Name</label></span>
                 <span class="col-lg-6"><input type="text" name="name" /></span>
            </div>
            <div class="row">
                 <span class="col-lg-3"><label>Email</label></span>
                 <span class="col-lg-6"><input type="email" name="email" /></span>
            </div>
            <div class="row">
                 <span class="col-lg-3"><label>Password</label></span>
                 <span class="col-lg-6"><input type="password" name="pwd" /></span>
            </div>
            <div class="row">
                 <span class="col-lg-3"><label>Confirm Password</label></span>
                 <span class="col-lg-6"><input type="password" name="confirmpwd" /></span>
            </div>         
            <div class="row">
                 <span class="col-lg-3"><label>Room No.</label></span>
                 <span class="col-lg-6">
                     <select name="room" id="roomNum">
                         <option>Select Room Number</option>
                     </select>
                 </span>
            </div>          
            <div class="row">
                 <span class="col-lg-3"><label>Ext.</label></span>
                 <span class="col-lg-6"><input type="text" name="EXT" /></span>
            </div>
            <br/> 
           
            
            <div class="row">
                 <span class="col-lg-3"><label>Profile picture</label></span>                 
                 <div class="col-lg-3 btn btn-default myButton fileUpload ">
                     <span>Browse</span>
                     <span class="col-lg-3"><input style="width:50px" type="file" name="profileimage"  value="browse" class="upload" /></span>
                 </div>
            </div>
            <br/><br/>
            <div class="row">
                 <span class="col-lg-2 col-xs-offset-3"><input type="submit" value="Save" name="submit"  class="myButton submit"/></span>
                 <span class="col-lg-2"><input type="reset" name=""   class="myButton"/></span>
            </div>
       </form> 
   </div>
   
   
   <div class="copy-right navbar-fixed-bottom"  style="margin-bottom:0px">
        <p>&copy; 2016 All Rights Reserved | Designed by <a href="#">LIONS</a></p> 
   </div>
    
</body>
</html>
