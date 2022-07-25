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
    <title>Biotechnology and Genetic Engineering</title>
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

<h1 style="font-size: 45px;">Biotechnology and Genetic Engineering</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Explain why bacteria are useful in biotechnology and genetic engineering.' =>  array(
      1 =>  'they are small',
      2 =>  'they reproduce rapidly - reliable and constant supply',
      3 =>  'contain plasmids - you can easily do genetic modification by inserting genes into plasmid',
      4 =>  'no ethical concerns',
      5 =>  'same genetic code as other organisms',
      6 =>  'same DNA',
      7 =>  'can make complex molecules',
      8 =>  'less health risk',

    ),
    'Explain the advantages of asexual reproduction for insulin production by genetic engineering. (Recall: Reproduction)' =>  array(
        1 =>  'offsprings are all genetically identical so they all contain the desired genes',
        2 =>  'same insulin produced',
        3 =>  'rapid',
        4 =>  'only one cell needs to be engineered',
        5 =>  'large quantity of insulin produced',
        6 =>  'more ethical',

    ),
    'Name some industrial processes that require yeasts.' =>  array(
        1 =>  'alcohol production',
        2 =>  'producing biofuel',
        3 =>  'bread making',
    ),
    'Explain how yeast is used in bread-making.' =>  array(
        1 =>  'anaerobic respiration',
        2 =>  'carbon dioxide is released',
        3 =>  'bubbles of carbon dioxide causes dough to rise',
        4 =>  'yeast produces enzymes',
        5 =>  'enzymes digest starch',
        6 =>  'ethanol is vaporized',

    ),
    'A baker made bread at very high temperature. No carbon dioxide was released. State why.' =>  array(
        1 =>  'enzymes denatured/yeast died',
    ),
    'Investigate and describe the use of pectinase in fruit juice production.' =>  array(
        1 =>  'pectin in fruits help plant cell walls stick together',
        2 =>  'pectinase breaks down pectin',
        3 =>  'makes it easier to squeeze juice from fruit',
        4 =>  'fruit juice becomes clearer',

    ),
    'Investigate and describe the use of biological washing powders that contain enzymes.' =>  array(
        1 =>  'biological washing powders contain protease, lipase, and carbohydrase to remove stains',
        2 =>  'protease breaks down proteins (i.e blood)',
        3 =>  'lipase break down fats (i.e oil)',
        4 =>  'carbohydrase break carbohydrates-based stains (i.e starch)',

    ),
    'Past-Paper Question 20_1_1'  =>  array(
      1 =>  '<img src="Biology/HG 20-1/20-1-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 20-1/20-1-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 20-1/20-1-3.png" alt="image" width="100%" class="img1">',    
      4 =>  '<img src="Biology/HG 20-1/20-1-4.png" alt="image" width="100%" class="img2">',
      5 =>  'from: 0610/41/O/N/17',    
  
    ),
    'Describe how Penicillium is used to make the antibiotic penicillin.' =>  array(
        1 =>  'fungus is grown and put into fermenters',
        2 =>  'aerobic conditions',
        3 =>  'provide sugars/source of nitrogen/nutrients',
        4 =>  'purification of product',
        5 =>  'batch culture',
        6 =>  'sterile conditions',

    ),
    'Past-Paper Question 20_1_2'  =>  array(
        1 =>  '<img src="Biology/HG 20-1/20-1-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 20-1/20-1-6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/41/O/N/18',    
    
      ),
      'Past-Paper Question 20_1_3'  =>  array(
        1 =>  '<img src="Biology/HG 20-1/20-1-7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 20-1/20-1-8.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 20-1/20-1-9.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/F/M/16',    
    
      ),
      'Past-Paper Question 20_1_4'  =>  array(
        1 =>  '<img src="Biology/HG 20-1/20-1-10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 20-1/20-1-12.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 20-1/20-1-11.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 20-1/20-1-14.png" alt="image" width="100%" class="img4">',
        5 =>  '<img src="Biology/HG 20-1/20 X.png" alt="image" width="100%" class="img5">',
        6 =>  '<img src="Biology/HG 20-1/20-1-14.png" alt="image" width="100%" class="img6">',
        7 =>  'from: 0610/41/O/N/16',    
    
      ),
      'Suggest why steam is used in fermenters.' =>  array(
        1 =>  'kills pathogens',
        2 =>  'prevents contamination by microorganisms',
        3 =>  'steam does not contaminate products unlike certain chemicals',
        4 =>  'steam reaches all the cervices of the fermenter',

    ),
    'Suggest some conditions in a fermenter that are measured and controlled.' =>  array(
        1 =>  'pH',
        2 =>  'temperature',
        3 =>  'oxygen',
        4 =>  'carbon dioxide',
        5 =>  '(name) nutrients',
        6 =>  'waste',
        7 =>  'turbidity',
        8 =>  'gas pressure',

    ),
      'Past-Paper Question 20_1_5'  =>  array(
        1 =>  '<img src="Biology/HG 20-1/20-1-15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 20-1/20-1-17.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 20-1/20-1-16.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 20-1/20-1-18.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0610/43/M/J/19',    
    
      ),
      'Define genetic engineering and state examples of where it is used. ' =>  array(
        1 =>  'changing the genetic material of an organism',
        2 =>  'by removing, changing, or inserting individual genes',
    ),
    'Outline genetic engineering using bacterial production of a human protein as an example. ' =>  array(
        1 =>  'gene that codes for human protein is isolated',
        2 =>  'gene is cut out using restriction enzymes',
        3 =>  'forming sticky ends',
        4 =>  'plasmid is cut using the same restriction enzymes',
        5 =>  'formation of recombinant plasmid',
        6 =>  'ligase is used to join the plasmid and the gene',
        7 =>  'plasmid with the new gene is inserted into bacteria',
        8 =>  'bacteria replicates and produces protein',

    ),
    'Discuss the advantages of genetically modifying crops such as soya maize and rice.' =>  array(
        1 =>  'disease resistance',
        2 =>  'larger/faster yield',
        3 =>  'drought resistance/frost resistance',
        4 =>  'salt resistance',
        5 =>  'nutritional enrichment',
        6 =>  'pest resistance',
        7 =>  'herbicide resistance',
        8 =>  'more income',

    ),
    'Discuss the disadvantages of genetically modifying crops such as soya maize and rice.' =>  array(
        1 =>  'natural species may die',
        2 =>  'taste is often not as good',
        3 =>  'lead to development of super weeds',
        4 =>  'long term effect on humans unsure',

    ),
    'Past-Paper Question 20_1_6'  =>  array(
        1 =>  '<img src="Biology/HG 20-1/20-1-19.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 20-1/20-1-20.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 20-1/20-1-21.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/33/O/N/15',    
    
      ),
      'Past-Paper Question 20_1_7'  =>  array(
        1 =>  '<img src="Biology/HG 20-1/20-1-22.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 20-1/20-1-23.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 20-1/20-1-24.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/41/O/N/19',    
    
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
      last_visit($conn,$_SESSION['userid'],85);
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
              if($key=='Past-Paper Question 20_1_1' || $key == 'Past-Paper Question 20_1_2' || $key == 'Past-Paper Question 20_1_3' || $key == 'Past-Paper Question 20_1_4' || $key == 'Past-Paper Question 20_1_5' || $key == 'Past-Paper Question 20_1_6' || $key == 'Past-Paper Question 20_1_7'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="85" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

