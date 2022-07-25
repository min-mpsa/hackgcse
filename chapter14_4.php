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
    <title>Homeostasis</title>
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

<h1 style="font-size: 45px;">Homeostasis</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define homeostasis. ' =>  array(
      1 =>  'maintenance of a constant internal environment',
      2 =>  'by controlling internal conditions within set limits',
    ),
    
    'Past-Paper Question 14_4_1'  =>  array(
      1 =>  '<img src="Biology/HG 14-4/14-4-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 14-4/14-4-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 14-4/14-4-3.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/43/O/N/19',    
  
    ),
    'Soon after starting physical activity, the concentration of carbon dioxide in the blood increases. Explain how this effect on breathing is coordinated, in terms of negative feedback. (Recall: Gas exchange)' =>  array(
        1 =>  'stimulus is CO2 which dissolves in blood to give low pH (CO2 is acidic)',
        2 =>  'low pH of blood is detected by a receptor in brain',
        3 =>  'brain sends impulses to intercostal muscles and diaphragm (effectors)',
        4 =>  'intercostal muscles contract more frequently',
        5 =>  'this is a form of negative feedback mechanism and it is involuntary',

    ),
    'Describe the role of insulin in the body.' =>  array(
        1 =>  'it controls blood glucose concentration level',
        2 =>  'increased uptake of glucose → stimulates cells to convert glucose to glycogen',
        3 =>  'so blood glucose concentration decreases',
        4 =>  'negative feedback/homeostasis ',
        5 =>  'target organs are liver and muscles',

    ),
    'Describe how the liver responds to an increase in glucose concentration.' =>  array(
        1 =>  'insulin concentration increases',
        2 =>  'insulin stimulates enzyme production',
        3 =>  'increased absorption of glucose by liver cells',
        4 =>  'conversion of glucose to glycogen',
        5 =>  'glycogen is stored',

    ),
    
    'Describe how the liver responds to an decrease in glucose concentration.' =>  array(
        1 =>  'glucagon concentration increases',
        2 =>  'glucagon stimulates enzyme production',
        3 =>  'conversion of glycogen to glucose',

    ),
    'Explain why the control of concentration of glucose in the blood is an example of negative feedback.' =>  array(
        1 =>  'glucose concentration is kept constant',
        2 =>  'any change in concentration is detected',
        3 =>  'if concentration is increasing, glucose is converted to glycogen',
        4 =>  'if concentration is decreasing, glycogen is converted to glucose',
        5 =>  'this process returns conditions to normal',
        6 =>  'ref. to homeostasis',


    ),
    'Describe the symptoms of Type 1 diabetes.' =>  array(
        1 =>  'fatigue',
        2 =>  'due to breathlessness',
        3 =>  'sweet urine',
        4 =>  'frequent urination',
        5 =>  'thirsty all the time',
        6 =>  'with dry mouth',


    ),
    'Describe the treatment of Type 1 diabetes.' =>  array(
        1 =>  'insulin injection',
        2 =>  'regular blood glucose tests',
        3 =>  'controlled diet',

    ),
    'Past-Paper Question 14_4_2'  =>  array(
        1 =>  '<img src="Biology/HG 14-4/14-4-4.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-4/14-4-5.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 14-4/14-4-7.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Biology/HG 14-4/14-4-6.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 14-4/14-4-8.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0610/42/O/N/18',    
    
      ),
      'Past-Paper Question 14_4_3'  =>  array(
        1 =>  '<img src="Biology/HG 14-4/14-4-9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-4/14-4-10.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/31/O/N/15',    
    
      ),
      'Describe how the nervous system coordinates the response of the skin to hot weather.' =>  array(
        1 =>  'change in temperature is stimulus',
        2 =>  'which is detected by temperature receptors in skin',
        3 =>  'electric impulse travels through sensory neurone to brain where hypothalamus acts as control center',
        4 =>  'sensory → relay → motor → to effector',
        5 =>  'effectors are muscles in arterioles and shunt vessels; hair erector muscles; sweat glands',
        6 =>  '',
        7 =>  '',
        8 =>  'side note: if the question did not refer to the whole nervous system, the part below is all you need to answer. however, you can add the details above if you need to fill more points',
        9 =>  '',
        10 =>  '',
        11 =>  'muscles in shunt vessels contract',
        12 =>  'shunt vessels constrict → less blood flow through shunt vessels ',
        13 =>  'arterioles dilate → vasodilation occurs',
        14 =>  'increased blood flow into capillaries near surface of skin to maximize heat loss from blood by radiation/convection/conduction',
        15 =>  'hair erector muscles relax, hair lies flat to decrease air insulation',
        16 =>  'sweat is secreted - evaporative cooling occurs',


    ),
    'Describe how the nervous system coordinates the response of the skin to cold weather.' =>  array(
        1 =>  'change in temperature is stimulus',
        2 =>  'which is detected by temperature receptors in skin',
        3 =>  'electric impulse travels through sensory neurone to brain where hypothalamus acts as control center',
        4 =>  'sensory → relay → motor → to effector',
        5 =>  'effectors are muscles in arterioles and shunt vessels; hair erector muscles; other skeletal muscles',
        6 =>  '',
        7 =>  '',
        8 =>  'side note: if the question did not refer to the whole nervous system, the part below is all you need to answer. however, you can add the details above if you need to fill more points',
        9 =>  '',
        10 =>  '',
        11 =>  'muscles in arterioles contract',
        12 =>  'arterioles constrict → vasoconstriction occurs ',
        13 =>  'shunt vessels dilate ',
        14 =>  'decreased blood flow into capillaries near surface of skin to minimize heat loss from blood by radiation/convection/conduction',
        15 =>  'hair erector muscles contract, hair rises up to increase air insulation',
        16 =>  'shivering occurs → increase kinetic energy → increase heat',


    ),
    'Explain the importance of regulating body temperature in humans.' =>  array(
        1 =>  'idea of maintaining a constant rate of metabolism',
        2 =>  'so that enzymes do not denature and the temperature is maintained at the optimum temperature for enzymes',
        3 =>  'avoids to damage to other types of proteins',
        4 =>  'avoids damage to cell membranes',
        5 =>  'avoids heatstroke or hypothermia (becoming too cold)',
        6 =>  'at high temperatures, sperm production is reduced',


    ),
    'Past-Paper Question 14_4_4'  =>  array(
        1 =>  '<img src="Biology/HG 14-4/14-4-11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-4/14-4-12.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 14-4/14-4-13.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Biology/HG 14-4/14-4-16.png" alt="image" width="100%" class="img2">',
        5 =>  '<img src="Biology/HG 14-4/14-4-14.png" alt="image" width="100%" class="img3">',    
        6 =>  '<img src="Biology/HG 14-4/14-4-17.png" alt="image" width="100%" class="img4">',
        7 =>  '<img src="Biology/HG 14-4/14-4-15.png" alt="image" width="100%" class="img5">',
        8 =>  '<img src="Biology/HG 14-4/14-4-18.png" alt="image" width="100%" class="img6">',
        9 =>  'from: 0610/41/M/J/18',    
    
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
      last_visit($conn,$_SESSION['userid'],58);
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
              if($key=='Past-Paper Question 14_4_1' || $key == 'Past-Paper Question 14_4_2' || $key == 'Past-Paper Question 14_4_3' || $key == 'Past-Paper Question 14_4_4'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="58" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

