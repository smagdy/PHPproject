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
		}	
	});
	$.ajax({
		url: "selectRoom.php",
		method: 'get',
		data: {
			"all":"all"
		},
		success: function (response) {
			console.log(response);
			for(var i=0;i<response.length;i++){
				$('#roomNum').html($('#roomNum').html()+"<option value= "+(i+1)+" >"+response[i][1]+"</option>");
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

$("#search_input").keyup(function(e){
var result=$("#search_input").val();
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

	$("#display").on('click','.price',function(){
		var sumOrder=parseInt($("#mytotal").text());
		var price =$(this).parent("span").parent("div").prev("input").prev("input").prev("input").attr("name");
		var prod_id =$(this).parent("span").parent("div").prev("input").prev("input").prev("input").prev("input").attr("name");
		var name =$(this).parent("span").parent("div").prev("input").prev("input").prev("input").prev("input").prev("img").attr("name");
		var pid=$(this).parent("span").parent("div").prev("input").prev("input").val();
		var uid=$(this).parent("span").parent("div").prev("input").val();
		sumOrder+=parseInt(price);
		$("#mytotal").text(sumOrder);
		if(document.getElementById(pid)){
			var myval = parseInt($("#"+pid).children("td").next("td").children("input").attr("value"));
			myval= myval + 1;
			price = price * myval;
			$("#"+pid).children("td").next("td").children("input").attr("value" ,myval);
			$("#"+pid).children("td").next("td").next("td").children("label").children("h3").text(price);
		}
		else
		{
			$("#myOrders").append("<tr id='"+pid+"' name='"+uid+"' ><td><h3>"+name+"</h3></td><td><button class='btn btn-danger decrease'> - </button></td><td><input type='text'  style='width: 30px;' value='1'/></td><td><button class='btn btn-success increase'> + </button></td><td><label name='result'><h3>"+price+"</h3></label></td><td><label name='coin'><h4>EGP</h4></label> </td><td><button class='btn btn-danger delete' >delete</button></td>  </tr>");
		}
	});
	$('#myOrders').on('click','.decrease',function(){
		var amount=parseInt($(this).parent().next().children().val());
		var p=parseInt($(this).parent().next().next().next().children().children().text());
		var priceOfoneItem=p/amount;
		amount-=1;
		if(amount>0) {
			$(this).parent().next().children().val(amount);
			var priceOfAllItems=priceOfoneItem*amount;
			$(this).parent().next().next().next().children().children().text(priceOfAllItems);
			var total=parseInt($('#mytotal').text());
			total-=priceOfoneItem;
			$('#mytotal').text(total);
		}
	});
	$('#myOrders').on('click','.increase',function(){
		var amount=parseInt($(this).parent().prev().children().val());
		var p=parseInt($(this).parent().next().children().children().text());
		var priceOfoneItem=p/amount;
		amount+=1;
		$(this).parent().prev().children().val(amount);
		var priceOfAllItems=priceOfoneItem*amount;
		$(this).parent().next().children().children().text(priceOfAllItems);
		var total=parseInt($('#mytotal').text());
		total+=priceOfoneItem;
		$('#mytotal').text(total);
	});
	$('#myOrders').on('click','.delete',function(){
		var parent=$(this).parent().parent();
		var amount=parseInt($(this).parent().prev().prev().children().children().text());
		var total=parseInt($('#mytotal').text());
		total-=amount;
		$('#mytotal').text(total);
		$('#myOrders').find(parent).remove();
	});

	$("#mySubmit").click(function(){
	var name_order=$("#myOrders tr");

		console.log(name_order);
	/*for(var i=0;i<name_order.size();i++){
		$.ajax({
			url:"Ajax/home_user_Ajax.php",
			method:'get',
			data:{
				"uid":node.attr('name'),
				"pid":node.attr('id'),
				"comment":
			},
			success:function(response){
				$('#display').html(response);
			}
		});
			var node = $(name_order.get(i));
			var pid = node.attr('id');
			var uid = node.attr('name');
			var order =new Orders();
			console.log(pid+","+uid);
	}*/
});
});
