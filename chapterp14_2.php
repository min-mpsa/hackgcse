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
    <title>A.C Generator</title>
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

<h1 style="font-size: 45px;">A.C Generator</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'How does  a direct current differ from an alternating current?' =>  array(
      1 =>  'd.c. has constant value',
      2 =>  'has only one direction',
    ),
    'What is the Flemings right-hand rule?' =>  array(
        1 =>  'thumb: motion direction',
        2 =>  'index finger: magnetic field direction (N to S)',
        3 =>  'middle finger: induced e.m.f direction',
        4 =>  '<img src="Physics/PHG 21/8.png" alt="image" width="100%" class="img1">',

    ),
    'Describe and explain a rotating-coil generator and the use of slip rings.' =>  array(
        1 =>  '<img src="Physics/PHG 21/9.png" alt="image" width="100%" class="img1">',
        2 =>  'when the coil is rotated, it cuts the magnetic field lines',
        3 =>  'e.m.f is induced in the coil',
        4 =>  'brush connects coil and the circuit outside, and allows the induced e.m.f to reach the circuit',
        5 =>  'every half-turn, the direction of current induced in the coil reverses',
        6 =>  'this produces alternating current',

    ),
    'How can you increase the magnitude of this induced e.m.f?' =>  array(
        1 =>  'increase number of turns on the coil',
        2 =>  'increase area of coil',
        3 =>  'rotate coil at faster speed',
        4 =>  'use a stronger magnet',

    ),
    'Past_Paper Question 14_2_1'  =>  array(
      1 =>  '<img src="Physics/PHG 21/10.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 21/11.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/43/O/N/18',    
  
    ),
    'Past_Paper Question 14_2_2'  =>  array(
        1 =>  '<img src="Physics/PHG 21/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/13.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 21/14.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/19',    
    
      ),
      'Past_Paper Question 14_2_3'  =>  array(
        1 =>  '<img src="Physics/PHG 21/15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/16.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 21/17.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/43/O/N/17',    
    
      ),
      'Past_Paper Question 14_2_4'  =>  array(
        1 =>  '<img src="Physics/PHG 21/18.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/20.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 21/19.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Physics/PHG 21/21.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0625/43/M/J/19',    
    
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
      last_visit($conn,$_SESSION['userid'],180);
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
              if($key=='Past_Paper Question 14_2_1' || $key == 'Past_Paper Question 14_2_2' || $key == 'Past_Paper Question 14_2_3' || $key == 'Past_Paper Question 14_2_4' || $key == 'What is the Flemings right-hand rule?' || $key == 'Describe and explain a rotating-coil generator and the use of slip rings.'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="180" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

