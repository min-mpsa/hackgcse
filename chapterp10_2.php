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
    <title>Reflection and Refraction of Light</title>
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

<h1 style="font-size: 45px;">Reflection and Refraction of Light</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe the formation of an optical image by a plane mirror, and give its characteristics.' =>  array(
      1 =>  'rays from object reflect off the mirror into the eyes',
      2 =>  'angle of incidence = angle of reflection',
      3 =>  'image in a plane mirror is virtual',
      4 =>  'image is same size as object',
      5 =>  'incident ray, reflected ray, and normal are on the same plane (side of the mirror)',

    ),
    'Past_Paper Question 10_2_1'  =>  array(
        1 =>  '<img src="Physics/PHG 13/1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/2.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/17',    
    
      ),
    'Give the equation to find refractive index, if you are given the speed of light in the medium.' =>  array(
        1 =>  'refractive index (n) = speed of light in vacuum (c)  / speed of light in medium (v)',
        2 =>  'n = c/v',
    ),
    'Give the equation to find refractive index, if you are given angle of incidence and angle of refraction, and if light is travelling from air to a denser medium. ' =>  array(
        1 =>  'reflective index = sin (angle of incidence) / sin (angle of refraction)',
        2 =>  'n = sin i / sin r',
    ),
    'Give the equation to find refractive index, if you are given angle of incidence and angle of refraction, and if light is travelling from a denser medium to a less dense one.' =>  array(
        1 =>  'refractive index = sin (angle of refraction) / sin (angle of incidence)',
        2 =>  'n = sin r / sin i',
    ),
    'Give the equation to find refractive index, if you are given the critical angle.' =>  array(
        1 =>  'refractive index (n) = 1 / sin (critical angle) (c)',
        2 =>  'n = 1 / sin c',
    ),
    'A ray of light is incident on a boundary with air. State what happens to the ray when the angle of incidence of the ray is less than/greater than the critical angle of the glass.' =>  array(
        1 =>  'less than: ray passes into air and refracts',
        2 =>  'greater than: total internal reflection occurs ',
    ),
    
    'What is total internal reflection?' =>  array(
        1 =>  'reflection in a more dense material where there is no refracted ray',
    ),
    'What is critical angle?' =>  array(
        1 =>  'the greatest angle of incidence in the material at which refraction occurs',
    ),
    'Explain why the quantity refractive index does not have a unit.' =>  array(
        1 =>  'it is the ratio of two identical quantities',
    ),
    'Describe how optical fibres are used in communication technology.' =>  array(
        1 =>  'used to send information encoded as pulses of light',
        2 =>  'light travels along fibre',
        3 =>  'total internal reflection occurs inside optical fibre until light reaches the other end',
    ),
    'Past_Paper Question 10_2_2'  =>  array(
      1 =>  '<img src="Physics/PHG 13/3.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 13/4.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/M/J/17',    
  
    ),
    'Past_Paper Question 10_2_3'  =>  array(
        1 =>  '<img src="Physics/PHG 13/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/19',    
    
      ),
      'Past_Paper Question 10_2_4'  =>  array(
        1 =>  '<img src="Physics/PHG 13/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/8.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 13/9.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/F/M/16',    
    
      ),
      'Past_Paper Question 10_2_5'  =>  array(
        1 =>  '<img src="Physics/PHG 13/10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/11.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/M/J/17',    
    
      ),
      'Past_Paper Question 10_2_6'  =>  array(
        1 =>  '<img src="Physics/PHG 13/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/13.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/M/J/18',    
    
      ),
      'Past_Paper Question 10_2_7'  =>  array(
        1 =>  '<img src="Physics/PHG 13/14.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/15.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/M/J/19',    
    
      ),
      'Past_Paper Question 10_2_8'  =>  array(
        1 =>  '<img src="Physics/PHG 13/16.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/17.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 13/18.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/F/M/19',    
    
      ),
      'Past_Paper Question 10_2_9'  =>  array(
        1 =>  '<img src="Physics/PHG 13/19.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/20.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/18',    
    
      ),
      'Past_Paper Question 10_2_10'  =>  array(
        1 =>  '<img src="Physics/PHG 13/21.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/22.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/16',    
    
      ),
      'Past_Paper Question 10_2_11'  =>  array(
        1 =>  '<img src="Physics/PHG 13/23.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/24.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 13/25.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Physics/PHG 13/26.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0625/43/M/J/17',    
    
      ),
      'Past_Paper Question 10_2_12'  =>  array(
        1 =>  '<img src="Physics/PHG 13/27.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 13/28.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/18',    
    
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
      last_visit($conn,$_SESSION['userid'],164);
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
              if($key=='Past_Paper Question 10_2_1' || $key == 'Past_Paper Question 10_2_2' || $key == 'Past_Paper Question 10_2_3' || $key == 'Past_Paper Question 10_2_4' || $key == 'Past_Paper Question 10_2_5' || $key == 'Past_Paper Question 10_2_6' || $key=='Past_Paper Question 10_2_7' || $key == 'Past_Paper Question 10_2_8' || $key == 'Past_Paper Question 10_2_9' || $key == 'Past_Paper Question 10_2_10' || $key == 'Past_Paper Question 10_2_11' || $key == 'Past_Paper Question 10_2_12'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="164" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

