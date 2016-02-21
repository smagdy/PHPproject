<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>All Products</title>
  <link href="css/style1.css" rel="stylesheet" type="text/css"   />
  <link href="css/style.css" rel="stylesheet" type="text/css"   />
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
</head>
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.min.js" ></script> 
    <script src="js/task.js"></script> 
    <script>	
	 $(function(){
          var code="0" ;
          var PID = 0 ;
          var limit=0 ;
          var page=1 , oldPage=1 ;
          var n = 4 ;  
          var pagiNum ;
             function sendToServer (){
		$.ajax({
			url:"allProducts.php",
			method:'get',
			data:{  "code":code,
				"limit":limit,
				"PID":PID
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
	            $("table").append("<tr><th>Product</th><th>price</th><th>Image</th><th>Action</th></tr>");
	          for(var i=0 ; i< response['productsArray'].length ; i++){
  		    $("table").append('<tr id="'+i+'"><td>'+response['productsArray'][i]["name"]+'</td><td>'+response['productsArray'][i]["price"]+'</td><td><img width="60px" height="60px" src="images/'+response['productsArray'][i]["image"]+'"/></td><td><button class="Availability">Availability</button><button class="delete">Del</button><button class="edit">Edit</button></td></tr>'); 		  
  		  }	      
	     }
	      sendToServer (code,limit,PID) ;
	      
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
		sendToServer (code,limit,PID) ;
	  });
	 	  	  
	  $("table").on("click",".delete",function(){	     
	      code="1" ;
 	      PID = $(this).parent().parent().attr("id") ;
 	      console.log(PID) ;
              sendToServer (code,limit,PID) ;
              console.log("code"+code);
	  });
	
	$("table").on("click",".edit",function(){	     
	      code="2" ;
	      PID = $(this).parent().parent().attr("id") ;
 	      console.log(PID) ;
// 	      sendToServer (code,limit,PID) ;
	      console.log("code"+code);
	  });
 /////////----------------------------------------------
            var f = "true" ;
         $(".Availability").click(function(){
// 		$(this).attr('clicked','clicked');
// 		$(this).toggle();
                if(f == "true"){
//                      $(this).attr
                }else{
                
                }
		console.log("hi");
	  });
/////////////-----------------------------------------	
	  
      });

    </script>
    
    
    <style>
        .Availability{
                
        }
    </style>
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
					
					 <li class="ts"  ><a href="">HOME</a></li>
					    <li class="ts active" ><a href="allProduct.php">All products</a></li>
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
   <div class="form" style="width:900px ; min-height:400px ; margin:80px 200px 0 200px ">
        <p>All Products</p> 
       <span style="float:right;"><a href="addProduct.php" >add Product</a></span>
       <table class="table table-bordered myTable">
       <!--  
           <?php 
               require_once('tables.php') ;
               $product = new Products() ;           
               $res =  $product->select(); 
               
                for( $i =0 ; $i< count($res); $i++){
		    echo "<tr><td>".$res[$i][1]."</td>" ;
		    echo "<td>".$res[$i][4]." EPG</td>" ;
		    echo "<td><img width='60px' height='60px' src='images/".$res[$i][2]."'/></td>" ; 
		    echo "<td><button class='Availability' >Availability</button><button>DEL</button><button>Edit</button></td></tr>" ;        
              }
           ?>-->
               
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
  <br>
    </div>
</body>
</html>
