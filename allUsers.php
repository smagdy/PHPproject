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
  <title>All Users</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<script src="js/jquery-1.11.2.js"></script>
<script src="js/bootstrap.min.js" ></script> 
<script>
    $(function(){
          var code="0" ;
          var UID = 0 ;
          var limit=0 ;
          var page=1 , oldPage=1 ;
          var n = 4 ;  
          var pagiNum ;
             function sendToServer (){
		$.ajax({
			url:"Ajax/allUsers.php",
			method:'get',
			data:{  "code":code,
				"limit":limit,
				"UID":UID
			},
			success:function(response){
			        console.log(response);	
				response = JSON.parse(response);
				showPagination (response) ;
				showTableData (response)			        
			},
			error:function(xhr,status,error){
				console.log(error);
			},
			complete:function(xhr){
// 				console.log("Complete ");
			},			
			async:true

		});
	     }
	 
	     function showPagination (response){
		  pagiNum = Math.ceil(response["allRowsNum"]/n) ;
		  $(".pagination").empty();
		  $(".pagination").append('<li id="Previous" value="prev" style="float:left"><a aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
		  $(".pagination").append('<li id="next" value="next" style="float:left"><a aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
		  for (var j=1 ; j<=pagiNum ; j++){		   
		    $("#next").before("<li  style='float:left' value="+j+"><a>"+j+"</a></li>");
		  }
	     }
	     function showTableData (response){
	            $("table").empty();
	            $("table").append("<tr><th>Name</th><th>Room</th><th>Image</th><th>Ext.</th><th>Action</th></tr>");
	          for(var i=0 ; i< response['usersArray'].length ; i++){
  		   // -----------------------------------------------------------
  		    var row ='<tr id="'+i+'"><td>'+response['usersArray'][i]["name"]+'</td><td>'+response['usersArray'][i]["room"]+'</td><td><img width="60px" height="60px" src="'+response['usersArray'][i]["image"]+'"/></td><td>'+response['usersArray'][i]["ext"]+'</td>';
  		     row+= '<td><button class="delete">Del</button>';
  		     row += '<button class="edit" data-toggle="modal" data-target="#my-modal">Edit</button>';
  		     row += '<div  id="my-modal" class="modal" ><div class="modal-dialog">' ;
                     row += '<div class="modal-content" style="padding:25px;display:block;font-family:"Open Sans", sans-serif;color:#82592D;padding-bottom:5px">';
                     row += '<form><div class="modal-header"><button type="button" class="close" data-dismiss="modal" ><span >&times;</span></button>';
                     row += '<h4 class="modal-title">Edit User</h4></div>';
                     row += '<div class="modal-body">';
                     row += '<div class="row"><span class="col-lg-3"><label>Name</label></span><span class="col-lg-6"><input type="text" name="userName" class="form-control" /></span></div><br/>';
		     row += '<div class="row"><span class="col-lg-3"><label>E-Mail</label></span><span class="col-lg-6"><input type="email" name="umail" class="form-control"/></span></div><br/>';
		     row += '<div class="row"><span class="col-lg-3"><label>Password</label></span><span class="col-lg-6"><input type="password" name="upass"  class="form-control"/></span></div><br/>';
		     row += '<div class="row"><span class="col-lg-3"><label>Room No.</label></span><span class="col-lg-6"> <select name="room" id="roomNum"><option>Select Room Number</option></select></span></div><br/>';
		     row += '<div class="row"><span class="col-lg-3"><label>EXT.</label></span><span class="col-lg-6"><input type="text" name="umail"  class="form-control"/></span></div><br/>';
		     row += '<div class="row"><span class="col-sm-3"><label>Profile image</label></span><div class="col-lg-2 fileUpload btn btn-warning" style="color:white">';
		     row += '<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><span><label for="Pimage">Browse</label></span><span class="col-lg-2">';
		     row += '<input type="file" name="pimage"  class="upload" id="Pimage" /></span></div></div>';
	             row += '<div class="modal-footer"><button class="btn btn-success" data-dismiss="modal">Submit</button><button class="btn btn-danger" data-dismiss="modal">Cancel</button>';
		     row += '</div></form></div></div></div>';
		     
  		     row += '</td></tr> '; 
                      
  		     $("table").append(row);
  		 //--------------------------------------------------------- ---
  		  }	      
	     }
	      sendToServer (code,limit,UID) ;
	      
	    $(".pagination").on("click","li",function(){
		code="0" ; 
		page= $(this).attr("value") ;

		if (page != "prev" && page != "next" ){
		      console.log("oldPage "+oldPage);
		      oldPage = page ;
		      console.log("oldPage "+oldPage);
		}
		else if(page == "prev") {	
			if(oldPage > 1 ){ 
			     page = --oldPage ;
			}else{
			    page = 1  ;
			    }
		}
 		else if(page == "next") { 	        	
 			if(oldPage < pagiNum){
                               page = ++oldPage ; 
  			}else {page = pagiNum ;}
		}
 			
		limit = (page-1)*n ;		           	      	      
		sendToServer (code,limit,UID) ;
	  });
	 	  	  
	  $("table").on("click",".delete",function(){	     
	      code="1" ;
 	      UID = $(this).parent().parent().attr("id") ;
 	      console.log(UID) ;
              sendToServer (code,limit,UID) ;
              console.log("code"+code);
	  });
	
	$("table").on("click",".edit",function(){	     
	      code="2" ;
	      UID = $(this).parent().parent().attr("id") ;
 	      console.log(UID) ;
// 	      sendToServer (code,limit,UID) ;
	      console.log("code"+code);
	  });
	  
      });

</script>
<body>
	 <div class="header navbar-fixed-top">
	      <div class="header_top">
	            <div class="menu">
		      <nav>
			  <ul>
				<li><a href="adminHome.php">HOME</a></li>
				<li><a href="allProducts.php">All products</a></li>
				<li class="active"><a href="allUsers.php">all users</a></li>
				<li><a href="orders.php">Orders</a></li>
				<li><a href="check.php">Checks</a></li>	
			  </ul>
			  <ul class="nav navbar-nav navbar-right" style="margin-right:100px" >
				<li><img src="images/a.png" height="50px" width="50px"  class="img-rounded"></img></li>
				<li ><a href="#"><span class="glyphicon "></span> Admin </a></li>				
				<li ><a href="Ajax/logout.php">LogOut<span class="glyphicon glyphicon-log-out"></span> </a></li>				    
			</ul>
		      </nav>		      
	      </div>                 
	    </div>
	</div>

   <div class="container form" style="width:900px ; min-height:400px ; margin:80px 200px 0 200px ">
       <h2>All Users</h2>
       <span style="float:right;"><a href="addUser.php">add User</a></span>
       <table class="table table-bordered myTable">        
       </table>
	  
      <div class="row">
	  <nav class=" col-xs-offset-4 navPagi">
	      <ul class="pagination">                        
	      </ul>
	    </nav>
      </div> 
      
  </div>
    
  <div class="copy-right navbar-fixed-bottom"  style="margin-bottom:0px ;height:40px">
      <p>&copy; 2016 All Rights Reserved | Designed by <a href="#">LIONS</a></p> 
  </div>
    
</body>
</html>
