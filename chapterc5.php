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
    <title>Chemical Energetics </title>
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

<h1 style="font-size: 45px;">Chemical Energetics</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is meant by exothermic reactions?' =>  array(
      1 =>  'reactions that release heat to the surroundings',
    ),
    'What is meant by endothermic reactions?' =>  array(
        1 =>  'reactions that absorb heat from the surroundings',
      ),
      'Is bond-breaking an exothermic or an endothermic process?' =>  array(
        1 =>  'endothermic',
      ),
      'Is bond-forming an exothermic or an endothermic process?' =>  array(
        1 =>  'exothermic',
      ),
      'Past Paper Question 5_1'  =>  array(
        1 =>  '<img src="Chemistry/CHG 6/1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 6/2.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/19',    
    
      ),
    'State what the positive/negative signs of enthalpy/energy change mean, in terms of exothermic and endothermic.' =>  array(
        1 =>  'positive → endothermic',
        2 =>  'negative → exothermic',
    ),
    'Past Paper Question 5_2'  =>  array(
      1 =>  '<img src="Chemistry/CHG 6/3.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 6/4.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/43/O/N/19',    
  
    ),
    'Past Paper Question 5_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 6/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 6/6.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 6/7.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 6/8.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/41/M/J/18',    
    
      ),
      'Past Paper Question 5_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 6/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 6/10.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/M/J/16',    
    
      ),
      'How would the energy level diagram in the previous question change if it was an endothermic reaction?' =>  array(
        1 =>  'horizontal product energy line at higher energy than that of reactant energy line',
        2 =>  'arrow pointing upwards to product energy line',
    ),
      'Past Paper Question 5_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 6/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 6/11.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/17',    
    
      ),
      'How is the activation energy represented in energy-level diagrams for endothermic and exothermic reactions?' =>  array(
        1 =>  'exothermic: distance between the reactant line and the top of the curve (as shown in the question above)',
        2 =>  'endothermic: distance between reactant line and product line',
    ),
    'Name two advantages and two disadvantages of hydrogen fuel cells compared to petrol engines.' =>  array(
        1 =>  'Advantage: no carbon dioxide is produced',
        2 =>  'Advantage: hydrogen is abundant on Earth',
        3 =>  'Disadvantage: storage of hydrogen is difficult',
        4 =>  'Disadvantage: dangerous - risk of explosion',

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
      last_visit($conn,$_SESSION['userid'],102);
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
              if($key=='Past Paper Question 5_1' || $key == 'Past Paper Question 5_2' || $key == 'Past Paper Question 5_3' || $key == 'Past Paper Question 5_4' || $key == 'Past Paper Question 5_5' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="102" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

