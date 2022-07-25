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
    <title>Diet</title>
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

<h1 style="font-size: 45px;">Diet</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is meant by the term balanced diet? (4)' =>  array(
      1 =>  'has all essential nutrients',
      2 =>  'carbohydrates, proteins, fats, vitamins, minerals, fibre',
      3 =>  'in correct proportions',
      4 =>  'to maintain good health',
    ),
    'Explain how age, gender and activity affect the dietary needs of humans including during pregnancy and whilst breast-feeding.' =>  array(
        1 =>  'Children: more calcium for better bone growth',
        2 =>  'Teenagers: high calorie intake',
        3 =>  'Males generally require more energy',
        4 =>  'Females need more iron because blood is lost through menstruation',
        5 =>  'Pregnant: more iron, calcium, other healthy nutrients',

    ),
    'Describe the effects of malnutrition.' =>  array(
        1 =>  'weight loss, starvation',
        2 =>  'deficiency disease',
        3 =>  'iron deficiency → anaemia',
        4 =>  'protein deficiency → kwashiorkor',
        5 =>  'deficiency of all nutrients → marasmus',
        6 =>  'vitamin C deficiency → scurvy',
        7 =>  'fibre deficiency → constipation',
        8 =>  'too much fat → obesity, coronary heart disease',

      ),
    'List the principal sources of and describe the dietary importance of carbohydrates, fats, proteins, vitamin C, vitamin D, calcium, iron, fibre, and water. '  =>  array(
      1 =>  '<img src="Biology/HG 7-1/7-1-1.png" alt="image" width="100%" class="img1">',
  
    ),
    'Describe the symptoms of marasmus' =>  array(
        1 =>  'lack of growth',
        2 =>  'diarrhea',
        3 =>  'fatigue',
        4 =>  'more prone to infections',
      ),
      'Describe the symptoms of kwashiorkor.' =>  array(
        1 =>  'rounded belly',
        2 =>  'oedema → exces of liquid in tissue fluid',
      ),
      'Past-Paper Question 7_1_1'  =>  array(
        1 =>  '<img src="Biology/HG 7-1/7-1-2.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 7-1/7-1-3.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 7-1/7-1-4.png" alt="image" width="100%" class="img2">',    
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
      last_visit($conn,$_SESSION['userid'],24);
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
              if($key=='List the principal sources of and describe the dietary importance of carbohydrates, fats, proteins, vitamin C, vitamin D, calcium, iron, fibre, and water. ' || $key == 'Past-Paper Question 7_1_1' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="24" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

