<?php
	session_start();
	require 'asset/db.php';
	if($_SESSION['type']=='superadmin'){

				$aid=$_POST['hiddenaid'];
				$pwd=$_POST['editpassword'];
				$pwdb=$_POST['editconpassword'];
				$type=$_POST['edittype'];
				
				if($pwd!=$pwdb){
					header('Location:admin.php?msg=passNm');
				}else{
					if(empty($pwd)){
						$sql="UPDATE admin SET type=? where adminid=?";
						$stmt=$conn->prepare($sql);
						$stmt->bind_param('si',$type,$aid);
						$stmt->execute();
						header('Location:admin.php');
					}else{
						$mpwd=md5($pwd);
						$sql="UPDATE admin SET password=?, type=? where adminid=?";
						$stmt=$conn->prepare($sql);
						$stmt->bind_param('ssi',$mpwd,$type,$aid);
						$stmt->execute();
						header('Location:admin.php');
					}
				}
	}else{
		header('Location:admin.php?msg=nopermission');
	}
?>