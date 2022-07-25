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
    <title>Alcohols</title>
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

<h1 style="font-size: 45px;">Alcohols</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe how ethanol can be manufactured from sugars such as glucose. Include an equation for the reaction in which ethanol is formed and essential conditions' =>  array(
      1 =>  'C6H12O6 → 2CO2 + 2C2H5OH',
      2 =>  'conditions: anaerobic, yeast, 30C',
      3 =>  'fractional distillation of aqueous ethanol',
    ),
    'Describe how ethanol would be manufactured from a long-chain alkane like octane.' =>  array(
        1 =>  'cracking of octane',
        2 =>  '450-800 degree celsius; Al2O3 catalyst OR SiO2 cataylyst',
        3 =>  'C8H18 → C2H4 + C6H14',
        4 =>  'hydration of ethene',
        5 =>  '300 C; phosphoric acid catalyst',
        6 =>  'C2H4 + H2O → C2H5OH ',

    ),
    'State some uses of ethanol.' =>  array(
        1 =>  'solvent',
        2 =>  'fuel',
    ),
    'State the advantages and disadvantages of producing ethanol by the catalytic addition of steam to ethene, instead of glucose fermentation.' =>  array(
        1 =>  'Advantages:',
        2 =>  'purer product',
        3 =>  'faster reaction',
        4 =>  'continuous process',
        5 =>  '',
        6 =>  '',
        7 =>  'Disadvantages:',
        8 =>  'renewable feedstock',
        9 =>  'lower temperature',
        10 =>  'lower pressure',


    ),
    'One disadvantage of fermentation is that the maximum concentration of ethanol produced
    is about 15%. Suggest why the concentration of ethanol produced by fermentation does not exceed 15%.' =>  array(
        1 =>  'yeast is killed by ethanol',
    ),
    'Past Paper Question 13_5_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/15.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/16.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/19',    
  
    ),
    'Past Paper Question 13_5_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 14/17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 14/18.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/19',    
    
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
      last_visit($conn,$_SESSION['userid'],131);
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
              if($key=='Past Paper Question 13_5_1' || $key == 'Past Paper Question 13_5_2' || $key == 'State the advantages and disadvantages of producing ethanol by the catalytic addition of steam to ethene, instead of glucose fermentation.' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="131" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

