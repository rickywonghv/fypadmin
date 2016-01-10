<?php
session_start();
if(empty($_SESSION['username'])||empty($_SESSION['type'])){
	header("Location:../login.php");
}
if($_SESSION['type']!='superadmin'){
	header("Location:../index.php");
}

if(isset($_GET['act'])){
	if($_GET['act']=='shlog'){
		shlog();
	}
}
function shlog(){
	require 'db.php';
	$sql="select adminlog.id,adminlog.adminid,admin.username,adminlog.logdate,adminlog.logtime,adminlog.logip,adminlog.countryName,adminlog.latitude,adminlog.longitude From adminlog INNER JOIN admin ON adminlog.adminid=admin.adminid ORDER BY adminlog.logdate DESC,adminlog.logtime DESC;";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$data = $stmt->get_result();
	     $result = array();
	     while($row = $data->fetch_assoc()) {
	          $result[] = $row;
	      }
	      echo json_encode($result);

	/*$stmt->bind_result($id,$adminid,$username,$logdate,$logtime,$logip);
	while($stmt->fetch()){
		echo '<tr><td>'.$id.'</td><td>'.$adminid.'</td><td>'.$username.'</td><td>'.$logdate.'</td><td>'.$logtime.'</td><td>'.$logip.'</td></tr>';
	}*/
}

?>