<?php
	date_default_timezone_set('Asia/Hong_Kong');
  if(!isset($_SESSION['secret'])){
    header("Location:../../index.php");
  }
  if(isset($_GET['act'])&&$_GET['act']=="adminlog"&&isset($_POST['long'])){
    $contry=$_POST['contry'];
    $lat=$_POST['lat'];
    $long=$_POST['long'];
    $aid=$_POST['aid'];

    require '../db.php';
    $id=rand(1,9999999);
    $logtime=date('H:i:s');
    $logdate=date('Y-m-d');
    $logip=$_SERVER['REMOTE_ADDR'];
    $sql="INSERT INTO adminlog(id,adminid,logtime,logdate,logip,countryName,latitude,longitude)VALUES(?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("iissssss",$id,$aid,$logtime,$logdate,$logip,$country,$lat,$long);
    $stmt->execute();
    echo "success";

  }else{
    $contry=null;
    $lat=null;
    $long=null;
    $aid=$_POST['aid'];
    require '../db.php';
    $id=rand(1,9999999);
    $logtime=date('H:i:s');
    $logdate=date('Y-m-d');
    $logip=$_SERVER['REMOTE_ADDR'];
    $sql="INSERT INTO adminlog(id,adminid,logtime,logdate,logip,countryName,latitude,longitude)VALUES(?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("iissssss",$id,$aid,$logtime,$logdate,$logip,$country,$lat,$long);
    $stmt->execute();
    echo "success";
  }
 ?>
