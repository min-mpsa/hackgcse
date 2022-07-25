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
    <title>The Magnetic Effect of a Current</title>
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

<h1 style="font-size: 45px;">The Magnetic Effect of a Current</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is the direction of a magnetic field line at a point?' =>  array(
      1 =>  'direction of the force on the North pole of a magnet at that point',
    ),
    'How would you determine the direction of the magnetic field due to currents in straight wires and in solenoids?' =>  array(
        1 =>  'right-hand grip rule',
        2 =>  'thumb is pointing to N-pole',
        3 =>  'fingers are directions of current',
        4 =>  '<img src="Physics/PHG 21/34.png" alt="image" width="100%" class="img1">',
        5 =>  '<img src="Physics/PHG 21/35.png" alt="image" width="100%" class="img1">',

    ),
    'Describe the effect on the magnetic field of changing the magnitude and direction of the current.' =>  array(
        1 =>  'increasing the current increases the strength of magnetic field',
        2 =>  'increasing the number of coils increase the induced current and thus, increases the strength of the magnetic field',
        3 =>  'reversing the direction of the current also reverses the direction of the magnetic field',
    ),
    'Past_Paper Question 14_4_1'  =>  array(
      1 =>  '<img src="Physics/PHG 21/36.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 21/37.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/O/N/17',    
  
    ),
    'Past_Paper Question 14_4_2'  =>  array(
        1 =>  '<img src="Physics/PHG 21/38.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/39.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 21/40.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/43/O/N/19',    
    
      ),
      'Past_Paper Question 14_4_3'  =>  array(
        1 =>  '<img src="Physics/PHG 21/41.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/42.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 21/43.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/41/O/N/17',    
    
      ),
      'Past_Paper Question 14_4_4'  =>  array(
        1 =>  '<img src="Physics/PHG 21/44.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/45.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/17',    
    
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
      last_visit($conn,$_SESSION['userid'],182);
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
              if($key=='Past_Paper Question 14_4_1' || $key == 'Past_Paper Question 14_4_2' || $key == 'Past_Paper Question 14_4_3' || $key == 'Past_Paper Question 14_4_4' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="182" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

