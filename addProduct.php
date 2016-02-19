<!DOCTYPE >
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Product</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
  <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<script src="js/jquery-1.11.2.js"></script>
<script src="js/bootstrap.min.js" ></script> 
<script>


</script>
<body>
   <div class="container form " style="width:900px ; min-height:400px ; margin:100px 200px">
       <h2>Add Product</h2><br/>
       <form action="addProductAdmin.php" method="post">
            <div class="row">
                 <span class="col-lg-2"><label>Product</label></span>
                 <span class="col-lg-6"><input type="text" name="nameProduct" /></span>
            </div>
            <br/>
            <div class="row">
                 <span class="col-lg-2"><label>Price</label></span>
                 <span class="col-lg-2"><input type="number" step=".5" min="1" max="20" name="price_prodect"  />&nbsp; &nbsp;EPG</span>
            </div>
            <br/>
            <div class="row">
                 <span class="col-lg-2"><label>Category</label></span>
                 <span class="col-lg-3"><select name="category">
                       <option  value="Hot drinks">Hot drinks</option>
                       <option  value="Cold drinks">Cold drinks</option>
                 </select></span>
                 <span><a href="">Add category</a></span>                
                
            </div>
            <br/>
            <div class="row">
                 <div class="col-sm-2"><label>Product image</label></div>                 
                     <div class="col-sm-4">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <label for="Pimage">Upload Image</label>
                        <input type="file" name="Pimage" id="Pimage"/>
                       
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