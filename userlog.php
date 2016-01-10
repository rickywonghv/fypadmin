<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	if($_SESSION['type']!='superadmin'){
		header("Location:login.php?usermsg=permission");
	}
	require 'asset/export.php';
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
		<script type="text/javascript" src="asset/js/userlog.js"></script>
		<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="asset/css/nav.css">
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
		<div id="msg">
			<div class="alert alert-info">Time Zone: Hong Kong</div>
		</div>
		<div id="dellog">
		Delete records (4 days ago):
			<button class="btn btn-danger xlg" id="delbtn" onclick=dellog()>Delete</button>
			<button class="btn btn-success right" id="exbtn" data-toggle="modal" data-target="#exmodal"><span class="glyphicon glyphicon-export"></span> Export Logging</button>
		</div>
		<div class="panel-group">
					  <div class="panel panel-default">
					    <div class="panel-heading" id="headhead">Musix Cloud Admin Logging</div>
     					 <div class="panel-body">
     					 	<div id="logtable">
				     		<div class="table-responsive">
							<table class="table table-hover table-striped">
							    <thead>
							      <tr>
							        <th>Log ID</th>
							        <th>User ID</th>
							        <th>User Username</th>
							        <th>Date</th>
							        <th>Time</th>
							        <th>IP Address</th>
							        <th>Country Name</th>
							        <th>Latitude</th>
							        <th>Longitude</th>
							      </tr>
							    </thead>
							    <tbody id="listlog">
							    </tbody>
							  </table>
							</div>
							</div>
     					 </div>
     					</div>
     				   </div>

			<!--Export Modal-->
			<div id="export">
			<div id="exmodal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"><span class="glyphicon glyphicon-export"></span>Export User Logging</h4>
			      </div>
			      <div class="modal-body">
			      <form id="exportform" method="POST" action="asset/export.php?table=userlog">
			      	<div class="form-group">
							<label for="exname">Export file name:</label>
						 <input type="text" class="form-control" name="ename" id="ename" value="userlog<?php echo date('Y-m-d');?>">
					 </div>
					 <div class="form-group">
					 	<label for="exformat">Export Format</label>
							<select class="form-control" id="exformat" name="format">
							    <option name="format" value="xls">xls</option>
							    <option name="format" value="csv">csv</option>
							    <!--<option name="format" value="sql">sql</option>-->
							 </select>
					 </div>
					 <div id="callmsg"></div>
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" name='subex' class="btn btn-success">Export</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			      </form>
			    </div>

			  </div>
			</div>
			</div>
			<!--Export Modal End-->
		</div>

	</body>
</html>
