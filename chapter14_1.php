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
    <title>Nervous control in humans</title>
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

<h1 style="font-size: 45px;">Nervous control in humans</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define nerve impulse. ' =>  array(
      1 =>  'an electrical signal',
      2 =>  'that passes along nerve cells called neurones',
    ),
    'Past-Paper Question 14_1_1'  =>  array(
        1 =>  '<img src="Biology/HG 14-1/14-1-1.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-1/14-1-2.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/41/M/J/16',    
    
      ),
    'Describe how the structure of a neurone is related to its function.' =>  array(
        1 =>  'it is long to transmit impulses over a long distance faster',
        2 =>  'it has mitochondria because impulse transmission require energy',
        3 =>  'it contains vesicles to contain neurotransmitters into the synapse',
        4 =>  'receptors allow unidirectional transmission',

    ),
    'Past-Paper Question 14_1_2'  =>  array(
      1 =>  '<img src="Biology/HG 14-1/14-1-3.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 14-1/14-1-4.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0610/42/F/M/19',    
  
    ),
    'Define reflex action.' =>  array(
        1 =>  'a means of automatically and rapidly',
        2 =>  'integrating and coordinating stimuli',
        3 =>  'with the responses of effectors (muscles and glands)',
    ),
    'Why do reflexes still occur in people who are unconscious?' =>  array(
        1 =>  'reflexes are involuntary',
        2 =>  'neurones still function',
    ),
    'Describe the differences between voluntary action and involuntary action.' =>  array(
        1 =>  'voluntary action takes more time',
        2 =>  'voluntary action has conscious control',
        3 =>  'voluntary action is learnt',
        4 =>  'voluntary action is not automatic ',
        5 =>  'voluntary action response is not always same to the stimulus',

    ),
    'Define synapse. ' =>  array(
        1 =>  'junction between two neurones',
    ),
    'Describe how impulses pass from one neurone to another neurone across a synapse.' =>  array(
        1 =>  'vesicles containing neurotransmitters move to the cell membrane',
        2 =>  'vesicles fuse with cell membrane',
        3 =>  'neurotransmitters are released from vesicles into the synapse',
        4 =>  'neurotransmitters diffuse across synapse',
        5 =>  'bind with receptor molecules on neurone surface on the other side of synapse',
        6 =>  'neurotransmitter and receptor are complementary',
        7 =>  'this causes impulse to continue',

    ),
    'Suggest how the structure of a synapse ensure that impulses travel in one direction.' =>  array(
        1 =>  'neurotransmitters are released on one side of synapse',
        2 =>  'receptors are only found on the other side of the synapse',
    ),
    'Past-Paper Question 14_1_3'  =>  array(
        1 =>  '<img src="Biology/HG 14-1/14-1-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-1/14-1-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 14-1/14-1-7.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/41/O/N/17',    
    
      ),
      'Past-Paper Question 14_1_4'  =>  array(
        1 =>  '<img src="Biology/HG 14-1/14-1-8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 14-1/14-1-9.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 14-1/14-1-10.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/41/M/J/19',    
    
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
      last_visit($conn,$_SESSION['userid'],55);
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
              if($key=='Past-Paper Question 14_1_1' || $key == 'Past-Paper Question 14_1_2' || $key == 'Past-Paper Question 14_1_3' || $key == 'Past-Paper Question 14_1_4'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="55" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

