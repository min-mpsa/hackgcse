<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST["submit"])) {
    
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    /*if (emptyInputSignup($Name, $Email, $Password)==1) {
        header("location: sign-in.php?error=emptyinput");
        exit();
    }*/
    if (uidExists($conn, $Name)!=0) {
        header("location: sign-in.php?error=usernametaken");
        exit();
    }
    if (emailExists($conn, $Email)!=0) {
        header("location: sign-in.php?error=emailexists");
        exit();
    }
    createUser($conn, $Name, $Email, $Password);

}
else {
    header("location: sign-in.php");
    exit();
}