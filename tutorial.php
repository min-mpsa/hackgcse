<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("location: sign-in.php");
        exit(); 
    }
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
    <link rel="shortcut icon" type="image/png" href="logo-final.png">
    <title>Tutorial</title>
    <style>
        p {
        font-family: Lato-Regular;
    font-size: 24px;
    color: #413620;
    line-height: 1.4;
    text-align: center;
        }
        .video {
            margin-top: 60px;
            margin-bottom: 60px;
        }
        
        @media screen and (max-width: 560px) {
            .video {
                width: 350px;
                height: 197px;
            }
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
        <center><iframe class="video "width="560" height="315" src="https://www.youtube.com/embed/9aS-shvX53g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
        <p>Click <a href="Hack GCSE Help.pdf" target="_blank">here</a> to read more about the background, purpose, and methodology of this website.</p>
        <p style="margin-top:60px;">Don't forget to subscribe to our YouTube channel too :)</p>
        </body>
</html>