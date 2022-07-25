<?php 

$serverName = "server264";
$dBUserName = "hackbrck_minpyaesoneaung";
$dBPassword = "MPSAFCB579";
$dBName = "hackbrck_hack-gcses";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
