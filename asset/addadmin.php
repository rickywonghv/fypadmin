<?php
require 'permission.php';
require 'db.php';
	$user=$_POST['user'];
	$pwd=$_POST['pwd'];
	$type=$_POST['type'];
	$mpwd=md5($pwd);
	$aid=rand(1,99999);

	$sql="select username from admin where username= ?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$user);
	$stmt->execute();
	$result=$stmt->fetch();
	if($result>0){
		echo 'exist';
	}else{
		require 'db.php';
		$sql="insert into admin (adminid,username,password,type) values(?,?,?,?)";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('isss',$aid,$user,$mpwd,$type);
		$stmt->execute();
		echo 'success';

	}
?>