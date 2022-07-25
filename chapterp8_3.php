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
    <title>Thermal capacity and melting/boiling points</title>
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

<h1 style="font-size: 45px;">Thermal capacity and melting/boiling points</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State in terms of atoms what is meant by internal energy.' =>  array(
      1 =>  'kinetic energy of atoms added to their potential energy',
    ),
    'What is meant by the thermal capacity of an object?' =>  array(
        1 =>  'energy required to increase the temperature per degree celsius',
    ),
    'Equation to find thermal capacity' =>  array(
        1 =>  'energy / change in temperature',
        2 =>  'C = Q/t',
    ),
    'What is meant by the specific heat capacity of an object?' =>  array(
        1 =>  'energy used to increase temperature',
        2 =>  'of 1kg of the substance',
        3 =>  'by 1 degree Celsius',
    ),
    'Equation to find specific heat capacity' =>  array(
        1 =>  'c = Q/mt',
        2 =>  'specific heat capacity = energy / (mass x change in temperature)',
    ),
    'In practice, it takes much longer to increase the temperature of gas using the heater. Suggest a reason for this.' =>  array(
        1 =>  'thermal energy is lost to the surroundings',
    ),
    'What is meant by the specific latent heat of fusion (melting) of a substance?' =>  array(
        1 =>  'energy needed to melt a substance',
        2 =>  'per unit mass',
    ),
    'Equation to find specific latent heat of vaporization and fusion' =>  array(
        1 =>  'energy / mass ',
        2 =>  'l = E / m',
    ),
    'How does boiling differ from evaporation?' =>  array(
        1 =>  'bubbles form',
        2 =>  'boiling occurs throughout the liquid but evaporation occurs only at surface',
        3 =>  'boiling occurs at only one temperature',
    ),
    'Past_Paper Question 8_3_1'  =>  array(
      1 =>  '<img src="Physics/PHG 10/12.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 10/13.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/M/J/19',    
  
    ),
    'Past_Paper Question 8_3_2'  =>  array(
        1 =>  '<img src="Physics/PHG 10/14.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 10/15.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/19',    
    
      ),
      'Past_Paper Question 8_3_3'  =>  array(
        1 =>  '<img src="Physics/PHG 10/16.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 10/17.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/M/J/18',    
    
      ),
      'Past_Paper Question 8_3_4'  =>  array(
        1 =>  '<img src="Physics/PHG 10/18.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 10/19.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/16',    
    
      ),
      'Past_Paper Question 8_3_5'  =>  array(
        1 =>  '<img src="Physics/PHG 10/20.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 10/22.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 10/21.png" alt="image" width="100%" class="img3">',
        4 =>  '<img src="Physics/PHG 10/23.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0625/42/M/J/16',    
    
      ),
      'Past_Paper Question 8_3_6'  =>  array(
        1 =>  '<img src="Physics/PHG 10/10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 10/11.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/17',    
    
      ),
      'Past_Paper Question 8_3_7'  =>  array(
        1 =>  '<img src="Physics/PHG 10/6.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 10/8.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 10/7.png" alt="image" width="100%" class="img3">',
        4 =>  '<img src="Physics/PHG 10/9.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0625/42/F/M/17',    
    
      ),
      'Past_Paper Question 8_3_8'  =>  array(
        1 =>  '<img src="Physics/PHG 10/24.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 10/25.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/18',    
    
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
      last_visit($conn,$_SESSION['userid'],158);
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
              if($key=='Past_Paper Question 8_3_1' || $key == 'Past_Paper Question 8_3_2' || $key == 'Past_Paper Question 8_3_3' || $key == 'Past_Paper Question 8_3_4' || $key == 'Past_Paper Question 8_3_5' || $key == 'Past_Paper Question 8_3_6' || $key == 'Past_Paper Question 8_3_7'  || $key == 'Past_Paper Question 8_3_8'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="158" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

