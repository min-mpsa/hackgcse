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
    <title>The Particulate Nature of Matter</title>
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

<h1 style="font-size: 45px;">The Particulate Nature of Matter</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe and distinguish the structure of solids, liquids, and gases in terms of particle separation, arrangement, and types of motion.' =>  array(
      1 =>  'Solid:',
      2 =>  'atoms are touching each other',
      3 =>  'regular arrangement',
      4 =>  'vibrating in fixed positions',
      5 =>  '',
      6 =>  '',
      7 =>  '',
      8 =>  'Liquid:',
      9 =>  'atoms are touching each other by there are some spaces between them',
      10 =>  'randomly arranged',
      11 =>  'slide over one another',
      12 =>  '',
      13 =>  '',
      14 =>  '',
      15 =>  'Gas:',
      16 =>  'not touching - far apart from one another',
      17 =>  'random',
      18 =>  'random movement',


    ),
    'Explain why energy needs to be supplied to turn a liquid into a gas.' =>  array(
        1 =>  'to overcome the attractive forces/break the bonds and separate molecules',
    ),
    'Define diffusion' =>  array(
        1 =>  'net movement of particles',
        2 =>  'from a region of higher concentration to a region of lower concentration',
        3 =>  'down the concentration gradient',
        4 =>  'as a result of their net movement',

    ),
    'Explain what Brownian motion is and why it occurs?' =>  array(
        1 =>  'molecules like nitrogen and oxygen in the air collide with dust particles',
        2 =>  'making them move randomly according to their bombarding motion',
    ),
    'State the cause of gas pressure.' =>  array(
        1 =>  'gas molecules striking against the walls of the container',
    ),
    'Past Paper Question 1_1'  =>  array(
        1 =>  '<img src="Chemistry/CHG 1/1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 1/2.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/18',    
    
      ),
      'Past Paper Question 1_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 1/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 1/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/17',    
    
      ),
      'Past Paper Question 1_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 1/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 1/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/M/J/16',    
    
      ),
    'Past Paper Question 1_4'  =>  array(
      1 =>  '<img src="Chemistry/CHG 1/7.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 1/8.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Chemistry/CHG 1/9.png" alt="image" width="100%" class="img2">',
      4 =>  '<img src="Chemistry/CHG 1/10.png" alt="image" width="100%" class="img3">',    
      5 =>  '<img src="Chemistry/CHG 1/11.png" alt="image" width="100%" class="img4">',
      6 =>  'from: 0620/42/F/M/19',    
  
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
      last_visit($conn,$_SESSION['userid'],92);
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
              if($key=='Past Paper Question 1_1' || $key == 'Past Paper Question 1_2' || $key == 'Past Paper Question 1_3' || $key == 'Past Paper Question 1_4' || $key == 'Describe and distinguish the structure of solids, liquids, and gases in terms of particle separation, arrangement, and types of motion.'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="92" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

