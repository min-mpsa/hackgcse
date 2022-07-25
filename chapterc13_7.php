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
    <title>Polymers</title>
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

<h1 style="font-size: 45px;">Polymers</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define polymers.' =>  array(
      1 =>  'large molecules built up from small units (monomers)',
    ),
    'What is meant by the term addition polymerization?' =>  array(
        1 =>  'one bond in a double bond of the molecules break down',
        2 =>  'molecules are joined with one another',
        3 =>  'only one monomer is needed',
        4 =>  'only one product',
        5 =>  'to form a large molecule/long-chain',

    ),
    'What is meant by the term condensation polymerization?' =>  array(
      1 =>  'two monomers joining',
      2 =>  'with the removal of a small molecule',
      3 =>  'to form a large molecule/long chain ',
  ),
  'Name the uses of polyethene, polypropene, polychloroethene, polytetrafluoroethene, nylon, and terylene.' =>  array(
    1 =>  'polyethene: plastic bags',
    2 =>  'polypropene: plastic ropes',
    3 =>  'polychloroethene: PVC pipes (PVC does not decay, insoluble in water)',
    4 =>  'polytetrafluoroethene: non-stick pans',
    5 =>  'nylon, terylene: textiles',

    ),
    'Explain the term non-biodegradable.' =>  array(
    1 =>  'does not decompose',
    2 =>  'by living organisms',
    ),
  'State four problems caused by the disposal of non-biodegradable waste.' =>  array(
    1 =>  'visual pollution',
    2 =>  'shortage of landfill sites',
    3 =>  'toxic gases are released when burnt',
    4 =>  'danger to wildlife',

  ),
  'Describe the formation of nylon by condensation polymerization and draw the strucutre of nylon.' =>  array(
    1 =>  'di-amine (-NH2) + di-carboxylic acid (-COOH)',
    2 =>  'amide links are formed between molecules',
    3 =>  'H2O is removed',
    4 =>  '<img src="Chemistry/CHG 14/60.png" alt="image" width="100%" class="img1">',
    5 =>  '<img src="Chemistry/CHG 14/61.png" alt="image" width="100%" class="img1">',

  ),
  'Describe the formation of terylene by condensation polymerization and draw the structure of terylene.' =>  array(
    1 =>  'di-ol + di-carboxylic acid → polyester',
    2 =>  'ester links are formed between molecules',
    3 =>  'H2O is removed',
    4 =>  '<img src="Chemistry/CHG 14/62.png" alt="image" width="100%" class="img1">',
    5 =>  '<img src="Chemistry/CHG 14/63.png" alt="image" width="100%" class="img1">',

    ),
  'Describe the structure of proteins.' =>  array(
    1 =>  'possesses the same amide linkages as nylon but with different units',
    2 =>  'di-amine + di-carboxylic acids',
  ),
  'How are proteins broken down into amino acids?' =>  array(
    1 =>  'by hydrolysis',
    2 =>  'use a strong acid as catalyst',
    3 =>  'amide linkages are broken while water is added',
    ),
  'Complex carbohydrates are natural condensation polymers. They can be broken down into colorless monomers which can then be separated and identified. Starting with a sample of a complex carbohydrate, describe how to produce, separate, and identify the monomers which make it up.' =>  array(
    1 =>  'use hydrochloric acid and enzymes to break down the complex carbohydrate by hydrolysis',
    2 =>  'use chromatography to separate',
    3 =>  'use a locating agent and view under UV light to detect',
    4 =>  'measure Rf values a compare with standards to identify monomers',

    ),
    'Why is strong acid used in hydrolysis of starch?' =>  array(
      1 =>  'as catalyst',
      ),
    'Past Paper Question 13_7_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/31.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/33.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Chemistry/CHG 14/32.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Chemistry/CHG 14/34.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0620/42/F/M/19',    
  
    ),
    'Past Paper Question 13_7_2'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/35.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/36.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/43/M/J/19',    
  
    ),
    'Past Paper Question 13_7_3'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/37.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/38.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/O/N/19',    
  
    ),
    'Past Paper Question 13_7_4'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/39.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/40.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/18',    
  
    ),
    'Past Paper Question 13_7_5'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/41.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/42.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/41/M/J/18',    
  
    ),
    'Past Paper Question 13_7_6'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/43.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/44.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/43/O/N/18',    
  
    ),
    'Past Paper Question 13_7_7'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/45.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/46.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/17',    
  
    ),
    'Past Paper Question 13_7_8'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/47.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/48.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/16',    
  
    ),
    'Past Paper Question 13_7_9'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/49.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/50.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/M/J/16',    
  
    ),
    'Past Paper Question 13_7_10'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/51.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/52.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Chemistry/CHG 14/53.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0620/43/M/J/16',    
  
    ),
    'Past Paper Question 13_7_11'  =>  array(
      1 =>  '<img src="Chemistry/CHG 14/54.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 14/55.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Chemistry/CHG 14/56.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Chemistry/CHG 14/57.png" alt="image" width="100%" class="img4">',
      5 =>  '<img src="Chemistry/CHG 14/58.png" alt="image" width="100%" class="img5">',
      6 =>  '<img src="Chemistry/CHG 14/59.png" alt="image" width="100%" class="img6">',
      7 =>  'from: 0620/42/O/N/16',    
  
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
      last_visit($conn,$_SESSION['userid'],133);
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
              if($key=='Past Paper Question 13_7_1' || $key == 'Past Paper Question 13_7_2' || $key == 'Past Paper Question 13_7_3' || $key == 'Past Paper Question 13_7_4' || $key == 'Past Paper Question 13_7_5' || $key == 'Past Paper Question 13_7_6' || $key == 'Past Paper Question 13_7_7' || $key == 'Past Paper Question 13_7_8' || $key == 'Past Paper Question 13_7_9' || $key == 'Past Paper Question 13_7_10' || $key == 'Past Paper Question 13_7_11'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="133" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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


