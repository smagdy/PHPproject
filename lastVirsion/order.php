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
    $(function(){      
          var code="0" ;
          var UID = 0 ;
          var limit=0 ;
          var page=1 , oldPage=1 ;
          var n = 2;  
          var pagiNum ;   
       var source = new EventSource("orders.php?code="+code+"&limit="+limit+"&UID="+UID+"");
		source.onmessage = function(event) {
			var x = JSON.parse(event.data);			
			pagiNum = Math.ceil(x.allRowsNum/n) ;
			showPagination (x) ;
			showTableData (x) ;
			
			console.log(x) ;
			console.log("allRowsNum : "+x.allRowsNum);
			console.log("pagiNum : "+pagiNum) ;
			console.log("length: "+x.ordersArray.length);
			console.log("limit : "+limit);
		
		};
		source.onerror = function(event) {		      
			console.log("error : "+event) ;
		};

   /*          function sendToServer (){
		$.ajax({
			url:"orders.php",
			method:'get',
			data:{  "code":code,
				"limit":limit,
				"UID":UID
			},
			success:function(response){
			        console.log(response);	
// 				response = JSON.parse(response);
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
      	*/ 
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
  		    $("table").append('<tr id="'+i+'"><td colspan="4"><img width="60px" height="60px" src="images/'+response['ordersArray'][i]["image"]+'"/>'+response['ordersArray'][i]["amount"]+'<td> <span style="float:left vertical-align:text-bottom;">Total : '+response['ordersArray'][i]["amount"]+'</span></td></td></tr>'); 		  
  		  }	      
	     }
	    
	   //   sendToServer (code,limit,UID) ;
	      
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
	        source = new EventSource("orders.php?code="+code+"&limit="+limit+"&UID="+UID+"");
                //  source = new EventSource("orders.php?limit="+limit+"");
                //  source = new EventSource(orders.php?limit=limit);
		//  sendToServer (code,limit,UID) ;
	  });
	/* 	  	  
	  $("table").on("click",".delete",function(){	     
	      code="1" ;
 	      UID = $(this).parent().parent().attr("id") ;
 	      console.log(UID) ;
              sendToServer (code,limit,UID) ;
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
			    <li  ><a href="">HOME</a></li>
			    <li><a href="allProduct.php">All products</a></li>
			    <li><a href="allUser.php">all users</a></li>
			    <li class="active" ><a href="order.php">Orders</a></li>
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
       <h2>Orders</h2><br/>
       <table class="table table-bordered orders">
           <!--<tr>
              <th>Order Date</th>
              <th>Name</th>
              <th>Room</th>
              <th>Ext.</th>
              <th>Action</th> 
           </tr>
           <tr>
              <td>2/12/2004</td>
              <td>Room</td>
              <td>Image</td>
              <td>Ext.</td>
              <td>Action</td> 
           </tr>
           <tr>
              <td colspan="5">
                  <ul style="float:left">
                     <li>                         
                         <figure>
			    <img src="images/O1.jpg"/>
			    <figcaption>Coffee</figcaption>
		         </figure>
                         <div>2</div>
                     </li>
                     <li>                         
                         <figure>
			    <img src="images/O2.jpg"/>
			    <figcaption>Coffee</figcaption>
		         </figure>
                         <div>2</div>
                     </li>
                     <li>                         
                         <figure>
			    <img src="images/O3.jpg"/>
			    <figcaption>Coffee</figcaption>
		         </figure>
                         <div>2</div>
                     </li>
                      <li>                         
                         <figure>
			    <img src="images/O4.jpg"/>
			    <figcaption>Coffee</figcaption>
		         </figure>
                         <div>2</div>
                     </li>
                     
                  </ul>
                  <span style="float:left ver-align:bottom">Total : 500 EPG </span>
              </td>
           </tr>-->
           
       </table>
       
      
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
