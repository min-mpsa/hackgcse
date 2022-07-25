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
    <title>Uses of Metals</title>
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

<h1 style="font-size: 45px;">Uses of Metals</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What are the two different ways to extract metals and for which metals would you use them?' =>  array(
      1 =>  'metals more reactive than carbon: reduction via electrolysis',
      2 =>  'metals less reactive than carbon, but more reactive than hydrogen: reduction via heating with carbon',
      3 =>  'metals less reactive than hydrogen: they occur naturally',
    ),
    'Describe the manufacturing process of zinc from zinc blende, including all chemical equations.' =>  array(
        1 =>  'roast zinc blende in air',
        2 =>  '2ZnS + 3O2 → 2ZnO + 2SO2',
        3 =>  'react with coke',
        4 =>  '2ZnO + C → 2Zn + CO2',
        5 =>  'zinc is distilled',

    ),
    'Describe how pure zinc is removed from the furnace and collected.' =>  array(
        1 =>  'zinc is vaporized and is condensed',
    ),
    'Past Paper Question 9_2_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 10/34.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 10/35.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/42/F/M/17',    
  
    ),
    'Describe the manufacturing process of iron from hematite (iron III oxide), including all chemical equations.' =>  array(
        1 =>  'coke is burned to form carbon dioxide; C + O2 → CO2',
        2 =>  'carbon dioxide is reduced by more coke to form carbon monoxide; CO2 + C → 2CO',
        3 =>  '3CO + Fe2O3 → 2Fe + 3CO2',
        4 =>  'limestone decomposes to form calcium oxide; CaCO3 → CaO + CO2',
        5 =>  'CaO + SiO2 → CaSiO3',

    ),
    'The iron extracted from hematite using a blast furnace is impure. Identify the main impurity in this iron and explain how it is removed in the steel-making process. ' =>  array(
        1 =>  'main impurity: C',
        2 =>  'pass oxygen through molten iron',
        3 =>  'C reacts with O2 to form carbon dioxde gas which escapes',
    ),
    'Why must the high levels of carbon in molten iron be removed before iron becomes a useful material?' =>  array(
        1 =>  'the carbon makes iron too brittle',
    ),
    'Past Paper Question 9_2_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/36.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/37.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/M/J/16',    
    
      ),
      'Describe the extraction of aluminium by electrolysis from bauxite. Include the half reactions at each electrode.' =>  array(
        1 =>  'carbon electrodes',
        2 =>  'electrolyte: aluminium oxide dissolved in molten cryolite',
        3 =>  'cryolite is used to lower the melting temperature',
        4 =>  'half-reaction at cathode: Al3+ + 3e- → Al (reduction)',
        5 =>  'half-reaction at anode: 2O2- → O2 + 4e- (oxidation)',

    ),
    'Why is aluminium not extracted by heating aluminium oxide with carbon?' =>  array(
        1 =>  'aluminium is more reactive than carbon',
    ),
    'Why is cryolite used in the extraction of aluminium?' =>  array(
        1 =>  'to increase conductivity',
        2 =>  'lowers the operating temperature',
        3 =>  'acts as a solvent',
    ),
    'What are the gaseous products formed during this extraction process?' =>  array(
        1 =>  'oxygen, carbon dioxide, fluorine (from cryolite)',
    ),
    'Why is this process expensive?' =>  array(
        1 =>  'electricity costs',
        2 =>  'carbon anodes need to be replaced from time to time',
    ),
    'Explain why carbon anodes have to be regularly replaced in the extraction of aluminium.' =>  array(
        1 =>  'carbon anodes react with oxygen',
        2 =>  'to form carbon dioxide',
    ),
      'Past Paper Question 9_2_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 10/38.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 10/39.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/43/O/N/18',    
    
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
      last_visit($conn,$_SESSION['userid'],115);
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
              if($key=='Past Paper Question 9_2_1' || $key == 'Past Paper Question 9_2_2' || $key == 'Past Paper Question 9_2_3' || $key == '' || $key == '' || $key == ''){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="115" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

