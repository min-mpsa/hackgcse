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
    <title>Transformer</title>
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

<h1 style="font-size: 45px;">Transformer</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe the operation of a transformer.' =>  array(
      1 =>  'alternating current causes a changing magnetic field in soft iron core',
      2 =>  'secondary coil cuts this magnetic field',
      3 =>  'e.m.f is induced in the secondary coil',
      4 =>  'magnitude of voltage depends on the number of turns of the coil (the more the coil cuts the magnetic field, the higher the voltage)',

    ),
    'Explain why the voltage of the supply to the primary coil of the transformer must be alternating.' =>  array(
        1 =>  'to produce an alternating magnetic field',
        2 =>  'so that the current is induced continuously in the secondary coil',
    ),
    'Suggest the material from which the coils on a transformer are made and why it is used.' =>  array(
        1 =>  'copper ',
        2 =>  'it is a good electrical conductor',
    ),
    'Suggest the material from which the core on a transformer are made and why it is used.' =>  array(
        1 =>  'soft iron',
        2 =>  'it can easily be magnetized and demagnetized',
    ),
    'What is the difference between a step-up transformer and a step-down transformer?' =>  array(
        1 =>  'step-up: increases the voltage',
        2 =>  'step-down: decreases the voltage',
    ),
    'The electrical energy produced by a power station is transmitted over long distances at a very high voltage. Explain why a high voltage is used.' =>  array(
        1 =>  'if voltage is high, current is low',
        2 =>  'if current is low, thermal energy generated/power loss is low',
        3 =>  'we can use thinner transmission cables with less resistance which are cheaper',
    ),
    'Past_Paper Question 14_3_1'  =>  array(
      1 =>  '<img src="Physics/PHG 21/22.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 21/23.png" alt="image" width="100%" class="img2">',    
      3 =>  'from: 0625/42/M/J/18',    
  
    ),
    'Past_Paper Question 14_3_2'  =>  array(
        1 =>  '<img src="Physics/PHG 21/24.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/25.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 21/26.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 14_3_3'  =>  array(
        1 =>  '<img src="Physics/PHG 21/27.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/28.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 14_3_4'  =>  array(
        1 =>  '<img src="Physics/PHG 21/29.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/30.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 21/31.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 14_3_5'  =>  array(
        1 =>  '<img src="Physics/PHG 21/32.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/33.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0625/42/M/J/18',    
    
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
      last_visit($conn,$_SESSION['userid'],181);
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
              if($key=='Past_Paper Question 14_3_1' || $key == 'Past_Paper Question 14_3_2' || $key == 'Past_Paper Question 14_3_3' || $key == 'Past_Paper Question 14_3_4' || $key == 'Past_Paper Question 14_3_5' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="181" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

