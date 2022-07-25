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
    <title>The Periodic Table</title>
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

<h1 style="font-size: 45px;">The Periodic Table</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Identify the trends of physical and chemical properties of Group I metals.' =>  array(
      1 =>  'soft - low density',
      2 =>  'melting points decrease down the group',
      3 =>  'forms metal hydroxide and hydrogen when reacting with water',
    ),
    'Describe the similarities in physical properties between transition elements and Group I elements.' =>  array(
        1 =>  'good conduction of heat and electricity',
        2 =>  'malleable',
        3 =>  'ductile',
    ),
    'Describe the differences in physical properties between transition elements and Group I elements.' =>  array(
        1 =>  'transition elements are harder and stronger',
        2 =>  'transition elements have higher melting/boiling points',
        3 =>  'transition elements have higher density',
    ),
    'State the chemical properties of transition elements.' =>  array(
        1 =>  'catalyst',
        2 =>  'more than one oxidation state/number/valency ',
        3 =>  'forms colored compounds',
    ),
    'Nickel is a transition element while sodium is a group (I) element. Predict one difference in appearance between aqueous solutions of nickel and sodium compounds' =>  array(
        1 =>  'solutions of nickel compounds will be colored',
    ),
    'Identify the trend in color, melting/boiling points, and reactivity of halogens.' =>  array(
        1 =>  'fluorine: gas at RT, yellow',
        2 =>  'chlorine: gas at RT, green',
        3 =>  'bromine, liquid at RT, brown',
        4 =>  'iodine, solid at RT, black (purple if gas)',
        5 =>  'melting/boiling point increase down the group',
        6 =>  'reactivity decreases down the group → F > Cl > Br > I',

    ),
    'Predict the physical state and color of astatine at room temperature and pressure.' =>  array(
        1 =>  'black, solid',
    ),
    'Explain why iodine has a higher boiling point than bromine.' =>  array(
        1 =>  'attractive forces between molecules',
        2 =>  'forces of attraction are stronger in iodine than in bromine',
    ),
    'Explain why noble gases are unreactive. ' =>  array(
        1 =>  'it has a complete outer shell',
    ),
    'Past Paper Question 8_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 9/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 9/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/M/J/19',    
  
    ),
    'Past Paper Question 8_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 9/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 9/4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/31/M/J/15',    
    
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
      last_visit($conn,$_SESSION['userid'],112);
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
              if($key=='Past Paper Question 8_1' || $key == 'Past Paper Question 8_2' || $key == '' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="112" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

