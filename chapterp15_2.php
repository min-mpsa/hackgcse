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
    <title>Radioactive Decay</title>
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

<h1 style="font-size: 45px;">Radioactive Decay</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'State the meaning of radioactive decay.' =>  array(
      1 =>  'unstable radioactive isotope alters to stable nucleus',
    ),
    'What is half-life?' =>  array(
        1 =>  'time taken for the number of atoms to halve',
    ),
    'State what is meant by background radiation.' =>  array(
        1 =>  'radiation that is always present in the background',
        2 =>  'due to environment',
    ),
    'Past_Paper Question 15_2_1'  =>  array(
      1 =>  '<img src="Physics/PHG 22/17.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Physics/PHG 22/18.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Physics/PHG 22/19.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Physics/PHG 22/20.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0625/42/M/J/18',    
  
    ),
    'Past_Paper Question 15_2_2'  =>  array(
        1 =>  '<img src="Physics/PHG 22/21.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/22.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/18',    
    
      ),
      'Past_Paper Question 15_2_3'  =>  array(
        1 =>  '<img src="Physics/PHG 22/23.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/24.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 22/25.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0625/43/M/J/18',    
    
      ),
      'Past_Paper Question 15_2_4'  =>  array(
        1 =>  '<img src="Physics/PHG 22/26.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/27.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/M/J/17',    
    
      ),
      'Past_Paper Question 15_2_5'  =>  array(
        1 =>  '<img src="Physics/PHG 22/28.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/29.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/43/O/N/19',    
    
      ),
      'Past_Paper Question 15_2_6'  =>  array(
        1 =>  '<img src="Physics/PHG 22/30.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/31.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Physics/PHG 22/32.png" alt="image" width="100%" class="img1">',    
        4 =>  '<img src="Physics/PHG 22/33.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0625/41/M/J/17',    
    
      ),
      'Past_Paper Question 15_2_7'  =>  array(
        1 =>  '<img src="Physics/PHG 22/34.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/35.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/42/F/M/16',    
    
      ),
      'Past_Paper Question 15_2_8'  =>  array(
        1 =>  '<img src="Physics/PHG 22/36.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Physics/PHG 22/37.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0625/32/M/J/15',    
    
      ),

    'Describe how radioactive materials should be stored and handled to ensure safety.' =>  array(
        1 =>  'in a box with lead walls',
        2 =>  'handle with long tongs/remote-controlled device',
    ),
    'Suggest why a nuclear reactor is surrounded by thick concrete walls.' =>  array(
        1 =>  'fission involves production of dangerous ionizing radiation',
        2 =>  'thick concrete walls absorb radiation and protect workers',
    ),
    'What are some economic and environmental consequences of producing radioactive waste that has half-life of thousands of years?' =>  array(
        1 =>  'must be stored with shielding',
        2 =>  'must be transported with shielding',
        3 =>  'expensive to store and transport',
        4 =>  'in case of accident → very dangerous to people',
        5 =>  'site of storage uninhabitable for thousands of years',

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
      last_visit($conn,$_SESSION['userid'],187);
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
              if($key=='Past_Paper Question 15_2_1' || $key == 'Past_Paper Question 15_2_2' || $key == 'Past_Paper Question 15_2_3' || $key == 'Past_Paper Question 15_2_4' || $key == 'Past_Paper Question 15_2_5' || $key == 'Past_Paper Question 15_2_6'  || $key == 'Past_Paper Question 15_2_7'  || $key == 'Past_Paper Question 15_2_8'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="187" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

