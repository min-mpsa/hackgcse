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
    <title>Limiting Factors</title>
    <style type="text/css">
      .img2{
        display: none;
      }
      .img4{
        display: none;
      }
      .img6{
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

<h1 style="font-size: 45px;">Limiting Factors</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define limiting factor.' =>  array(
      1 =>  'something present in the environment',
      2 =>  'in such a short supply',
      3 =>  'that it restricts life processes',
    ),
    
    'Past-Paper Question 6_3_1'  =>  array(
      1 =>  '<img src="Biology/HG 6-3/6-3-2.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 6-3/6-3-3.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 6-3/6-3-4.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/33/O/N/14',    
  
    ),
    'Past-Paper Question 6_3_2'  =>  array(
        1 =>  '<img src="Biology/HG 6-3/6-3-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-3/6-3-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 6-3/6-3-7.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/M/J/19',    
    
      ),
      'Past-Paper Question 6_3_3'  =>  array(
        1 =>  '<img src="Biology/HG 6-3/6-3-8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-3/6-3-9.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 6-3/6-3-10.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/43/M/J/19',    
    
      ),
      'Past-Paper Question 6_3_4'  =>  array(
        1 =>  '<img src="Biology/HG 6-3/6-3-11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-3/6-3-12.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 6-3/6-3-13.png" alt="image" width="100%" class="img3">',
        4 =>  '<img src="Biology/HG 6-3/6-3-14.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 6-3/6-3-15.png" alt="image" width="100%" class="img3">',        
        6 =>  '<img src="Biology/HG 6-3/6-3-18.png" alt="image" width="100%" class="img4">',
        7 =>  '<img src="Biology/HG 6-3/6-3-16.png" alt="image" width="100%" class="img5">',
        8 =>  '<img src="Biology/HG 6-3/6-3-17.png" alt="image" width="100%" class="img5">',
        9 =>  '<img src="Biology/HG 6-3/6-3-18.png" alt="image" width="100%" class="img6">',
        10 =>  'from: 0610/41/M/J/19',    
    
      ),
    'Describe how some environmental factors are controlled in the greenhouse to improve crop yield.' =>  array(
        1 =>  'carbon dioxide - burning',
        2 =>  'light intensity - artificial lighting',
        3 =>  'temperature - ventilation',
        4 =>  'humidity - limiting ventilation',
        5 =>  'water - irrigation',
        6 =>  'pests - pesticides',

    ),
    'Past-Paper Question 6_3_5'  =>  array(
        1 =>  '<img src="Biology/HG 6-3/6-3-20.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-3/6-3-21.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 6-3/6-3-23.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Biology/HG 6-3/6-3-22.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 6-3/6-3-24.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0610/32/M/J/15',    
    
      ),
      'Past-Paper Question 6_3_6'  =>  array(
        1 =>  '<img src="Biology/HG 6-3/6-3-25.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-3/6-3-29.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 6-3/6-3-26.png" alt="image" width="100%" class="img3">',
        4 =>  '<img src="Biology/HG 6-3/6-3-27.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 6-3/6-3-30.png" alt="image" width="100%" class="img4">',
        6 =>  '<img src="Biology/HG 6-3/6-3-28.png" alt="image" width="100%" class="img5">',    
        7 =>  '<img src="Biology/HG 6-3/6-3-31.png" alt="image" width="100%" class="img6">',    
        8 =>  'from: 0610/31/M/J/15',    
    
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
      last_visit($conn,$_SESSION['userid'],21);
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
              if($key=='Past-Paper Question 6_3_1' || $key == 'Past-Paper Question 6_3_2' || $key == 'Past-Paper Question 6_3_3'|| $key == 'Past-Paper Question 6_3_4' || $key == 'Past-Paper Question 6_3_5' || $key == 'Past-Paper Question 6_3_6'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="21" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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
    $('.img5').on('click',function(){
      $(this).hide();
      $('.img6').show();
    });
    $('.img6').on('click',function(){
      $(this).hide();
      $('.img5').show();
    });
    $('.accordion').on('click',function(){
      $('.img1').show();
      $('.img3').show();
      $('.img5').show();
    });
    $('.accordion__link:not(.accordion__link_active)').on('click',function(){
      $('.img2').hide();
      $('.img4').hide();
      $('.img6').hide();
    });
    $('.accordion__link_active').on('click',function(){
      $('.img1').show();
      $('.img3').show();
      $('.img5').show();
    });
    
  });
</script>
</body>
</html> 

