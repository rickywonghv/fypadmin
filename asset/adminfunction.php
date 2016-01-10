<?php
session_start();
require 'permission.php';



	if($_GET['act']=='shadmin'){
		shadmin();
	}
	if($_GET['act']=='block'&&$_GET['aid']!=""){
		block($_GET['aid']);
	}
	if($_GET['act']=='shedit'&&$_GET['aid']!=""){
		sheditadmin($_GET['aid']);
	}
	if($_GET['act']=='chpwd'){
		chpwd($_POST['aid']);
	}
	if($_GET['act']=='dellog'){
		dellog();
	}
	if($_POST['act']=="chtype"){
		chtype($_POST['aid'],$_POST['type']);
	}
	if($_GET['act']=="serverinfo"){
		serverinfo();
	}
	if($_GET['act']=="twoauthreg"){
		twoauthreg($_POST['secret'],$_SESSION['aid']);
	}
	if($_GET['act']=="distwoauthreg"){
		distwoauthreg($_SESSION['aid']);
	}

function serverinfo(){
	$ds = disk_total_space("/");
	$fds = disk_free_space("/");
	$uds=$ds-$fds;

	$exip=exec('curl icanhazip.com');
	$result = array('total' =>$ds/1024/1024 , 'free'=>$fds/1024/1024,'used'=>$uds/1024/1024,'servip'=>$exip);

	echo json_encode($result);
}

function chtype($aid,$type){
	require 'db.php';
	$sql="update admin set type=? where adminid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('si',$type,$aid);
	$stmt->execute();
	echo "success";
	printf($stmt->error);
}

function shadmin(){
	require 'db.php';

	$sql="select adminid,username,type from admin";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$data = $stmt->get_result();
	$result = array();
	while($row = $data->fetch_assoc()) {
			$result[] = $row;
	}
	echo json_encode($result);
}

function block($aid){
	require 'db.php';
	$type="block";
	$sql="update admin set type=? where adminid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('si',$type,$aid);
	$stmt->execute();
	echo "success";
	printf($stmt->error);
}
function sheditadmin($aid){
	require 'db.php';
	$sql="select adminid,username,type from admin where adminid= ?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$aid);
	$stmt->execute();
	$data = $stmt->get_result();
	$result = array();
	while($row = $data->fetch_assoc()) {
			$result[] = $row;
	}
	echo json_encode($result);

}

function chpwd($aid){
	require 'db.php';
	$opwd=md5($_POST['opwd']);
	$npwd=md5($_POST['npwd']);
	$rnpwd=md5($_POST['rnpwd']);
	$sql="select adminid,password from admin where adminid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$aid);
	$stmt->bind_result($adminid,$password);
	$stmt->execute();
	$stmt->fetch();

	if($opwd==$password){
		require 'db.php';
		$sql="update admin set password=? where adminid=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('si',$npwd,$adminid);
		$stmt->execute();
		echo "true";
	}elseif($opwd!=$password){
		echo 'wrongpwd';
	}else{
		echo "error";
	}
}

function dellog(){
	require 'db.php';
	$sql="delete from musixcloud.adminlog where logdate<curdate()-4";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	echo "success";
}

function twoauthreg($secret,$aid){
	require 'db.php';
	$sql="update admin set auth=? where adminid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('si',$secret,$aid);
	$stmt->execute();
	echo "success";
	printf($stmt->error);
}

function distwoauthreg($aid){
	require 'db.php';
	$secret=null;
	$sql="update admin set auth=? where adminid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('si',$secret,$aid);
	$stmt->execute();
	echo "success";
	printf($stmt->error);
}
?>
