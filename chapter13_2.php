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
    <title>Ultrafiltration and Selective Reabsorption</title>
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

<h1 style="font-size: 45px;">Ultrafiltration and Selective Reabsorption</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe the structure of a glomerulus.' =>  array(
      1 =>  'network of tangled capillaries',
      2 =>  'round (description of shape)',
      3 =>  'capillaries are one cell thick',
      4 =>  'capillaries have pores that are smaller than protein molecules and cells so they cannot pass through',

    ),
    'Describe the role of the glomerulus/renal capsule.' =>  array(
        1 =>  'ultrafiltration',
        2 =>  'it contains blood at high pressure: so molecules are forced out ',
        3 =>  'provides a large surface area',
        4 =>  'small or soluble particles that are filtered out e.g. glucose, urea, water',
        5 =>  'large or insoluble molecules stay in glomerulus e.g. proteins, blood cells',

    ),
    'Which waste substances are removed from the blood.' =>  array(
        1 =>  'urea',
        2 =>  'uric acid',
        3 =>  'ammonia',
        4 =>  'toxins',
        5 =>  'salt/ions ',
        6 =>  'water',

    ),
    'How much protein would you expect in the urine of a healthy person.' =>  array(
        1 =>  '0. proteins are too big to pass through the capillary wall in the glomerulus. ',
    ),
    'What are the three factors that affect the volume and concentration of urine? (3)' =>  array(
        1 =>  'water intake',
        2 =>  'temperature',
        3 =>  'exercise',
    ),
    'Describe how salts are reabsorbed against a concentration gradient. Recall: Movement in and out of cells' =>  array(
        1 =>  'carrier proteins in cell membranes are complementary to salts',
        2 =>  'salts enter protein channels',
        3 =>  'the carrier proteins move ions from low concentration to high concentration by changing shape',
        4 =>  'this process uses energy from respiration',
        5 =>  'this is active transport',

    ),
    'Explain how the cells that line the kidney tubules absorb many compounds from the filtrate.' =>  array(
        1 =>  'cells contain microvilli',
        2 =>  'microvilli give a large surface area',
        3 =>  'for more efficient diffusion',
        4 =>  '',
        5 =>  '',
        6 =>  'lots of mitochondria',
        7 =>  'mitochondria are the site of aerobic respiration and they provide energy',
        8 =>  'energy is needed for active transport',
        9 =>  'active transport is needed to absorb compounds against the concentration gradient',

    ),
    
    'Past-Paper Question 13_2_1'  =>  array(
      1 =>  '<img src="Biology/HG 13-1/13-1-7.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 13-1/13-1-8.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 13-1/13-1-9.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/32/O/N/14',    
  
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
      last_visit($conn,$_SESSION['userid'],52);
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
              if($key=='Past-Paper Question 13_2_1' || $key == 'Explain how the cells that line the kidney tubules absorb many compounds from the filtrate.' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="52" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

