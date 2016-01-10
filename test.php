<?php
  $exip=exec('curl icanhazip.com');
  $json = array('ip' => $exip);
  print_r(json_encode($json));
  print_r(exec('curl freegeoip.net/json/'));
?>
