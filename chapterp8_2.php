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
    <title>Measurement of Temperature</title>
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

<h1 style="font-size: 45px;">Measurement of Temperature</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State the values of the fixed points on a temperature scale.' =>  array(
      1 =>  'O C and 100 C',
    ),
    'What is the range of a thermometer? ' =>  array(
        1 =>  'difference between the maximum temperature and the minimum temperature it can measure',
    ),
    'How would you modify a thermometer to increase its range?' =>  array(
        1 =>  'increase cross-sectional area of the capillary',
        2 =>  'use liquid with less expansion per degree',
        3 =>  'use a longer capillary',
        4 =>  'use a smaller bulb',

    ),
    'What is the sensitivity of a thermometer?' =>  array(
        1 =>  'distance moved by thread of liquid per unit of temperature change (per degree Celsius)',
    ),
    'How would you modify a thermometer to increase its sensitivity? Explain each change.' =>  array(
        1 =>  'use a narrower capillary → thread moves further for same expansion',
        2 =>  'use a larger bulb → contains more liquid, greater expansion',
        3 =>  'use a liquid with larger expansion per degree (i.e. alcohol instead of mercury)',
    ),
    'What is the linearity of a thermometer?' =>  array(
        1 =>  'the property of having uniform changes in expansion with a change in temperature',
    ),
    'The graduations on a liquid-in-glass thermometer are equally spaced. For the equal spacing of the graduations to be correct, state the assumptions made about the liquid in the thermometer and the structure of the thermometer.' =>  array(
        1 =>  'the liquid has linear expansion (has equal expansion for each degree of temperature rise)',
        2 =>  'the thermometer has a tube of constant cross-sectional area',
    ),
    'Draw a labelled diagram of a thermocouple thermometer and outline how it works.' =>  array(
        1 =>  'different in temperature causes difference in potential difference',
        2 =>  'the higher the difference in temperature, the higher the different in potential difference',
        3 =>  '<img src="Physics/PHG 10/1.png" alt="image" width="100%" class="img1">',
    ),
    'Suggest when a thermocouple would be more suitable than a liquid-in-glass thermometer.' =>  array(
        1 =>  'measurement of a very high/very low temperature ',
        2 =>  'measurement of a rapidly changing temperature',
    ),
    'Past_Paper Question 8_2_1'  =>  array(
      1 =>  '<img src="Physics/PHG 10/4.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 10/5.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/32/M/J/15',    
  
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
      last_visit($conn,$_SESSION['userid'],157);
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
              if($key=='Past_Paper Question 8_2_1' || $key == 'Draw a labelled diagram of a thermocouple thermometer and outline how it works.' || $key == '' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="157" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

