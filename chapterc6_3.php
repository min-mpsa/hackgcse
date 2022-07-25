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
    <title>Redox</title>
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

<h1 style="font-size: 45px;">Redox</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define oxidation.' =>  array(
      1 =>  'gain of oxygen',
      2 =>  'loss of electrons',
    ),
    'Define reduction.' =>  array(
        1 =>  'oxygen loss',
        2 =>  'gain of electrons',
      ),
      'What is a redox reaction?' =>  array(
        1 =>  'reaction in which electrons are transferred from one species to another',
      ),
      'Define oxidizing agent.' =>  array(
        1 =>  'substance which oxidizes another substance during a redox reaction',
      ),
      'Define reducing agent.' =>  array(
        1 =>  'a substance which reduces another substance during a redox reaction',
      ),
      'Past Paper Question 6_3_1'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/40.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/41.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/32/O/N/15',    
    
      ),
    'In terms of electron transfer, why is X the reducing agent? Why is Y the oxidizing agent?' =>  array(
        1 =>  'X loses electrons.',
        2 =>  'Y gains electrons.',
        3 =>  'Note: reducing agents are oxidized while oxidizing agents are reduced',
    ),
    'Past Paper Question 6_3_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/42.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/43.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/M/J/19',    
    
      ),
      'Past Paper Question 6_3_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/44.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/45.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/O/N/17',    
    
      ),
    'What is meant by the term photochemical reaction?' =>  array(
        1 =>  'a reaction whose rate is affected by light/reaction which occurs in the presence of light',
      ),
      'Describe the role of light in photochemical reactions.' =>  array(
        1 =>  'light provides the activation energy necessary for these photochemical reactions',
      ),
      'What is photosynthesis?' =>  array(
        1 =>  'reaction between carbon dioxide and water',
        2 =>  'in the presence of chlorophyll and sunlight',
        3 =>  'to produce glucose and oxygen',
    ),
      
    'Past Paper Question 6_3_4'  =>  array(
      1 =>  '<img src="Chemistry/CHG 7/46.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 7/47.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Chemistry/CHG 7/48.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0620/31/O/N/15',    
  
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
      last_visit($conn,$_SESSION['userid'],106);
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
              if($key=='Past Paper Question 6_3_1' || $key == 'Past Paper Question 6_3_2' || $key == 'Past Paper Question 6_3_3' || $key == 'Past Paper Question 6_3_4' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="106" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

