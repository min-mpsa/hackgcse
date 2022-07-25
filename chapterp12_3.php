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
    <title>Potential difference, Resistance, Electrical Working</title>
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

<h1 style="font-size: 45px;">Potential difference, Resistance, Electrical Working</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is potential difference measured in? State the unit.' =>  array(
      1 =>  'volts (V)',
    ),
    'What is 1 V equivalent to in terms of energy and charge?' =>  array(
        1 =>  '1 V = 1 J / C (coulomb)',
    ),
    'State the equation to find resistance.' =>  array(
        1 =>  'resistance = potential difference / current ',
        2 =>  'R = V / I',
    ),
    'How is the resistance of a wire related to its length?' =>  array(
        1 =>  'directly proportional',
    ),
    'How is the resistance of a wire related to its diameter?' =>  array(
        1 =>  'inversely proportional (squared)',
    ),
    'Past_Paper Question 12_3_1'  =>  array(
        1 =>  '<img src="Physics/PHG 17/27.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/28.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 17/29.png" alt="image" width="100%" class="img3">', 
        4 =>  '<img src="Physics/PHG 17/30.png" alt="image" width="100%" class="img3">',       
        5 =>  '<img src="Physics/PHG 17/31.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0625/41/O/N/19',    
    
      ),
      'Past_Paper Question 12_3_2'  =>  array(
        1 =>  '<img src="Physics/PHG 17/32.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/33.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 17/34.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/43/M/J/18',    
    
      ),
      'Past_Paper Question 12_3_3'  =>  array(
        1 =>  '<img src="Physics/PHG 17/35.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/36.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/19',    
    
      ),
      'Past_Paper Question 12_3_4'  =>  array(
        1 =>  '<img src="Physics/PHG 17/37.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/38.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/18',    
    
      ),
    'State the equations for power and energy in terms of current and potential difference.' =>  array(
        1 =>  'power (P) = current (I) x potential difference (V)',
        2 =>  'P = IV',
        3 =>  'energy (E) = current (I) x potential difference (V) x time (t)',
        4 =>  'E = IVt',

    ),
    'State the other two variants of the equation for power, if resistance is given.' =>  array(
        1 =>  'P = (V^2)/R',
        2 =>  'P = (I^2)R',
    ),
    'Why are fuses of higher ratings made of thicker wires?' =>  array(
        1 =>  'resistance is inversely proportional to area',
        2 =>  'resistance of thicker wire is lower',
        3 =>  'fuses will melt at higher current',
        4 =>  'because heating effect = I^2 R',

    ),
    'Past_Paper Question 12_3_5'  =>  array(
      1 =>  '<img src="Physics/PHG 17/39.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 17/40.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/F/M/17',    
  
    ),
    'Past_Paper Question 12_3_6'  =>  array(
        1 =>  '<img src="Physics/PHG 17/41.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/42.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/17',    
    
      ),
      'Past_Paper Question 12_3_7'  =>  array(
        1 =>  '<img src="Physics/PHG 17/43.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/44.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/19',    
    
      ),
      'Past_Paper Question 12_3_8'  =>  array(
        1 =>  '<img src="Physics/PHG 17/45.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/46.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 17/47.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/F/M/17',    
    
      ),
      'Past_Paper Question 12_3_9'  =>  array(
        1 =>  '<img src="Physics/PHG 17/48.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/49.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 17/50.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/M/J/16',    
    
      ),
      'Past_Paper Question 12_3_10'  =>  array(
        1 =>  '<img src="Physics/PHG 17/51.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/52.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 17/53.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Physics/PHG 17/54.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0625/42/M/J/17',    
    
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
      last_visit($conn,$_SESSION['userid'],173);
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
              if($key=='Past_Paper Question 12_3_1' || $key == 'Past_Paper Question 12_3_2' || $key == 'Past_Paper Question 12_3_3' || $key == 'Past_Paper Question 12_3_4' || $key == 'Past_Paper Question 12_3_5' || $key == 'Past_Paper Question 12_3_6' || $key=='Past_Paper Question 12_3_7' || $key == 'Past_Paper Question 12_3_8' || $key == 'Past_Paper Question 12_3_9' || $key == 'Past_Paper Question 12_3_10' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="173" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

