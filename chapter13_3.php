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
    <title>Diabetes and Dialysis</title>
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

<h1 style="font-size: 45px;">Diabetes and Dialysis</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Why is the patient with Type 1 diabetes urinating often?' =>  array(
      1 =>  'glucose passed through to tubule',
      2 =>  'reabsorption capacity reduces',
      3 =>  'glucose draws water',
    ),
    'Explain dialysis and how it works. ' =>  array(
        1 =>  'blood passes over a dialysis membrane',
        2 =>  'dialysis membrane separates the blood and the dialysis fluid',
        3 =>  'dialysis fluid contains glucose/salts/no urea ',
        4 =>  'urea, excess salt, water enters dialysis fluid by diffusion',
        5 =>  'dialysis fluid is refreshed',
        6 =>  'glucose in dialysis fluid should be same concentration as should be in blood so there is no net loss of glucose',

    ),
    'Past-Paper Question 13_3_1'  =>  array(
      1 =>  '<img src="Biology/HG 13-1/13-1-10.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 13-1/13-1-11.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0610/33/M/J/14',    
  
    ),
    'Before a kidney is transplanted, it is important to match the tissue type of the donor with the tissue type of the recipient. State why this is necessary.' =>  array(
        1 =>  'to avoid rejection',
        2 =>  'to stop immune system from attacking the new kidney',
    ),
    'Discuss the advantages and disadvantages of kidney transplants, compared with dialysis. ' =>  array(
        1 =>  'Advantages of having kidney transplant instead of dialysis:',
        2 =>  '',
        3 =>  'convenience: no need to visit hospital, spend time with dialysis, have a restricted diet - it is a one-time treatment',
        4 =>  'improved quality of life - can eat normally again',
        5 =>  'cost effective in the long run',
        6 =>  'you still have a working kidney',
        7 =>  '',
        8 =>  '',
        9 =>  'Disadvantages',
        10 =>  '',
        11 =>  'rejection of kidney is possible',
        12 =>  'risk associated with operation',
        13 =>  'difficult to find a suitable donor',
        14 =>  'need to take immunosuppressant drugs',

    ),
    'Explain why urine tests are a good indicator of how much salt has been consumed.' =>  array(
        1 =>  'excess salt is excreted from body in urine',
        2 =>  'some salt is reabsorbed in the kidney tubules into the blood',
        3 =>  'people are not reliable in recording how much salt they have taken',
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
      last_visit($conn,$_SESSION['userid'],53);
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
              if($key=='Past-Paper Question 13_3_1' || $key == 'Discuss the advantages and disadvantages of kidney transplants, compared with dialysis. ' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="53" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

