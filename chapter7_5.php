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
    <title>Absorption</title>
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

<h1 style="font-size: 45px;">Absorption</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Where is water mostly absorbed?' =>  array(
      1 =>  'small intestine',
    ),
    'Explain why lactose is not absorbed by the small intestine.' =>  array(
        1 =>  'no enzyme to break down lactose',
        2 =>  'lactose molecule is too complex',
        3 =>  'cannot pass through cell membrane',
        4 =>  'no carrier protein',

    ),
    'Past-Paper Question 7_5_1'  =>  array(
      1 =>  '<img src="Biology/HG 7-5/7-5-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 7-5/7-5-3.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Biology/HG 7-5/7-5-2.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Biology/HG 7-5/7-5-4.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0610/42/O/N/16',    
  
    ),
    'Explain how the villi are adapted for absorption.' =>  array(
        1 =>  'villi lining (epithelium)  is only one cell thick → rate of diffusion increases',
        2 =>  'large surface area provided by having microvilli → rate of diffusion increases',
        3 =>  'protein channels for active transport',
        4 =>  'mitochondria for active transport',
        5 =>  'good blood supply with many capillaries',
        6 =>  'lacteal for fats absorption',

    ),
    'Describe the function of mucus in villi.' =>  array(
        1 =>  'prevents autodigestion, toxins, pathogens',
        2 =>  'prevents walls from being damaged from stomach acid',

    ),
    'Past-Paper Question 7_5_2'  =>  array(
        1 =>  '<img src="Biology/HG 7-5/7-5-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 7-5/7-5-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 7-5/7-5-7.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/32/M/J/14',    
    
      ),
      'Past-Paper Question 7_5_3'  =>  array(
        1 =>  '<img src="Biology/HG 7-5/7-5-8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 7-5/7-5-9.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 7-5/7-5-10.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/O/N/17',    
    
      ),
      'Past-Paper Question 7_5_4'  =>  array(
        1 =>  '<img src="Biology/HG 7-5/7-5-11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 7-5/7-5-12.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 7-5/7-5-13.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/41/O/N/17',    
    
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
      last_visit($conn,$_SESSION['userid'],28);
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
              if($key=='Past-Paper Question 7_5_1' || $key == 'Past-Paper Question 7_5_2' || $key == 'Past-Paper Question 7_5_3' || $key == 'Past-Paper Question 7_5_4'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="28" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

