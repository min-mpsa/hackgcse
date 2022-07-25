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
    <title>Motion</title>
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

<h1 style="font-size: 45px;">Motion</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define speed. How do you calculate it?' =>  array(
      1 =>  'rate of change of distance',
      2 =>  'distance/time',
    ),
    'Define acceleration. How do you calculate it?' =>  array(
        1 =>  'rate of change of speed',
        2 =>  'change of velocity/time taken ',
    ),
    'Define deceleration.' =>  array(
        1 =>  'decrease in velocity',
    ),
    'Past_Paper Question 1_1'  =>  array(
      1 =>  '<img src="Physics/PHG 2/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 2/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/32/M/J/15',    
  
    ),
    'Past_Paper Question 1_2'  =>  array(
        1 =>  '<img src="Physics/PHG 2/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/4.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 2/5.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/16',    
    
      ),
      'Past_Paper Question 1_3'  =>  array(
        1 =>  '<img src="Physics/PHG 2/6.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/7.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 2/8.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/F/M/16',    
    
      ),
      'Past_Paper Question 1_4'  =>  array(
        1 =>  '<img src="Physics/PHG 2/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/10.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/19',    
    
      ),
      'Past_Paper Question 1_5'  =>  array(
        1 =>  '<img src="Physics/PHG 2/11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/12.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 2/13.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/19',    
    
      ),
      'Past_Paper Question 1_6'  =>  array(
        1 =>  '<img src="Physics/PHG 2/14.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/15.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 2/16.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 1_7'  =>  array(
        1 =>  '<img src="Physics/PHG 2/17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/18.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 2/19.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/17',    
    
      ),
      'Past_Paper Question 1_8'  =>  array(
        1 =>  '<img src="Physics/PHG 2/20.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/21.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 2/22.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/43/M/J/18',    
    
      ),
      'Past_Paper Question 1_9'  =>  array(
        1 =>  '<img src="Physics/PHG 2/23.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 2/24.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/M/J/18',    
    
      ),
    'A truck accelerates uniformly along a straight road. To maintain this uniform acceleration, the forward force on the truck must change. Explain why.' =>  array(
        1 =>  'air resistance increases as speed increases',
    ),
    'Why do skiers bend their body?' =>  array(
        1 =>  'to reduce air resistance',
        2 =>  'to increase their acceleration',
    ),
    'Describe qualitatively the motion of a skydiver falling in a uniform gravitational field with air resistance, including references to terminal velocity and forces acting on the body. Assume that there is no wind.' =>  array(
        1 =>  'at start:',
        2 =>  'acceleration is equal to the acceleration of free fall',
        3 =>  'drag=0, weight > drag',
        4 =>  '',
        5 =>  '',
        6 =>  'falling',
        7 =>  'velocity increases ⇒ drag force increases',
        8 =>  'acceleration/resultant force decreases because drag increasing',
        9 =>  '',
        10 =>  '',
        11 =>  'terminal velocity:',
        12 =>  'velocity maximum; weight = drag',
        13 =>  '',

    ),
    'What would happen if the skydiver opened his parachute?' =>  array(
        1 =>  'parachute:',
        2 =>  'makes drag force > weight',
        3 =>  'resultant force upwards - decelerates - velocity decreases',
        4 =>  '',
        5 =>  '',
        6 =>  'terminal velocity:',
        7 =>  'drag force decreases because slowing down, resultant force decreases',
        8 =>  'drag = weight',

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
      last_visit($conn,$_SESSION['userid'],135);
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
              if($key=='Describe qualitatively the motion of a skydiver falling in a uniform gravitational field with air resistance, including references to terminal velocity and forces acting on the body. Assume that there is no wind.' || $key == 'What would happen if the skydiver opened his parachute?' || $key == 'Past_Paper Question 1_1' || $key == 'Past_Paper Question 1_2' || $key == 'Past_Paper Question 1_3' || $key == 'Past_Paper Question 1_4'  || $key == 'Past_Paper Question 1_5' || $key == 'Past_Paper Question 1_6' || $key == 'Past_Paper Question 1_7' || $key == 'Past_Paper Question 1_8'  || $key == 'Past_Paper Question 1_9'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="135" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

