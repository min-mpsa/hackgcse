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
    <title>Pollution</title>
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

<h1 style="font-size: 45px;">Pollution</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Discuss the causes of acid rain.' =>  array(
      1 =>  'fossil fuels contain sulfur',
      2 =>  'sulfur is burnt and sulfur dioxide is released',
      3 =>  'nitrogen reacts with oxygen in vehicle exhausts to from nitrogen oxide',
      4 =>  'these acidic gases react with water in clouds to form acid rain',

    ),
    'Discuss the negative effects of acid rain on land.' =>  array(
        1 =>  'damages plants and trees',
        2 =>  'soil leaching',
        3 =>  'nutrients in soil no longer available to plants',
        4 =>  'dissolves limestone',
        5 =>  'damages buildings and statues',

    ),
    'Describe the negative effects of acid rain on freshwater ecosystems, such as rivers, streams, and lakes.' =>  array(
        1 =>  'pH of lakes and rivers decrease',
        2 =>  'nutrients like nitrate ions are leached',
        3 =>  'shells are damaged',
        4 =>  'fish fail to reproduce',
        5 =>  'aquatic plants die',
        6 =>  'disrupts food chains (describe more)',
        7 =>  'acidic environment kills aquatic animals',

    ),
    'State the measures that are taken to reduce sulfur dioxide pollution and reduce the impact of acid rain.' =>  array(
        1 =>  'scrubbers in chimneys of power stations → neutralize waste gases with lime',
        2 =>  'desulfurization of coal',
        3 =>  'use less fossil fuels',
        4 =>  'use alternative sources of energy like solar power',
        5 =>  'use catalytic converters in cars',

    ),
    'Past-Paper Question 21_3_1'  =>  array(
      1 =>  '<img src="Biology/HG 21-1/21-1-1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 21-1/21-1-2.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 21-1/21-1-3.png" alt="image" width="100%" class="img2">',    
      4 =>  'from: 0610/33/M/J/14',    
  
    ),
    'Past-Paper Question 21_3_2'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-4.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-6.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 21-1/21-1-5.png" alt="image" width="100%" class="img3">',
        4 =>  '<img src="Biology/HG 21-1/21-1-8.png" alt="image" width="100%" class="img4">',        
        5 =>  'from: 0610/33/M/J/15',    
    
      ),
      'Past-Paper Question 21_3_3'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-0.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-10.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 21-1/21-1-11.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Biology/HG 21-1/21-1-13.png" alt="image" width="100%" class="img2">',
        5 =>  '<img src="Biology/HG 21-1/21-1-12.png" alt="image" width="100%" class="img3">',
        6 =>  '<img src="Biology/HG 21-1/21-1-14.png" alt="image" width="100%" class="img4">',    
        7 =>  'from: 0610/42/M/J/17',    
    
      ),
    'Describe the effects of waterborne chemical wastes on the environment.' =>  array(
        1 =>  'heavy metals are toxin to organisms',
        2 =>  'bioaccumulation of heavy metal → passed along the food chain and accumulates to organisms with high trophic levels',
        3 =>  'decreases pH and acid burns shells/skin/plants ',
    ),
    'Describe and explain what happens when eutrophication occurs.' =>  array(
        1 =>  'fertilizer leeches into river/stream/lake',
        2 =>  'increased availability of nitrate and other ions',
        3 =>  'algae bloom',
        4 =>  'algae block sunlight from entering water',
        5 =>  'death of other producers after being unable to photosynthesize',
        6 =>  'increased decomposition',
        7 =>  'increased aerobic respiration',
        8 =>  'decomposers use up oxygen in the water',
        9 =>  'organisms like fish die due to lack of oxygen',

    ),
    'How can we reduce the chances of eutrophication occurring when applying fertilizers?' =>  array(
        1 =>  'calculate accurately how much fertilizer is needed and use only the amount that is needed',
        2 =>  'do not apply fertilizers during or after rain',
        3 =>  'make channels between land and water body',
        4 =>  'only apply when crops are growing in the area',

    ),
    'Discuss the effects of non-biodegradable plastics in the environment, in terrestrial ecosystems.' =>  array(
        1 =>  'blocks digestive systems of animals',
        2 =>  'ref. to toxins and chemical fumes',
        3 =>  'bioaccummulation → passes down the food chain',
        4 =>  'habitat destruction → plastic covers habitats',
        5 =>  'blocks photosynthesis for land plants',
        6 =>  'blocks root growth ',
        7 =>  'remain in the ecosystem for a long time',

    ),
    'Discuss the effects of non-biodegradable plastics in the environment, in aquatic ecosystems.' =>  array(
        1 =>  'plastic remains for a long time (not easily decomposed)',
        2 =>  'ingested by organisms but not digested → blocks gut',
        3 =>  'entangled and cut by plastic',
        4 =>  'plastic blocks sunlight for photosynthesis',
        5 =>  'may release toxins and harmful chemicals',
        6 =>  'blocks the flow of water in streams or rivers',
        7 =>  'reduces concentration of dissolved oxygen',
        8 =>  'bioaccumulation',

    ),
    'Explain how carbon dioxide enhances the greenhouse effect.' =>  array(
        1 =>  'light from the Sun hits Earth',
        2 =>  'short-wave radiation passes through carbon dioxide layer',
        3 =>  'reflected form ground as long-wave radiation → infrared ',
        4 =>  'this infrared wave is heat energy, and it is trapped and prevented from escaping from atmosphere by carbon dioxide',

    ),
    'Describe the negative impacts of female contraceptive hormones in water courses. ' =>  array(
        1 =>  'reduced sperm count in men',
        2 =>  'feminization of aquatic organisms',
    ),
    'Past-Paper Question 21_3_4'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-16.png" alt="image" width="100%" class="img2">',    
        3 =>  'from: 0610/31/M/J/14',    
    
      ),
      'Past-Paper Question 21_3_5'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-18.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 21-1/21-1-19.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Biology/HG 21-1/21-1-20.png" alt="image" width="100%" class="img2">',    
        5 =>  'from: 0610/32/M/J/15',    
    
      ),
      'Past-Paper Question 21_3_6'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-21.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-22.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 21-1/21-1-23.png" alt="image" width="100%" class="img1">',
        4 =>  '<img src="Biology/HG 21-1/21-1-24.png" alt="image" width="100%" class="img2">',    
        5 =>  'from: 0610/43/M/J/17',    
    
      ),
      'Past-Paper Question 21_3_7'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-25.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-26.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 21-1/21-1-27.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/42/M/J/16',    
    
      ),
      
      'Past-Paper Question 21_3_8'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-28.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-29.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 21-1/21-1-30.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/32/O/N/15',    
    
      ),
      'Past-Paper Question 21_3_9'  =>  array(
        1 =>  '<img src="Biology/HG 21-1/21-1-31.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 21-1/21-1-32.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 21-1/21-1-33.png" alt="image" width="100%" class="img3">',
        3 =>  '<img src="Biology/HG 21-1/21-1-34.png" alt="image" width="100%" class="img4">',        
        4 =>  'from: 0610/33/O/N/15',    
    
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
      last_visit($conn,$_SESSION['userid'],89);
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
              if($key=='Past-Paper Question 21_3_1' || $key == 'Past-Paper Question 21_3_2' || $key == 'Past-Paper Question 21_3_3' || $key == 'Past-Paper Question 21_3_4' || $key == 'Past-Paper Question 21_3_5' || $key == 'Past-Paper Question 21_3_6' || $key == 'Past-Paper Question 21_3_7' || $key == 'Past-Paper Question 21_3_8' || $key == 'Past-Paper Question 21_3_9'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="89" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

