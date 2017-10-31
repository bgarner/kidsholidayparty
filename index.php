<?php

//connect to DB
// $host = "calmys1db01.fglsports.dmz";
// $user = "kidsparty";
// $pass = "kidsparty";
// $db = "kidsparty";

$host = "localhost";
$user = "root";
$pass = "root";
$db = "kidsparty";

$connection = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$q = "select (select sum(numberofadults) from parents) + (select count(*) from kids) as total";
$result = mysqli_query($connection, $q) or die ("Error in query: $q. ".mysqli_error($connection));
$r = $result->fetch_assoc();

$count = $r['total'];

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>2017 FGL Kid's Holiday Party</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="/css/formValidation.min.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">    
        <!--[if IE 8]>
        <link rel="stylesheet" href="ie8.css">
		<![endif]-->

    </head>

    <body>

		<div id="container">

			<div id="form-div">
			<div id="subheading">
				<h4>2017 FGL Kids' Holiday Party</h4>
				<h5>November 19, 2017 &nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;&nbsp;&nbsp; 8:30AM – 12:00PM  &nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="https://www.google.ca/maps/place/Deerfoot+Inn+%26+Casino/@50.9495439,-113.9831875,15z/data=!4m5!3m4!1s0x0:0x1a1955ecb48ca993!8m2!3d50.9495439!4d-113.9831875">Deerfoot Inn</a></h5>
				<center><h3>Space is limted, availability is first come, first serve.</h3></center>
			</div>
			<?php
			if($count < 400){
			?>
				<form id="regform">

					<script type="text/javascript">
						var uniqid = Date.now();
						document.write('<input type="hidden" id="uid" name="uid" value="'+ uniqid +'" />'); 
					</script>

					<!-- <h2>Conference Registration</h2> -->
					<h1>Parent Information</h1>
					<table id="personal-table">
						<tr>
							<td colspan="2"></td>
							<td colspan=""><span class="req">* = required field</span></td>
						</tr>					
						<tr>
							<td><label id="label-first"><span class="req">*</span>First<br />Name</label></td>
							<td colspan="2"><input type="text" class="form-control" id="firstname" name="firstname"></input></td>
							
							<td><label id="label-last"><span class="req">*</span>Last<br />Name</label></td>
							<td colspan="2"><input type="text" class="form-control" id="lastname" name="lastname"></input></td>																					
						</tr>
						
						<tr>
							<td><label id="label-email"><span class="req">*</span>Email</label></td>
							<td colspan="5"><input type="text" class="form-control" id="email" name="email"></input></td>
						</tr>
						
						<tr>
							<td colspan="3"><label id="label-adult-number"><span class="req">*</span>Number of Adults Attending</label></td>
							<td colspan="1">
								<!-- <input type="text" class="form-control" id="numberofadults" name="numberofadults" style="width: 40px;"></input> -->
							    <select class="form-control" name="numberofadults" id="numberofadults">
								  <option value="1">1</option>
								  <option value="2">2</option>
								</select>
							</td>
						</tr>
						

					</table>
					<br />
					
					<h1 id="activity-header">Children Information</h1>
						<input type="hidden" name="kids" id="kids" value="0" />

						<p class="addchild">ADD A CHILD <button type="button" class="btn btn-default btn-xs addButton"><i class="fa fa-plus"></i></button></p>

						<div id="kidspace"></div>
					<br />
					<div id="sendemail"></div>
					<button type="" class="btnsubmit" id="formsubmit">Send Registration</button>
				</form>
			<?php 
			} else {
			?>
				<h2>Registration is Full</h2>
				
			<?php
			}
			?>
			</div>
		
		</div>


		<div class="form-group hide" id="optionTemplate">
		    <div class="col-xs-4">
		        <input type="text" class="form-control" name="childname" placeholder="Name" />
		    </div>
		    <div class="col-xs-2">
		    <select class="form-control" name="childgender">
			  <option value="male">M</option>
			  <option value="female">F</option>
			</select>
		        
		    </div>
		    <div class="col-xs-2">
		        <input type="text" class="form-control" name="childage" placeholder="Age" />
		    </div>
		    <div class="col-xs-3">
		        <input type="text" class="form-control" name="childallergies" placeholder="Allergies" />
		    </div>

		    <div class="col-xs-1">
		        <button type="button" class="btn btn-default btn-xs removeButton show"><i class="fa fa-minus"></i></button>
		    </div>
		    <br /><br />
		
		</div>	

		
       	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
       	<script type="text/javascript" src="/js/bootstrap.min.js"></script>

       	<!-- FormValidation plugin and the class supports validating Bootstrap form -->
		<script type="text/javascript" src="/js/formValidation.min.js"></script>
		<script type="text/javascript" src="/js/framework/bootstrap.min.js"></script>

		<script type="text/javascript" src="/js/validate.js"></script>
		<!-- <script type="text/javascript" src="/js/contact.js"></script> -->
		<script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>
		<script type="text/javascript">
		  $.backstretch("/images/candycanes.jpg");
		</script>
		


    </body>

</html>