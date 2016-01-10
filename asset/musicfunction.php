<?php
session_start();
require 'permission.php';
if(isset($_GET['act'])){
	if($_GET['act']=='shmusic'){
		shmusic();
	}
	if($_GET['act']=='det'){
		detmusic($_GET['songid']);
	}
}
if(isset($_POST['act'])){
	if($_POST['act']=='del'){
		delmusic($_POST['musicid']);
	}

}

function shmusic(){
	require 'db.php';
	$sql="select * from music";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
      echo json_encode($result); 

}

function detmusic($id){
	require 'db.php';
	$sql="select * from music where songid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$id);
	$stmt->execute();
	$data = $stmt->get_result();
     $result = array();
     while($row = $data->fetch_assoc()) {
          $result[] = $row;
      }
      echo json_encode($result); 

}

function delmusic($musicid){
	require 'db.php';
	try{
		$sql="delete from music where songid=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('i',$musicid);
		$stmt->execute();
		echo "success";
	}catch(Exception $e){
		printf($e->getMessage());
	}
	
}
?>