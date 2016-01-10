<?php
	session_start();
	if(empty($_SESSION['username'])||empty($_SESSION['type'])){
		header("Location:login.php");
	}
  if($_SESSION['type']!='superadmin'){
    header("Location:index.php?err=noper");
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
		<script src="asset/js/mail.js" charset="utf-8"></script>
		<script src="asset/ckeditor/ckeditor.js" charset="utf-8"></script>
		<link rel="icon" href="favicon.ico">
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
		<div class="wapper">
			<div class="mheader" style="padding-left:15px;">
				<h3><span class="glyphicon glyphicon-envelope"></span> Mail</h3>
			</div>
			<div class="col-xs-12 col-sm-2 col-md-2" >
				<ul class="list-group">
					<li class='list-group-item'><span class="btn mailbtn" id="composebtn" ><span class="glyphicon glyphicon-edit"></span> Compose</span></li>
					<li class='list-group-item'><span class="btn mailbtn" id="inboxbtn"><span class="glyphicon glyphicon-envelope"></span> Inbox</span></li>
				</ul>
			</div>
			<div class="container">
				<div class="col-xs-12 col-sm-10">

			<div class="">
				<section id="inbox">
					<h4>Inbox</h4>
					<div class="">
						You have <span id="num"></span> emails.
					</div>
					<table class='table table-hover table-condensed'>
					  <thead>
					    <tr>
					      <th>From</th>
								<th>Subject</th>
								<th>Date</th>

					    </tr>
					  </thead>
					  <tbody id="mailheader">
							<div class="loading">

							</div>
					  </tbody>
					</table>
					<div class="modal fade" id="shmailmsg" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close closeread" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id=""><span id="msgsubject"></span></h4>
					      </div>
					      <div class="modal-body">
									<div class="loadingpng">
									</div>
									<div class=""><b>From:</b> <span id="msgfrom"></span></div>
									<div class=""><b>Date:</b> <span id="msgdate"></span></div>
									<div class=""><b>Body:</b></div>
									<div id="mailbody"></div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default closeread" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>
				</section>
				<section id="compose" hidden>
					<div class="">
						<div class="header">
							<h4><small></small><span class="glyphicon glyphicon-send"></span> Compose</h4>
						</div>
						<div class="body">
							<form class="form-group" method="post" enctype="multipart/form-data">
								<div class="">
									<button type='button' id="sendmailbtn" class='btn btn-success '> <span id="loading"></span> <span class="glyphicon glyphicon-send"></span> Send</button>
									<button type='button' id="previewbtn" data-toggle="modal" data-target="#preview" class='btn btn-default'><i class="fa fa-eye"></i> Preview</button>

								</div>

										<div class="input-group inp">
										  <span class="input-group-addon" id="tomaillabel">To: </span>
										  <input type="email" id="tomailinput" class="form-control" placeholder="Please enter a email address">
										</div>
										<div class="input-group inp">
										  <span class="input-group-addon" id="mailsublabel">Subject: </span>
										  <input type="text" id="mailsubinput" class="form-control" placeholder="Please enter the subject">
										</div>
										<div class="contentinput inp">
											<textarea name="editor1" id="maileditor" rows="20"></textarea>
					            <script>
					                CKEDITOR.replace( 'maileditor');

					            </script>
										</div>
										<div class="mailmsg inp"></div>
							</form>
						</div>
					</div>

					<div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="">Preview Email</h4>
					      </div>
					      <div class="modal-body">
									<div id=""><b>To: </b><span id="preto"></span></div>
					        <div id=""><b>Subject: </b><span id="presub"></span></div>
									<div class=""><b>Body:</b></div>
									<div id="prebody"></div>

					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary"></button>
					      </div>
					    </div>
					  </div>
					</div>
				</section>
			</div>
		</div>
			</div>
		</div>

	</body>
</html>
