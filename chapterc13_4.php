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
    <title>Alkenes</title>
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

<h1 style="font-size: 45px;">Alkenes</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is meant by the term unsaturated?' =>  array(
      1 =>  'not all bonds are single bonds',
    ),
    'What are the two ways alkenes can be prepared?' =>  array(
        1 =>  'cracking ',
        2 =>  'dehydration of alcohol',
    ),
    'Describe the manufacture of alkenes and of hydrogen by cracking.' =>  array(
        1 =>  'cracking: breakdown of a hydrocarbon',
        2 =>  'temperature: 600C - 700C',
        3 =>  'catalyst: silicon dioxide (OR) aluminium oxide',
        4 =>  'to give a simpler alkene (and alkane)',
        5 =>  'give equation accordingly',

    ),
    'Describe the properties of alkenes.' =>  array(
        1 =>  'undergoes combustion',
        2 =>  'addition reactions with bromine, hydrogen, steam',
    ),
    'Describe a test to show that a compound is unsaturated.' =>  array(
        1 =>  'bromine water',
        2 =>  'turns colorless',
    ),
    'Describe the reaction between hydrogen and ethene.' =>  array(
        1 =>  'addition reaction',
        2 =>  'CH2=CH2 + H2 → CH3CH3 (ethane)',
        3 =>  'note: addition reactions of alkenes with hydrogen produces their corresponding alkanes',
    ),
    'Describe the reaction between ethene and bromine.' =>  array(
        1 =>  'addition reaction',
        2 =>  'CH2=CH2 + Br2 → CH2BrCH2Br',
        3 =>  '1-2 - dibromoethane',
    ),
    'Describe the reaction between ethene and hydrogen bromide.' =>  array(
        1 =>  'addition reaction',
        2 =>  'CH2=CH2 + HBr → CH3CH2B',
        3 =>  'because ethene is symmetrical, the hydrogen and the bromine atom goes to separate sides of the double bond',
    ),
    'Describe the reaction between propene and hydrogen bromide.' =>  array(
        1 =>  'CH3CH=CH2 + HBr → CH3CH2CH2Br + CH3CHBrCH3',
        2 =>  'because propene is not symmetrical, two products are formed (isomers)',
        3 =>  'for the first one, hydrogen goes to left side of the double bond while bromine goes to the right side',
        4 =>  '',

    ),
    'Describe the reaction between ethene (alkenes) and steam. Include what this reaction is called.' =>  array(
        1 =>  'hydration reaction',
        2 =>  'catalyst: H3PO4 phosphoric acid',
        3 =>  'temperature: 300C',
        4 =>  'to produce ethanol (alcohol)',
        5 =>  'include equation: CH2=CH2 + H2O → CH3CH2OH',

    ),
    'Describe the dehydration of alcohol to form alkenes, using ethanol as an example.' =>  array(
        1 =>  'ethanol is dehydrated to form ethene and water',
        2 =>  'catalyst: aluminium oxide',
        3 =>  'temperature: 350C',
        4 =>  'CH3CH2OH → CH2=CH2 + H2O',

    ),

    'Past Paper Question 13_4_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/13.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/14.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/19',    
  
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
      last_visit($conn,$_SESSION['userid'],130);
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
              if($key=='' || $key == 'Past Paper Question 13_4_1' || $key == '' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="130" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

