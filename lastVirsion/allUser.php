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
			url:"allUsers.php",
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
  		    $("table").append('<tr id="'+i+'"><td>'+response['usersArray'][i]["name"]+'</td><td>'+response['usersArray'][i]["room"]+'</td><td><img width="60px" height="60px" src="images/'+response['usersArray'][i]["image"]+'"/></td><td>'+response['usersArray'][i]["ext"]+'</td><td><button class="delete">Del</button><button class="edit">Edit</button></td></tr>'); 		  
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
				<li ><a href="">HOME</a></li>
				<li><a href="allProduct.php">All products</a></li>
				<li  class="active"><a href="allUser.php">all users</a></li>
				<li><a href="order.php">Orders</a></li>
				<li><a href="check.php">Checks</a></li>	
			  </ul>
			  <ul class="nav navbar-nav navbar-right" style="margin-right:100px" >
				<li><img src="images/d.jpg" height="50px" width="30px"  class="img-rounded"></img></li>
				<li ><a href="#"><span class="glyphicon "></span> Admin </a></li>				
				<li ><a href="#"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>				    
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
