<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("location: sign-in.php");
        exit(); 
    }


    $serverName = "server264";
    $dBUserName = "hackbrck_minpyaesoneaung";
    $dBPassword = "MPSAFCB579";
    $dBName = "hackbrck_hack-gcses";

    $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    function createCommentRow($data,$type) {
        global $conn;
        
        $response = '
                <div class="comment">
                    <div class="user">'.$data['usersName'].' <span class="time">'.$data['createdOn'].'</span></div>
                    <div class="userComment">'.$data['comment'].'</div>
                    <div class="reply"><a href="javascript:void(0)" data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</a></div>
                    <div class="replies">';
     
        $sql = $conn->query("SELECT replies.id, usersName, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.usersId WHERE replies.commentID = '".$data['id']."' ORDER BY replies.id DESC ");
        while($dataR = $sql->fetch_assoc())
            $response .= createReplyRow($dataR,"reply");
    
        $response .= '
                            </div>
                </div>
            ';
    
        return $response;
    }
    function createReplyRow($data,$type) {
        global $conn;
        
        $response = '
                <div class="comment">
                    <div class="user">'.$data['usersName'].' <span class="time">'.$data['createdOn'].'</span></div>
                    <div class="userComment">'.$data['comment'].'</div>
                    <div class="replies">';
     
        $sql = $conn->query("SELECT replies.id, usersName, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.usersId WHERE replies.commentID = '".$data['id']."' ORDER BY replies.id DESC ");
        while($dataR = $sql->fetch_assoc())
            $response .= createReplyRow($dataR,"reply");
    
        $response .= '
                            </div>
                </div>
            ';
    
        return $response;
    }
    
    if (isset($_POST['getAllComments'])) {
        $start = $conn->real_escape_string($_POST['start']);
    
        $response = "";
        $sql = $conn->query("SELECT comments.id, usersName, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.usersId ORDER BY comments.id DESC LIMIT $start, 20");
        while($data = $sql->fetch_assoc())
            $response .= createCommentRow($data,"comment");
    
        exit($response);
    }
    
    if (isset($_POST['addComment'])) {
        $comment = $conn->real_escape_string($_POST['comment']);
        $isReply = $conn->real_escape_string($_POST['isReply']);
        $commentID = $conn->real_escape_string($_POST['commentID']);
    
        if ($isReply != 'false') {
            $conn->query("INSERT INTO replies (comment, commentID, userID, createdOn) VALUES ('$comment', '$commentID', '".$_SESSION['userid']."', NOW())");
            $sql = $conn->query("SELECT replies.id, usersName, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.usersId ORDER BY replies.id DESC LIMIT 1");
        } else {
            $conn->query("INSERT INTO comments (userID, comment, createdOn) VALUES ('".$_SESSION['userid']."','$comment',NOW())");
            $sql = $conn->query("SELECT comments.id, usersName, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN users ON comments.userID = users.usersId ORDER BY comments.id DESC LIMIT 1");
        }
    
        $data = $sql->fetch_assoc();
        exit(createCommentRow($data,"comment"));
    }

    $sqlNumComments = $conn->query("SELECT id FROM comments");
$numComments = $sqlNumComments->num_rows;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Permanent+Marker:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="tab.css">
    <link href="community.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="logo-final.png">
    <title>Community</title>
    <style>
        .replies .comment {
            margin-bottom: 45px;
            margin-left: 50px;
        }
        .comment {
            margin-bottom: 45px;
        }
        </style>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-87BTE3GYG2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-87BTE3GYG2');
</script>
</head>
<body>

<header class="header">
  <div class="tab">
    <img class="logo" src="hack gcses logo.png" alt="logo" width="242px" height="50px" >
                <a href="logout.inc.php"><button class="hide">Logout</button></a>
                <a href="dashboard.php"><button class="hide2">Dashboard</button></a>
            </div>
        </header>

<h1 style="text-align: center; -webkit-text-stroke: 1.8px black">Community</h1>


<div class="container" style="margin-top:20px;">
    
    
    <div class="row">
        <div class="info" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
">
            <img src="com.png" alt="info">
        </div>
        <div class="info2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
">
        <img src="comm.png" alt="info">
        </div>
        <div class="info3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
">
        <img src="Your story.png" alt="info">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <textarea class="form-control" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
            <button style="float:right" class="btn-primary btn" onclick="isReply = false;" id="addComment">Add Comment</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 style="font-family: Arial;
"><b id="numComments"><?php echo $numComments ?> Comments</b></h2><br>
            <div class="userComments">
            </div> 
        </div>
    </div>
</div>

<div class="row replyRow" style="display:none">
    <div class="col-md-12">
        <textarea class="form-control" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
        <button style="float:right" class="btn-primary btn" onclick="isReply = true;" id="addReply">Add Reply</button>
        <button style="float:right" class="btn-default btn" onclick="$('.replyRow').hide();">Close</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
    var isReply = false, commentID = 0, max = <?php echo $numComments ?>;

    $(document).ready(function () {
        $("#addComment, #addReply").on('click', function () {
            var comment;

            
            
            if (!isReply)
                comment = $("#mainComment").val();
            else
                comment = $("#replyComment").val();

            if (comment.length > 1) {
                $.ajax({
                    url: 'community.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        addComment: 1,
                        comment: comment,
                        isReply: isReply,
                        commentID: commentID
                    }, success: function (response) {
                        max++;
                        $("#numComments").text(max + " Comments");

                        if (!isReply) {
                            $(".userComments").prepend(response);
                            $("#mainComment").val("");
                        } else {
                            commentID = 0;
                            $("#replyComment").val("");
                            $(".replyRow").hide();
                            $('.replyRow').parent().next().append(response);
                        }
                    }
                });
            } else
                alert('Please Check Your Inputs');
        });

       

        getAllComments(0, max);
    });

    function reply(caller) {
        commentID = $(caller).attr('data-commentID');
        $(".replyRow").insertAfter($(caller));
        $('.replyRow').show();
    }

    function getAllComments(start, max) {
        if (start > max) {
            return;
        }

        $.ajax({
            url: 'community.php',
            method: 'POST',
            dataType: 'text',
            data: {
                getAllComments: 1,
                start: start
            }, success: function (response) {
                $(".userComments").append(response);
                getAllComments((start+20), max);
            }
        });
    }
</script>
<?php
	include_once 'dashboardfooter.php';
?>