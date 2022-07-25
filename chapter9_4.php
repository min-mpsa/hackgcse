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
    <title>Blood and tissue fluid</title>
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

<h1 style="font-size: 45px;">Blood and tissue fluid</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State the different types of blood cells and their functions.' =>  array(
      1 =>  'Red Blood Cells',
      2 =>  'transports oxygen',
      3 =>  'haemoglobin binds to oxygen to form oxyhaemoglobin',
      4 =>  '',
      5 =>  '',
      6 =>  'White Blood Cells',
      7 =>  'defends body from pathogens',
      8 =>  'phagocytes: phagocytosis',
      9 =>  'lymphocytes: antibody production',
      10 =>  '',
      11 =>  '',
      12 =>  'Platelets: clotting',
      13 =>  '',
      14 =>  '',
      15 =>  'Plasma: transport blood cells, ions, soluble nutrients (glucose, amino acids, etc.) , hormones, carbon dioxide',

    ),
    'Past-Paper Question 9_4_1'  =>  array(
        1 =>  '<img src="Biology/HG 9-4/9-4-1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 9-4/9-4-2.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 9-4/9-4-3.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/O/N/18',    
    
      ),
      'Human red blood cells do not contain a nucleus. State an advantage of this.' =>  array(
        1 =>  'more space for haemoglobin',
        2 =>  'to enable greater oxygen carrying capacity',
        3 =>  'more flexible',
    ),
    'State the names of some proteins found in blood.' =>  array(
        1 =>  'plasma proteins',
        2 =>  'haemoglobin',
        3 =>  'enzymes',
        4 =>  'antibodies',
        5 =>  'fibrinogen',

    ),
    'How does the three ways the plasma transport carbon dioxide? ' =>  array(
        1 =>  'dissolved as gas',
        2 =>  'as carbonic acid',
        3 =>  'binds to haemoglobin',
    ),
    'Describe how substances move from the blood in the capillaries into the tissue fluid.' =>  array(
        1 =>  'oxygen diffuses from blood to tissue fluid',
        2 =>  'across the wall of capillary',
        3 =>  'down a concentration gradient',
        4 =>  'the pressure in capillary forces out nutrient solutes dissovled in water',
        5 =>  'large insoluble molecules too large to pass through capillary pores',

    ),
    'Describe how a blood clot forms.' =>  array(
        1 =>  'platelets activate',
        2 =>  'the conversion of fibrinogen to fibrin',
        3 =>  'soluble to insoluble (fibrinogen is soluble, fibrin is insoluble)',
        4 =>  'fibrin forms a mesh',
        5 =>  'traps red blood cells',

    ),
    'State the importance of blood clotting.' =>  array(
        1 =>  'prevents blood loss',
        2 =>  'prevent pathogens from entering a wound',
    ),
    'Past-Paper Question 9_4_2'  =>  array(
      1 =>  '<img src="Biology/HG 9-4/9-4-4.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 9-4/9-4-5.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 9-4/9-4-6.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/32/O/N/14',    
  
    ),
    'Past-Paper Question 9_4_3'  =>  array(
        1 =>  '<img src="Biology/HG 9-4/9-4-7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 9-4/9-4-8.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 9-4/9-4-10.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Biology/HG 9-4/9-4-9.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 9-4/9-4-11.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0610/43/O/N/18',    
    
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
      last_visit($conn,$_SESSION['userid'],38);
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
              if($key=='Past-Paper Question 9_4_1' || $key == 'Past-Paper Question 9_4_2' || $key == 'Past-Paper Question 9_4_3' || $key == 'State the different types of blood cells and their functions.'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="38" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

