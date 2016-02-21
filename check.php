<?php
require('tables.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Checks </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style1.css">
	<script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.9.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script>
		$(function() {
			$.ajax({
				url: "selectUsers.php",
				method: 'get',
				data: {
					'uid':$('#users').val()
				},
				success: function (response) {
					for(var i=0;i<response.length;i++){
						$('#users').html($('#users').html()+"<option value= "+response[i][0]+" >"+response[i][1]+"</option>");
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
			////////////////////////////////////////////////////////////////////////////////
			function allOrders(){
				$.ajax({
					url:"ajaxCheck.php",
					method:'get',
					data:{
						'uid':$('#users').val()
					},
					success:function(response){
						console.log(response);
						bulidTable(response);
					},
					error:function(xhr,status,error){
						console.log(error);
					},
					complete:function(xhr){
						console.log("Complete ");
					},
					dataType:'json',
					async:true
				});
			}
			allOrders();
			$('#users').change(function(){
				if($(this).val() == "all")
					$("tr[id ^='Uid']").show();
				else {
					$target = $(('#Uid' + $(this).val()));
					$("tr[id ^='Uid']").hide();
					$target.show();
				}
				//allOrders();
			});
			$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
			$( ".datepicker" ).change(function(e){
				if($( "#datetimepicker1").val() == "" && $( "#datetimepicker2").val() == "") {
					allOrders();
				}
				else {
					if ($("#datetimepicker1").val() != "" && $("#datetimepicker2").val() != "") {
						var from = $("#datetimepicker1").val();
						var to = $("#datetimepicker2").val();
					}else if ($("#datetimepicker1").val() == "" && $("#datetimepicker2").val() != "") {
						var from = '1990-01-01';
						var to = $("#datetimepicker2").val();
					}else{
						var from = $("#datetimepicker1").val();
						var to = '2020-01-01';
					}
					$.ajax({
						url: "ajaxCheck.php",
						method: 'get',
						data: {
							"to": to,
							"from": from,
							'uid':$('#users').val()
						},
						success: function (response) {
						console.log(response);
						bulidTable(response);
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
				}
			});


			function bulidTable(userdata) {
				$('.Utbody').html("");
				var t="";
				for (var u = 0; u < userdata.length; u++) {
					t+="<tr id='Uid"+userdata[u]['uid']+"'><td>"+userdata[u]['name']+"<a data-toggle='collapse' data-target='#U" + (u + 1) + "'>+</a></td><td>" + userdata[u]['total'] + " LE </td>";
					t += "<tr><td colspan='2'><div id='U" + (u + 1) + "' class='collapse'> <pre>";
					t+="<table class='table  table-bordered table-hover'><thead><tr><th>Order Data</th><th>Status</th><th>Amount</th><th>Action</th></tr></thead><tbody class='tbody'>";
					data=userdata[u]['orders'];
					for (var i = 0; i < data.length; i++) {
						t+= " <tr><td>" + data[i]['orderDate'] + " <a data-toggle='collapse' data-target='#" +(u+1)+"-" +(i + 1) + "'>+</a></td><td>" + data[i]['status'] + "</td><td>" + data[i]['amount'] + " LE </td>";
						if (data[i]['status'] == 'processing')
							t += "<td><button class='action' id='" + data[i]['oid'] + "'> Cancel</button></td></tr>";
						else t += "<td></td></tr>";
						t += "<tr><td colspan='4'><div id=" + (u+1)+"-" +(i + 1) + " class='collapse'> <pre>";
						for (var j = 0; j < data[i]['products'].length; j++) {
							if (j % 3 == 0)  t += "<div class='row'>";
							t += "<div class='col-sm-4' >";
							t += "<img src='" + data[i]['products'][j]['picture'] + "' class='img-rounded' height='125' width='125'/>"
							t += "<br><span align='center'>" + data[i]['products'][j]['pname'] + "</span>";
							t += "<br><span align='center'>" + data[i]['products'][j]['price'] + " LE</span>";
							t += "<br><span align='center'>#" + data[i]['products'][j]['numofItems'] + "</span></div>";
							if (j % 3 == 0&&j!=0) t += "</div>";
							if(data[i]['products'].length==1)t += "</div>";
						}
						t += "</pre></div></td></tr>";
					}
					t += "</tbody></table></pre></div></td></tr>";
					$('.tbody').on('click', 'a', function () {
						if ($(this).text() == "+") {
							$(this).text("-");
						}
						else {
							$(this).text("+");
						}
					});
					$('.tbody').on('click', '.action', function () {
						$.ajax({
							url: "ajaxCheck.php",
							method: 'get',
							data: {
								"oid": $(this).attr('id')
							},
							success: function (response) {
								console.log(response);
							},
							error: function (xhr, status, error) {
								console.log(error);
							},
							complete: function (xhr) {
								console.log("Complete ");
							},
							async: true
						});
						$(this).parent().prev().prev().text("canceled");
						$(this).closest('td').remove();
					});
				}
				$('.Utbody').on('click', 'a', function () {
					if ($(this).text() == "+") {
						$(this).text("-");
					}
					else {
						$(this).text("+");
					}
				});
				$('.Utbody').html($('.Utbody').html() + t);
			}
		});
	</script>

	<style type="text/css">
		.ui-datepicker {
			background-color:aliceblue;
			font-size: 9pt !important;
		}
	</style>
</head>
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

							<li class="ts"  ><a href="adminHome.php">HOME</a></li>
							<li class="ts" ><a href="allProduct.php">All products</a></li>
							<li class="ts" ><a href="allUser.php">All users</a></li>
							<li class="ts" ><a href="order.php">Orders</a></li>
							<li class="ts active"><a href="check.php">Checks</a></li>

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
		<!------------------------------------>
		<div class="row">

			<p> Checks </p>
		</div>
		<!----------------------------------------------------------------------------------------------------->
		<div class="row">
			<div class='col-sm-1'></div>
			<div class='col-sm-4'>
				<div class="form-group">
					<div class="input-group date" >
						<input type='text' class="form-control datepicker" id='datetimepicker1' />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
					</div>
				</div>
			</div>

			<div class='col-sm-4'>
				<div class="form-group">
					<div class="input-group date" >
						<input type='text' class="form-control datepicker" id='datetimepicker2'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
					</div>
				</div>
			</div>
		</div>
		<br>
		<!-------------------------------------------------users---------------------------------------------------->
		<div class="row">
			<div class='col-sm-1'></div>
			<div class='col-sm-4'>
				<div class="form-group">
					<div>
						<select class="element select medium  form-control" id="users" name="users" >
							<option value="all" selected="selected">All Users</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<!----------------------------------------------------------------------------------------------------->
		<!----------------------------------------------------------------------------------------------------->
		<div class="row">

			<div class="col-sm-1" ></div>
			<div class="col-sm-8" >
				<table class="table  table-bordered table-hover">
					<thead>
					<tr>
						<th>User Name</th>
						<th>Amount</th>
					</tr>
					</thead>
					<tbody class="Utbody">
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<!----------------------------------------------------------------------------------------------------->
	</div>  <!---------- container ---------------->
</body>

</html>
