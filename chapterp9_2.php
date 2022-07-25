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
    <title>Radiation and Consequences of Energy Transfer</title>
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

<h1 style="font-size: 45px;">Radiation and Consequences of Energy Transfer</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is the main difference between radiation and the other two forms of energy transfer?' =>  array(
      1 =>  'radiation does not require a medium',
    ),
    'Between black, white, and silver surfaces, which is the best reflector and which is the worst reflector of thermal radiation?' =>  array(
        1 =>  'best: silver',
        2 =>  'middle: white',
        3 =>  'worst: black',
    ),
    'Between black, white, and silver surfaces, which is the best absorber and which is the worst absorber of thermal radiation?' =>  array(
        1 =>  'best: black',
        2 =>  'worst: silver',
        3 =>  'middle: white',
    ),
    'Between black, white, and silver surfaces, which is the best emitter and which is the worst emitter of thermal radiation?' =>  array(
        1 =>  'best: black',
        2 =>  'worst: silver',
        3 =>  'middle: white',
    ),
    'Explain why houses in hot countries are painted white.' =>  array(
        1 =>  'white surfaces absorb less radiation',
        2 =>  'white surfaces reflect more',
        3 =>  'keeps houses cooler',
    ),
    'How does the surface area of a body affect the amount of radiation emitted?' =>  array(
        1 =>  'the greater the surface area, the greater the amount of radiation emitted',
    ),
    'Past_Paper Question 9_2_1'  =>  array(
      1 =>  '<img src="Physics/PHG 11/8.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 11/9.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/43/M/J/17',    
  
    ),
    'Past_Paper Question 9_2_2'  =>  array(
        1 =>  '<img src="Physics/PHG 11/10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/11.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/16',    
    
      ),
      'Past_Paper Question 9_2_3'  =>  array(
        1 =>  '<img src="Physics/PHG 11/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/13.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/19',    
    
      ),
      'Past_Paper Question 9_2_4'  =>  array(
        1 =>  '<img src="Physics/PHG 11/14.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/15.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 9_2_5'  =>  array(
        1 =>  '<img src="Physics/PHG 11/16.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/17.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 11/18.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/F/M/17',    
    
      ),
      'Past_Paper Question 9_2_6'  =>  array(
        1 =>  '<img src="Physics/PHG 11/19.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/20.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 11/21.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/41/M/J/17',   
    
      ),
      'Past_Paper Question 9_2_7'  =>  array(
        1 =>  '<img src="Physics/PHG 11/22.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/23.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/17',    
    
      ),
      'Past_Paper Question 9_2_8'  =>  array(
        1 =>  '<img src="Physics/PHG 11/24.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/25.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/M/J/19',    
    
      ),
      'Past_Paper Question 9_2_9'  =>  array(
        1 =>  '<img src="Physics/PHG 11/26.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 11/27.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 11/28.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/O/N/18',    
    
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
      last_visit($conn,$_SESSION['userid'],161);
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
              if($key=='Past_Paper Question 9_2_1' || $key == 'Past_Paper Question 9_2_2' || $key == 'Past_Paper Question 9_2_3' || $key == 'Past_Paper Question 9_2_4' || $key == 'Past_Paper Question 9_2_5' || $key == 'Past_Paper Question 9_2_6' || $key=='Past_Paper Question 9_2_7' || $key == 'Past_Paper Question 9_2_8' || $key == 'Past_Paper Question 9_2_9' || $key == 'Past_Paper Question 9_2_10' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="161" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

