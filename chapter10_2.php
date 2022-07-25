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
    <title>Active Immunity</title>
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

<h1 style="font-size: 45px;">Active Immunity</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define active immunity and how it is gained. ' =>  array(
      1 =>  'defence against a pathogen by antibody production in the body',
      2 =>  'gained after an infection by a pathogen or by vaccination',
    ),
    'How are antibodies and antigens unique?' =>  array(
        1 =>  'each pathogen has its own antigens which have specific shapes',
        2 =>  'so specific antibodies which fit the specific shapes of the antigens are needed',
    ),
    'Describe the roles of antibodies in the defence of the body.' =>  array(
        1 =>  'a pathogen has antigens on their surface',
        2 =>  'antibodies have complementary shapes to antigens',
        3 =>  'they lock onto specific antigens of pathogens',
        4 =>  'this destroys the pathogens',
        5 =>  'they also mark the pathogens for destruction by phagocytes (phagocytosis)',
        6 =>  'antibodies can also deactivate toxins',
    ),
    'Describe the role of phagocytes in the defense against diseases.' =>  array(
        1 =>  'phagocytes give nonspecific immune response',
        2 =>  'they engulf pathogens into its vacuole (phagocytosis)',
        3 =>  'they use enzymes to digest pathogens',
        4 =>  'present remaining antigens to lymphocytes to convene active immunity',
    ),
    'Describe the roles of white blood cells in tissue rejection.' =>  array(
        1 =>  'recognise that tissue is foreign',
        2 =>  'by detecting that antigens are different',
        3 =>  'lymphocytes release antibodies',
        4 =>  'phagocytes and lymphocytes cause tissue destruction',
        5 =>  '(state more specific functions of phagocytes and lymphocytes if question has more marks)',
    ),
    'Past-Paper Question 10_2_1'  =>  array(
      1 =>  '<img src="Biology/HG 10-1/10-1-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 10-1/10-1-2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0610/42/M/J/17',    
  
    ),
    'Explain how vaccination provides a defense against transmissable diseases. Describe how vaccines prevent the spread of diseases.' =>  array(
        1 =>  'harmless pathogen is given in vaccine which has antigens',
        2 =>  'the antigens of that harmless pathogen stimulate immune response',
        3 =>  'lymphocytes produce antibodies',
        4 =>  'memory cells are produced in the body which gives long-term immunity',
        5 =>  'memory cells can divide and produce more antibodies rapidly in second-time infection',
        6 =>  'active immunity is gained',
        7 =>  'prevents spreading from one person to another - no host for pathogen',

    ),
    'Suggest why antibodies must be injected rather than taking them by mouth.' =>  array(
        1 =>  'antibodies are made of protein',
        2 =>  'proteins are digested in alimentary canal',
        3 =>  'it also creates a direct route to the site of infection',
    ),
    'If a disease disappears from a country, explain why the vaccine should continue to be used in that country.' =>  array(
        1 =>  'pathogen may still be present in carriers (people with no symptom)',
        2 =>  'infected people could move into the area',
        3 =>  'if few people are vaccinated when this happens, pathogen is more likely to be transmitted',
        4 =>  'it also protects people who are traveling to other countries',

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
      last_visit($conn,$_SESSION['userid'],41);
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
              if($key=='Past-Paper Question 10_2_1' || $key == '' || $key == '' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="41" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

