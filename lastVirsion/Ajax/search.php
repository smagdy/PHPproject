<?php
$(function(){

$("#search").keyup(function(e){
var result=("#search").val();
		$.ajax({
		url:"home_user_Ajax.php",
		method:'get',
		data:{
			"value":result
			
		},
		success:function(response){
		$('#display').html(response);
		},
		error:function(ayaad,status,error){
			console.log(error);
		},
		complete:function(ayaad){
			console.log("Complete ");
		}
		//dataType:'xml',
		//async:true

	});

     });
});


?>
