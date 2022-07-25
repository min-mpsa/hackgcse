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
    <title>Air</title>
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

<h1 style="font-size: 45px;">Air</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State the composition of clean, dry air.' =>  array(
      1 =>  '78% nitrogen, 21% oxygen',
      2 =>  'Remainder: mixture of noble gases, and carbon dioxide',
    ),
    'Describe the steps in the industrial process which enables nitrogen and oxygen to be separated from clean dry air.' =>  array(
        1 =>  'fractional distillation of liquid air',
        2 =>  'air is condensed into liquid',
        3 =>  'allowed air to boil',
        4 =>  'condensed the vapors and collected them seperately in order of evaporation',

    ),
    'Name some examples of pollutants in the air. State the sources of these pollutants. State the adverse effects of these pollutants.' =>  array(
        1 =>  'carbon monoxide → from incomplete combustion of carbon containing substances; toxic gas: reduces oxygen carrying capacity in your red blood cells',
        2 =>  'sulfur dioxide → combustion of fossil fuels which contain sulfur compounds; acid rain',
        3 =>  'oxides of nitrogen → car engines; acid rain',
        4 =>  'lead compounds → leaded petrol; can damage brain and kidneys',

    ),
    'Describe the negative effects of acid rain on land.' =>  array(
        1 =>  'damages plants and trees',
        2 =>  'soil leaching',
        3 =>  'nutrients in soil no longer available to plants',
        4 =>  'dissolves limestone',
        5 =>  'damages buildings and statues',

    ),
    'Describe how oxides of nitrogen form in a car engine.' =>  array(
        1 =>  'nitrogen and oxygen from the air react in a car engine',
        2 =>  'due to high temperatures',
    ),
    'Describe how carbon dioxide and carbon monoxide are formed in motor vehicle engines.' =>  array(
        1 =>  'combustion of gasoline (or any other named fuel)',
        2 =>  'incomplete combustion would produce CO',
        3 =>  'complete combustion would produce CO2',
    ),
    'How are the amounts of carbon monoxide and nitrogen monoxide emitted by modern motor vehicles reduced? Include an equation in your answer.' =>  array(
        1 =>  'use of catalytic converter',
        2 =>  'gases stick on the catalysts surface',
        3 =>  'oxides of nitrogen are reduced to form nitrogen (2)',
        4 =>  '2NO + 2CO → 2CO2 + N2',

    ),
    'State the conditions required for the rusting iron.' =>  array(
        1 =>  'iron, water, oxygen',
    ),
    'Explain why iron does not rust when it is completely covered with zinc/oil/paint.' =>  array(
        1 =>  'zinc/oil/paint acts as a barrier which prevents contact between iron and water and oxygen',
    ),
    'A piece of iron is coated galvanized (coated with zinc) to prevent rusting. Explain why iron still does not rust when the zinc coating is scratched. (Sacrificial Protection)' =>  array(
        1 =>  'zinc is more reactive than iron',
        2 =>  'zinc loses electrons more readily and forms positive ions',
        3 =>  'oxygen and water gains electrons',
        4 =>  'therefore, iron does not lose electrons and it does not oxidize to iron III to form rust',

    ),
    'Past Paper Question 11_2_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 12/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 12/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/19',    
  
    ),
    'Past Paper Question 11_2_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 12/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 12/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/F/M/18',    
    
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
      last_visit($conn,$_SESSION['userid'],121);
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
              if($key=='Past Paper Question 11_2_1' || $key == 'Past Paper Question 11_2_2' || $key == '' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="121" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

