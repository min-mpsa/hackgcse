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
    <title>Leaf</title>
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

<h1 style="font-size: 45px;">Leaf</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Past-Paper Question 6_4_1'  =>  array(
        1 =>  '<img src="Biology/HG 6-4/6-4-1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-4/6-4-3.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 6-4/6-4-2.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 6-4/6-4-4.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0610/43/O/N/16',    
    
      ),
      'Past-Paper Question 6_4_2'  =>  array(
        1 =>  '<img src="Biology/HG 6-4/6-4-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-4/6-4-6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/31/O/N/15',    
    
      ),
    'Name the epidermal cells that control the size of the stomata.' =>  array(
      1 =>  'guard cells',
    ),
    'Past-Paper Question 6_4_3'  =>  array(
        1 =>  '<img src="Biology/HG 6-4/6-4-7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 6-4/6-4-8.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 6-4/6-4-9.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 6-4/6-4-10.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0610/43/O/N/18',    
    
      ),
    'Describe the function of the stomata.' =>  array(
        1 =>  'allows movement of gases (O2 and CO2) into and out of leaf',
        2 =>  'photosynthesis: CO2 in, O2 out - respiration: O2 in, CO2 out',
        3 =>  'for photosynthesis and respiration',
        4 =>  'it allows transpiration',
        5 =>  'which enables water to be pulled up the plant',
        6 =>  'controls rate of transpiration',

    ),
    'Explain how the internal structure of a leaf is adapted for photosynthesis.' =>  array(
        1 =>  'Epidermal cells:',
        2 =>  'Transparent epidermal cells: allow light to pass through',
        3 =>  'Thin epidermal layer (one cell thick): so more light can pass through',
        4 =>  '',
        5 =>  '',
        6 =>  'Palisade mesophyll cells:',
        7 =>  'contain a lot of chloroplasts: so more light energy can be trapped',
        8 =>  'tightly packed: maximizes the light received by cells',
        9 =>  'are located near the top of the leaf: to maximize light received',
        10 =>  '',
        11 =>  '',
        12 =>  'Spongy mesophyll cells:',
        13 =>  'loosely packed: allow the diffusion of gases within the leaf',
        14 =>  'large surface area: cell surfaces are sites of gas exchange',

    ),
    'Explain why spongy mesophyll cells should have large surface area.' =>  array(
        1 =>  'faster rate of diffusion',
        2 =>  'carbon dioxide is raw material needed for photosynthesis',
        3 =>  'more absorption of carbon dioxide',
        4 =>  'more absorption of oxygen for aerobic respiration ',
        5 =>  'more evaporation of water to increase transpirational pull',

    ),
    'Explain why there are many interconnecting air spaces within the leaf.' =>  array(
        1 =>  'air spaces connect to outside air via stomata',
        2 =>  'allows for the diffusion of gases throughout the whole of the leaf',
        3 =>  'faster diffusion',
        4 =>  'allows more efficient photosynthesis, respiration, and evaporation for transpiration',

    ),
    'Past-Paper Question 6_4_4'  =>  array(
      1 =>  '<img src="Biology/HG 6-4/6-4-11.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 6-4/6-4-12.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 6-4/6-4-13.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/32/O/N/15',    
  
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
      last_visit($conn,$_SESSION['userid'],22);
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
              if($key=='Past-Paper Question 6_4_1' || $key == 'Past-Paper Question 6_4_2' || $key == 'Past-Paper Question 6_4_3' || $key == 'Past-Paper Question 6_4_4' || $key == 'Explain how the internal structure of a leaf is adapted for photosynthesis.' ){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="22" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

