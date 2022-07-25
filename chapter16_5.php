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
    <title>Methods of Birth Control in Humans</title>
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

<h1 style="font-size: 45px;">Methods of Birth Control in Humans</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Outline the four methods of birth control.' =>  array(
      1 =>  'natural: abstinence, monitoring body temperature, cervical mucus',
      2 =>  'chemical: IUD, IUS, contraceptive pill, hormone injection',
      3 =>  'barrier: condom, femidom, diaphragm',
      4 =>  'surgical: vasectomy, female sterilization',

    ),
    'Outline the use of hormones in fertility treatments. ' =>  array(
        1 =>  'FSH and LH',
        2 =>  'FSH stimulates the production of follicles and maturation of eggs',
        3 =>  'more eggs are relased',
        4 =>  'LH stimulates ovulation',

    ),
    'Outline the use of hormones in contraceptive treatments.' =>  array(
        1 =>  'oestrogen and progesterone',
        2 =>  'oestrogen causes FSH concentration to decrease',
        3 =>  'follicle stops forming and egg cells do not mature',
        4 =>  'progesterone causes LH concentration to decrease',
        5 =>  'egg cell is not relased',

    ),
    'Outline artificial insemination. ' =>  array(
        1 =>  'collect sperm from male',
        2 =>  'place sperm into uterus',
        3 =>  'around the time of ovulation',
    ),
    'Outline in vitro fertilization.' =>  array(
        1 =>  'egg cell is collected from ovary',
        2 =>  'sperm cells are collected from male',
        3 =>  'they are placed in petri dish',
        4 =>  'fertilization occurs - zygote forms - embryo forms',
        5 =>  'embryo is placed back inside uterus',

    ),
    'Outline the social implications of using fertility drugs/IVF.' =>  array(
        1 =>  'religious/ethical objections to use of fertility drugs',
        2 =>  'treatment could be costly and lead to financial problems within family',
        3 =>  'multiple births (twins, triplets) can occur and they might be unwanted',
        4 =>  'stress is usually associated with difficulty having children',
        5 =>  '',
        6 =>  'Exclusively for IVF:',
        7 =>  'allows parents of same sex to have children',

    ),
    'Outline the social implications of contraceptive treatments. ' =>  array(
        1 =>  'increase in educated and employed women',
        2 =>  'lower wage gap',
    ),
    
   
    'Past-Paper Question 16_5_1'  =>  array(
      1 =>  '<img src="Biology/HG 16-5/16-5-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 16-5/16-5-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 16-5/16-5-3.png" alt="image" width="100%" class="img1">',
      4 =>  '<img src="Biology/HG 16-5/16-5-4.png" alt="image" width="100%" class="img1">',        
      5 =>  '<img src="Biology/HG 16-5/16-5-5.png" alt="image" width="100%" class="img2">',
      6 =>  'from: 0610/42/M/J/18',    
  
    ),
    'Past-Paper Question 16_5_2'  =>  array(
        1 =>  '<img src="Biology/HG 16-5/16-5-6.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 16-5/16-5-7.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/43/O/N/16',    
    
      ),
      'Past-Paper Question 16_5_3'  =>  array(
        1 =>  '<img src="Biology/HG 16-5/16-5-8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 16-5/16-5-10.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 16-5/16-5-9.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 16-5/16-5-11.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0610/33/M/J/15',    
    
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
      last_visit($conn,$_SESSION['userid'],68);
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
              if($key=='Outline the social implications of using fertility drugs/IVF.' || $key == 'Past-Paper Question 16_5_1' || $key == 'Past-Paper Question 16_5_2' || $key == 'Past-Paper Question 16_5_3'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="68" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

