<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
	if($_SESSION['type']!='superadmin'){
		header("Location:index.php?msg=noper");
	}
	require 'asset/count.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="favicon.ico">
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="asset/css/nav.css">
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.theme.min.css">
		<script type="text/javascript" src="asset/js/adminscript.js"></script>
		<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
		<script src="asset/js/search.js" charset="utf-8"></script>
		<script src="asset/js/detect.js" charset="utf-8"></script>
		<title>MusixCloud <?php echo $_SESSION['type'];?></title>
	</head>
	<body>
		<input type="hidden" id="sesaid" value=<?php echo $_SESSION['aid'] ?>>
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
		<div class="showmsg">
			<?php
				if(isset($_GET['msg'])){
					if($_GET['msg']=='passNm'){
						echo "<div class='alert alert-warning'><strong>Warning!</strong>Password are not match!</div>";
					}
				}
			?>
		</div>
		<div class="notSupport"></div>


		<div class="adminshow">
						<div class="" id="headhead"><h3>Admin List <span class="badge"><?php countadmin();?></span></h3></div>
						<span style="max-width:500px; float:right;" id="searchbar">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-search"></span>
								  <input type="text" class="form-control" id="searchinput" placeholder=" Search for...">
								</div>
							</div>
						</span>
						<button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"></span>Add Admin</button>
							 <table class="table table-hover table-responsive">
								 <thead><tr><th>Admin ID</th><th>Username</th><th class="hidden-xs">Admin Type</th><th>Change Type</th><th>Block</th></tr></thead>
								 <tbody class="admindisplay searchdata"></tbody>
							 </table>

</div>
			<!-- Add Model-->
			<div id="addModel">
					<!--Admin Add Modal-->
					<div id="add" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title">Administrator Add</h4>
					      </div>
					      <div class="modal-body">
					        <form role="form" method="post">
								<div class="form-group">
								    <label for="username">Username:</label>
								    <input type="text" class="form-control" name="user" id="user">
								  </div>
									<div class="form-group">
								    <label for="pwd">Password:</label>
								    <input type="password" class="form-control" name="pwd" id="pwd">
								  </div>
								  <div class="form-group">
								    <label for="pwdb">Confirm Password:</label>
								    <input type="password" class="form-control" name="pwdb" id="pwdb">
								  </div>
								  <div class="form-group">
										<label class="checkbox-inline">
									      <input type="radio" name="type" id="typesu" value="superadmin" checked> Super Admin
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="type" id="typeadmin" value="admin"> Admin
									   </label>
									   <label class="checkbox-inline">
									      <input type="radio" name="type" id="typemusic" value="musicadmin"> Music Admin
									   </label>
									</div>
								  <button type="submit" id="addAdminBtn" class="btn btn-primary btn-lg">Add</button>

					        </form>
					        <div id="response"></div>
					      </div>
					    </div>

					  </div>
					</div>
					<!--End Admin Add Modal-->
			</div>
			<!--End Add Model-->
	<div id="success"></div>

     	</div>

			<!-- Edit Model-->
			<div id="editModel">
					<!--Admin Edit Modal-->
					<div id="adminEdit" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"><b>Administrator Edit</b></h4>
								</div>
								<div class="modal-body">
									<form role="form" method="post">
										<div class="form-group">
											<span class="label label-default"><b>Admin ID:</b></span> <span id="editaid"></span>
										</div>
								<div class="form-group">
										<span class="label label-default"><b>Username:</b></span>
										<span id="editauser"></span>
									</div>
									<div class="form-group">
										<span class="label label-default" id="statuslab"><b>Status:</b></span> <span id="adminstatus"></span>
									</div>
									<div class="form-group">
										<select class='form-control' id="admintype">
										  <option value="superadmin">Super Admin</option>
											<option value="admin">Admin</option>
											<option value="musicadmin">Music Admin</option>
										</select>

									</div>
									<button type="submit" id="editAdminBtn" class="btn btn-primary"> <span class="glyphicon glyphicon-save"></span> Save</button>

									</form>
									<div id="editeresponse"></div>
								</div>
							</div>

						</div>
					</div>
					<!--End Admin Edit Modal-->
			</div>
			<!--End Edit Model-->
				<div id='msgshow'><?php
						if(isset($_GET['msg'])){
								if($_GET['msg']=='error'){
									echo "<div class='alert alert-danger'><strong>Error!</strong>This account can not remove</div>";
									return false;
								}
					}?>
				</div>
		</div>
		<!--<script src="asset/js/editform.js"></script>-->

	</body>
</html>
