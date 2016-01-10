<?php
	session_start();

	if(isset($_SESSION['username'])&&isset($_SESSION['type'])){
			header('Location:index.php');
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<script src="asset/js/login.js"></script>
		<title>Musix Cloud Admin Login</title>
		<style>
		#headhead{
			text-align: center;
			font-size: 25px;
		}
		#login{
			padding-top: 40px;
			max-width: 500px;
			margin:auto;
		}
		#loginform{
			margin:auto;
		}
		.panel-custom{
			background-color: #a3d3ff;
			
		}
		</style>
	</head>
	<body>
		<div class="container">
		<div class="row"></div>
		
		
			 <div id="login" class="">
			 	<div id="loginform">
					<div class="panel-group">
					  <div class="panel panel-default">
					    <div class="panel-custom" id="headhead">Musix Cloud Admin Login</div>
     					 <div class="panel-body">
     					 	<form role="form" method="POST">
								  <div class="form-group">
								    <label for="username">Username:</label>
								    <input type="username" class="form-control" id="username">
								  </div>
								  <div class="form-group">
								    <label for="pwd">Password:</label>
								    <input type="password" class="form-control" id="pwd">
								  </div>
								  <button type="submit" id="loginbtn" class="btn btn-primary xlg">Login</button>
								  <button type="reset" id="resetbtn" class="btn btn-danger xlg">Reset</button>
     					 	</form>
     					 </div>
					  </div>
					</div>
					<div id="message"></div>
			 	</div>
			 
			 
			 </div>
			 
		</div>
	</body>
</html>