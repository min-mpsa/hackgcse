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
    <title>Osmosis</title>
    <style type="text/css">
      .img2{
        display: none;
      }
      .img4{
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

<h1 style="font-size: 45px;">Osmosis</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define osmosis.' =>  array(
      1 =>  'net movement of water molecules',
      2 =>  'from a region of higher water potential (diluted solution) to a region of lower water potential (concentrated solution)',
      3 =>  'through a partially permeable membrane',
    ),
    'Explain the effects on plant tissues of immersing them in a concentrated salt solution. ' =>  array(
        1 =>  'salt solution has lower water potential than the cell',
        2 =>  'water moves out of cell via osmosis',
        3 =>  'down the water potential gradient',
        4 =>  'through a partially permeable membrane',
        5 =>  '',
        6 =>  '',
        7 =>  'vacuole decreases in size',
        8 =>  'some parts of cell membrane pulls away form cell wall',
        9 =>  'cells are plasmolysed',
        10 =>  'cells become flaccid because they lose turgor pressure ',
        11 =>  'cell walls no longer withstand pressure',

      ),
      'Explain the effects on plant tissues of immersing them in a diluted salt solution.' =>  array(
        1 =>  'salt solution has higher water potential than the cell',
        2 =>  'water enters into cell via osmosis',
        3 =>  'down the water potential gradient',
        4 =>  'through a partially permeable membrane',
        5 =>  '',
        6 =>  '',
        7 =>  'vacuole increases in size',
        8 =>  'vacuole pushes outwards onto cell membrane',
        9 =>  'turgor pressure inside cell increases',
        10 =>  'cell becomes turgid',
      ),
    'Past-Paper Question 3_2_1'  =>  array(
      1 =>  '<img src="Biology/HG 3-2/3-2-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 3-2/3-2-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 3-2/3-2-3.png" alt="image" width="100%" class="img1">',    
      4 =>  '<img src="Biology/HG 3-2/3-2-4.png" alt="image" width="100%" class="img2">',
      5 =>  'from: 0610/32/M/J/15',    
  
    ),
    'Past-Paper Question 3_2_2'  =>  array(
        1 =>  '<img src="Biology/HG 3-2/3-2-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 3-2/3-2-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 3-2/3-2-7.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/43/M/J/16',    
    
      ),
      'Explain the importance of water potential and osmosis in the uptake of water by plants.' =>  array(
        1 =>  'plants uptake water via osmosis',
        2 =>  'so water potential gradient needs to be maintained',
        3 =>  'so water can travel from a region of higher water potential (soil) to a region of lower water potential (cell)',
      ),
      'Explain how plants are supported.' =>  array(
        1 =>  'they are supported by the turgor pressure within cells',
        2 =>  'which is the water pressure acting against an inelastic cell wall',
        3 =>  'this gives the plant cells structure and holds the plant intact',
      ),
      'Past-Paper Question 3_2_3'  =>  array(
        1 =>  '<img src="Biology/HG 3-2/3-2-8.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 3-2/3-2-9.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 3-2/3-2-10.png" alt="image" width="100%" class="img1">',    
        4 =>  '<img src="Biology/HG 3-2/3-2-11.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0610/42/M/J/16',    
    
      ),
      'Past-Paper Question 3_2_4'  =>  array(
        1 =>  '<img src="Biology/HG 3-2/3-2-12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 3-2/3-2-13.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 3-2/3-2-15.png" alt="image" width="100%" class="img2">',    
        4 =>  '<img src="Biology/HG 3-2/3-2-14.png" alt="image" width="100%" class="img3">',
        5 =>  '<img src="Biology/HG 3-2/3-2-16.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0610/41/M/J/16',    
    
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
      last_visit($conn,$_SESSION['userid'],11);
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
              if($key=='Past-Paper Question 3_2_1' || $key == 'Past-Paper Question 3_2_2' || $key == 'Past-Paper Question 3_2_3' || $key == 'Explain the effects on plant tissues of immersing them in a concentrated salt solution. ' || $key == 'Past-Paper Question 3_2_4' || $key == 'Explain the effects on plant tissues of immersing them in a diluted salt solution.'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="11" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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
    $('.accordion').on('click',function(){
      $('.img1').show();
      $('.img3').show();
    });
    $('.accordion__link:not(.accordion__link_active)').on('click',function(){
      $('.img2').hide();
      $('.img4').hide();
    });
    $('.accordion__link_active').on('click',function(){
      $('.img1').show();
      $('.img3').show();
    });
    
  });
</script>
</body>
</html> 

