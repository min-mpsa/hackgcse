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
    <title>Selection</title>
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

<h1 style="font-size: 45px;">Selection</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe what evolution is.' =>  array(
      1 =>  'the change in adaptive features of a population over time',
      2 =>  'as the result of natural selection',
    ),
    'Explain how strains of antibiotic-resistant bacteria are formed.' =>  array(
        1 =>  'antibiotic resistant bacteria are formed by mutation',
        2 =>  'there was a change in their DNA',
        3 =>  'which results in different proteins produced',
        4 =>  'which enable resistance',

    ),
    'Explain how strains of antibiotic-resistant bacteria are spread.' =>  array(
        1 =>  'when antibiotic is used, susceptible bacteria die',
        2 =>  'there is less competition for antibiotic resistant bacteria',
        3 =>  'the resistant bacteria is able to reproduce faster (due to fewer limiting factors)',
        4 =>  'they pass on their gene for antibiotic resistance',
        5 =>  'they are transmitted from host to host through direct contact (e.g. sexual intercourse) or indirectly (e.g. from the air',

    ),
    'Past-Paper Question 18_3_1'  =>  array(
      1 =>  '<img src="Biology/HG 18-1/18-1-19.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 18-1/18-1-20.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 18-1/18-1-21.png" alt="image" width="100%" class="img2">',
      4 =>  'from: 0610/32/O/N/15',    
  
    ),
    'Past-Paper Question 18_3_2'  =>  array(
        1 =>  '<img src="Biology/HG 18-1/18-1-22.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 18-1/18-1-23.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 18-1/18-1-24.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0610/32/O/N/15',    
    
      ),
      'Explain the significance of meiosis on an endangered species. Explain why variation is an advantage to a species.' =>  array(
        1 =>  'meiosis causes genetic variation',
        2 =>  'enables endangered species to adapt better to new environment',
        3 =>  'allows natural selection',
        4 =>  'better suited organisms reproduce',
        5 =>  'this allows evolution',
        6 =>  'eventually reduces competition since they are better adapted for survival',

    ),
    'Describe the process of natural selection.' =>  array(
        1 =>  'variation exists within population due to meiosis',
        2 =>  'there are many offsprings produced',
        3 =>  'competition for resources and struggle for survival',
        4 =>  'best adapted organisms are most likely to survive',
        5 =>  'these individuals that are better adapted to these environment reproduce - the others die',
        6 =>  'adaptive alleles are passed on to the next generation',
        7 =>  'this leads to evolution',


    ),
    'Describe the process of selective breeding. ' =>  array(
        1 =>  'parents with desirable features are selected',
        2 =>  'they are crossed together',
        3 =>  'select the offsprings with desirable features',
        4 =>  'crossed these offsprings together',
        5 =>  'continue this selective breeding process over many generations',

    ),
    'Describe how growers selectively breed plants.' =>  array(
        1 =>  'cross parent plants with desired features',
        2 =>  'by transferring pollen with a brush',
        3 =>  'choose offsprings with desired features and cross them with each other',
        4 =>  'keep crossing for many generations',

    ),
    'Explain the difference between natural selection and selective breeding.' =>  array(
        1 =>  'the favorable features in natural selection are adaptive features',
        2 =>  'natural selection is caused by the environment',
        3 =>  'natural selection is slower',
        4 =>  'natural selection results in an increase in fitness',
        5 =>  'natural selection maintains genetic variation',
        6 =>  'natural selection has random mating',


    ),
    'Milk yield can be increased by injecting cows with a hormone called BST. Explain why there may be concerns about the use of this hormone to increase milk yield.' =>  array(
        1 =>  'there could be possible side effects to human health',
        2 =>  'ref. to animal welfare',
        3 =>  'concerns about lack of consumer choice',
        4 =>  'unnecessary when there is no shortage of milk',

    ),
      'Past-Paper Question 18_3_3'  =>  array(
        1 =>  '<img src="Biology/HG 18-1/18-1-25.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 18-1/18-1-26.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 18-1/18-1-27.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0610/43/O/N/19',    
    
      ),
      'Past-Paper Question 18_3_4'  =>  array(
        1 =>  '<img src="Biology/HG 18-1/18-1-28.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 18-1/18-1-29.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 18-1/18-1-30.png" alt="image" width="100%" class="img2">',
        4 =>  'from: 0610/42/O/N/19',    
    
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
      last_visit($conn,$_SESSION['userid'],78);
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
              if($key=='Past-Paper Question 18_3_1' || $key == 'Past-Paper Question 18_3_2' || $key == 'Past-Paper Question 18_3_3' || $key == 'Past-Paper Question 18_3_4'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="78" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

