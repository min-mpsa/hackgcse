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
    <title>Sound</title>
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
                <a href="physics.php"><button class="hide2">Physics</button></a>
            </div>
        </header>

<h1 style="font-size: 45px;">Sound</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is amplitude?' =>  array(
      1 =>  'maximum displacement of a wave from its undisturbed point',
    ),
    'What is compression?' =>  array(
        1 =>  'part of the wave where molecules are closer together/pressure is higher',
    ),
    'What is rarefaction?' =>  array(
        1 =>  'region where particles are further away',
    ),
    'What is the approximate range of audible frequencies for a healthy human ear.' =>  array(
        1 =>  '20 Hz to 20,000 Hz',
    ),
    'State what is meant by ultrasound and suggest a value for the minimum possible frequency of ultrasound waves.' =>  array(
        1 =>  'sound wave with a frequency above the frequency audible for humans',
        2 =>  '20,000 Hz',
    ),
    'Speed of sound in solid, liquid, gas' =>  array(
        1 =>  'solid: 3000 m/s',
        2 =>  'liquid: 1000 m/s ',
        3 =>  'gas: 330 m/s ',
    ),
    'Relate loudness and pitch of sound waves to amplitude and frequency.' =>  array(
        1 =>  'the higher the amplitude, the louder the sound',
        2 =>  'the higher the frequency, the higher the pitch',
    ),
    'Past_Paper Question 10_5_1'  =>  array(
        1 =>  '<img src="Physics/PHG 15/1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/2.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/M/J/18',    
    
      ),
      'Past_Paper Question 10_5_2'  =>  array(
        1 =>  '<img src="Physics/PHG 15/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/19',    
    
      ),
      'Past_Paper Question 10_5_3'  =>  array(
        1 =>  '<img src="Physics/PHG 15/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/M/J/17',    
    
      ),
      'Past_Paper Question 10_5_4'  =>  array(
        1 =>  '<img src="Physics/PHG 15/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/8.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 15/9.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/41/M/J/17',    
    
      ),
      'Past_Paper Question 10_5_5'  =>  array(
        1 =>  '<img src="Physics/PHG 15/10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/11.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 15/12.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/F/M/16',    
    
      ),
      'Past_Paper Question 10_5_6'  =>  array(
        1 =>  '<img src="Physics/PHG 15/13.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/14.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/M/J/19',    
    
      ),
      'Past_Paper Question 10_5_7'  =>  array(
        1 =>  '<img src="Physics/PHG 15/15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/16.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/32/M/J/15',    
    
      ),
      'Past_Paper Question 10_5_8'  =>  array(
        1 =>  '<img src="Physics/PHG 15/17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 15/18.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/19',    
    
      ),
    'Past_Paper Question 10_5_9'  =>  array(
      1 =>  '<img src="Physics/PHG 15/19.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 15/20.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Physics/PHG 15/21.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Physics/PHG 15/22.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0625/41/M/J/16',    
  
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
      last_visit($conn,$_SESSION['userid'],167);
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
              if($key=='Past_Paper Question 10_5_1' || $key == 'Past_Paper Question 10_5_2' || $key == 'Past_Paper Question 10_5_3' || $key == 'Past_Paper Question 10_5_4' || $key == 'Past_Paper Question 10_5_5' || $key == 'Past_Paper Question 10_5_6' || $key=='Past_Paper Question 10_5_7' || $key == 'Past_Paper Question 10_5_8' || $key == 'Past_Paper Question 10_5_9' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="167" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

