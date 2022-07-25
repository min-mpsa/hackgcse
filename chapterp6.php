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
    <title>Pressure</title>
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

<h1 style="font-size: 45px;">Pressure</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Equation to find pressure' =>  array(
      1 =>  'P = F / A ',
      2 =>  'pressure = force/area',
    ),
    'Equation to find pressure of fluid' =>  array(
        1 =>  'pressure = density of fluid x height x acceleration due to gravity',
    ),
    'As a bubble rises to the surface, the mass of the gas in the bubble stays constant. The temperature of the water in the lake is the same throughout. Explain why the bubble rises to the surface and why its volume increases as it rises.' =>  array(
        1 =>  'it rises because density of the gas is less than density of air',
        2 =>  'as bubble rises, pressure of gas in the bubble decreases',
        3 =>  'volume of bubble increases because  pV = constant',

      ),
    'Past_Paper Question 6_1'  =>  array(
      1 =>  '<img src="Physics/PHG 8/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 8/2.png" alt="image" width="100%" class="img2">',
      3=>  'from: 0625/41/M/J/18',    
  
    ),
    'Past_Paper Question 6_2'  =>  array(
        1 =>  '<img src="Physics/PHG 8/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/4.png" alt="image" width="100%" class="img2">',
        3=>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 6_3'  =>  array(
        1 =>  '<img src="Physics/PHG 8/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 8/7.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/M/J/16',    
    
      ),
      'Past_Paper Question 6_4'  =>  array(
        1 =>  '<img src="Physics/PHG 8/8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/9.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 8/10.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Physics/PHG 8/11.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0625/41/M/J/19',    
    
      ),
      'Past_Paper Question 6_5'  =>  array(
        1 =>  '<img src="Physics/PHG 8/16.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/17.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 8/18.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/41/O/N/16',    
    
      ),
      'Past_Paper Question 6_6'  =>  array(
        1 =>  '<img src="Physics/PHG 8/19.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/20.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 8/21.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/31/M/J/15',    
    
      ),
    'Describe the simple mercury barometer and its use in measuring atmospheric pressure.' =>  array(
        1 =>  'pressure of the air pushes down onto reservoir and and forces mercury up the tube',
        2 =>  'measuring the height of mercury and using the equation pressure = hpg will give you atmospheric pressure',
      ),
      'Past_Paper Question 6_7'  =>  array(
        1 =>  '<img src="Physics/PHG 8/22.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/23.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 8/24.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/F/M/19',    
    
      ),
      'Describe the use of a manometer.' =>  array(
        1 =>  'manometers measure pressure differences',
        2 =>  'height difference shows the difference in pressure in relation to the atmospheric pressure',
      ),
      'Past_Paper Question 6_8'  =>  array(
        1 =>  '<img src="Physics/PHG 8/25.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/26.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 8/27.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/41/O/N/18',    
    
      ),
      'Past_Paper Question 6_9'  =>  array(
        1 =>  '<img src="Physics/PHG 8/28.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/29.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/18',    
    
      ),
      'Past_Paper Question 6_10'  =>  array(
        1 =>  '<img src="Physics/PHG 8/30.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 8/31.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/17',    
    
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
      last_visit($conn,$_SESSION['userid'],150);
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
              if($key=='Past_Paper Question 6_1' || $key == 'Past_Paper Question 6_2' || $key == 'Past_Paper Question 6_3' || $key == 'Past_Paper Question 6_4' || $key == 'Past_Paper Question 6_5' || $key == 'Past_Paper Question 6_6' || $key=='Past_Paper Question 6_7' || $key == 'Past_Paper Question 6_8' || $key == 'Past_Paper Question 6_9' || $key == 'Past_Paper Question 6_10' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="150" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

