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
    <title>Sense Organs</title>
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

<h1 style="font-size: 45px;">Sense Organs</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define sense organ. ' =>  array(
      1 =>  'groups of receptor cells responding to specific stimuli: light, sound, touch, temperature and chemicals',
    ),
    'Past-Paper Question 14_2_1'  =>  array(
        1 =>  '<img src="Biology/HG 14-1/14-1-11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-1/14-1-12.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/41/O/N/18',    
    
      ),
    'State the name of the process that allows the eye to view objects at different distances.' =>  array(
        1 =>  'accommodation',
    ),
    'Outline the pathway in a reflex arc in response to shining a bright light into the eye.' =>  array(
        1 =>  'stimulus is detected by the retina (receptor)',
        2 =>  'electrical impulse is created',
        3 =>  'sensory neurone → relay neurone → motor neurone ',
        4 =>  'reference to synapses between neurones',
        5 =>  'effector is the circular muscles in iris which contract as a response',

    ),
    'Explain the pupil reflex in terms of light intensity and antagonistic action of circular and radial muscles in the iris. Explain in terms of the reflex arc.'  =>  array(
      1 =>  '<img src="Biology/HG 14-1/14-1-13.png" alt="image" width="100%" class="img1">',
  
    ),
    'Explain the accommodation to view near and distant objects. Explain in terms of the reflex arc.'  =>  array(
        1 =>  '<img src="Biology/HG 14-1/14-1-14.png" alt="image" width="100%" class="img1">',
          
    
      ),
      'Describe the role of rod cells.' =>  array(
        1 =>  'sensitive to light in low-intensity (2)',
        2 =>  'passes impulse to optic nerve',
    ),
    'Describe the role of cone cells.' =>  array(
        1 =>  'cone cells detect color',
        2 =>  'there are three kinds of cones (red, green, blue)',
        3 =>  'which absorb light of different colors for color vision',
    ),
    'Explain why the eye cannot easily identify different colors in low levels of light.' =>  array(
        1 =>  'cones are less sensitive in low light',
        2 =>  'cones detect color',
        3 =>  'rods work in low light but cannot detect color',
    ),
    'Describe and explain the distribution of rod cells and cone cells across the retina.' =>  array(
        1 =>  'maximum number of cone cells are at the fovea',
        2 =>  'maximum number of rod cells at the sides',
        3 =>  'only cone cells at the fovea/no rod cells ',
        4 =>  'no rod cells and no cone cells at blind spot',
        5 =>  'there is uneven distribution of rod cells at either side of the fovea',
        6 =>  'more rod cells than cone cells overall in the retina',

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
      last_visit($conn,$_SESSION['userid'],56);
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
              if($key=='Past-Paper Question 14_2_1' || $key == 'Explain the accommodation to view near and distant objects. Explain in terms of the reflex arc.' || $key == 'Explain the pupil reflex in terms of light intensity and antagonistic action of circular and radial muscles in the iris. Explain in terms of the reflex arc.' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="56" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

