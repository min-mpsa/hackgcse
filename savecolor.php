<?php
	require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    session_start();
    saveColor($conn,$_POST);
?>