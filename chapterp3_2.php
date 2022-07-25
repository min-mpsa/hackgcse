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
    <title>Turning Effect, Equilibrium, Centre of Mass</title>
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

<h1 style="font-size: 45px;">Turning Effect, Equilibrium, Centre of Mass</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is the moment of a force about a pivot?' =>  array(
      1 =>  'force x perpendicular distance from pivot',
      2 =>  'turning effect of the force',
    ),
    'Suggest the two conditions which must be true for an object to be an equilibrium.' =>  array(
        1 =>  'no resultant force',
        2 =>  'sum of clockwise moment = sum of anticlockwise moment',
    ),
    'State what is meant by the center of mass.' =>  array(
        1 =>  'the point where all mass can be considered to be concentrated',
    ),
    'Describe the effect of position of the center of mass on the stability of the objects.' =>  array(
        1 =>  'objects with lower centers of masses are more stable',
        2 =>  'objects with wider bases are more stable',
        3 =>  'if the line of action of the center of mass crosses an edge of the base, it will topple over',
    ),
    'Describe an experiment to determine the position of the center of mass of a plane lamina.' =>  array(
        1 =>  'make small holes along the edges of the card',
        2 =>  'insert a pin through one of the holes and hold the pin firmly in a clamp',
        3 =>  'allow the object to swing freely and come to rest with its center of gravity vertically below the pin',
        4 =>  'Hang a plumb line from the pin and draw a line along the vertical string of the plumb line',
        5 =>  'Repeat process for other holes',
        6 =>  'Point of intersection is center of gravity',

    ),
    'Past_Paper Question 3_2_1'  =>  array(
      1 =>  '<img src="Physics/PHG 5/11.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 5/12.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/F/M/18',    
  
    ),
    'Past_Paper Question 3_2_2'  =>  array(
        1 =>  '<img src="Physics/PHG 5/13.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 5/14.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/17',    
    
      ),
      'Past_Paper Question 3_2_3'  =>  array(
        1 =>  '<img src="Physics/PHG 5/15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 5/16.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/19',    
    
      ),
      'Past_Paper Question 3_2_4'  =>  array(
        1 =>  '<img src="Physics/PHG 5/17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 5/18.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 5/19.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/43/O/N/16',    
    
      ),
      'Past_Paper Question 3_2_5'  =>  array(
        1 =>  '<img src="Physics/PHG 5/20.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 5/21.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 5/22.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/19',    
    
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
      last_visit($conn,$_SESSION['userid'],141);
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
              if($key=='Past_Paper Question 3_2_1' || $key == 'Past_Paper Question 3_2_2' || $key == 'Past_Paper Question 3_2_3' || $key == 'Past_Paper Question 3_2_4' || $key == 'Past_Paper Question 3_2_5' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="141" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

