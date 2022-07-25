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
    <title>Pressure Changes</title>
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

<h1 style="font-size: 45px;">Pressure Changes</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'A helium-filled balloon in a room of a house suddenly bursts. State and explain, in terms of atoms, what happens to the helium inside of the balloon after the balloon has burst.' =>  array(
      1 =>  'helium diffuses and collide with air molecules',
      2 =>  'helium atoms travel in all directions',
      3 =>  'helium rises because it has low density',
    ),
    'Explain in terms of molecules why the pressure of the gas increases when the volume of the balloon decreases. The temperature of the gas is constant. ' =>  array(
        1 =>  'more frequent collisions with walls',
        2 =>  'greater rate of change of momentum',
        3 =>  'greater total force caused by molecules',
        4 =>  'greater pressure (P = F/A)',

    ),
    'Explain in terms of molecules why the pressure of the gas increases when the temperature increases. The volume of the gas is constant. ' =>  array(
        1 =>  'molecules have more kinetic energy',
        2 =>  'more frequent collisions with wall',
        3 =>  'greater rate of change of momentum',
        4 =>  'greater total force caused by molecules on collisions',
        5 =>  'P = F/A , pressure of the gas becomes greater as P and F are directly proportional',

    ),
    'Past_Paper Question 7_3_1'  =>  array(
      1 =>  '<img src="Physics/PHG 9/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 9/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/F/M/19',    
  
    ),
    'Past_Paper Question 7_3_2'  =>  array(
        1 =>  '<img src="Physics/PHG 9/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 9/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/M/J/16',    
    
      ),
      'Past_Paper Question 7_3_3'  =>  array(
        1 =>  '<img src="Physics/PHG 9/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 9/6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 9/7.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/43/M/J/18',    
    
      ),
      'Past_Paper Question 7_3_4'  =>  array(
        1 =>  '<img src="Physics/PHG 9/8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 9/9.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/16',    
    
      ),
      'Past_Paper Question 7_3_5'  =>  array(
        1 =>  '<img src="Physics/PHG 9/10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 9/11.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/M/J/17',    
    
      ),
      'Past_Paper Question 7_3_6'  =>  array(
        1 =>  '<img src="Physics/PHG 9/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 9/13.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 9/14.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/43/M/J/16',    
    
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
      last_visit($conn,$_SESSION['userid'],154);
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
              if($key=='Past_Paper Question 7_3_1' || $key == 'Past_Paper Question 7_3_2' || $key == 'Past_Paper Question 7_3_3' || $key == 'Past_Paper Question 7_3_4' || $key == 'Past_Paper Question 7_3_5' || $key == 'Past_Paper Question 7_3_6'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="154" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

