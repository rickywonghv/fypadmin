<?php
//require 'permission.php';
if(isset($_GET['act'])){
	if($_GET['act']=="shuser"&&isset($_GET['uid'])){
		user($_GET['uid']);
	}else if($_GET['act']=="shuser"){
		alluser();
	}

}
if($_POST['act']=="shusermsg"){
	shusermsg();
}elseif ($_POST['act']=="usermsg") {
	usermsg($_POST['msgid']);
}elseif ($_POST['act']=="userdelmsg") {
	delusermsg($_POST['msgid']);
}
	function alluser(){
		require 'db.php';
		$sql="select userid, fbuid, email, type, fullname, gender, dob, intro, expDate, regDate, regIp, uToken from user";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		$data = $stmt->get_result();
		$result = array();
		     while($row = $data->fetch_assoc()) {
		          $result[] = $row;
		      }
		      echo json_encode($result);
	}

	function user($uid){
		require 'db.php';
		$sql="select userid, fbuid, email, type, fullname, gender, dob, intro, expDate, regDate, regIp, uToken from user where userid=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("i",$uid);
		$stmt->execute();
		$data = $stmt->get_result();
		$result = array();
		     while($row = $data->fetch_assoc()) {
		          $result[] = $row;
		      }
		      echo json_encode($result);
	}
	function shusermsg(){
		require 'db.php';
		$sql="select usermsg.reada,usermsg.usermsgid, user.fullname,usermsg.title from usermsg INNER join user on usermsg.userid=user.userid";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		$data = $stmt->get_result();
		$result = array();
		     while($row = $data->fetch_assoc()) {
		          $result[] = $row;
		      }
		      echo json_encode($result);
	}


function usermsg($msgid){
	require 'db.php';
	read($msgid);
	$sql="select usermsg.reada,usermsg.usermsgid,usermsg.msg,usermsg.ipadd,usermsg.date, user.fullname,usermsg.title from usermsg INNER join user on usermsg.userid=user.userid where usermsgid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("i",$msgid);
	$stmt->execute();
	$data = $stmt->get_result();
	$result = array();
			 while($row = $data->fetch_assoc()) {
						$result[] = $row;
				}
				echo json_encode($result);
}
function read($msgid){
	require 'db.php';
	$sql="update usermsg set reada=? where usermsgid=?";
	$read=0;
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("ii",$read,$msgid);
	$stmt->execute();
}

function delusermsg($msgid){
	require 'db.php';
	try{
		$sql="delete from usermsg where usermsgid=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("i",$msgid);
		$stmt->execute();
		echo "success";
	}catch(Exception $e){
		printf($e->getMessage());
	}
}
?>
