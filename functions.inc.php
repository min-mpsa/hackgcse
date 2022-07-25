<?php

function emptyInputSignup($Name, $Email, $Password) {
    $result;
    if (empty($Name) || empty($Email) || empty($Password)) {
        $result = 1;
    }
    else {
        $result = 0;
    }
    return $result;
}

function uidExists($conn, $Name) {
    $sql = "SELECT * FROM users WHERE usersName = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Name);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function emailExists($conn,$Email) {
    $sql = "SELECT * FROM users WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s",$Email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $Name, $Email, $Password) {
    $sql = "INSERT  INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: sign-in.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($Password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $Name, $Email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: sign-in.php?error=none");
    exit();
}

function emptyInputLogin($Email, $Password) {
    
    if (empty($Email) || empty($Password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $Email, $Password) {
    $uidExists = emailExists($conn, $Email);

    if ($uidExists === false) {
        echo 'uid false';
        header("location: sign-in.php?error=wronglogin");
        exit(); 
    }

    $pwdHashed = $uidExists['usersPwd'];
    $checkPwd = password_verify($Password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: sign-in.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["userName"] = $uidExists["userName"];
        header("location: dashboard.php");
        exit();
    }

}

function getUserColors($conn,$userid) {

    $sql = "SELECT * FROM usercolors WHERE user_id = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i",$userid);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if ($resultData->num_rows >0) {
        return $resultData;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function getUserSelectedColors($conn,$userid,$question) {

    $sql = "SELECT * FROM usercolors WHERE user_id = ? AND question = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "is",$userid,$question);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function userColorExists($conn,$userid,$question) {
    
    $sql = "SELECT * FROM usercolors WHERE user_id = ? AND question = ? ";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "is",$userid,$question);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function saveColor($conn,$post) {
    $result = userColorExists($conn,$_SESSION['userid'],$post['question']);
    if($result==0){
        $sql = "INSERT  INTO usercolors (user_id, color, question,topicID) VALUES (?, ?, ?,?);";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "issi", $_SESSION['userid'], $post['color'], $post['question'],$post['topicID']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    else{        
        $sql = "UPDATE usercolors set color = ? WHERE user_id = ? AND question = ? AND topicID= ?;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sisi", $post['color'],$_SESSION['userid'], $post['question'],$post['topicID']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }   
}
function getColors($conn,$userid,$topic_id){
    
    $sql = "SELECT COUNT(color) FROM usercolors WHERE user_id = ? AND topicID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$userid,$topic_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        $count = $row['COUNT(color)'];
        return $count;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function getGreenColor($conn,$userid,$topic_id){
    
    $sql = "SELECT COUNT(color) FROM usercolors WHERE user_id = ?  AND topicID = ? AND color = 'rgb(59, 176, 121)'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$userid,$topic_id);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        $count = $row['COUNT(color)'];
        return $count;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function getYellowColor($conn,$userid,$topic_id){
    
    $sql = "SELECT COUNT(color) FROM usercolors WHERE user_id = ?  AND topicID = ? AND color = 'rgb(255, 242, 145)'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$userid,$topic_id);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        $count = $row['COUNT(color)'];
        return $count;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function getRedColor($conn,$userid,$topic_id){
    
    $sql = "SELECT COUNT(color) FROM usercolors WHERE user_id = ?  AND topicID = ? AND color = 'rgb(156, 34, 21)'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$userid,$topic_id);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        $count = $row['COUNT(color)'];
        return $count;
    }
    else {
        $result = 0;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function last_visit($conn,$userid,$topic_id){
    $date = date("Y-m-d");
    $sql = "SELECT id from user_activity where userID = '$userid' AND topicID = '$topic_id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    if($row<1){
        $sql = "INSERT  INTO user_activity (topicID, last_visit, userID) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "isi",$topic_id,$date,$userid);
    }else{
        $sql = "UPDATE user_activity set last_visit = ? WHERE userID = ? AND topicID = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sii",$date,$userid,$topic_id);
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
function getLastVisit($conn,$userid,$topic_id){
    $sql = "SELECT last_visit FROM user_activity where userID = ? AND topicID = ? ";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$userid,$topic_id);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    if (isset($row['last_visit'])){
        return $row['last_visit'];
    }else return null;
    
    mysqli_stmt_close($stmt);
}

function getChapters($conn,$subject){
    
}