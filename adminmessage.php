<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
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
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" href="asset/css/nav.css">
		<script src="asset/js/adminmsg.js"></script>
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
		<div id="msgmodalbtn"><button type="button" id="msgsendmodal" class="btn btn-success" data-toggle='modal' data-target="#sendmsgmodal"><span class="glyphicon glyphicon-send"></span> Send Message</button>
			<?php require 'asset/exmodal.php';?>

		</div>

		<!--Admin Message Table-->
			<div id="amsgtable">
				<div class="table-responsive">
				<table class="table table-hover">
			    <thead>
			      <tr>
			      	<th>Message ID</th>
			        <th>From Admin</th>
			        <th>To Admin</th>
			        <th>Receive Date</th>
			        <th>Receive Time</th>
			        <th>Detail</th>
			        <th>Delete Message</th>
			      </tr>
			    </thead>
			    <tbody id="amsgbody">


			    </tbody>
			  </table>
			  </div>
			</div>
		<!--End Admin Message Table-->
		<!--Admin Message Detail Modal-->
			<div id="amsgmodal">
				<div id="msgmodal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Message Detail</h4>
				      </div>
				      <div class="modal-body">
				        <b>From Admin:</b><div id="fadmin"></div>
				        <b>Message:</b><div id="msg"></div>
				        <b>Receive Date:</b><div id="date"></div>
				        <b>Receive Time:</b><div id="time"></div>
				        <b>From IP:</b><div id="ip"></div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" id="adminclosemsg" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>
			</div>
			<!--End Admin Message Detail Modal-->

			<!--Admin Message Add Modal-->
			<div id="sendmsg">
				<div id="sendmsgmodal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Send Message</h4>
				      </div>
				      <div class="modal-body">
					      <form method="post">
					      <input type="hidden" value=<?php echo $_SESSION['username'];?> id="hiddenuser">
							<ul class="list-group">
							  <li class="list-group-item"><b>From Admin:</b><?php printf($_SESSION['username']);?></li>
							  <li class="list-group-item">
								<div class="form-group">
								  <label for="toadmin"><b>To Admin:</b></label>
								  <select class="form-control" id="toadmin" class="form-control"></select>
								</div>
							  </li>
							  <li class="list-group-item">
								  <div class="form-group">
									  <label for="msgtext"><b>Message:</b></label>
									  <textarea rows="4" id="msgtext" class="form-control"></textarea>
								  </div>
							  </li>
							  <li class="list-group-item"><b>From IP:</b><?php printf($_SERVER["REMOTE_ADDR"])?></li>
							</ul>
							<div id="callbackmsg"></div>
				      </div>
				      <div class="modal-footer">
				      	<button type="button" class="btn btn-success xlg" id="sendBtn">Send</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				      </form>
				    </div>

				  </div>
				</div>
			</div>
			<!--End Admin Message Add Modal-->


		</div>

	</body>
</html>
