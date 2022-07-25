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
    <title>D.C Motor</title>
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

<h1 style="font-size: 45px;">D.C Motor</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe how a d.c motor works, including the explanation of the purpose of a split-ring commutator. Use the diagram below as reference.' =>  array(
        1 =>  '<img src="Physics/PHG 21/X.png" alt="image" width="100%" class="img1">',
        2 =>  'upward force is exerted on left side of the coil as current is flowing outwards and magnetic field direction is from left to right (Flemings left hand rule)',
        3 =>  'downward force is exerted on right side',
        4 =>  'coil rotates clockwise',
        5 =>  'split-ring commutator keeps the coil rotating in the same direction when the coil is in the vertical direction',
        6 =>  'by changing direction of current in the coil',
        7 =>  'every half cycle',
        8 =>  'so the forces change direction and the coil keeps turning',


    ),
    'Describe what you would do to increase the turning effect of a current-carrying coil in a magnetic field.' =>  array(
        1 =>  'increase the number of turns on the coil',
        2 =>  'increase the current',
        3 =>  'increase the strength of the magnetic field',
    ),
    'Past_Paper Question 14_6_1'  =>  array(
      1 =>  '<img src="Physics/PHG 21/73.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 21/74.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Physics/PHG 21/76.png" alt="image" width="100%" class="img1">',    
      4 =>  '<img src="Physics/PHG 21/XX.png" alt="image" width="100%" class="img2">',
      5 =>  'from: 0625/43/M/J/16',    
  
    ),
    'Past_Paper Question 14_6_2'  =>  array(
        1 =>  '<img src="Physics/PHG 21/79.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 21/81.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 21/80.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Physics/PHG 21/82.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0625/42/F/M/15',    
    
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
      last_visit($conn,$_SESSION['userid'],184);
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
              if($key=='Past_Paper Question 14_6_1' || $key == 'Past_Paper Question 14_6_2' || $key == '' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="184" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

