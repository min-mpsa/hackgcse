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
    <title>Sexual Reproduction in Humans</title>
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

<h1 style="font-size: 45px;">Sexual Reproduction in Humans</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Past-Paper Question 16_3_1'  =>  array(
        1 =>  '<img src="Biology/HG 16-4/16-4-2.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 16-4/16-4-1.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 16-4/16-4-3.png" alt="image" width="100%" class="img1">',    
        4 =>  '<img src="Biology/HG 16-4/16-4-4.png" alt="image" width="100%" class="img2">',
        5 =>  'from: 0610/41/M/J/19',    
    
      ),
      'Past-Paper Question 16_3_2'  =>  array(
        1 =>  '<img src="Biology/HG 16-4/16-4-5.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 16-4/16-4-6.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0610/42/F/M/18',    
    
      ),
    
    'Explain the adaptive features of sperm cells.' =>  array(
      1 =>  'flagellum:',
      2 =>  '',
      3 =>  'propels the sperm',
      4 =>  'to site of fertilization (oviduct)',
      5 =>  '',
      6 =>  '',
      7 =>  'mitochondria:',
      8 =>  '',
      9 =>  'aerobic respiration',
      10 =>  'releases energy',
      11 =>  '',
      12 =>  '',
      13 =>  'acrosome:',
      14 =>  '',
      15 =>  'contains enzymes',
      16 =>  'that breaks down jelly coat of egg cells',
      17 =>  'so sperm nucleus can enter the egg cell',

    ),
    'Explain the adaptive features of egg cells.' =>  array(
        1 =>  'mitochondria:',
        2 =>  '',
        3 =>  'aerobic respiration',
        4 =>  'releases energy',
        5 =>  '',
        6 =>  '',
        7 =>  'jelly coat:',
        8 =>  '',
        9 =>  'makes sure only one sperm can fertilize the egg',

      ),

    'Compare male and female gametes in terms of size, structure, motility, and numbers.' =>  array(
        1 =>  'Size: sperm is 10,000x smaller than egg',
        2 =>  'Structure: (state the differences in adaptive features)',
        3 =>  'Motility: Sperm is motile, egg is not',
        4 =>  'Numbers: Sperm → millions per ejaculation; Egg → 1 per menstrual cycle',

    ),
    'Describe what happens during fertilization in humans.' =>  array(
        1 =>  'enzymes from acrosome from sperm break down jelly layer of the egg',
        2 =>  'nucleus from sperm enters egg',
        3 =>  'fertilization membrane forms - no more sperm can enter',
        4 =>  'the two halpoid nuclei fuse - zygote is formed',

      ),
      'Outline the growth and development of the fetus. Describe what happens after fertilization.' =>  array(
        1 =>  'zygote undergoes mitosis',
        2 =>  'an embryo forms',
        3 =>  'a hollow ball of cells move down oviduct via peristalsis and implants into lining of the uterus (3)',
        4 =>  'placenta develops',
        5 =>  'stem cells form',
        6 =>  'they express different genes to form specialized cells',
        7 =>  'organ systems form',

      ),
      'Suggest how the embryo is moved along the oviduct.' =>  array(
        1 =>  'peristalsis - waves of contractions of muscles',
        2 =>  'ciliary action',
      ),
      'Describe the role of the placenta in humans.' =>  array(
        1 =>  'gas exchange',
        2 =>  'transfer of dissolved nutrients from mother to fetus by diffusion',
        3 =>  'transfer of excretory products from fetus to mother by diffusion',
        4 =>  'provides passive immunity by transferring antibodies form mother to fetus',
        5 =>  'prevents mixing of blood',

      ),
      'Describe the role of umbilical cord.' =>  array(
        1 =>  'contains umbilical artery and umbilical vein',
        2 =>  'umbilical artery: carries deoxygenated blood and waste products from fetus to placenta',
        3 =>  'umbilical vein: carries oxygenated blood and soluble food from placenta to fetus',
      ),
      'Describe the role of the amniotic sac.' =>  array(
        1 =>  'membrane enclosing amniotic fluid',
        2 =>  'broken at birth',
      ),
      'Describe how the fetus obtains glucose.' =>  array(
        1 =>  'from the mother',
        2 =>  'glucose is carried in blood',
        3 =>  'glucose diffuses from high concentration to low concentration',
        4 =>  'across the placenta through the umbilical cord',

      ),
      'Past-Paper Question 16_3_3'  =>  array(
        1 =>  '<img src="Biology/HG 16-4/16-4-7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 16-4/16-4-8.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Biology/HG 16-4/16-4-7-2.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Biology/HG 16-4/16-4-9.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0610/31/O/N/14',    
    
      ),
      'Recall Question: Coordination and Response'  =>  array(
        1 =>  '<img src="Biology/HG 16-4/16-4-10.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Biology/HG 16-4/16-4-11.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Biology/HG 16-4/16-4-12.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0610/43/O/N/18',    
    
      ),
      'Why is it recommended that pregnant women do not smoke.' =>  array(
        1 =>  'toxins in smoke can cross the placenta',
        2 =>  'increased risk of miscarriage or premature birth',
        3 =>  'reduces oxygen available to fetus',
        4 =>  'babies are more likely to be addicted',

      ),
      'State the functions of amniotic fluid.' =>  array(
        1 =>  'protects from mechanical shock of fetus',
        2 =>  'maintains constant temperature of fetus',
        3 =>  'allows movement of fetus',
        4 =>  'prevents dehydration',

      ),
      'Outline the processes involved in labor and birth. ' =>  array(
        1 =>  'breaking of the amniotic sac',
        2 =>  'contraction of the muscles in the uterus wall',
        3 =>  'dilation of the cervix',
        4 =>  'passage through the vagina',
        5 =>  'tying and cutting the umbilical cord',
        6 =>  'delivery of the afterbirth',

      ),
      'Describe the advantages of breast-feeding compared with bottle-feeding.' =>  array(
        1 =>  'contains antibodies',
        2 =>  'sterile → less risk of infection',
        3 =>  'is at a suitable temperature',
        4 =>  'convenient - always available',
        5 =>  'free',
        6 =>  'nutrient requirements change accordingly with the babys development',

      ),
      'Describe the disadvantages of breast-feeding compared with bottle-feeding.' =>  array(
        1 =>  'not all mothers can produce enough milk',
        2 =>  'some drugs can pass through into milk',
        3 =>  'time consuming',
        4 =>  'only mother can produce milk so mother needs to be present',
        5 =>  'can be tiring',

      ),
    'Past-Paper Question 16_3_4'  =>  array(
      1 =>  '<img src="Biology/HG 16-4/16-4-13.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Biology/HG 16-4/16-4-14.png" alt="image" width="100%" class="img1">',
      3 =>  '<img src="Biology/HG 16-4/16-4-15.png" alt="image" width="100%" class="img1">',
      4 =>  '<img src="Biology/HG 16-4/16-4-17.png" alt="image" width="100%" class="img2">',
      5 =>  '<img src="Biology/HG 16-4/16-4-16.png" alt="image" width="100%" class="img3">',    
      6 =>  '<img src="Biology/HG 16-4/16-4-18.png" alt="image" width="100%" class="img4">',
      7 =>  'from: 0610/32/M/J/15',    
  
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
      last_visit($conn,$_SESSION['userid'],66);
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
              if($key=='Past-Paper Question 16_3_1' || $key == 'Past-Paper Question 16_3_2' || $key == 'Past-Paper Question 16_3_3' || $key == 'Past-Paper Question 16_3_4' || $key == 'Recall Question: Coordination and Response' || $key == 'Explain the adaptive features of sperm cells.' || $key == 'Explain the adaptive features of egg cells.'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="66" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

