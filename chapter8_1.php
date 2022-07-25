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
    <title>Water Uptake</title>
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

<h1 style="font-size: 45px;">Water Uptake</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State the functions of xylem and phloem.' =>  array(
      1 =>  'xylem: transports water',
      2 =>  'phloem: transports sucrose and amino acids',
    ),
    'Identify the position of xylem and phloem in roots, stems, and leaves. ' =>  array(
        1 =>  'xylem: inner in root and stem; upper in leaves',
        2 =>  'phloem: outer in root and stem, lower in leaves',
    ),
    'Past-Paper Question 8_1_1'  =>  array(
      1 =>  '<img src="Biology/HG 8-1/8-1-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 8-1/8-1-2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0610/41/O/N/16',    
  
    ),
    'Describe the pathway of water from outside the root to the xylem vessels. || Outline how water that has entered a root hair cell reaches the stomata. || Explain how the loss of water from the leaves helps to move more water from the roots to the leaves.' =>  array(
        1 =>  'active transport of ions to create a water potential gradient',
        2 =>  'the soil now has a higher water potential than the root hair cells ',
        3 =>  'water moves from an area of higher water potential to lower water potential ',
        4 =>  'water enters root hair cells via osmosis',
        5 =>  'through a partially permeable membrane',
        6 =>  '',
        7 =>  '',
        8 =>  '',
        9 =>  'root hair cell - root cortex - xylem vessles',
        10 =>  'cohesion of water molecules and adhesion of water to xylem pulls on a whole water column in xylem',
        11 =>  'water moves up the xylem',
        12 =>  'water moves into leaf by osmosis',
        13 =>  'transpiration occurs, water diffuses out of stomata',
        14 =>  'reduced water potential at top of the plant creates another water potential gradient which draws more columns of water up the xylem continuously',
        15 =>  'this is called transpiration pull',

    ),
    
    'Describe how the xylem is adapted for its function.' =>  array(
        1 =>  'no cytoplasm - they are hollow',
        2 =>  'they have walls made of lignin - strong walls',
        3 =>  'walls are waterproof ',
        4 =>  'long elongated cells',
        5 =>  'bordered pits for water movement between vessels',

    ),
    'Suggest why there is little difference in the water flow-rate in healthy roots and in roots treated with the toxic solution.' =>  array(
        1 =>  'xylem vessels are dead so toxins have no effect',
        2 =>  'osmosis water flow into root - does not rely on living cells ',
        3 =>  'no need for energy, it is a passive mode of transport',
    ),
    'Past-Paper Question 8_1_2'  =>  array(
        1 =>  '<img src="Biology/HG 8-1/8-1-3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 8-1/8-1-5.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 8-1/8-1-6.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 8-1/8-1-7.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0610/43/O/N/19',    
    
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
      last_visit($conn,$_SESSION['userid'],30);
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
              if($key=='Past-Paper Question 8_1_1' || $key == 'Past-Paper Question 8_1_2' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="30" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

