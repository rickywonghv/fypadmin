<?php
	session_start();
	date_default_timezone_set('Asia/Hong_Kong');
	require 'db.php';
		$user=$_POST['username'];
		$pwd=$_POST['pwd'];
		$country=$_POST['countryname'];
		$latitude=$_POST['latitude'];
		$longitude=$_POST['longitude'];

			$sql="select adminid,username,password,type,auth from admin where username= ?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("s",$user);
			$stmt->execute();
			$stmt->bind_result($adminid,$reuser, $repwd,$type,$auth);
			$stmt->fetch();
			try{
				if(($user==$reuser)&&(md5($pwd)==$repwd)&&($type!="block")){
					if(!empty($auth)){
						$_SESSION['secret']=$auth;
						echo 'auth';
					}else{
					//admin login logging
					require 'db.php';
					$id=rand(1,9999999);
					$logtime=date('H:i:s');
					$logdate=date('Y-m-d');
					$logip=$_SERVER['REMOTE_ADDR'];
					$sql="INSERT INTO adminlog(id,adminid,logtime,logdate,logip,countryName,latitude,longitude)VALUES(?,?,?,?,?,?,?,?)";
					$stmt=$conn->prepare($sql);
					$stmt->bind_param("iissssss",$id,$adminid,$logtime,$logdate,$logip,$country,$latitude,$longitude);
					$stmt->execute();
					//end Admin Login Logging

					echo 'true';
					$_SESSION['username']=$reuser;
					$_SESSION['aid']=$adminid;
					$_SESSION['type']=$type;
				}
				}elseif($type=="block"){
					echo 'block';
				}
			}
			catch(Exception $e){
				printf($e->getMessage());
			}

?>
