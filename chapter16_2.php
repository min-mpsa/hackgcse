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
    <title>Sexual Reproduction in Plants</title>
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

<h1 style="font-size: 45px;">Sexual Reproduction in Plants</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define sexual reproduction.' =>  array(
      1 =>  'process involving the fusion of the nuclei of two gametes',
      2 =>  'to form a zygote',
      3 =>  'and the production of offspring that are genetically different from each other',
    ),
    'Define fertilization.' =>  array(
        1 =>  'fusion of gamete nuclei',
    ),
    'Advantages and disadvantages of sexual reproduction' =>  array(
      1 =>  'opposite of advantages and disadvantages of asexual reproduction - you can use the same points',
  ),'Define self-pollination.' =>  array(
    1 =>  'transfer of pollen grains',
    2 =>  'from the anther of a flower to the stigma of the same flower or different flower on the same plant',
),'Define cross-pollination.' =>  array(
  1 =>  'transfer of pollen grains',
  2 =>  'from the anther of a flower to the stigma of a flower on a different plant of the same species',
),'Describe the differences between the pollen grains of insect- pollinated and wind-pollinated flowers.' =>  array(
  1 =>  'insect-pollinated:',
  2 =>  'spiky surface so it can stick to insects or animal bodies',
  3 =>  'larger in size in comparison to wind-pollinated pollen',
  4 =>  '',
  5 =>  '',
  6 =>  'wind-pollinated: ',
  7 =>  'small/light ',
  8 =>  'smooth surface',

),'Describe the differences between the structural adaptions of insect-pollinated and wind-pollinated flowers. ' =>  array(
  1 =>  'wind pollinated:',
  2 =>  '',
  3 =>  'anthers and filaments are hanging outside the flower',
  4 =>  'large anthers → produce large amount of pollen',
  5 =>  'anthers easily release pollen',
  6 =>  'feathery stigma',
  7 =>  'larger surface area stigma to catch pollen',
  8 =>  '',
  9 =>  '',
  10 =>  '',
  11 =>  'insect pollinated:',
  12 =>  '',
  13 =>  'anthers and filaments inside flower to brush against insects',
  14 =>  'sweet smell, bright petals, nectar to attract insects',
  15 =>  'sticky stigma inside flower so pollen from insects stick it',

),'Advantages of self pollination' =>  array(
  1 =>  'parent plants are already adapted to the environment, and they will pass those useful alleles to their offsprings',
  2 =>  'more chances of fertilization and pollination',
  3 =>  'no need for pollinators (give the names e.g. bees)',
  4 =>  'useful if plants are geographically isolated',
  5 =>  'prevents extinction',

),'Disadvantages of self-pollination' =>  array(
  1 =>  'reduced variation and diversity',
  2 =>  'more likely to be wiped out by infectious disease',
  3 =>  'little ability to adapt to changing conditions',
  4 =>  'increased competition between plants because they all have the same adaptive features',

),'Advantages and disadvantages of cross-pollination' =>  array(
  1 =>  'opposite of the advantages and disadvantages of self-pollination',
),'State some features of the flower that attracts pollinators.' =>  array(
  1 =>  'scent',
  2 =>  'nectar',
  3 =>  'colorful petals',
  4 =>  'large petals',

),'State the advantages of seed dispersal.' =>  array(
  1 =>  'plant species can colonize new areas',
  2 =>  'this reduces competition within species',
  3 =>  'and reduces inbreeding and promotes variation',
),'State the role of enzymes in seed germination.' =>  array(
  1 =>  'break down stored food reserves in seed',
  2 =>  'amylase breaks down starch (named enzyme + substrate)',
  3 =>  'final product is glucose for respiration (product + use)',
  4 =>  'enzymes are also required in the process of respiration',

),'Describe the growth of the pollen tube and its entry into the ovule followed by fertilization. Describe the events that occur after pollen grains leave the anther of a flower until fertilization takes place. ' =>  array(
  1 =>  'pollen lands on stigma',
  2 =>  'pollen tube grows',
  3 =>  'through style to ovary',
  4 =>  'male gamete enters ovule',
  5 =>  'through micropyle',
  6 =>  'nuclei of pollen and egg fuse',

),
    'Past-Paper Question 16_2_1'  =>  array(
      1 =>  '<img src="Biology/HG 16-1/16-1-9.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 16-1/16-1-10.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 16-1/16-1-12.png" alt="image" width="100%" class="img2">',
      4 =>  '<img src="Biology/HG 16-1/16-1-11.png" alt="image" width="100%" class="img3">',    
      5 =>  '<img src="Biology/HG 16-1/16-1-13.png" alt="image" width="100%" class="img4">',
      6 =>  'from: 0610/42/M/J/18',    
  
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
      last_visit($conn,$_SESSION['userid'],65);
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
              if($key=='Past-Paper Question 16_2_1' || $key == 'Describe the differences between the structural adaptions of insect-pollinated and wind-pollinated flowers. ' || $key == 'Describe the differences between the pollen grains of insect- pollinated and wind-pollinated flowers.' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="65" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

