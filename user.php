<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	if($_SESSION['type']=='musicadmin'){
		header("Location:login.php?usermsg=permission");
	}
	require 'asset/userfunction.php';
	require 'asset/count.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="favicon.ico">
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.theme.min.css">
		<script type="text/javascript" src="asset/js/adminscript.js"></script>
		<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="asset/css/nav.css">
		<script type="text/javascript" src="asset/js/shuser.js"></script>
		<script src="asset/js/search.js" charset="utf-8"></script>
		<title>MusixCloud <?php echo $_SESSION['type'];?></title>
	</head>
	<body>
		<nav class="navbar navbar-custom">
		  <div class="container-fluid">
		    <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navmenu">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
     		</button>
		      <a class="navbar-brand"><i class="fa fa-tachometer"></i> MusixCloud <span class="hidden-xs"><?php echo $_SESSION['type'];?></span> dashboard</a>
		    </div>
		    <div class="collapse navbar-collapse" id="navmenu">
		      <ul class="nav navbar-nav">
		        <?php require 'asset/navbar.php';?>
		      </ul>
				<ul class="nav navbar-nav navbar-right">
			    	<li><a href="logout.php"> <span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
		    </div>
		  </div>
		</nav>

		<div class="container">
			 <div id='showuser'>



				<div class="table-responsive">
					<span class="" id="headhead"><h3>Musix Cloud User List <span class="badge"></span></h3></span>
					<span style="max-width:500px; float:right;" id="searchbar">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-search"></span>
								<input type="text" class="form-control" id="searchinput" placeholder=" Search for...">
							</div>
						</div>
					</span>
				<table class="table table-hover" id="shusertable">
				    <thead>
				      <tr>
				        <th>User ID</th>
				        <th>Email</th>
				        <th>Fullname</th>
								<th>View</th>
				      </tr>
				    </thead>
				    <tbody id="userlist" class="searchdata">
				    </tbody>
				  </table>
				  </div>

			 </div>
		</div>

		<!--User View Modal-->
		<div class="modal fade" id="userviewmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id=""><span class="viewuid"></span> <span class="viewfullname"></span> -- View User</h4>
		      </div>
		      <div class="modal-body">
						<div class="list-item">
							<ul class="list-group">
							  <li class="list-group-item"><b>User ID: </b> <span class="viewuid"></span></li>
								<li class="list-group-item"><b>Facebook ID: </b><span class="viewfbid"></span></li>
								<li class="list-group-item"><b>Fullname: </b><span class="viewfullname"></span></li>
								<li class="list-group-item"><b>Email: </b><span class="viewemail"></span></li>
								<li class="list-group-item"><b>Type: </b><span class="viewtype"></span></li>
								<li class="list-group-item"><b>Gender: </b><span class="viewgender"></span></li>
								<li class="list-group-item"><b>Date of birth: </b><span class="viewdob"></span></li>
								<li class="list-group-item"><b>Expiry Date: </b><span class="viewexp"></span></li>
								<li class="list-group-item"><b>Register Date: </b><span class="viewregdate"></span></li>
								<li class="list-group-item"><b>Register IP: </b><span class="viewregip"></span></li>
								<li class="list-group-item"><b>Token: </b><span class="viewtoken"></span></li>
							</ul>
						</div>
		      </div>
		    </div>
		  </div>
		</div>
		<!--End User View Modal-->
	</body>
</html>
