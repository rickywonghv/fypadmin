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
		<script src="asset/js/jquery-1.11.3.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		<link rel="stylesheet" href="asset/css/nav.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="icon" href="favicon.ico">
    <script src="asset/js/usermsg.js" charset="utf-8"></script>
		<script src="asset/ckeditor/ckeditor.js" charset="utf-8"></script>
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
      <div class="shusermsg">
        <div class="headermsg"><h3> <small></small>User Message</h3> <span style="float:right;"><button type='button' class='btn btn-success' data-toggle='modal' data-target='#sendtouser'><span class='glyphicon glyphicon-send'></span> Send Message</button>
        </span> </div>
        <div class="">
          <table class='table table-striped table-hover table-condensed'>
            <thead>
              <tr>
                <th>Message ID</th><th>From</th><th>Subject</th><th>Detail</th><th>Delete</th>
              </tr>
            </thead>
            <tbody id="usermsg"></tbody>
          </table>
        </div>
      </div>

      <div class="modal fade" id="msgdet" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="modal-title" id="msgdeltitle">Message from <span id="msgname"></span> </h3>
            </div>
            <div class="modal-body">
							<ul class="list-group">
							  <li class="list-group-item">Message ID: <span id="moremsgid"></span></li>
								<li class="list-group-item">Subject: <span id="moremsgtitle"></span></li>
								<li class="list-group-item">From IP: <span id="moremsgip"></span></li>
								<li class="list-group-item">Send Date: <span id="moremsgdate"></span></li>
								<li class="list-group-item">Message: <div id="moremsg"></div></li>
							</ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="closemsgdet">Close</button>
            </div>
          </div>
        </div>
      </div>
		</div>

		<div class="modal fade" id="sendtouser" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="">Send Message to User</h4>
		      </div>
		      <div class="modal-body">

						<div class="subject">
							<div class="input-group">
							  <span class="input-group-addon">Subject</span>
							  <input type="text" class="form-control" id="subject" placeholder="Subject">
							</div>
						</div>
						<div class="content">
							<textarea name="editor1" id="usermsgeditor" rows="10" cols="80"></textarea>
	            <script>
	                CKEDITOR.replace( 'usermsgeditor');

	            </script>
						</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
		        <button type="button" class="btn btn-primary"><span class='glyphicon glyphicon-send'></span> Send</button>
		      </div>
		    </div>
		  </div>
		</div>
	</body>
</html>
