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
    <title>Preparation of Salts</title>
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

<h1 style="font-size: 45px;">Preparation of Salts</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is meant by the term "in excess"?' =>  array(
      1 =>  'more than enough to react completely with the other reactants ',
    ),
    'What is meant by the term precipitate?' =>  array(
        1 =>  'a solid',
        2 =>  'which forms when two solutions are mixed',
    ),
    'Describe how you would make a pure, dry sample of barium carbonate by precipitation.' =>  array(
        1 =>  'mix sodium carbonate and barium nitrate',
        2 =>  'in solution',
        3 =>  'filter barium carbonate',
        4 =>  'wash the residue and pat dry using filter paper',
        5 =>  'Ba(NO3)2 + Na2CO3 → BaCO3 + 2NaNO3',

    ),
    'What is meant by a saturated solution?' =>  array(
        1 =>  'no more solute can dissolve',
        2 =>  'at any given temperature*',
    ),
    'What evidence would show that the solution is saturated?' =>  array(
        1 =>  'crystals forming on a glass rod withdrawn from the solution',
    ),
    'Explain why salt crystals start forming when you leave the solution to cool after heating to crystallization point.' =>  array(
        1 =>  'solubility decreases as temperature decreases',
    ),
    'You are provided with a mixture of copper (II) oxide, a basic oxide, and zinc oxide, an amphoteric oxide. Describe how you would obtain a sample of copper (II) oxide from this mixture.' =>  array(
        1 =>  'add sodium hydroxide solution',
        2 =>  'zinc oxide dissolves but copper (II) oxide does not',
        3 =>  'filter out copper (II) oxide',
    ),
    'Prepare a pure dry sample of Cu(NO3)2 using nitric acid and insoluble CuCO3.' =>  array(
        1 =>  'add CuCO3 to acid until no more effervescence',
        2 =>  'filter to remove excess CuCO3',
        3 =>  'heat until crystallization point',
        4 =>  'allow to cool',
        5 =>  'filter',
        6 =>  'dry with filter paper',
        7 =>  'Include equation: CuCO3 + 2HNO3 → Cu(NO3)2 + H2O + CO2',

    ),
    'Prepare a pure dry sample of Na2SO4 using sulfuric acid and sodium hydroxide.' =>  array(
        1 =>  'add NaOH (alkali) into conical flask by using pipette',
        2 =>  'add one or two drops of indicator to the alkali and record color',
        3 =>  'add acid to the conical flask containing alkali, using burette ',
        4 =>  'until indicator changes color',
        5 =>  '',
        6 =>  '',
        7 =>  '',
        8 =>  'find the amount of acid and alkali where neutralization occurs',
        9 =>  'put this amount of acid and alkali into evaporating basin (without indicator)',
        10 =>  'heat until crystallization point',
        11 =>  'allow to cool',
        12 =>  'filter',
        13 =>  'dry in oven',
        14 =>  'Include equation: 2HaOH + H2SO4 → Na2SO4 + 2H2O',

    ),
    
    'When do you need to do titration?' =>  array(
        1 =>  'when you are using an alkali (soluble base) and an acid to prepare salt',
        2 =>  'instead of an insoluble base like CuCO3',
    ),
    
    'Past Paper Question 7_2_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 8/3.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 8/5.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Chemistry/CHG 8/4.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Chemistry/CHG 8/6.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0620/32/M/J/15',    
  
    ),
    'Past Paper Question 7_2_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/8.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/M/J/19',    
    
      ),
      'Past Paper Question 7_2_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/10.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 8/11.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0620/41/M/J/16',    
    
      ),
      'Past Paper Question 7_2_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/13.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/32/M/J/14',    
    
      ),
      'Past Paper Question 7_2_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/14.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/15.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/19',    
    
      ),
      'Past Paper Question 7_2_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/16.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/17.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 8/18.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 8/19.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/41/M/J/19',    
    
      ),
      'Past Paper Question 7_2_7'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/20.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/22.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 8/21.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 8/23.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/42/O/N/18',    
    
      ),
      'Past Paper Question 7_2_8'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/24.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/25.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 8/26.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0620/32/O/N/15',    
    
      ),
      'Past Paper Question 7_2_9'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/27.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/28.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 8/29.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Chemistry/CHG 8/30.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Chemistry/CHG 8/31.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0620/42/M/J/19',    
    
      ),
      'Past Paper Question 7_2_10'  =>  array(
        1 =>  '<img src="Chemistry/CHG 8/32.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 8/33.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 8/34.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 8/35.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/31/O/N/14',    
    
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
      last_visit($conn,$_SESSION['userid'],109);
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
              if($key== 'Past Paper Question 7_2_1' || $key == 'Past Paper Question 7_2_2' || $key == 'Past Paper Question 7_2_3' || $key == 'Past Paper Question 7_2_4' || $key == 'Past Paper Question 7_2_5' || $key == 'Past Paper Question 7_2_6' || $key=='Past Paper Question 7_2_7' || $key == 'Past Paper Question 7_2_8' || $key == 'Past Paper Question 7_2_9' || $key == 'Past Paper Question 7_2_10' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="109" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

