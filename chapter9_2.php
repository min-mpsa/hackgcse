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
    <title>Coronary Heart Disease</title>
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
                <a href="biology.php"><button class="hide2">Biology</button></a>
            </div>
        </header>

<h1 style="font-size: 45px;">Coronary Heart Disease</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe what coronary heart disease is and state the possible risk factors. ' =>  array(
      1 =>  'it is the blockage of coronary arteries',
      2 =>  'risk factors: fatty diet, stress, smoking, genetic predisposition, age, gender',
    ),
    
    'Past-Paper Question 9_2_1'  =>  array(
      1 =>  '<img src="Biology/HG 9-1/9-1-7.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 9-1/9-1-8.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0610/41/O/N/19',    
  
    ),
    'Describe how too much fat in the diet may cause coronary heart disease.' =>  array(
        1 =>  'fat is deposited in walls of coronary arteries',
        2 =>  'blood flow is restricted in arteries',
        3 =>  'no blood flow to cardiac muscles',
        4 =>  'less nutrients (glucose and oxygen) reach heart muscles',

    ),
    'Describe the effect on the heart of a blockage in the coronary artery.' =>  array(
        1 =>  'lack of blood supply to heart muscles',
        2 =>  'insufficient oxygen or glucose',
        3 =>  'less aerobic respiration',
        4 =>  'cardiac cells die',
        5 =>  'heart muscle cannot contract',

    ),
    'Explain why exercise is recommended for people with high risk of developing coronary heart disease.' =>  array(
        1 =>  'prevents blocked arteries',
        2 =>  'lowers blood pressure',
        3 =>  'lowers cholesterol',
        4 =>  'fat loss',
        5 =>  'lowers stress',
        6 =>  'stronger heart muscles',

    ),
    'Describe and explain how coronary heart disease may be treated.' =>  array(
        1 =>  'Drug treatment',
        2 =>  'take aspirin',
        3 =>  'to reduce the clotting of blood',
        4 =>  '',
        5 =>  '',
        6 =>  'Surgery',
        7 =>  '',
        8 =>  'coronary artery by-pass graft:',
        9 =>  'a piece of blood vessel from thigh vein is attached to carry blood around the blocked artery',
        10 =>  '',
        11 =>  'angioplasty:',
        12 =>  'a balloon is inserted into arery and inflated to widen artery',
        13 =>  '',
        14 =>  'stent:',
        15 =>  'to hold arteries open to restore blood supply to heart muscle',

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
      last_visit($conn,$_SESSION['userid'],36);
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
              if($key=='Describe and explain how coronary heart disease may be treated.' || $key == 'Past-Paper Question 9_2_1' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="36" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

