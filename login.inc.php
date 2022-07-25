<?php 
session_start();
if (isset($_POST["submit"])) {
    
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($Email, $Password) !== false ) {
        header("location: sign-in.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $Email, $Password);

}
else {
    header("location: sign-in.php");
    exit();
}