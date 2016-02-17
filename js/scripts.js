$(function(){
//---------------------------------------------------------------------------------------------------------




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
			console.log(error);
		
		}
		

	});

});


//-------------------------------------------------------------------------------------------------------
	var sumOrder=0;

	$(".price").click(function(){
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
			$("#myOrders").append('<tr id="'+name+'"><td><h3>'+name+'</h3></td><td><input type="number" class="myInc" name="prod_id" placeholder="counter"value="1"  min="1" step="1" max="100"></td><td><label name="result"><h3>'+price+'</h3></label></td><td><label name="coin"><h4>EGP</h4></label> </td></tr>');
		}
	
	

});
	$(".myInc").change(function(){
	alert("SSSSSSS");	
});









	
});
