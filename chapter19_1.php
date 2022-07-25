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
    <title>Food Chains and Food Webs</title>
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
      .img8{
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

<h1 style="font-size: 45px;">Food Chains and Food Webs</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is the principal source of energy input to biological systems.' =>  array(
      1 =>  'Sun',
    ),
    'Define food chain.' =>  array(
        1 =>  'transfer of energy from one organism to the next, beginning with a producer',
    ),
    'Describe how energy is transferred between trophic levels.' =>  array(
        1 =>  'light energy from Sun - chemical energy in organisms - environment',
        2 =>  'transferred by ingestion',
    ),
    'Define trophic level. ' =>  array(
        1 =>  'position of an organism in a food chain, food web, pyramid of numbers or a pyramid of biomass',
    ),
    'Explain why the fourth trophic level has the least biomass in this food chain.' =>  array(
        1 =>  'energy is lost between the trophic levels',
        2 =>  'not all of the organism is eaten',
        3 =>  'energy is lost in metabolic processes, respiration, and movement',
        4 =>  'energy is lost in excretion',
        5 =>  'so there is less energy to support the next trophic level',

    ),
    'Arctic wolves are the top carnivores in the food web in the tundra. Explain why eating less meat and more fruits and vegetables is more energy efficient.' =>  array(
        1 =>  'little energy available from meat - meat comes from primary consumers',
        2 =>  'energy is lost between trophic levels in processes like movement and respiration',
        3 =>  'low numbers of prey (also because energy is lost between trophic levels)',
        4 =>  'wolves may not be successful catching prey',

    ),
    'Past-Paper Question 19_1_1'  =>  array(
      1 =>  '<img src="Biology/HG 19-1/19-1-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 19-1/19-1-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 19-1/19-1-3.png" alt="image" width="100%" class="img1">',    
      4 =>  '<img src="Biology/HG 19-1/19-1-4.png" alt="image" width="100%" class="img2">',
      5 =>  'from: 0610/32/O/N/14',    
  
    ),
    'Past-Paper Question 19_1_2'  =>  array(
        1 =>  '<img src="Biology/HG 19-1/19-1-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-1/19-1-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 19-1/19-1-7.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/31/M/J/15',    
    
      ),
      'Define food web.' =>  array(
        1 =>  'network of interconnected food chains',
    ),
    'Define producer. ' =>  array(
        1 =>  'an organism that makes its own organic nutrients',
        2 =>  'usually using energy from sunlight',
        3 =>  'through photosynthesis',
    ),
    'Define consumer.' =>  array(
        1 =>  'an organism that gets its energy by feeding on other organisms',
    ),
    'Define herbivore. ' =>  array(
        1 =>  'animal that gets its energy by eating plants',
    ),
    'Define carnivore. ' =>  array(
        1 =>  'animal that gets its energy by eating other animals',
    ),
    'Define decomposer. ' =>  array(
        1 =>  'organism that gets its energy from dead or waste organic material',
    ),
    'Past-Paper Question 19_1_3'  =>  array(
        1 =>  '<img src="Biology/HG 19-1/19-1-8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-1/19-1-9.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/42/O/N/18',    
    
      ),
      'Past-Paper Question 19_1_4'  =>  array(
        1 =>  '<img src="Biology/HG 19-1/19-1-10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-1/19-1-11.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/43/O/N/19',    
    
      ),
      'Past-Paper Question 19_1_5'  =>  array(
        1 =>  '<img src="Biology/HG 19-1/19-1-12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-1/19-1-13.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 19-1/19-1-15.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Biology/HG 19-1/19-1-14.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 19-1/19-1-16.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0610/33/M/J/15',    
    
      ),
      'Explain the advantages of presenting information about food webs as a pyramid of biomass and not as a pyramid of numbers.' =>  array(
        1 =>  'in a pyramid of numbers, one large individual is shown in the same way as one very tiny individual ',
        2 =>  'biomass indicates how much food there is left ',
        3 =>  'biomass is an indicator of the energy available',
        4 =>  'pyramid of biomass is pyramid shaped whereas a pyramid of numbers is not always',

    ),
      'Past-Paper Question 19_1_6'  =>  array(
        1 =>  '<img src="Biology/HG 19-1/19-1-17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-1/19-1-18.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 19-1/19-1-19.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/F/M/18',    
    
      ),
      'Past-Paper Question 19_1_7'  =>  array(
        1 =>  '<img src="Biology/HG 19-1/19-1-20.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-1/19-1-21.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 19-1/19-1-22.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Biology/HG 19-1/19-1-23.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 19-1/19-1-26.png" alt="image" width="100%" class="img4">',
        6 =>  '<img src="Biology/HG 19-1/19-1-24.png" alt="image" width="100%" class="img5">',
        7 =>  '<img src="Biology/HG 19-1/19-1-25.png" alt="image" width="100%" class="img6">',
        8 =>  '<img src="Biology/HG 19-1/19-1-27.png" alt="image" width="100%" class="img7">',
        9 =>  '<img src="Biology/HG 19-1/19-1-28.png" alt="image" width="100%" class="img8">',
        10 =>  'from: 0610/42/M/J/18',    
    
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
      last_visit($conn,$_SESSION['userid'],80);
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
              if($key=='Past-Paper Question 19_1_1' || $key == 'Past-Paper Question 19_1_2' || $key == 'Past-Paper Question 19_1_3' || $key == 'Past-Paper Question 19_1_4' || $key == 'Past-Paper Question 19_1_5' || $key == 'Past-Paper Question 19_1_6' || $key == 'Past-Paper Question 19_1_7'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="80" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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
    $('.img7').on('click',function(){
      $(this).hide();
      $('.img8').show();
    });
    $('.img8').on('click',function(){
      $(this).hide();
      $('.img7').show();
    });
    $('.accordion').on('click',function(){
      $('.img1').show();
      $('.img3').show();
      $('.img5').show();
      $('.img7').show();
    });
    $('.accordion__link:not(.accordion__link_active)').on('click',function(){
      $('.img2').hide();
      $('.img4').hide();
      $('.img6').hide();
      $('.img8').hide();

    });
    $('.accordion__link_active').on('click',function(){
      $('.img1').show();
      $('.img3').show();
      $('.img5').show();
      $('.img7').show();

    });
    
  });
</script>
</body>
</html> 

