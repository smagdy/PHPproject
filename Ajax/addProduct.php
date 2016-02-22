<!DOCTYPE >
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Product</title>
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
</head>
<script src="js/jquery-1.11.2.js"></script>
<script src="js/bootstrap.min.js" ></script> 
<script>
	
	 $(function() {
                $.ajax({
                    url: "allCategory.php",
                    method: 'get',
                    data: {
                        "all":"all"
                    },
                    success: function (response) {
                        console.log(response);
                       for(var i=0;i<response.length;i++){
                          $('#category').html($('#category').html()+"<option value= "+(i+1)+" >"+response[i][1]+"</option>");
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
                $("#saveCategory").click(function(){
		         $.ajax({
		            url: "allCategory.php",
		            method: 'get',
		            data: {
		                'categoryName':$("#newCategory").val()
		            },
		            success: function (response) {
		                console.log(response);
		                $('#category').html("");
		               for(var i=0;i<response.length;i++){
		                  $('#category').html($('#category').html()+"<option value= "+(i+1)+" >"+response[i][1]+"</option>");
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
        });

</script>
<body>
   
     <div class="header navbar-fixed-top">
	      <div class="header_top">
	            <div class="menu">
		      <nav>
			  <ul>
				<li class="active" ><a href="adminHome.php">HOME</a></li>
				<li><a href="allProducts.html">All products</a></li>
				<li><a href="allUsers.html">all users</a></li>
				<li><a href="orders.html">Orders</a></li>
				<li><a href="check.html">Checks</a></li>	
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
	
   <div class="container form " style="width:900px ; min-height:400px ; margin:100px 200px">
       <h2>Add Product</h2><br/>
       <form action="addProductAdmin.php" method="post" enctype="multipart/form-data" >
            <div class="row">
                 <span class="col-lg-2"><label>Product</label></span>
                 <span class="col-lg-6"><input type="text" name="nameProduct" /></span>
            </div>
            <br/>
            <div class="row">
                 <span class="col-lg-2"><label>Price</label></span>
                 <span class="col-lg-2"><input type="number" step=".5" min="1" max="20" name="price_prodect"  />&nbsp;&nbsp;EPG</span>
            </div>
            <br/>
            <div class="row">
                 <span class="col-lg-2"><label>Category</label></span>
                 <span class="col-lg-3"><select name="category" id="category">
                       <!--<option  value="Hot drinks">Hot drinks</option>
                       
                       
                       
                       <option  value="Cold drinks">Cold drinks</option>-->
                 </select></span>
    <!--------------------------------------------------------------------------------------------------------------->
      
  <!---------------------------------------------- model  --------------------------------------------------------->               
   <span><a data-toggle="modal" href="#myModal" >Add Category</a><span>
		<div class="modal" id="myModal"  role="dialog">
			<div class="modal-dialog">
			<div class="modal-content" style="padding:25px;display:block;font-family:'Open Sans';font-size:16; sans-serif; color:#82592D;padding-bottom:5px" >
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">				
					<span aria-hidden="true">&times;</span>				
					<span class="sr-only">Close</span>					
				</button>
				<h3 class="modal-title">Add Category</h3><br>
				</div>
				
				<div class="modal-body"><br>
				   <label>Category Name : </label><br><br>
				   <input type="text" name="newCategory" class="form-control" id="newCategory" /><br>
				</div>
				<div class="modal-footer"><br>
				 <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveCategory">Save</button>
				 <button class="btn btn-danger" data-dismiss="modal">Cancel</button><br><br>
				</div>
			</div>
			</div>
		</div>
    
		     
  <!------------------------------------------------------------------------------------------------------------------------->               
                             
                
            </div>
          <!--  <br/>
            <div class="row">
                 <div class="col-sm-2"><label>Product image</label></div>                 
                     <div class="col-sm-4">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <label for="Pimage">Upload Image</label>
                        <input type="file" name="Pimage" id="Pimage"/>                    
                       </div>
              </div>       -->    
                       
          <div class="row">
                      <span class="col-sm-2"><label>Product image</label></span>
                      <div class="col-lg-2 fileUpload btn btn-warning" style="color:white">
			  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			  <span><label for="Pimage">Upload Image</label></span>
			  <span class="col-lg-2"><input type="file" name="pimage"  class="upload" id="Pimage" /></span>
		     </div>
           </div>
                 
          
            <br/><br/>
            <div class="row">
                 <span class="col-lg-2 col-xs-offset-3"><input type="submit" value="Save" name="save"  class="myButton"/></span>
                 <span class="col-lg-2"><input type="reset" name="reset"   class="myButton"/></span>
            </div>
       </form> 
   </div>
   
   <div class="copy-right navbar-fixed-bottom"  style="margin-bottom:0px">
        <p>&copy; 2016 All Rights Reserved | Designed by <a href="#">LIONS</a></p> 
   </div>
    
</body>
</html>
