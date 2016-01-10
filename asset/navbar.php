<?php
	if($_SESSION['type']=='superadmin'){
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
		echo '<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Admin
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
					<li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> Administrator</a></li>
					<li><a href="adminlog.php"><span class="glyphicon glyphicon-record"></span> Admin Logging</a></li>
          </ul>
        </li>
				<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> User
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
					<li><a href="userlog.php"><span class="glyphicon glyphicon-record"></span> User Logging</a></li>
					<li><a href="user.php"><span class="glyphicon glyphicon-user"></span> User</a></li>
					<li><a href="usermsg.php"><span class="glyphicon glyphicon-envelope"></span> User Message</a></li>
          </ul>
        </li>
				<li><a href="music.php"><span class="glyphicon glyphicon-headphones"></span> Music</a></li>
				<li><a href="adminmessage.php"><span class="glyphicon glyphicon-envelope"></span> Admin Message <span class="badge adminmsgbadge">';

			echo unreadadminmsg($_SESSION['username']).'</span></a></li>
			<li><a href="mail.php"><i class="fa fa-envelope"></i> Mail</a></li>';
	}elseif($_SESSION['type']=='admin'){
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
		echo '<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> User
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="userlog.php"><span class="glyphicon glyphicon-record"></span> User Logging</a></li>
			<li><a href="user.php"><span class="glyphicon glyphicon-user"></span> User</a></li>
			<li><a href="usermsg.php"><span class="glyphicon glyphicon-envelope"></span> User Message <span class="badge usermsgbadge">';
			echo '</span></a></li>
			</ul>
		</li>
		<li><a href="music.php"><span class="glyphicon glyphicon-headphones"></span> Music</a></li>
		<li><a href="adminmessage.php"><span class="glyphicon glyphicon-envelope"></span> Admin Message <span class="badge adminmsgbadge">';
		echo unreadadminmsg($_SESSION['username']).'</span></a></li>';
	}else{
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
		echo '<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="music.php"><span class="glyphicon glyphicon-headphones"></span> Music</a></li>
				<li><a href="adminmessage.php"><span class="glyphicon glyphicon-envelope"></span> Admin Message <span class="badge adminmsgbadge">';
				echo unreadadminmsg($_SESSION['username']).'</span></a></li>';
	}
?>
