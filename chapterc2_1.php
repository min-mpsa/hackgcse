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
    <title>Atomic Structure and the Periodic Table</title>
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

<h1 style="font-size: 45px;">Atomic Structure and the Periodic Table</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define proton number.' =>  array(
      1 =>  'number of protons',
      2 =>  'in the nucleus of an atom',
    ),
    'Define nucleon number.' =>  array(
        1 =>  'the total number of protons and neutrons in the nucleus of an atom',
    ),
    'What is relative atomic mass?' =>  array(
        1 =>  'the average mass of natural occurring atoms of an element on a scale where the carbon-12 atom has a mass of exactly 12 units.',
    ),
    'Define element.' =>  array(
        1 =>  'a substance that cannot be broken down into two or more simpler substances by chemical means',
    ),
    'Define ion.' =>  array(
        1 =>  'an atom that has lost or gained an electron',
        2 =>  'contains different numbers of protons and electrons',
    ),
    'What does it mean when an atom has zero charge? +2 charge? -1 charge?' =>  array(
        1 =>  'same number of protons and electrons',
        2 =>  '2 more protons than electrons',
        3 =>  'one more electron than proton',
    ),
    'Define molecule.' =>  array(
        1 =>  'two or more atoms',
        2 =>  'chemically combined',
    ),
    'Define compound.' =>  array(
        1 =>  'a substance made from two or more elements',
        2 =>  'chemically combined',
    ),
    'What is meant by the term mixture?' =>  array(
        1 =>  'two or more substances not chemically combined',
    ),
    'Define isotope.' =>  array(
        1 =>  'atoms of the same element which have the same proton number',
        2 =>  'but a different nucleon number',
    ),
    'Do isotopes have the same chemical properties? Explain.' =>  array(
        1 =>  'Yes',
        2 =>  'same number of electrons in the outer shell',
    ),
    'State the term used to describe isotopes with unstable nuclei.' =>  array(
        1 =>  'radioisotopes',
    ),
    'Suggest why the relative atomic mass of some  elements is not a whole number.' =>  array(
        1 =>  'chlorine has more than one isotope',
        2 =>  'the masses of these isotopes are averaged',
    ),
    'State some uses of radioactive isotopes.' =>  array(
        1 =>  'radiotherapy',
        2 =>  'biological tracer',
        3 =>  'carbon dating',
        4 =>  'checking for cracks in pipes',

    ),
    'Past Paper Question 2_1_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 3/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 3/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/41/M/J/19',    
  
    ),
    'Past Paper Question 2_1_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/19',    
    
      ),
      'Past Paper Question 2_1_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/19',    
    
      ),
      'Past Paper Question 2_1_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/8.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/18',    
    
      ),
      'Past Paper Question 2_1_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/10.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/O/N/18',    
    
      ),
      'Past Paper Question 2_1_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/12.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/33/M/J/15',    
    
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
      last_visit($conn,$_SESSION['userid'],95);
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
              if($key=='Past Paper Question 2_1_1' || $key == 'Past Paper Question 2_1_2' || $key == 'Past Paper Question 2_1_3' || $key == 'Past Paper Question 2_1_4' || $key == 'Past Paper Question 2_1_5' || $key == 'Past Paper Question 2_1_6'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="95" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

