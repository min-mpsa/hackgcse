<?php 
  session_start();
  if(!isset($_SESSION["userid"])) {
    header("location: sign-in.php");
    exit(); 
  
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Architects+Daughter&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="tab.css" rel="stylesheet">
    <link rel="stylesheet" href="accordion.css" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="logo-final.png">
    <title>Factors affecting enzyme action</title>
    <style type="text/css">
      .img2{
        display: none;
      }
      .img4{
        display: none;
      }
    </style>
</head>
<body>

<header class="header">
  <div class="tab">
    <img class="logo" src="hack gcses logo.png" alt="logo" width="242px" height="50px" >
                <a href="logout.inc.php"><button class="hide">Logout</button></a>
                <a href="Hack GCSE Help.pdf" target="_blank"><button>Help</button>
                <a href="comingsoon.php"><button class="hide">Notes</button>
                <a href="comingsoon.php"><button>Definitions</button>
                <a href="biology.php"><button class="hide2">Biology</button></a>
            </div>
        </header>

<h1 style="font-size: 45px;">Factors affecting enzyme action</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State the factors that could affect enzyme action.' =>  array(
        1 =>  '<img src="Biology/HG 5-2/5-2-3.png" alt="image" width="100%" class="img1">',
        
    ),
    'Past-Paper Question 5_2_1'  =>  array(
        1 =>  '<img src="Biology/HG 5-2/5-2-4.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 5-2/5-2-5.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/41/O/N/16',    
    
      ),
    'Explain the effect of changes in temperature on enzyme activity.' =>  array(
        1 =>  'increased kinetic energy',
        2 =>  'molecules move faster',
        3 =>  'increased frequency of collisions',
        4 =>  'increased number of successful collisions',
        5 =>  'enzyme activity increases',

      ),
    'Past-Paper Question 5_2_2'  =>  array(
      1 =>  '<img src="Biology/HG 5-2/5-2-6.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 5-2/5-2-8.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Biology/HG 5-2/5-2-7.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Biology/HG 5-2/5-2-9.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0610/43/M/J/17',    
  
    ),
    'Past-Paper Question 5_2_3'  =>  array(
        1 =>  '<img src="Biology/HG 5-2/5-2-10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 5-2/5-2-11.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/41/O/N/14',    
    
      ),
    
  );
  $questionsLength = count($accordians);
  $_SESSION['questions_length'] = $questionsLength;
  ?>
  </ul>
  <article>
    
    <ul class="accordion">
    <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(0);
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';
      last_visit($conn,$_SESSION['userid'],17);
      $result = getUserColors($conn,$_SESSION['userid']);
      // echo "<pre>";
      // print_r($result);
      // exit;
      $result_que = array();
      $result_color = array();
      while($row = mysqli_fetch_assoc($result)){
          $result_que[] = $row['question'];
          $result_color[] = $row['color'];
      }
      $data = '';
      foreach ($accordians as $key => $accordian) {
          $data .='<li class="accordion__item">
              <a href="javascript:void(0);" class="accordion__link">'.$key.'</a>';
              $data .= '<ul class="sub-accordion">';
              if($key=='Past-Paper Question 5_2_1' || $key == 'Past-Paper Question 5_2_2' || $key == 'Past-Paper Question 5_2_3' || $key=='State the factors that could affect enzyme action.'){ $data .= '<ul style="list-style-type: none;">';
              }else{ $data .= '<ul>'; }
                foreach ($accordian as $key_1 => $value_1) {
                    $data .= '<li class="sub-accordion__item">'.$value_1.'</li>';
                }
                $data .= '</ul>
                        </ul>';
                $color ='';
                if(in_array($key,$result_que)){
                  $result_color = getUserSelectedColors($conn,$_SESSION['userid'],$key);
                  $color = $result_color['color'];
                }
                $data .= '<div class="ranker">
                            <button class="color-change" data-topicID="17" data-key="'.$key.'" style="background:'.$color.'"></button>                            
                          </div>';
          $data .='</li>';
      }

      // foreach ($accordians as $key => $accordian) {
      //   $data .='<li class="accordion__item">
      //           <a href="javascript:void(0);" class="accordion__link">'.$key.'</a>';
      //           $data .= '<ul class="sub-accordion">';
      //             $data .= '<ul>';
      //             foreach ($accordian as $key_1 => $value_1) {
      //                 $data .= '<li class="sub-accordion__item">'.$value_1.'</li>';
      //             }
      //             $data .= '</ul>
      //                     </ul>';
      //             $color ='';
      //             $data .= '<div class="ranker">
      //                         <button class="color-change" data-key="'.$key.'" style="background:'.$color.'"></button>
      //                       </div>';
      //   $data .='</li>';
      // }
      echo $data;

      

    ?>
    </ul>
  </article>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="accordion.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.accordion__link').on('click',function(){
      var x = $(this).position();
      var pos = x.top-100;
        $('html, body').animate({
          scrollTop: pos
        }, 800, function(){
        });
    });
    $('.img1').on('click',function(){
      $(this).hide();
      $('.img2').show();
    });
    $('.img2').on('click',function(){
      $(this).hide();
      $('.img1').show();
    });
    $('.img3').on('click',function(){
      $(this).hide();
      $('.img4').show();
    });
    $('.img4').on('click',function(){
      $(this).hide();
      $('.img3').show();
    });
    $('.accordion').on('click',function(){
      $('.img1').show();
      $('.img3').show();
    });
    $('.accordion__link:not(.accordion__link_active)').on('click',function(){
      $('.img2').hide();
      $('.img4').hide();
    });
    $('.accordion__link_active').on('click',function(){
      $('.img1').show();
      $('.img3').show();
    });
    
  });
</script>
</body>
</html> 

