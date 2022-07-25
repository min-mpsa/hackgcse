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
    <title>Sulfur and Carbonates</title>
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
                <a href="chemistry.php"><button class="hide2">Chemistry</button></a>
            </div>
        </header>

<h1 style="font-size: 45px;">Sulfur and Carbonates</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Name some sources of sulfur.' =>  array(
      1 =>  'metal ores like lead sulphide',
      2 =>  'occur naturally in fossil fuels',
      3 =>  'large underground beds',
    ),
    'What is sulfur used for?' =>  array(
        1 =>  'manufacture of sulphuric acid',
    ),
    'What is sulfur dioxide used for?' =>  array(
        1 =>  'food preservation (by killing bacteria)',
        2 =>  'as bleach in the manufacture of wood pulp for paper',
    ),
    'Describe the manufacture of sulfuric acid by the Contact process, including essential conditions and reactions.' =>  array(
        1 =>  'S + O2 → SO2',
        2 =>  'catalyst: vanadium (V) oxide , V2O5',
        3 =>  'temperature: ',
        4 =>  '2SO2 + O2 → 2SO3 (catalyst, temperature, and pressure in use) ',
        5 =>  'this is a reversible reaction. The forward reaction is exothermic',
        6 =>  'SO3 + H2SO4 → H2S2O7 (oleum)',
        7 =>  'H2S2O7 + H2O → 2H2SO4',

    ),
    'Why dont we directly react sulfur trioxide with water to produce sulfuric acid?' =>  array(
        1 =>  'can cause explosion',
    ),
    'What are some properties of sulfuric acid (dilute and concentrated)?' =>  array(
        1 =>  'concentrated sulfuric acid: dehydrating agent, thick oily liquid',
        2 =>  'strong acid, low pH, high conductivity',
    ),
    'What are some uses of sulfuric acid?' =>  array(
        1 =>  'making detergent',
        2 =>  'used in car battery',
    ),
    'Past Paper Question 12_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 13/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 13/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/16',    
  
    ),
    'Past Paper Question 12_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 13/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 13/5.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 13/4.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 13/6.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/31/O/N/15',    
    
      ),
      'What is lime and slaked lime?' =>  array(
        1 =>  'lime: calcium oxide',
        2 =>  'slaked lime: calcium hydroxide',
    ),
    'Name the uses of calcium carbonate.' =>  array(
        1 =>  'manufacture of iron (to remove impurities)',
        2 =>  'manufacture of cement',
    ),
    'Name the uses of lime and slaked lime.' =>  array(
        1 =>  'treating acidic soil',
        2 =>  'neutralizing acidic industrial waste products (flue gas desulfurization)',
    ),
    
      'Past Paper Question 12_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 13/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 13/8.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/F/M/18',    
    
      ),
    
      'Past Paper Question 12_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 13/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 13/10.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/33/M/J/15',    
    
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
      last_visit($conn,$_SESSION['userid'],125);
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
              if($key=='Past Paper Question 12_1' || $key == 'Past Paper Question 12_2' || $key == 'Past Paper Question 12_3' || $key == 'Past Paper Question 12_4' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="125" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

