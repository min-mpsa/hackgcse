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
    <title>Energy Resources</title>
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

<h1 style="font-size: 45px;">Energy Resources</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State the advantages and disadvantages of obtaining electrical energy from chemical energy stored in fossil fuels. Outline how this is done.' =>  array(
      1 =>  'Advantage: not dependent on a weather condition (i.e. sun, wind)',
      2 =>  'Advantage: cheap',
      3 =>  'Disadvantage: emits greenhouse gases → leads to global warming',
      4 =>  'Disadvantage: fossil fuels are non-renewable',
      5 =>  'fossil fuels are burnt → thermal energy is used to produce steam to turn turbines',

    ),
    'State the advantages and disadvantages of obtaining electrical energy from wind. Outline how this is done.' =>  array(
        1 =>  'Advantage: does not contribute to global warming from releasing greenhouse gases',
        2 =>  'Disadvantage: wind is not always blowing',
        3 =>  'Disadvantage: danger to wildlife',
        4 =>  'kinetic energy of wind is converted into electrical energy',

    ),
    'State the advantages and disadvantages of obtaining electrical energy from nuclear fission. Outline how this is done.' =>  array(
        1 =>  'Advantage: no greenhouse gas produced; very high efficiency',
        2 =>  'Disadvantage: risk of radioactive material leaking',
        3 =>  'energy from the splitting of uranium atoms are transferred into electrical energy',
    ),
    'State the advantages and disadvantages of using solar power to obtain electrical energy. Outline how this is done.' =>  array(
        1 =>  'Advantage: does not emit greenhouse gases',
        2 =>  'Advantage: low maintenance',
        3 =>  'Disadvantage: causes pollution during manufacture of solar cells',
        4 =>  'Disadvantage: causes visual pollution',
        5 =>  'light energy is transferred to electrical energy',

    ),
    'State the advantages and disadvantage obtaining electrical energy from geothermal resources. Outline how this is done.' =>  array(
        1 =>  'Advantage: no greenhouse gas emitted',
        2 =>  'Disadvantage: deep drilling is difficult and expensive',
        3 =>  'steam from hot underground reservoirs is piped into turbines to turn them and obtain electrical energy',
    ),
    'State the advantages and disadvantages of obtaining electrical energy from water sources (wave energy, tidal energy, hydroelectric). Outline how this is done.' =>  array(
        1 =>  'Advantage: no greenhouse gas emitted',
        2 =>  'Disadvantage: difficult to build/cannot be built everywhere',
        3 =>  'Disadvantage for wave, tidal: energy is not produced at a constant rate, unlike hydroelectric',
        4 =>  'Hydroelectric: water in dam has high gravitational potential energy → released → g.p.e. is transferred into kinetic energy which is transferred into electrical energy',
        5 =>  'Wave energy: motion of waves turns turbines',
        6 =>  'Tidal energy: water flow of tides runs generator',

    ),
    'How is energy released in the Sun?' =>  array(
        1 =>  'nuclear fusion',
    ),
    'Which of the energy resources above have the Sun as their primary source?' =>  array(
        1 =>  'fossil fuels',
        2 =>  'wind',
        3 =>  'solar power',
        4 =>  'all three water sources',

    ),
    'Equations to find efficiency' =>  array(
        1 =>  'efficiency = (useful energy output/energy input) x 100%',
        2 =>  'efficiency = (useful power output/power input) x 100%',
    ),
    'Past_Paper Question 5_2_1'  =>  array(
      1 =>  '<img src="Physics/PHG 7/14.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 7/15.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Physics/PHG 7/16.png" alt="image" width="100%" class="img1">',    
      4 =>  '<img src="Physics/PHG 7/17.png" alt="image" width="100%" class="img2">',
      5 =>  'from: 0625/42/M/J/16',    
  
    ),
    'Past_Paper Question 5_2_2'  =>  array(
        1 =>  '<img src="Physics/PHG 7/18.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 7/19.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/O/N/17',    
    
      ),
      'Past_Paper Question 5_2_3'  =>  array(
        1 =>  '<img src="Physics/PHG 7/20.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 7/21.png" alt="image" width="100%" class="img2">',
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
      last_visit($conn,$_SESSION['userid'],147);
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
              if($key=='Past_Paper Question 5_2_1' || $key == 'Past_Paper Question 5_2_2' || $key == 'Past_Paper Question 5_2_3' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="147" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

