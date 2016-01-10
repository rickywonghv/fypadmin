<?php
session_start();
if(empty($_SESSION['username'])){
  header("Location:../../index.php");
}
require_once 'GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();

$secret = $ga->createSecret();
//echo "Secret is: ".$secret."\n\n";

$qrCodeUrl = $ga->getQRCodeGoogleUrl($_SESSION['username'].'@MusixCloud', $secret);
//echo "Google Charts URL for the QR-Code: ".$qrCodeUrl."\n\n";
//echo "<img src=".$qrCodeUrl.">";

$oneCode = $ga->getCode($secret);
//echo "Checking Code '$oneCode' and Secret '$secret':\n";
$result = array('qrurl'=>$qrCodeUrl,'secret'=>$secret,'getcode'=>$oneCode );
print_r(json_encode($result, JSON_UNESCAPED_UNICODE));
?>
