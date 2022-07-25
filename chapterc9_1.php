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
    <title>All General Equations and Reactivity Series</title>
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
                <a href="chemistry.php"><button class="hide2">Chemistry</button></a>
            </div>
        </header>

<h1 style="font-size: 45px;">All General Equations and Reactivity Series</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Metal + oxygen' =>  array(
      1 =>  'metal + oxygen → metal oxide (basic oxide)',
    ),
    'Non-metal +oxygen' =>  array(
        1 =>  'non-metal + oxygen → non-metal oxide (acidic oxide)',
    ),
    'Metal oxide + water' =>  array(
        1 =>  'metal oxide + water → metal hydroxide (alkali)',
    ),
    'Non-metal oxide + water' =>  array(
        1 =>  'non-metal oxide + water → acid',
    ),
    'Reactivity Series' =>  array(
        1 =>  'potassium',
        2 =>  'sodium',
        3 =>  'calcium',
        4 =>  'magnesium',
        5 =>  'aluminium',
        6 =>  'carbon',
        7 =>  'zinc',
        8 =>  'iron',
        9 =>  'tin',
        10 =>  'lead',
        11 =>  'hydrogen',
        12 =>  'copper',
        13 =>  'silver',
        14 =>  'gold',
        15 =>  'platinum',

    ),
    'Metal + water (for different groups of metals)' =>  array(
        1 =>  'a) group 1 metals + H2O → metal hydroxide + H2',
        2 =>  'b) group 2 metals (except Be, Mg) + H2O → metal hydroxide + H2',
        3 =>  'c) (Mg, Al, Zn, Fe) + steam → metal oxide ',
    ),
    'Metal + acid ' =>  array(
        1 =>  'metal + acid → salt + hydrogen',
        2 =>  'only metals more reactive than hydrogen react with dilute acid',
    ),
    'Neutralization (acid + base)' =>  array(
        1 =>  'acid + base → salt + water',
        2 =>  'metal oxide + non-metal oxide → salt',
        3 =>  'metal oxide + acid → salt  + water',
        4 =>  'metal hydroxide + acid → salt + water',

    ),
    'Metal carbonates + acid' =>  array(
        1 =>  'Metal carbonates + acid → salt + water + carbon dioxide',
    ),
    'Metal sulfate + acid' =>  array(
        1 =>  'metal sulfate + acid → salt + water + sulfur dioxide',
    ),
    'Ammonium salts + acid' =>  array(
        1 =>  'ammonium salts + acid → salt + water + ammonia',
    ),
    'Displacement reactions' =>  array(
        1 =>  'more reactive metals will always displace less reactive metals in their compounds',
        2 =>  'e.g. Mg + CuSO4 → Cu + MgSO4',
        3 =>  'more reactive halogens will always displace less reactive halogens (reactivity decreases down the group for halogens)',
        4 =>  'Cl2 + 2NaBr → 2NaCl + Br2',
        5 =>  'Br2 + 2KI → 2KBr + I2',

    ),
    'Thermal decomposition of metal carbonates' =>  array(
        1 =>  'group 1 carbonates → no reaction',
        2 =>  'other metal carbonates → metal oxide + carbon dioxide',
    ),
    'Thermal decomposition of metal hydroxides' =>  array(
        1 =>  'group 1 hydroxides → no change',
        2 =>  'other metal hydroxides → metal oxide + water',
    ),
    'Thermal decomposition of metal nitrates' =>  array(
        1 =>  'group 1 nitrates → metal nitrite (M-NO2) + oxygen',
        2 =>  'other metal nitrates → metal oxide + nitrogen dioxide + oxygen',
    ),
    'Define thermal decomposition.' =>  array(
        1 =>  'breaking down when heated',
    ),
    'What are alloys?' =>  array(
        1 =>  'a mixture of a metal with other elements',
    ),
    'State some reasons why alloys might be more useful than the metallic element.' =>  array(
        1 =>  'do not corrode',
        2 =>  'strong',
        3 =>  'hard',
        4 =>  'improved appearance',

    ),
    'Name the alloy formed when zinc is mixed with copper.' =>  array(
        1 =>  'brass',
    ),
    'Explain why steel is less malleable than iron.' =>  array(
        1 =>  'particles have different sizes because steel is an alloy',
        2 =>  'layers cannot slide over each other',
    ),
    'Aluminium foil is added to aqueous copper (II) sulfate but no immediate reaction takes place. Explain why.' =>  array(
        1 =>  'unreactive coating of aluminium oxide',
    ),
    'Past Paper Question 9_1_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 10/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 10/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/16',    
  
    ),
    'Past Paper Question 9_1_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/4.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 10/5.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 10/6.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/41/O/N/17',    
    
      ),
      'Past Paper Question 9_1_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/8.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 10/9.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 10/10.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/41/O/N/18',    
    
      ),
      'Past Paper Question 9_1_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/12.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/O/N/18',    
    
      ),
      'Past Paper Question 9_1_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/13.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/14.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 10/15.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 10/16.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/42/M/J/18',    
    
      ),
      'Past Paper Question 9_1_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/18.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 10/19.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 10/20.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/43/M/J/18',    
    
      ),
      'Past Paper Question 9_1_7'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/21.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/22.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 10/23.png" alt="image" width="100%" class="img1">',    
        4 =>  '<img src="Chemistry/CHG 10/24.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0620/43/O/N/17',    
    
      ),
      'Past Paper Question 9_1_8'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/25.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/26.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 10/27.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0620/43/M/J/17',    
    
      ),
      'Past Paper Question 9_1_9'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/28.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/29.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 10/30.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 10/31.png" alt="image" width="100%" class="img4">',
        5 =>  '<img src="Chemistry/CHG 10/32.png" alt="image" width="100%" class="img5">',
        6 =>  '<img src="Chemistry/CHG 10/33.png" alt="image" width="100%" class="img6">',
        7 =>  'from: 0620/31/M/J/15',    
    
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
      last_visit($conn,$_SESSION['userid'],114);
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
              if($key=='Past Paper Question 9_1_1' || $key == 'Past Paper Question 9_1_2' || $key == 'Past Paper Question 9_1_3' || $key == 'Past Paper Question 9_1_4' || $key == 'Past Paper Question 9_1_5' || $key == 'Past Paper Question 9_1_6'  || $key == 'Past Paper Question 9_1_7'  || $key == 'Past Paper Question 9_1_8'  || $key == 'Past Paper Question 9_1_9'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="114" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

