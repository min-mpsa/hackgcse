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
    <title>Nutrient Cycles</title>
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

<h1 style="font-size: 45px;">Nutrient Cycles</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Describe how human activities are affecting the carbon cycle.' =>  array(
      1 =>  'more combustion of fossil fuel',
      2 =>  'concentration of carbon dioxide in atmosphere increases',
      3 =>  'deforestation, trees not replanted, less CO2 absorbed from atmosphere',
      4 =>  'this enhances greenhouse effect and causes global warming',
      5 =>  'fossil fuels are non-renewable',

    ),
    'Describe the roles of soil organisms in the carbon cycle.' =>  array(
        1 =>  'respiration → releases CO2 into atmosphere',
        2 =>  'carbon dioxide is taken in by plants for photosynthesis',
    ),
    'Past-Paper Question 19_2_1'  =>  array(
      1 =>  '<img src="Biology/HG 19-2/19-2-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 19-2/19-2-2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0610/33/M/J/14',    
  
    ),
    'Describe how water is recycled from the atmosphere and back to the roots.' =>  array(
        1 =>  'water from oceans, lakes, rivers, etc. evaporates',
        2 =>  'water vapor condenses to form clouds',
        3 =>  'precipitation occurs',
        4 =>  'rainwater drains into rivers',
        5 =>  'seeps into soil',

    ),
    'Describe the nitrogen cycle.' =>  array(
        1 =>  'decomposition of plat and animal protein to ammonium ions',
        2 =>  'nitrification: ammonia to nitrite ions',
        3 =>  'nitrogen fixation by lightning and bacteria: nitrite ions to nitrate ions',
        4 =>  'absorption of nitrate ions by plants',
        5 =>  'production of amino acids and proteins',
        6 =>  'feeding and digestion of proteins',
        7 =>  'deamination',
        8 =>  'denitrification by denitrifying bacteria: nitrate ions to nitrogen released into atmosphere',

    ),
    'Microorganisms also process and convert atmospheric nitrogen to form a nitrogen compound that can be absorbed by the plants. Name this process of converting atmospheric nitrogen and explain how this happens.' =>  array(
        1 =>  'nitrogen fixation',
        2 =>  'there are free living bacteria on root nodules of legumes',
        3 =>  'nitrogen-fixing bacteria',
        4 =>  'nitrogen is converted to ammonia',

    ),
    'Describe how nitrogen in proteins in dead leaves is recycled to be absorbed by plants.' =>  array(
        1 =>  'decomposers break down proteins in dead leaves to amino acids',
        2 =>  'with protease enzymes',
        3 =>  'amino acids are converted to ammonia - this is deamination',
        4 =>  'ammonia is converted to nitrite ions',
        5 =>  'nitrites are converted to nitrate ions',
        6 =>  'this is done by nitrifying bacteria',
        7 =>  'nitrate ions are absorbed by plants',

    ),
    'Past-Paper Question 19_2_2'  =>  array(
        1 =>  '<img src="Biology/HG 19-2/19-2-3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-2/19-2-4.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/41/O/N/19',    
    
      ),
      'Past-Paper Question 19_2_3'  =>  array(
        1 =>  '<img src="Biology/HG 19-2/19-2-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-2/19-2-6.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 19-2/19-2-7.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Biology/HG 19-2/19-2-8.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Biology/HG 19-2/19-2-9.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0610/31/M/J/14',    
    
      ),
      'Past-Paper Question 19_2_4'  =>  array(
        1 =>  '<img src="Biology/HG 19-2/19-2-10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 19-2/19-2-11.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 19-2/19-2-12.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/31/M/J/14',    
    
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
      last_visit($conn,$_SESSION['userid'],81);
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
              if($key=='Past-Paper Question 19_2_1' || $key == 'Past-Paper Question 19_2_2' || $key == 'Past-Paper Question 19_2_3' || $key == 'Past-Paper Question 19_2_4'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="81" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

