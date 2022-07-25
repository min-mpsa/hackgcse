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
    <title>Transpiration</title>
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

<h1 style="font-size: 45px;">Transpiration</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define transpiration.' =>  array(
      1 =>  'loss of water vapor from plant leaves ',
      2 =>  'by evaporation of water at the surfaces of the mesophyll cells',
      3 =>  'followed by diffusion of water vapor through the stomata',
    ),
    'Past-Paper Question 8_2_1'  =>  array(
        1 =>  '<img src="Biology/HG 8-2/8-2-1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 8-2/8-2-2.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 8-2/8-2-3.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/33/O/N/15',    
    
      ),
    
    'Explain the importance of increasing humidity near the leaf surface.' =>  array(
        1 =>  'increased reduce  humidity will reduce transpiration rate',
        2 =>  'reduced water potential gradient in plant',
        3 =>  'causes less water loss',
        4 =>  'reduces changes of wilting',

    ),
    'State and explain the effect of an increase in temperature on the rate of transpiration.' =>  array(
        1 =>  'kinetic energy of molecules of water increases',
        2 =>  'increases rate of diffusion of water vapor',
        3 =>  'more evaporation',
        4 =>  'increase in rate of transpiration',
        5 =>  'stomatal pores become wider/narrower ',

    ),
    'Explain how the internal structure of leaves results in the loss of large quantities of water in transpiration.' =>  array(
        1 =>  'xylem supplies water',
        2 =>  'water evaporates from surface of mesophyll cells',
        3 =>  'air spaces allow evaporation of water',
        4 =>  'large internal surface area increases evaporation rate',
        5 =>  'guard cells, open (or) close stomata',
        6 =>  'water vapor diffuses out through stomata',

    ),
    'Past-Paper Question 8_2_2'  =>  array(
        1 =>  '<img src="Biology/HG 8-2/8-2-4.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 8-2/8-2-5.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 8-2/8-2-6.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/F/M/19',    
    
      ),
      'Past-Paper Question 8_2_3'  =>  array(
        1 =>  '<img src="Biology/HG 8-2/8-2-7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 8-2/8-2-8.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 8-2/8-2-9.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/31/O/N/14',    
    
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
      last_visit($conn,$_SESSION['userid'],31);
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
              if($key=='Past-Paper Question 8_2_1' || $key == 'Past-Paper Question 8_2_2' || $key == 'Past-Paper Question 8_2_3'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="31" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

