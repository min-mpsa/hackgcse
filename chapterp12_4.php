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
    <title>Electric Circuits</title>
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

<h1 style="font-size: 45px;">Electric Circuits</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Circuit symbols you need to know (cell, battery, switches, resistor, variable resistor, heater, thermistor, light-dependent resistor, lamp, ammeter, voltmeter, galvanometer, magnetizing coil, transformer, bell, fuse, relay)' =>  array(
      1 =>  'Check <a href="Physics/PHG 18/Circuit-Symbols.pdf">this</a> extract from the Cambridge IGCSE Physics 0625 syllabus for 2020 and 2021 from www.cambridgeinternational.org/igcse',
    ),
    'Describe the properties of a series circuit in terms of current and potential difference.' =>  array(
        1 =>  'current at every point in a series circuit is the same',
        2 =>  'sum of the potential differences (p.d.) across the componenets in a series circuit is equal to the total p.d. across the supply',
    ),
    'How would you calculate the combined resistance of two or more resistors in series?' =>  array(
        1 =>  'total resistance = R1 + R2 + ...',
    ),
    'Describe the properties of a parallel circuit in terms of current and potential difference.' =>  array(
        1 =>  'potential difference  at every point in a parallel circuit is the same',
        2 =>  'current from the source is the sum of the currents in the separate branches of a parallel circuit',
    ),
    'How would you calculate the effective resistance of two resistors in parallel?' =>  array(
        1 =>  '1 / total resistance = (1 / R1) + (1 / R2)',
    ),
    'State the advantages of connecting lamps in parallel in a lighting circuit.' =>  array(
        1 =>  'each lamp gets maximum potential difference, so brightness is not lost',
        2 =>  'if one lamp becomes broken, the others still light up',
    ),
    'Past_Paper Question 12_4_1'  =>  array(
      1 =>  '<img src="Physics/PHG 18/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 18/2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Physics/PHG 18/3.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0625/42/F/M/16',    
  
    ),
    'Past_Paper Question 12_4_2'  =>  array(
        1 =>  '<img src="Physics/PHG 18/4.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/5.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 18/6.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/O/N/18',    
    
      ),
      'Past_Paper Question 12_4_3'  =>  array(
        1 =>  '<img src="Physics/PHG 18/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/8.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0625/41/M/J/18',    
    
      ),
      'Past_Paper Question 12_4_4'  =>  array(
        1 =>  '<img src="Physics/PHG 18/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/10.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 18/11.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/F/M/18',    
    
      ),
      'Past_Paper Question 12_4_5'  =>  array(
        1 =>  '<img src="Physics/PHG 18/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/13.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 18/14.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Physics/PHG 18/15.png" alt="image" width="100%" class="img2">',    
        5 =>  'from: 0625/43/M/J/17',    
    
      ),
      'Past_Paper Question 12_4_6'  =>  array(
        1 =>  '<img src="Physics/PHG 18/16.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/17.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0625/42/M/J/19',    
    
      ),
      'Past_Paper Question 12_4_7'  =>  array(
        1 =>  '<img src="Physics/PHG 18/18.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/19.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0625/43/O/N/19',    
    
      ),
      'Past_Paper Question 12_4_8'  =>  array(
        1 =>  '<img src="Physics/PHG 18/22.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/23.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 18/24.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 12_4_9'  =>  array(
        1 =>  '<img src="Physics/PHG 18/25.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/26.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 18/27.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/17',    
    
      ),
    'What is an equation to find the voltage at the output terminal like in the question above?' =>  array(
        1 =>  'V (out) = V (in) x [ R (out) / R (total) ]',
    ),
    'Past_Paper Question 12_4_10'  =>  array(
        1 =>  '<img src="Physics/PHG 18/28.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/29.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0625/32/M/J/15',    
    
      ),
      'Describe the action of a diode and why it is used.' =>  array(
        1 =>  'diodes allow current to only flow in one direction',
        2 =>  'by having an extremely high resistance in one direction and a low resistance in the other direction',
        3 =>  'used to turn alternating current into direct current',
    ),
      'Past_Paper Question 12_4_11'  =>  array(
        1 =>  '<img src="Physics/PHG 18/30.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/31.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 18/32.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/F/M/19',    
    
      ),
      'Past_Paper Question 12_4_12'  =>  array(
        1 =>  '<img src="Physics/PHG 18/33.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/34.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0625/42/O/N/17',    
    
      ),
      'Imagine that the thermistor in the question above is replaced by a light dependent resistor and this circuit is used in street lamps, to switch off automatically during day time. Explain how this works.' =>  array(
        1 =>  'if light intensity increases, resistance of LDR decreases',
        2 =>  'voltage across LDR decreases',
        3 =>  'voltage of input to LED decreases',
        4 =>  'eventually no current in LED',
        5 =>  'LED does not light up',

    ),
      'Past_Paper Question 12_4_13'  =>  array(
        1 =>  '<img src="Physics/PHG 18/35.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 18/36.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 18/37.png" alt="image" width="100%" class="img2">',    
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
      last_visit($conn,$_SESSION['userid'],174);
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
              if($key=='Past_Paper Question 12_4_1' || $key == 'Past_Paper Question 12_4_2' || $key == 'Past_Paper Question 12_4_3' || $key == 'Past_Paper Question 12_4_4' || $key == 'Past_Paper Question 12_4_5' || $key == 'Past_Paper Question 12_4_6' || $key=='Past_Paper Question 12_4_7' || $key == 'Past_Paper Question 12_4_8' || $key == 'Past_Paper Question 12_4_9' || $key == 'Past_Paper Question 12_4_10' || $key == 'Past_Paper Question 12_4_11' || $key == 'Past_Paper Question 12_4_12' || $key == 'Past_Paper Question 12_4_13'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="174" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

