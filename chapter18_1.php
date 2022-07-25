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
    <title>Variation and Sickle-Cell Anaemia</title>
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

<h1 style="font-size: 45px;">Variation and Sickle-Cell Anaemia</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define variation. ' =>  array(
      1 =>  'differences between individuals of the same species',
    ),
    'Distinguish between phenotypic variation and genetic variation.' =>  array(
        1 =>  'phenotypic variation is caused by both genetic and environmental factors',
        2 =>  'genetic variation is caused only by genetic factors',
    ),
    'How can you tell if something is an example of discontinuous variation.' =>  array(
        1 =>  'there are distinct phenotypes',
        2 =>  'no continuous range',
        3 =>  'controlled by genes',
        4 =>  'not affected by the environment',

    ),
    'How can you tell if something is an example of continuous variation' =>  array(
        1 =>  'phenotypes have intermediates',
        2 =>  'continuous range',
        3 =>  'affected by both genes and environment',
    ),
    'Past-Paper Question 18_1_1'  =>  array(
      1 =>  '<img src="Biology/HG 18-1/18-1-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 18-1/18-1-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 18-1/18-1-4.png" alt="image" width="100%" class="img2">',
      4 =>  '<img src="Biology/HG 18-1/18-1-3.png" alt="image" width="100%" class="img3">',    
      5 =>  '<img src="Biology/HG 18-1/18-1-5.png" alt="image" width="100%" class="img4">',
      6 =>  'from: 0610/41/O/N/16',    
  
    ),
    'Define gene mutation and what factors increase the rate of it. ' =>  array(
        1 =>  'a change in the base sequence of DNA',
        2 =>  'ionising radiation, some chemicals, nicotine',
    ),
    'Describe how new alleles can be formed.' =>  array(
        1 =>  'an allele is a version of a gene',
        2 =>  'mutations can cause new alleles to form',
        3 =>  'from change in base sequence ',
        4 =>  'ionizing radiation cause mutations',

    ),
    'Past-Paper Question 18_1_2'  =>  array(
        1 =>  '<img src="Biology/HG 18-1/18-1-6.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 18-1/18-1-7.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 18-1/18-1-9.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Biology/HG 18-1/18-1-8.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 18-1/18-1-10.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0610/41/M/J/17',    
    
      ),
      'Past-Paper Question 18_1_3'  =>  array(
        1 =>  '<img src="Biology/HG 18-1/18-1-11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 18-1/18-1-12.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 18-1/18-1-13.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Biology/HG 18-1/18-1-14.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0610/42/O/N/18',    
    
      ),
      'Describe some symptoms of anaemia.' =>  array(
        1 =>  'tired',
        2 =>  'shortness of breath',
        3 =>  'headache',
        4 =>  'chest pain',
        5 =>  'fast heartbeat',

    ),
    'Explain how red blood cells become sickle-shaped. Describe the cause of sickle-cell anaemia.' =>  array(
        1 =>  'caused by a mutation',
        2 =>  'change in DNA/base sequence',
        3 =>  'of gene for haemoglobin',
        4 =>  'causes a different sequence of amino acids',
        5 =>  'abnormal haemoglobin produced',
        6 =>  'red blood cells become sickle-shaped',
        7 =>  'allele for sickle cell anaemia is inherited',

    ),
    'Explain why sickle-cell anaemia is a disease that reduces the delivery of oxygen to tissues.' =>  array(
        1 =>  'haemoglobin is abnormal',
        2 =>  'abnormal haemoglobin carries less oxygen',
        3 =>  'red blood cells become sickle-shaped',
        4 =>  'sickle cells stick together and clot in blood vessels',
        5 =>  'fewer red blood cells',

    ),
    'Some people who have sickle-cell anaemia have parents who do not have sickle-cell anaemia. Explain how people with sickle cell anaemia inherit the disease. (Recall: Inheritance)' =>  array(
        1 =>  'both parents carry the allele for sickle cell anaemia',
        2 =>  'both parents are heterozygous',
        3 =>  'half of the gametes of both parents have the recessive allele.',
        4 =>  'children who are homozygous recessive have sickle cell anaemia',
        5 =>  'there is a 0.25 chance of being homozygous recessive',

    ),
    'Explain why the distribution of sickle cell anaemia and malaria are similar.' =>  array(
        1 =>  'malaria is a severe disease (may be fatal)',
        2 =>  'it acts as a selective agent',
        3 =>  'people with sickle cell anaemia allele are resistant to malaria',
        4 =>  'homozygous dominant (homozygous normal) are susceptible to malaria',
        5 =>  'they are more likely to die of malaria before having children and passing on the genes',
        6 =>  'homozygous recessive (homozygous sickle cell) die from sickle cell anaemia',
        7 =>  'sickle cell carriers (heterozygous) do not die from sickle cell anaemia',
        8 =>  'only sickle cell carriers have children and pass on genes and pass on the sickle cell allele as well',
        9 =>  'therefore, sickle cell anaemia gene keeps on being passed on in regions of malaria',


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
      last_visit($conn,$_SESSION['userid'],76);
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
              if($key=='Past-Paper Question 18_1_1' || $key == 'Past-Paper Question 18_1_2' || $key == 'Past-Paper Question 18_1_3' || ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="76" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

