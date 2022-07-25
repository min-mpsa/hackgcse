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
    <title>Monohybrid Inheritance</title>
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

<h1 style="font-size: 45px;">Monohybrid Inheritance</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define genotype. ' =>  array(
      1 =>  'the genetic make-up of an organism in terms of the alleles present',
    ),
    'Define phenotype. ' =>  array(
        1 =>  'the observable features of an organism',
      ),
      'Define homozygous. ' =>  array(
        1 =>  'having two identical alleles of a particular gene',
      ),
      'Define heterozygous. ' =>  array(
        1 =>  'having two different alleles of a particular gene',
      ),
      'Define pure-breeding.' =>  array(
        1 =>  'two identical homozygous individuals that breed together will be pure-breeding',
      ),
      'Define dominant allele. ' =>  array(
        1 =>  'an allele that is expressed if it is present',
      ),
      'Define recessive. ' =>  array(
        1 =>  'an allele that is only expressed when there is no dominant allele of the gene present',
      ),
    'Define and describe co-dominance.' =>  array(
        1 =>  'both alleles are expressed in the phenotype',
        2 =>  'the phenotype is different and intermediate ',
        3 =>  'there are multiple alleles for one trait',
    ),
    'Define sex-linked characteristic.' =>  array(
        1 =>  'a characteristic in which the gene responsible is located on a sex chromosome',
        2 =>  'this makes it more common in more sex than in the other',
        3 =>  'e.g. color blindness',
    ),
    'Explain what test cross is and how to use a test cross to identify an unknown genotype.' =>  array(
        1 =>  'an organism showing dominant characteristic could be homozygous dominant, or heterozygous',
        2 =>  'cross it with one known to have homozygous recessive genotype for the same gene',
        3 =>  'if offspring shows recessive characteristic, dominant parent is heterozygous',
    ),
    'Past-Paper Question 17_4_1'  =>  array(
      1 =>  '<img src="Biology/HG 17-4/17-4-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 17-4/17-4-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 17-4/17-4-3.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/41/O/N/17',    
  
    ),
    'Past-Paper Question 17_4_2'  =>  array(
        1 =>  '<img src="Biology/HG 17-4/17-4-4.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 17-4/17-4-5.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 17-4/17-4-6.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/O/N/17',    
    
      ),
      'Past-Paper Question 17_4_3'  =>  array(
        1 =>  '<img src="Biology/HG 17-4/17-4-7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 17-4/17-4-8.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0610/42/F/M/19',    
    
      ),
      'Past-Paper Question 17_4_4'  =>  array(
        1 =>  '<img src="Biology/HG 17-4/17-4-9.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 17-4/17-4-10.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 17-4/17-4-11.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/O/N/18',    
    
      ),
      'Past-Paper Question 17_4_5'  =>  array(
        1 =>  '<img src="Biology/HG 17-4/17-4-12.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 17-4/17-4-13.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 17-4/17-4-14.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/F/M/17',    
    
      ),
      'Past-Paper Question 17_4_6'  =>  array(
        1 =>  '<img src="Biology/HG 17-4/17-4-15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 17-4/17-4-16.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0610/41/O/N/18',    
    
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
      last_visit($conn,$_SESSION['userid'],74);
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
              if($key=='Past-Paper Question 17_4_1' || $key == 'Past-Paper Question 17_4_2' || $key == 'Past-Paper Question 17_4_3' || $key == 'Past-Paper Question 17_4_4' || $key == 'Past-Paper Question 17_4_5' || $key == 'Past-Paper Question 17_4_6'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="74" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

