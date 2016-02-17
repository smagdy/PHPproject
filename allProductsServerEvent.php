
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
      
 