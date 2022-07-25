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
    <title>Rate of Reaction</title>
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

<h1 style="font-size: 45px;">Rate of Reaction</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(

    'Define catalyst' =>  array(
        1 =>  'a substance that increases the rate of reaction',
        2 =>  'without being used up',
        3 =>  'by lowering activation energy',
    ),
    'Explain why increasing temperature increases the rate of reaction.' =>  array(
        1 =>  'molecules have more kinetic energy → moves faster',
        2 =>  'more collisions per second',
        3 =>  'more of the colliding molecules have sufficient energy to react - energy greater than or equal to activation energy',
    ),
    'State and explain the effect of increasing pressure on the rate of reaction.' =>  array(
        1 =>  'increases rate of reaction',
        2 =>  'more particles per unit volume',
        3 =>  'more collisions per second',
    ),
    'A base was added to a known concentration of acid. In terms of collision, explain why increasing the concentration of acid would increase the rate of reaction.' =>  array(
        1 =>  'more particles of acid in a given volume',
        2 =>  'more collisions per second',
    ),
    'The same base was added again, this time to a ethanoic acid. In terms of collision, explain why the rate of reaction decreased.' =>  array(
        1 =>  'ethanoic acid is a weak acid',
        2 =>  'it ionizes less',
        3 =>  'it has a lower concentration of hydrogen ions',
        4 =>  'less collisions',

    ),
    'Explain why increasing surface area increases the rate of reaction.' =>  array(
        1 =>  'more surface area → more active sites → more successful collisions with active sties',
    ),
    'Past Paper Question 6_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 7/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 7/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/43/O/N/18',    
  
    ),
    'Past Paper Question 6_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/O/N/18',    
    
      ),
      'Past Paper Question 6_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/7.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 7/6.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 7/8.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/32/M/J/14',    
    
      ),
      'Past Paper Question 6_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/10.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 7/11.png" alt="image" width="100%" class="img1">',    
        4 =>  '<img src="Chemistry/CHG 7/12.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0620/42/F/M/16',    
    
      ),
      'Past Paper Question 6_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/13.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/14.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 7/15.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0620/42/O/N/18',    
    
      ),
      'Past Paper Question 6_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/16.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/18.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 7/17.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 7/19.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/41/M/J/17',    
    
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
      last_visit($conn,$_SESSION['userid'],104);
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
              if($key=='Past Paper Question 6_1' || $key == 'Past Paper Question 6_2' || $key == 'Past Paper Question 6_3' || $key == 'Past Paper Question 6_4' || $key == 'Past Paper Question 6_5' || $key == 'Past Paper Question 6_6'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="104" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

