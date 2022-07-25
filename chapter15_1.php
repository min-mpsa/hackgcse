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
    <title>Medicinal Drugs</title>
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

<h1 style="font-size: 45px;">Medicinal Drugs</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define drug.' =>  array(
      1 =>  'any substance taken into the body that modifies or affects chemical reactions in the body',
    ),
    'Explain why nicotine is a drug.' =>  array(
        1 =>  'it modifies chemical reactions in the body',
    ),
    'Explain how development of resistant bacteria such as MRSA can be minimised.' =>  array(
        1 =>  'use antibiotics only when essential',
        2 =>  'ensure that treatment is completed',
    ),
    'Past-Paper Question 15_1_1'  =>  array(
      1 =>  '<img src="Biology/HG 15-1/15-1-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 15-1/15-1-3.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Biology/HG 15-1/15-1-2.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Biology/HG 15-1/15-1-4.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0610/43/O/N/16',    
  
    ),
    'Past-Paper Question 15_1_2'  =>  array(
        1 =>  '<img src="Biology/HG 15-1/15-1-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 15-1/15-1-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 15-1/15-1-7.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/F/M/18',    
    
      ),
      'Explain why it is so important to complete a full treatment of antibiotics.' =>  array(
        1 =>  'all bacteria need to be killed',
        2 =>  'any remaining bacteria will reproduce',
        3 =>  'disease will continue',
        4 =>  'bacteria may develop resistance to the antibiotics',
        5 =>  'antibiotics are no longer effective',
        6 =>  'new antibiotics have to be given',
        7 =>  'new antibiotics - more selection pressure - more resistance',

    ),
    'Explain why antibiotics kill bacteria, but do not affect viruses. ' =>  array(
        1 =>  'antibiotics target peptidoglycan cell wall',
        2 =>  'viruses do not have cell walls, bacteria have cell walls',
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
      last_visit($conn,$_SESSION['userid'],61);
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
              if($key=='Past-Paper Question 15_1_1' || $key == 'Past-Paper Question 15_1_2' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="61" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

