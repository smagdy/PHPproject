<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>All Products</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <!--<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />-->
</head>
    <script src="js/jquery-1.11.2.js"></script>
<!--    <script src="js/bootstrap.min.js" ></script> -->
    <script>
        $(document).ready(function(){
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
	});
    </script>
    <style>
        .Availability{
                
        }
    </style>
<body>
   <div class="container form" style="width:900px ; min-height:400px ; margin:100px 200px">
       <h2>All Products</h2><br/>
       <span style="float:right;"><a href="addProduct.html" >add Product</a></span>
       <table class="table table-bordered myTable">
           <tr>
              <th>Product</th>
              <th>price</th>
              <th>Image</th>
              <th>Action</th> 
           </tr>
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
           ?>
               
       </table>
      
   <div class="row">
       <nav class=" col-xs-offset-4 navPagi">
          <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                     <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
          </ul>
        </nav>
   </div>
       
   </div>
    
   <div class="copy-right navbar-fixed-bottom"  style="margin-bottom:0px">
        <p>&copy; 2016 All Rights Reserved | Designed by <a href="#">LIONS</a></p> 
   </div>
    
</body>
</html>
