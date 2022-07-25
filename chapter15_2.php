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
    <title>Misused Drugs</title>
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

<h1 style="font-size: 45px;">Misused Drugs</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe the long-term effects of excessive alcohol consumption.' =>  array(
      1 =>  'cirrhosis of liver',
      2 =>  'liver cancer',
      3 =>  'addiction',
      4 =>  'depression',
    ),
    'State some withdrawal symptoms that heroin users may experience.' =>  array(
        1 =>  'sleeplessness',
        2 =>  'headaches',
        3 =>  'mood swings',
    ),
    'Explain how heroin affects the body, including how it affects the function of the synapse.' =>  array(
        1 =>  'heroin is a depressant',
        2 =>  'heroin is converted into morphine and it diffuses into the synapse',
        3 =>  'it binds to receptors for neurotransmitters because morphine is complementary to receptors',
        4 =>  'blocks neurotransmitters from entering receptor site',
        5 =>  'it increases reaction time and slows down impulses',
        6 =>  'mental function of the human is affected badly',

      ),
      'Suggest why heroin abuse may increase criminal activity.' =>  array(
        1 =>  'addicts turn to crime to finance their addiction',
        2 =>  'more opportunity to become drug dealers',
      ),
      'Suggest some social implications of alcohol consumption.' =>  array(
        1 =>  'domestic violence - family breakdown',
        2 =>  'drink-driving',
        3 =>  'crime',
        4 =>  'impaired performance at work',

      ),
      'Describe the effects of components inside a cigarette.' =>  array(
        1 =>  'tar: causes lung cancer and blocks air passages',
        2 =>  'smoke particles: causes asthma',
        3 =>  'carbon monoxide: combines with haemoglobin and reduces oxygen carrying capacity',
        4 =>  'nicotine: addiction',

      ),
      'How does smoking negatively affect the process of breathing? Active recall: Gas exchange' =>  array(
        1 =>  'smoke particles: more production of mucus',
        2 =>  'nicotine: decreases frequency of cilia beating',
        3 =>  'mucus is accumulated ',
      ),
      'What are some long term effects of tobacco smoking?' =>  array(
        1 =>  'Chronic Obstructive Pulmonary Disease (COPD)',
        2 =>  'lung cancer',
        3 =>  'coronary heart disease',
      ),
      'State why testosterone can improve sporting performance.' =>  array(
        1 =>  'it increases muscle mass',
        2 =>  'improves recovery of muscle damage',
        3 =>  'increases aggression',
      ),
      'Discuss the arguments against the use of anabolic steroids to improve sporting performance.' =>  array(
        1 =>  'anabolic steroids increase muscle mass',
        2 =>  'gives athletes unfair advantage',
        3 =>  'it can have other side effects on health',
        4 =>  'can be banned if found using them',

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
      last_visit($conn,$_SESSION['userid'],62);
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
              if($key=='' || $key == '' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="62" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

