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
    <title>Chemical Digestion</title>
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

<h1 style="font-size: 45px;">Chemical Digestion</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Explain the significance/importance of chemical digestion in the alimentary canal.' =>  array(
      1 =>  'production of soluble molecules',
      2 =>  'so they can be absorbed',
      3 =>  'by moving through walls of small intestine into the blood',
    ),
    'Past-Paper Question 7_4_1'  =>  array(
        1 =>  '<img src="Biology/HG 7-4/7-4-1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 7-4/7-4-2.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/42/F/M/17',    
    
      ),
      'Recall Question 7_4_2'  =>  array(
        1 =>  '<img src="Biology/HG 7-4/7-4-3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 7-4/7-4-4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/41/O/N/18',    
    
      ),
      'Recall Question 7_4_3'  =>  array(
        1 =>  '<img src="Biology/HG 7-4/7-4-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 7-4/7-4-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 7-4/7-4-7.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/F/M/18',    
    
      ),
    'Explain why it is important to have a low pH in the stomach. Explain the functions of hydrochloric acid in gastric acid.' =>  array(
        1 =>  'denatures enzymes in microorganisms',
        2 =>  'kills microorganisms',
        3 =>  'optimum pH for pepsin activity',
        4 =>  'proteins are broken down to polypeptides',

    ),
    'Describe what happens to carbohydrates in the human body between ingestion and assimilation in the liver.' =>  array(
        1 =>  'ingestion of carbohydrates',
        2 =>  'mechanical digestion in mouth breaks carbohydrates into physically smaller pieces',
        3 =>  'moves through oesophagus - churned in the stomach (mechanical digestion)',
        4 =>  '',
        5 =>  '',
        6 =>  '',
        7 =>  'bile neutralizes stomach acid to provide a pH of 7 /8 which is optimum for amylase and maltase',
        8 =>  'amylase is secreted by pancreas and amylase breaks insoluble starch to soluble maltose in duodenum (also happened in mouth when salivary glands secrete amylase)',
        9 =>  'this is chemical digestion',
        10 =>  'maltase is on epithelium of small intestine',
        11 =>  'maltase breaks down maltose to glucose',
        12 =>  '',
        13 =>  '',
        14 =>  '',
        15 =>  'absorption into blood by diffusion and active transport through villi into capillaries',
        16 =>  'microvilli increases surface area for absorption',

    ),
    'Describe what happens to proteins in the human body between ingestion and assimilation in the liver.' =>  array(
        1 =>  'ingestion of proteins',
        2 =>  'mechanical digestion in mouth breaks proteins into physically smaller pieces',
        3 =>  'moves through oesophagus - churned in the stomach (mechanical digestion)',
        4 =>  '',
        5 =>  '',
        6 =>  '',
        7 =>  'pepsin is secreted in stomach and pepsin breaks down proteins to polypeptides in stomach (optimum pH of pepsin is pH 2)',
        8 =>  'this is chemical digestion',
        9 =>  'bile neutralizes stomach acid to provide a pH of 7 /8 which is optimum for trypsin',
        10 =>  'trypsin breaks down polypeptides to amino acids in small intestine',
        11 =>  '',
        12 =>  '',
        13 =>  '',
        14 =>  'absorption into blood by diffusion and active transport through villi into capillaries',
        15 =>  'microvilli increases surface area for absorption',

    ),
    'Describe what happens to fats in the human body between ingestion and assimilation in the liver.' =>  array(
        1 =>  'ingestion of proteins',
        2 =>  'mechanical digestion in mouth breaks fats into physically smaller pieces',
        3 =>  'moves through oesophagus - churned in the stomach (mechanical digestion)',
        4 =>  '',
        5 =>  '',
        6 =>  '',
        7 =>  'bile emulsifies fats to increase the surface area for the chemical digestion of fat to fatty acids and glycerol',
        8 =>  'bile neutralizes stomach acid to provide a pH of 7 /8 which is optimum for lipase',
        9 =>  'lipase breaks down fat to fatty acids and glycerol ',
        10 =>  '',
        11 =>  '',
        12 =>  '',
        13 =>  'absorption into lacteals',
        14 =>  'microvilli increases surface area for absorption',
        15 =>  'travel via lymph vessles throughout body until lymph empties into blood',

    ),
    'Describe the role of bile in digestion.' =>  array(
        1 =>  'emulsification',
        2 =>  'increased surface area of fat globules',
        3 =>  'faster break down of fats by ',
        4 =>  'lipase to fatty acids and glycerol',
        5 =>  'neutralizes stomach acid',

    ),
    'Past-Paper Question 7_4_4'  =>  array(
      1 =>  '<img src="Biology/HG 7-4/7-4-9.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 7-4/7-4-10.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 7-4/7-4-11.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/41/M/J/17',    
  
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
      last_visit($conn,$_SESSION['userid'],27);
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
              if($key=='Past-Paper Question 7_4_1' || $key == 'Past-Paper Question 7_4_4' || $key == 'Recall Question 7_4_2' || $key == 'Recall Question 7_4_3' || $key == 'Describe what happens to carbohydrates in the human body between ingestion and assimilation in the liver.' || $key == 'Describe what happens to proteins in the human body between ingestion and assimilation in the liver.' || $key == 'Describe what happens to fats in the human body between ingestion and assimilation in the liver.'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="27" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

