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
    <title>Reversible Reactions</title>
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

<h1 style="font-size: 45px;">Reversible Reactions</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is meant by the term equilibrium in a reversible reaction?' =>  array(
      1 =>  'rate forward reaction equals the rate of reverse reaction',
      2 =>  'concentrations of reactants and products are constant',
    ),
    '"The equilibrium shifts to the right side." What does this mean?' =>  array(
        1 =>  'increase in amount of products (molecules on the right side)',
        2 =>  'if equilibrium shifts to left side: increase in amount of reactants (molecules on the left side)',
    ),
    'Explain the effect of temperature on the position of the equilibrium if forward reaction is exothermic (reverse reaction is endothermic).' =>  array(
        1 =>  'increase temperature: equilibrium shift to left ',
        2 =>  'decrease temperature: equilibrium shift to right',
    ),
    'Explain the effect of temperature on the position of the equilibrium if forward reaction is endothermic (reverse reaction is exothermic).' =>  array(
        1 =>  'increase temperature: equilibrium shift to right',
        2 =>  'decrease temperature: equilibrium shift to left',
    ),
    'Explain the effect of pressure on the position of the equilibrium.' =>  array(
        1 =>  'increase pressure: equilibrium shifts to side with less moles',
        2 =>  'decrease pressure: equilibrium shifts to side with more moles',
        3 =>  'if no. of moles on left side = no. of moles on right side → pressure has no effect',
    ),
    'Explain the effect of concentration on the position of the equilibrium.' =>  array(
        1 =>  'equilibrium always shifts to less concentrated side',
        2 =>  'adding more reactants will make equilibrium shift to right side',
        3 =>  'adding more of the molecules on the product side, will make equilbrium shift to left side ',
    ),
    'Past Paper Question 6_2_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 7/20.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 7/21.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/41/O/N/19',    
  
    ),
    'Past Paper Question 6_2_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/22.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/23.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/F/M/17',    
    
      ),
      'Past Paper Question 6_2_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/24.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/25.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/O/N/18',    
    
      ),
      'Past Paper Question 6_2_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/26.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/27.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 7/28.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0620/42/M/J/18',    
    
      ),
      'Past Paper Question 6_2_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/29.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/30.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 7/31.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 7/32.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/42/O/N/17',    
    
      ),
      'Past Paper Question 6_2_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/33.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/34.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/19',    
    
      ),
      'Past Paper Question 6_2_7'  =>  array(
        1 =>  '<img src="Chemistry/CHG 7/35.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 7/36.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 7/37.png" alt="image" width="100%" class="img3">',
        4 =>  '<img src="Chemistry/CHG 7/38.png" alt="image" width="100%" class="img3">',        
        5 =>  '<img src="Chemistry/CHG 7/39.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0620/41/O/N/16',    
    
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
      last_visit($conn,$_SESSION['userid'],105);
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
              if($key=='Past Paper Question 6_2_1' || $key == 'Past Paper Question 6_2_2' || $key == 'Past Paper Question 6_2_3' || $key == 'Past Paper Question 6_2_4' || $key == 'Past Paper Question 6_2_5' || $key == 'Past Paper Question 6_2_7' || $key == 'Past Paper Question 6_2_6'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="105" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

