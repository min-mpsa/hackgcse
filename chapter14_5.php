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
    <title>Tropic Responses</title>
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

<h1 style="font-size: 45px;">Tropic Responses</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define gravitropism.' =>  array(
      1 =>  'a response in which parts of a plant grows towards or away from gravity',
    ),
    'Define phototropism.' =>  array(
        1 =>  'a response in which parts of a plant grow towards of away from the direction from which light is coming',
    ),
    'Explain the role of auxin in controlling shoot growth in response to light.' =>  array(
        1 =>  'auxins are produced in shoot tip',
        2 =>  'it diffuses down the stem',
        3 =>  'auxins collect in the dark side',
        4 =>  'auxin stimulates cell elongation',
        5 =>  'greater cell elongation on side in the dark so shoot grows towards light',
    ),
    'Explain the role of auxin in controlling stem growth in response to gravity.' =>  array(
        1 =>  'auxin is made in the shoot tip',
        2 =>  'auxin diffuses away from the tip',
        3 =>  'it collects on the lower side of the stem due to gravity',
        4 =>  'auxin stimulates cell elongation',
        5 =>  'the stem grows upwards',

    ),
    'Past-Paper Question 14_5_1'  =>  array(
      1 =>  '<img src="Biology/HG 14-5/14-5-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 14-5/14-5-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 14-5/14-5-3.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/41/M/J/16',    
  
    ),
    'Past-Paper Question 14_5_2'  =>  array(
        1 =>  '<img src="Biology/HG 14-5/14-5-4.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-5/14-5-6.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 14-5/14-5-5.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 14-5/14-5-7.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0610/43/O/N/16',    
    
      ),
      'There are situations in which the roots do not grow downwards. Suggest and explain some situations.'  =>  array(
        1 =>  '<img src="Biology/HG 14-5/14-5-8.png" alt="image" width="100%" class="img1">',
         
    
      ),
      'Explain how 2,4 D acts as a weedkiller.' =>  array(
        1 =>  'this hormone is absorbed by weeds',
        2 =>  'less absorption by crops',
        3 =>  'increases the growth rate of weeds',
        4 =>  'plant cannot produce glucose fast enough to keep up with the growth rate',
        5 =>  'weeds cannot maintain rate of growth',
        6 =>  'falls over and cannot absorb sunlight',

    ),
    'Past-Paper Question 14_5_3'  =>  array(
        1 =>  '<img src="Biology/HG 14-5/14-5-9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-5/14-5-10.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/42/F/M/18',    
    
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
      last_visit($conn,$_SESSION['userid'],59);
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
              if($key=='Past-Paper Question 14_5_1' || $key == 'Past-Paper Question 14_5_2' || $key == 'Past-Paper Question 14_5_3' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="59" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

