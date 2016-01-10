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
		<link rel="stylesheet" href="asset/css/nav.css">
		<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="asset/css/style.css">
		<script src="asset/js/search.js" charset="utf-8"></script>
		<script type="text/javascript" src="asset/jplayer/jquery.jplayer.js" charset="UTF-8"></script>
		<script src="asset/js/player.js" charset="utf-8"></script>
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
		<div class="container" style="padding-bottom:40px; margin-bottom:40px">
			<div id="musicheader"><span class="glyphicon glyphicon-music"></span> Song List</div>
			<!--Start musiclist-->
			<div id="musiclist">
				<div class="table-responsive" align="center">
					<span style="max-width:500px; float:right;" id="searchbar">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-search"></span>
								<input type="text" class="form-control" id="searchinput" placeholder=" Search for...">
							</div>
						</div>
					</span>
				<table class="table table-hover table-striped" align="center">
				    <thead>
				      <tr>
				      	<th>Song ID</th>
				        <th>Song Name</th>
				        <th>Singer</th>
				        <th>Upload Time</th>
				        <th>Total Play</th>
				        <th>Total Download</th>
				      </tr>
				    </thead>
				    <tbody id="listmusic" class="searchdata">

				    </tbody>
				  </table>
				  </div>
				<!--End musiclist-->
				<div id="musicdetail">
					<div id="mdetailmodal" class="modal fade musicdetail" role="dialog">
					  <div class="modal-dialog">
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Song Detail</h4>
					      </div>
					      <div class="modal-body">

					<div class="list-group">
					    <a href="#" class="list-group-item"><b>Song ID:</b><span id="songid"></span></a>
					    <a href="#" class="list-group-item"><b>Song Name:</b><span id="songname"></span></a>
							<a href="#" class="list-group-item"><b>Upload User:</b><span id="uploadUser"></span></a>
					    <a href="#" class="list-group-item"><b>Lyricist:</b><span id="lyricist"></span></a>
					    <a href="#" class="list-group-item"><b>Singer:</b><span id="singer"></span></a>
					    <a href="#" class="list-group-item"><b>Composer:</b><span id="composer"></span></a>
					    <a href="#" class="list-group-item"><b>Album:</b><span id="album"></span></a>
					    <a href="#" class="list-group-item"><b>Track:</b><span id="track"></span></a>
					    <a href="#" class="list-group-item"><b>Year:</b><span id="year"></span></a>
					    <a href="#" class="list-group-item"><b>Copyright:</b><span id="copyright"></span></a>
					    <a href="#" class="list-group-item"><b>Art Path:</b><span id="artpath"></span></a>
					    <a href="#" class="list-group-item"><b>Lyrics:</b><span id="lyrics"></span></a>
					    <a href="#" class="list-group-item"><b>Song Path:</b><span id="songpath"></span></a>
					    <a href="#" class="list-group-item"><b>Upload Time:</b><span id="uploadtime"></span></a>
					    <a href="#" class="list-group-item"><b>Total Play:</b><span id="totalplay"></span></a>
					    <a href="#" class="list-group-item"><b>Total Download:</b><span id="totaldownload"></span></a>
					</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>
				</div>
			</div>
			<!--Player-->
<div class="nav  navbar-fixed-bottom col-xl-12 player">
	<div class="player">
		<div class="player" >
			<div id="jquery_jplayer_1" class="jp-jplayer"></div>
			<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
			<div class="jp-gui jp-interface">
				<div class="jp-controls-holder">
				<span class="player col-xs-12 col-sm-4 col-md-4">

					<span class="jp-play jcontrol glyphicon glyphicon-play-circle" role="button" tabindex="0"></span>
					<span class="jp-stop jcontrol glyphicon glyphicon-stop" role="button" tabindex="0"></span>
					<span class="jp-mute glyphicon jcontrol glyphicon-volume-off" role="button" tabindex="0"></span>
					<span class="jp-repeat glyphicon jcontrol glyphicon-repeat" role="button" tabindex="0"></span>
					<span class="jp-current-time"></span>
					<span class="time-sep">/</span>
					<span class="jp-duration"></span>
					<span class="jp-title" aria-label="title">&nbsp;</span>
					</span>


				<div class="player hidden-xs col-sm-4 col-md-5 " style="">
					<span class="jp-progress-bar">
						<span class="jp-seek-bar">
								<span class="jp-play-bar"><span class="handle"></span></span>
						</span>
					</span>
			</div>

			<div class="hidden-xs" style="float:right;">

				<div class="glyphicon glyphicon-volume-up" ></div>
				<div class="jp-volume-bar ">
						<div class="jp-volume-bar-value"><span class="handle"></span></div>
				</div>
			</div>


				<!--<span class="jp-duration" role="timer" aria-label="duration">&nbsp;</span>-->




				<div class="jp-no-solution">
					<span>Error Update Require! </span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!--End Player-->
			<!--End Container-->
			</div>
		<script src="asset/js/music.js"></script>
	</body>
</html>
