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
    <title>Stoichiometry</title>
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

<h1 style="font-size: 45px;">Stoichiometry</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define relative atomic mass. ' =>  array(
      1 =>  'the average mass of naturally occurring atoms of an element',
      2 =>  'on a scale where the carbon-12 atom has a mass of exactly 12 units',
    ),
    'Define relative molecular mass. ' =>  array(
        1 =>  'the sum of the relative atomic masses',
    ),
    'Define mole.' =>  array(
        1 =>  'amount of substance that has the same number of specific particles',
        2 =>  'as there are atoms in exactly 12g of carbon-12',
    ),
    'Define Avogadro constant.' =>  array(
        1 =>  '6.02  x 10^23 particles',
        2 =>  'number of particles in one mole of a substance',
    ),
    'Past Paper Question 3_1'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/2.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/F/M/19',    
    
      ),
      'Past Paper Question 3_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/19',    
    
      ),
      'Past Paper Question 3_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/M/J/19',    
    
      ),
    'Past Paper Question 3_4'  =>  array(
      1 =>  '<img src="Chemistry/CHG 4/7.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 4/8.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Chemistry/CHG 4/9.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Chemistry/CHG 4/10.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0620/41/O/N/19',    
  
    ),
    'Past Paper Question 3_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/12.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/M/J/18',    
    
      ),
      'Past Paper Question 3_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/13.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/14.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 4/15.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 4/16.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/42/F/M/17',    
    
      ),
      'Past Paper Question 3_7'  =>  array(
        1 =>  '<img src="Chemistry/CHG 1/17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 1/18.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/M/J/17',    
    
      ),
      'Past Paper Question 3_8'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/19.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/20.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/17',    
    
      ),
    'How do you calculate percentage yield?' =>  array(
        1 =>  '(actual mass/calculated mass) x 100%',
    ),
    'How do you calculate percentage purity?' =>  array(
        1 =>  '(mass of pure product/mass of impure product) x 100%',
    ),
    'Past Paper Question 3_9'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/21.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/23.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 4/22.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0620/43/M/J/18',    
    
      ),
    'Past Paper Question 3_10'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/24.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/25.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/18',    
    
      ),
      'Past Paper Question 3_11'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/26.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/27.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/O/N/18',    
    
      ),

      'Past Paper Question 3_12'  =>  array(
        1 =>  '<img src="Chemistry/CHG 4/28.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 4/29.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/O/N/17',    
    
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
      last_visit($conn,$_SESSION['userid'],98);
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
              if($key=='Past Paper Question 3_1' || $key == 'Past Paper Question 3_2' || $key == 'Past Paper Question 3_3' || $key == 'Past Paper Question 3_4' || $key == 'Past Paper Question 3_5' || $key == 'Past Paper Question 3_6' || $key=='Past Paper Question 3_7' || $key == 'Past Paper Question 3_8' || $key == 'Past Paper Question 3_9' || $key == 'Past Paper Question 3_10' || $key == 'Past Paper Question 3_11' || $key == 'Past Paper Question 3_12'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="98" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

