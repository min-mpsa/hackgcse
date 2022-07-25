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
    <title>Heart</title>
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

<h1 style="font-size: 45px;">Heart</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State what is meant by a single circulation.' =>  array(
        1 =>  'blood travels through the heart once in a complete circuit',
      ),
      'State what is meant by the term double circulation.' =>  array(
        1 =>  'one loop to the lungs and one loop to the rest of the body',
        2 =>  'blood flows through the heart twice for one complete circuit',
      ),
      'Explain the advantages of a double circulation.' =>  array(
        1 =>  'faster circulation',
        2 =>  'because pressure is higher because blood is pumped twice in one circulation',
      ),
      'Past-Paper Question 9_1_1'  =>  array(
        1 =>  '<img src="Biology/HG 9-1/9-1-1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 9-1/9-1-2.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 9-1/9-1-3.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/41/M/J/16',    
    
      ),
    'Explain why the wall of the left ventricle is thicker than the wall of the right ventricle.' =>  array(
      1 =>  'left ventricle contains more muscle',
      2 =>  'because it needs to pump blood further',
      3 =>  'left ventricle needs to overcome more resistance',
      4 =>  'so left ventricle pumps blood at a higher pressure',

    ),
    'Describe and explain how the blood travels from the right ventricle to the lungs.' =>  array(
        1 =>  'right ventricle contracts',
        2 =>  'blood pressure increases in heart',
        3 =>  'higher blood pressure in ventricles than in arteries',
        4 =>  'semilunar valve opens',
        5 =>  'blood flows into pulmonary artery',
        6 =>  'semilunar valve closes when blood is in pulmonary artery',

    ),
    'Explain the importance of the septum.' =>  array(
        1 =>  'it separates the oxygenated and deoxygenated blood',
        2 =>  'to allow double circulation',
    ),
    'How is the activity of the heart monitored?' =>  array(
        1 =>  'pulse rate',
        2 =>  'listening to sounds of valves closing',
        3 =>  'listening to sounds of valves closing',
    ),
    'Describe how the students could measure their pulse.' =>  array(
        1 =>  'fingers on wrist',
        2 =>  'measure number of beats over a period of time',
        3 =>  'use a heart rate monitor',
    ),
    'Past-Paper Question 9_1_2'  =>  array(
      1 =>  '<img src="Biology/HG 9-1/9-1-4.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 9-1/9-1-5.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 9-1/9-1-6.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/42/M/J/17',    
  
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
      last_visit($conn,$_SESSION['userid'],35);
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
              if($key=='Past-Paper Question 9_1_2' || $key == 'Past-Paper Question 9_1_1' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="35" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

