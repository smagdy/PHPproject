$(function(){
//---------------------------------------------------------------------------------------------------------
		$.ajax({
		url:"Ajax/home_user_Ajax.php",
		method:'get',
		data:{
			"value":'ALL'	
		},
		success:function(response){
		$('#display').html(response);
			//console.log(error);
		
		}	
	});

$("#search_input").keyup(function(e){
var result=$("#search_input").val();
	//alert("dddd");
		$.ajax({
		url:"Ajax/home_user_Ajax.php",
		method:'get',
		data:{
			"value":result
			
		},
		success:function(response){
		$('#display').html(response);
		
		}	
	});

});


//-------------------------------------------------------------------------------------------------------
	var sumOrder=0;
	$("#display").on('click','.price',function(){
	var price =$(this).parent("span").parent("div").prev("input").attr("name");
	var prod_id =$(this).parent("span").parent("div").prev("input").prev("input").attr("name");
	var name =$(this).parent("span").parent("div").prev("input").prev("input").prev("img").attr("name");
	sumOrder=parseInt(sumOrder) + parseInt(price);
	$("#mytotal").html(sumOrder);
		if(document.getElementById(name)){
			var myval = parseInt($("#"+name).children("td").next("td").children("input").attr("value"));
			myval= myval + 1;
			price = price * myval;	
			$("#"+name).children("td").next("td").children("input").attr("value" ,myval);
			$("#"+name).children("td").next("td").next("td").children("label").children("h3").text(price);
		}
		else
		{
			$("#myOrders").append('<tr id="'+name+'"><td><button name="delete" >Delete</button></td><td><h3>'+name+'</h3></td><td><input type="button" value="+" name="sum" /><input type="button" value="-" name="sub" /><input type="text"  class="myInc" name="prod_id"/></td><td><label name="result"><h3>'+price+'</h3></label></td><td><label name="coin"><h4>EGP</h4></label> </td>  </tr>');
		}
		
	//<td><input type="number" class="myInc" name="prod_id" placeholder="counter"value="1"  min="1" step="1" max="100"></td>	
	
	
});

$("#mySubmit").click(function(){
	var tota ;
	var name_order=$("#myOrders").children("tr").attr("id");
	console.log(name_order);
	//var count_order=$("#")
	var count_order=$("#myOrders").children("tr").children("td").next("td").chilren("h3").text();
	console.log(count_order);
		
	


});





$("#myOreder #cola td:first button").click(function(e){
		   console.log("dqqqqqqqqqqqqe");
		
		});

/*$('#myOrder tr td:frist button').click(function(e){
       var s =e.target.id;
        console.log(s);
	$('#r'+s).remove();
	numRow--;
}); */
 


	

	$(".myInc").change(function(){
	alert("SSSSSSS");	
});









	
});
