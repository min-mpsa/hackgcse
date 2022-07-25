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
    <title>Electric Charge</title>
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
                <a href="physics.php"><button class="hide2">Physics</button></a>
            </div>
        </header>

<h1 style="font-size: 45px;">Electric Charge</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is charge measured in? (Unit for charge)' =>  array(
      1 =>  'coulombs',
    ),
    'State what is meant by the direction of an electric field?' =>  array(
        1 =>  'direction of the force on a positive charge',
    ),
    'What is an electric field?' =>  array(
        1 =>  'region where an electric charge experiences a force',
    ),
    'A conducting sphere is mounted on an insulating stand. Explain how you would induce a negative charge on the sphere. Give an account of charging by induction.' =>  array(
        1 =>  'place positively charged rod close to surface of sphere',
        2 =>  'connect sphere to earth',
        3 =>  'remove connection',
        4 =>  'remove charged rod',
    ),
    'Why are metals good conductors of electricity?' =>  array(
        1 =>  'metals contain free electrons/delocalized electrons',
    ),
    'Past_Paper Question 12_1_1'  =>  array(
      1 =>  '<img src="Physics/PHG 17/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 17/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/O/N/19',    
  
    ),
    'Past_Paper Question 12_1_2'  =>  array(
        1 =>  '<img src="Physics/PHG 17/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/M/J/17',    
    
      ),
      'Past_Paper Question 12_1_3'  =>  array(
        1 =>  '<img src="Physics/PHG 17/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/O/N/18',    
    
      ),
      'Past_Paper Question 12_1_4'  =>  array(
        1 =>  '<img src="Physics/PHG 17/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/8.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/O/N/19',    
    
      ),
      'Past_Paper Question 12_1_5'  =>  array(
        1 =>  '<img src="Physics/PHG 17/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/10.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 17/11.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/M/J/18',    
    
      ),
      'Past_Paper Question 12_1_6'  =>  array(
        1 =>  '<img src="Physics/PHG 17/12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 17/13.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Physics/PHG 17/14.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0625/42/F/M/16',    
    
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
      last_visit($conn,$_SESSION['userid'],171);
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
              if($key=='Past_Paper Question 12_1_1' || $key == 'Past_Paper Question 12_1_2' || $key == 'Past_Paper Question 12_1_3' || $key == 'Past_Paper Question 12_1_4' || $key == 'Past_Paper Question 12_1_5' || $key == 'Past_Paper Question 12_1_6'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="171" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

