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
    <title>States of Matter and Molecular Model</title>
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

<h1 style="font-size: 45px;">States of Matter and Molecular Model</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe and distinguish the structure of solids, liquids, and gases in terms of particle separation, arrangement and types of motion' =>  array(
      1 =>  'Solid:',
      2 =>  'atoms are touching each other',
      3 =>  'regular arrangement',
      4 =>  'vibrating in fixed positions',
      5 =>  '',
      6 =>  '',
      7 =>  'Liquid:',
      8 =>  'atoms are touching each other by there are some spaces between them',
      9 =>  'randomly arranged',
      10 =>  'slide over one another',
      11 =>  '',
      12 =>  '',
      13 =>  'Gas:',
      14 =>  'not touching - far apart from one another',
      15 =>  'random',
      16 =>  'random movement',


    ),
    'Explain in terms of molecules why liquids are incompressible.' =>  array(
        1 =>  'there is no/very little space between molecules',
        2 =>  'large intermolecular forces',
    ),
    'A sculptor makes a statue from a block of crystalline rock using a cutting tool. Explain why he must apply a large force to the tool to remove a small piece of rock.' =>  array(
        1 =>  'attractive forces between molecules in rock are strong',
        2 =>  'force applied must be large enough to overcome these forces between molecules',
    ),
    'Explain, in terms of momentum, how the molecules exert a pressure on the walls of the box.' =>  array(
        1 =>  'molecules collide with walls of box and rebound',
        2 =>  'change of momentum occurs',
        3 =>  'force on walls = total change of momentum per second',
        4 =>  'pressure = total force/total area of walls',

    ),
    'Explain what Brownian motion. Why does it occur?' =>  array(
        1 =>  'molecules like nitrogen and oxygen in the air collide with dust particles',
        2 =>  'making them move randomly according to their bombarding motion',
    ),
    'Solids have a fixed shape. Explain in terms of forces between molecules and arrangement of molecules, why solids have this property.' =>  array(
        1 =>  'solid molecules are in lattice arrangement',
        2 =>  'they have strong intermolecular forces',
    ),
    'Liquids adapt to the shape of their container. Explain in terms of forces between molecules and arrangement of molecules, why liquids have this property.' =>  array(
        1 =>  'molecules are not in fixed positions and they have irregular arrangement',
        2 =>  'average intermolecular forces are too weak to keep molecules in a definite pattern',
    ),
    'Gases fill their container. Explain in terms of forces between molecules and arrangement of molecules, why gases have this property.' =>  array(
        1 =>  'molecules are far apart in gases',
        2 =>  'there are very weak/no intermolecular forces between molecules',
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
      last_visit($conn,$_SESSION['userid'],152);
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
              if($key=='Describe and distinguish the structure of solids, liquids, and gases in terms of particle separation, arrangement and types of motion' || $key == '' || $key == '' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="152" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

