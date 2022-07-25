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
    <title>The Nuclear Atom and Characteristics of the Three Emissions</title>
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

<h1 style="font-size: 45px;">The Nuclear Atom and Characteristics of the Three Emissions</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'How the scattering of alpha-particles by thin metal foils provides evidence for the nuclear atom'  =>  array(
        1 =>  '<img src="Physics/PHG 22/A.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/B.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 22/C.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/41/M/J/19',    
    
      ),
    'What is nuclear fission?' =>  array(
      1 =>  'the nucleus of an atom splitting into two or more lighter nuclei',
    ),
    'What is nuclear fusion?' =>  array(
        1 =>  'two or more atomic nuclei combine to form one larger atomic nuclei',
    ),
    'State the nature of an alpha particle.' =>  array(
        1 =>  '2 protons and 2 neutrons',
    ),
    'State the nature of a beta particle.' =>  array(
        1 =>  'an electron',
    ),
    'State the nature of gamma rays.' =>  array(
        1 =>  'electromagnetic waves',
        2 =>  'with high frequency and short wavelengths',
    ),
    'Compare and explain the relative ionizing effects of these three types of emissions.' =>  array(
        1 =>  'alpha particle > beta particle > gamma ray because:',
        2 =>  'charge of alpha particle > charge of beta > charge of gamma',
        3 =>  'mass of alpha > mass of beta > mass of gamma',
        4 =>  'alpha particles have the highest mass so they move the slowest so they have more time to ionize surrounding particles',

    ),
    'Compare and explain the relative penetrating abilities of the three types of emissions.' =>  array(
        1 =>  'gamma > beta > alpha',
        2 =>  'alpha particles are largest so they make more frequent collisions with air molecules so they lose energy faster so they have short range',
        3 =>  'gamma rays are the fastest so they travel further before all energy is lost',
    ),
    'Past_Paper Question 15_1_2'  =>  array(
      1 =>  '<img src="Physics/PHG 22/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 22/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0625/42/F/M/18',    
  
    ),
    'Past_Paper Question 15_1_3'  =>  array(
        1 =>  '<img src="Physics/PHG 22/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/O/N/18',    
    
      ),
      'Past_Paper Question 15_1_4'  =>  array(
        1 =>  '<img src="Physics/PHG 22/5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/M/J/17',    
    
      ),
      'Past_Paper Question 15_1_5'  =>  array(
        1 =>  '<img src="Physics/PHG 22/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/8.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 22/9.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/F/M/17',    
    
      ),
      'Describe how an electric field between two charged plates could be used to determine whether a beam of particles consist of alpha or beta particles.' =>  array(
        1 =>  'alpha moves towards negative plate',
        2 =>  'beta moves towards positive plate',
    ),
    'Describe how an magnetic field  could be used to determine whether a beam of particles consist of alpha or beta particles.' =>  array(
        1 =>  'Alpha particles travel in the same direction as current',
        2 =>  'Beta particles travel in the opposite direction as current',
        3 =>  'Use Flemings left hand rule',
    ),
      'Past_Paper Question 15_1_6'  =>  array(
        1 =>  '<img src="Physics/PHG 22/10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/11.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 22/12.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/42/O/N/16',    
    
      ),
      'Past_Paper Question 15_1_7'  =>  array(
        1 =>  '<img src="Physics/PHG 22/13.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/14.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/41/O/N/17',    
    
      ),
      'Past_Paper Question 15_1_8'  =>  array(
        1 =>  '<img src="Physics/PHG 22/15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/16.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/M/J/19',    
    
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
      last_visit($conn,$_SESSION['userid'],186);
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
              if($key=='Past_Paper Question 15_1_1' || $key == 'Past_Paper Question 15_1_2' || $key == 'Past_Paper Question 15_1_3' || $key == 'Past_Paper Question 15_1_4' || $key == 'Past_Paper Question 15_1_5' || $key == 'Past_Paper Question 15_1_6' || $key == 'Past_Paper Question 15_1_7' || $key == 'Past_Paper Question 15_1_8' || $key == 'How the scattering of alpha-particles by thin metal foils provides evidence for the nuclear atom'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="186" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

