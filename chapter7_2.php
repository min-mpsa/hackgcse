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
    <title>Alimentary Canal</title>
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

<h1 style="font-size: 45px;">Alimentary Canal</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define ingestion.' =>  array(
        1 =>  'taking of substances into the body through the mouth',
      ),
    'Define mechanical digestion.' =>  array(
      1 =>  'breakdown of food into smaller pieces ',
      2 =>  'without chemical change to the food molecules',
    ),
    'Define chemical digestion.' =>  array(
        1 =>  'breakdown of large, insoluble molecules ',
        2 =>  'into small, soluble molecules',
    ),
    'Define absorption.' =>  array(
        1 =>  'movement of small food molecules and ions',
        2 =>  'through the wall of the intestine into the blood',
      ),
    'Define assimilation. ' =>  array(
        1 =>  'movement of digested food molecules',
        2 =>  'into the cells of the body',
        3 =>  'where they are used, becoming part of the cells',
    ),
    'Define egestion. ' =>  array(
        1 =>  'passing out of food that has not be digested or absorbed',
        2 =>  'as faeces, through the anus',
      ),
      'Define diarrhea. ' =>  array(
        1 =>  'loss of watery faeces',
      ),
      'Describe the effects of diarrhea on the body and your health.' =>  array(
        1 =>  'watery faeces',
        2 =>  'dehydration',
        3 =>  'loss of ions',
        4 =>  'stomach pain',

    ),
    'Describe and explain the effects of the cholera bacteria on the gut.' =>  array(
        1 =>  'produces a toxin',
        2 =>  'toxin attaches to the wall of the small intestine',
        3 =>  'secretion of chloride ions into the small intestine',
        4 =>  'causing a water potential gradient - water potential of the intestinal lumen is lowered',
        5 =>  'causes the osmotic movement of water into the gut, water flows from the cells/blood into the lumen',
        6 =>  'loss of salts from the blood',
        7 =>  'causes diarrhea',

    ),
    'Outline the treatment of diarrheo.' =>  array(
        1 =>  'oral rehydration solution',
        2 =>  'the salt reduces water potential gradient in gut',
        3 =>  'replenishes energy for active transport',
        4 =>  'the water rehydrates you (because you lost a lot of water',

    ),
    'Label the alimentary canal.'  =>  array(
      1 =>  '<img src="Biology/HG 7-1/7-1-5.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 7-1/7-1-6.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 7-1/7-1-7.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/41/M/J/18',    
  
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
      last_visit($conn,$_SESSION['userid'],25);
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
              if($key=='Label the alimentary canal.' || $key == '' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="25" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

