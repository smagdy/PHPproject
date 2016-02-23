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
  <title>Orders</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<script src="js/jquery-1.11.2.js"></script>
<script src="js/bootstrap.min.js" ></script>
<script>  
          var code="0" ;
          var OID = 0 ;
          var limit=0 ;
          var page=1 , oldPage=1 ;
          var n = 2;  
          var pagiNum ;   
       // var source = new EventSource("orders.php?code="+code+"&limit="+limit+"&OID="+OID+"");
       //var source = new EventSource("orders.php");
    $(function(){      
       /*
		source.onmessage = function(event) {
			var x = JSON.parse(event.data);			
			pagiNum = Math.ceil(x.allRowsNum/n) ;
			showPagination (x) ;
			showTableData (x) ;
			
			console.log(x) ;
			console.log("allRowsNum : "+x.allRowsNum);
			console.log("pagiNum : "+pagiNum) ;
			console.log("length: "+x.ordersArray.length);
			console.log("limitresponse: "+x['limit']);
			console.log("limit : "+limit);
		
		};
		source.onerror = function(event) {		      
			console.log("error : "+event) ;
		};
	*/

           function sendToServer (){
		$.ajax({
			url:"Ajax/orders.php",
			method:'get',
			data:{  "code":code,
				"limit":limit,
				"OID":OID
			},
			success:function(response){
			        console.log(response);	
 				response = JSON.parse(response);
 				console.log("limitresponseWith ajax : "+response['limit']);
 				console.log("limit : "+limit);			
				showPagination (response) ;
				showTableData (response)
			       // sendToServer (code,limit,OID) ;
			        setTimeout(sendToServer,10000);	
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
		  pagiNum = Math.ceil(response.allRowsNum/n) ;
		  $(".pagination").empty();
		  $(".pagination").append('<li id="Previous" value="prev" style="float:left"><a aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
		  $(".pagination").append('<li id="next" value="next" style="float:left"><a aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
		  for (var j=1 ; j<=pagiNum ; j++){		        
		        $("#next").before("<li  style='float:left' value="+j+"><a>"+j+"</a></li>");
		       
		  }
	     }
	   
	     function showTableData (response){
	            console.log("response : "+response);
	            $("table").empty();	           
	         for(var i=0 ; i< response.ordersArray.length ; i++){
	            $("table").append("<tr><th>orderDate</th><th>Name</th><th>Room</th><th>Ext.</th><th>Action</th></tr>");
	            $("table").append('<tr id="'+i+'"><td>'+response['ordersArray'][i]["date"]+'</td><td>'+response['ordersArray'][i]["name"]+'</td><td>'+response['ordersArray'][i]["room"]+'</td><td>'+response['ordersArray'][i]["ext"]+'</td><td><button class="action">Action</button></td></tr>');	         
  		    var row = '<tr id="'+i+'"><td colspan="5"><ul style="float:left">';                  
                    for(var h=0 ; h< response['ordersArray'][i]["products"].length ;h++){
                        row +='<li><figure><img width="60px" height="60px" style="postion:relative; z-index:-1" src="'+response["ordersArray"][i]["products"][h]["picture"]+'"/><figcaption>'+response["ordersArray"][i]["products"][h]["pname"]+'</figcaption></figure>';
                        row +='<div style="postion:absolute ;margin-top:-100px ;border-radius:50px;color:white;font-size:11px ;font-weight:bold ; margin-left:165px ;float:left; z-index:99999; background:#77b300 ;" >&nbsp;&nbsp;'+response["ordersArray"][i]["products"][h]["price"]+'&nbsp;EPG&nbsp;</div>' ;
                        row +='<div>'+response["ordersArray"][i]["products"][h]["numofItems"]+'</div></li>';
                           }
                   $("table").append(row+'</ul><span style="float:left vertical-align:text-bottom;">Total : '+response['ordersArray'][i]["amount"]+'EPG</span></td></tr>');
  		
  		}	      
	     }
	    
	     sendToServer (code,limit,OID) ;
	      
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
		console.log("limit : "+limit);
	        //  source = new EventSource("orders.php?code="+code+"&limit="+limit+"&OID="+OID+"");
     		 sendToServer (code,limit,OID) ;
	  });
	/* 	  	  
	  $("table").on("click",".action",function(){	     
	      code="1" ;
 	      OID = $(this).parent().parent().attr("id") ;
 	      console.log(OID) ;
              sendToServer (code,limit,OID) ;
              console.log("code"+code);
	  });
	
	  */
	  
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
			    <li><a href="allUsers.php">all users</a></li>
			    <li class="active"><a href="orders.php">Orders</a></li>
			    <li><a href="check.php">Checks</a></li>	
		      </ul>
		      <ul class="nav navbar-nav navbar-right" style="margin-right:100px" >
			    <li><img src="images/a.png" height="50px" width="50px"  class="img-rounded"></img></li>
			    <li ><a href="#"><span class="glyphicon "></span> Admin </a></li>				
			    <li ><a href="Ajax/logout.php"> LogOut<span class="glyphicon glyphicon-log-out"></span></a></li>				    
		    </ul>
		  </nav>		      
	  </div>                 
	</div>
    </div>


   <div class="container form" style="width:900px ; min-height:400px ; margin:80px 200px 0 200px ">
       <h2>Orders</h2><br/>
       <table class="table table-bordered orders">
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
