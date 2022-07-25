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
    <title>Momentum</title>
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

<h1 style="font-size: 45px;">Momentum</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Equation to find momentum' =>  array(
      1 =>  'momentum = mass x velocity',
      2 =>  'p = mv',
    ),
    'Why is momentum a vector quantity.' =>  array(
        1 =>  'momentum has direction',
    ),
    'What is the principle of conservation of momentum?' =>  array(
        1 =>  'in an isolated system with no external forces, total momentum remains constant',
    ),
    'Define impulse. (2)' =>  array(
        1 =>  'force x time (for which it acts)',
        2 =>  'change of momentum (mv - mu)',
    ),
    'Explain how the principle of conservation of momentum applies to an accelerating rocket and its exhaust gases.' =>  array(
        1 =>  'rocket gains upward momentum',
        2 =>  'ejected gas gains equal quantity of momentum in opposite direction',
    ),
    'Modern cars are designed so that, during a collision, the front section of the car is crushed and the time of contact increases. Explain the benefit of increasing the time of contact for the people in the car.' =>  array(
        1 =>  'force = change of momentum/time  ',
        2 =>  'increased time causes decreased rate of change of momentum',
        3 =>  'smaller forces on people → less injury',
    ),
    'Past_Paper Question 4_1_1'  =>  array(
      1 =>  '<img src="Physics/PHG 6/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 6/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/F/M/18',    
  
    ),
    'Past_Paper Question 4_1_2'  =>  array(
        1 =>  '<img src="Physics/PHG 6/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 6/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/17',    
    
      ),
      'Past_Paper Question 4_1_3'  =>  array(
        1 =>  '<img src="Physics/PHG 6/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 6/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/16',    
    
      ),
      'Past_Paper Question 4_1_4'  =>  array(
        1 =>  '<img src="Physics/PHG 6/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 6/8.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/16',    
    
      ),
      'Past_Paper Question 4_1_5'  =>  array(
        1 =>  '<img src="Physics/PHG 6/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 6/10.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 6/11.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/M/J/19',    
    
      ),
      'Past_Paper Question 4_1_6'  =>  array(
        1 =>  '<img src="Physics/PHG 6/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 6/13.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 6/14.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/43/M/J/19',    
    
      ),
      'Past_Paper Question 4_1_7'  =>  array(
        1 =>  '<img src="Physics/PHG 6/15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 6/16.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 6/17.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/16',    
    
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
      last_visit($conn,$_SESSION['userid'],144);
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
              if($key=='Past_Paper Question 4_1_1' || $key == 'Past_Paper Question 4_1_2' || $key == 'Past_Paper Question 4_1_3' || $key == 'Past_Paper Question 4_1_4' || $key == 'Past_Paper Question 4_1_5' || $key == 'Past_Paper Question 4_1_6' || $key == 'Past_Paper Question 4_1_7'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="144" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

