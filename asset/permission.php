<?php
if(empty($_SESSION['type'])||empty($_SESSION['username'])){
	header("Location:../login.php");
}
?>