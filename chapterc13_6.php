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
    <title>Carboxylic Acids</title>
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

<h1 style="font-size: 45px;">Carboxylic Acids</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What are the conditions required for a carboxylic acid to react with alcohol to form an ester?' =>  array(
      1 =>  'heat',
      2 =>  'catalyst → concentrated sulfuric acid',
    ),
    'How is ethanoic acid produced from ethanol?' =>  array(
        1 =>  'ethanol is oxidized',
        2 =>  'by reacting with acidified potassium dichromate (K2Cr2O7)',
    ),
    'General equation to produce esters and naming system of esters' =>  array(
        1 =>  'alcohol + carboxylic acid → ester',
        2 =>  'catalyst: concentrated sulfuric acid',
        3 =>  'naming system of esters: [alcohol] [acid]',
        4 =>  'for e.g. if ethanol + methanoic acid → ethyl methanoate',
        5 =>  'if propanol + ethanoic acid → propyl ethanolate',

    ),
    'How would you produce ethyl propanoate? How would you identify if something is an ester?' =>  array(
        1 =>  'react ethanol and propanoic acid',
        2 =>  'using concentrated H2SO4 as catalyst',
        3 =>  'esters have a fruity smell',
    ),
    'Past Paper Question 13_6_1'  =>  array(
        1 =>  '<img src="Chemistry/CHG 14/19.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 14/20.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/F/M/19',    
    
      ),
      'Past Paper Question 13_6_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 14/21.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 14/22.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/19',    
    
      ),
      'Past Paper Question 13_6_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 14/23.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 14/24.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/M/J/18',    
    
      ),
    'Past Paper Question 13_6_4'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/25.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/26.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Chemistry/CHG 14/27.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Chemistry/CHG 14/28.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0620/41/O/N/18',    
  
    ),
    'Past Paper Question 13_6_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 14/29.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 14/30.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/M/J/17',    
    
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
      last_visit($conn,$_SESSION['userid'],132);
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
              if($key=='Past Paper Question 13_6_1' || $key == 'Past Paper Question 13_6_2' || $key == 'Past Paper Question 13_6_3' || $key == 'Past Paper Question 13_6_4' || $key == 'Past Paper Question 13_6_5' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="132" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

