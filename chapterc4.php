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
    <title>Electrolysis</title>
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

<h1 style="font-size: 45px;">Electrolysis</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'Define electrolysis. ' =>  array(
      1 =>  'the breakdown of an ionic compound,',
      2 =>  'molten or in aqueous solution,',
      3 =>  'by the passage of electricity',
    ),
    'What is meant by the term electrolyte?' =>  array(
        1 =>  'aqueous or molten substance containing ions',
        2 =>  'that undergoes electrolysis',
        3 =>  'and is chemically changed',
    ),
    'What is the cathode?' =>  array(
        1 =>  'negative electrode ',
        2 =>  '*note: this electrode is on the same side as the negative terminal of battery',
    ),
    'What is the anode?' =>  array(
        1 =>  'positive electrode',
        2 =>  '*note: this electrode is on the same side as the positive terminal of the battery',
    ),
    'Why is magnesium not a suitable metal to make electrodes?' =>  array(
        1 =>  'magnesium is not inert',
    ),
    'Describe the electrolysis of molten lead 2 bromide. Include the half reactions at each electrode.' =>  array(
        1 =>  'electrolyte is molten PbBr2',
        2 =>  'Pb 2+ ions and Br- ions are formed',
        3 =>  'Pb 2+ ions go to cathode',
        4 =>  'Br - ions go to anode',
        5 =>  'Reduction occurs at cathode: Pb2+ + 2e- → Pb',
        6 =>  'Oxidation occurs at anode: 2Br- → Br2 + 2e-',

    ),
    'Describe the electrolysis of dilute sodium chloride solution. Include the half reactions at each electrode.' =>  array(
        1 =>  'electrolyte is dilute NaCl',
        2 =>  'Na+, H+, Cl-, OH-ions are formed',
        3 =>  'Na+, H+ ions go to cathode',
        4 =>  'Cl-, OH- ions go to anode',
        5 =>  'Reduction occurs at cathode: 2H+ + 2e- → H2',
        6 =>  'Oxidation occurs at anode: 4OH- → 2H2O + O2 + 4e-',
        7 =>  'Net result: Hydrogen forms at cathode; oxygen forms at anode; NaCl solution becomes concentrated',

    ),
    'Why can this sodium chloride solution conduct electricity?' =>  array(
        1 =>  'it contains ions',
        2 =>  'ions are able to move and carry charge',
    ),
    'Describe the electrolysis of concentrated sodium chloride solution. Include the half reactions at each electrode. ||| Describe in outline the manufacture of chlorine, hydrogen, and sodium hydroxide from brine solution. ' =>  array(
        1 =>  'electrolyte is concentrated NaCl',
        2 =>  'Na+, H+, Cl-, OH-ions are formed',
        3 =>  'Reduction occurs at cathode: 2H+ + 2e- → H2',
        4 =>  'Oxidation occurs at anode: 2Cl- → Cl2 + 2e-',
        5 =>  'Net result: hydrogen forms at cathode, chlorine forms at anode; NaOH solution remains',

    ),
    'State the uses of chlorine, hydrogen, and sodium hydroxide.' =>  array(
        1 =>  'chlorine: to kill bacteria, textiles',
        2 =>  'sodium hydroxide: making soap, making paper',
        3 =>  'hydrogen: rocket fuel, manufacture of ammonia',
    ),
    'Describe the electrolysis of copper (II) sulfate solution. Include the half reactions at each electrode.' =>  array(
        1 =>  'electrolyte is CuSO4',
        2 =>  'Cu2+, SO4 2-, H+, OH-ions are formed',
        3 =>  'Reduction occurs at cathode: Cu2+ + 2e- → Cu',
        4 =>  'Oxidation occurs at anode: 4OH- → 2H2O + O2 + 4e-',
        5 =>  'H2SO4 remains, solution color changes from blue to colorless',
        6 =>  'copper deposits at cathode, oxygen forms at anode',

    ),
    'In the previous electrolysis example, why was Cu2+ reduced at cathode instead of H+? State one other example of an ion which would be reduced instead of H+.' =>  array(
        1 =>  'copper is less reactive than hydrogen; Cu2+ ions are easier to discharge/ more reactive compounds are harder to decompose',
        2 =>  'silver',
    ),
    'Describe how a metal ring can be electroplated with copper. Include the half reactions at each electrode.' =>  array(
        1 =>  'electrolyte is copper (II) sulfate',
        2 =>  'use metal ring as cathode, and a copper anode',
        3 =>  'rotate the metal ring around consistently, and clean with sandpaper afterwards',
        4 =>  'Cu2+, SO4 2-, H+, OH-ions are formed',
        5 =>  'Cu2+, H+ ions go to cathode',
        6 =>  'SO4 2-, OH- ions go to anode',
        7 =>  'Reduction occurs at cathode: Cu2+ + 2e- → Cu',
        8 =>  'Oxidation occurs at anode: Cu → Cu2+ + 2e-',
        9 =>  'copper anode gets smaller, and metal ring gets coated with copper',
        10 =>  'copper (II) sulfate concentration reamisn the same',

    ),
    'Explain why the concentration of the copper (II) sulfate electrolyte does not change in the previous example.' =>  array(
        1 =>  'the rate of formation of Cu2+ ions at anode is the same as the rate of removal of Cu2+ ions at cathode',
    ),
    'Outline some reasons for electroplating.' =>  array(
        1 =>  'improves appearance',
        2 =>  'corrosion resistance',
        3 =>  'anti-bacterial',
    ),
    'Past Paper Question 4_1'  =>  array(
      1 =>  '<img src="Chemistry/CHG 5/1.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 5/2.png" alt="image" width="100%" class="img2">',
      3 =>  'from: 0620/41/O/N/17',    
  
    ),
    'Past Paper Question 4_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 5/3.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 5/5.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 5/4.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 5/6.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/41/M/J/18',    
    
      ),
      'Past Paper Question 4_3'  =>  array(
        1 =>  '<img src="Chemistry/CHG 5/7.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 5/8.png" alt="image" width="100%" class="img2">',
        3 =>  '<img src="Chemistry/CHG 5/9.png" alt="image" width="100%" class="img3">',    
        4 =>  '<img src="Chemistry/CHG 5/10.png" alt="image" width="100%" class="img4">',
        5 =>  'from: 0620/43/M/J/19',    
    
      ),
      'Past Paper Question 4_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 5/11.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 5/12.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 5/13.png" alt="image" width="100%" class="img2">',
        4 =>  '<img src="Chemistry/CHG 5/14.png" alt="image" width="100%" class="img3">',    
        5 =>  '<img src="Chemistry/CHG 5/15.png" alt="image" width="100%" class="img4">',
        6 =>  'from: 0620/42/O/N/17',    
    
      ),
      'Describe the production of electrical energy from simple galvanic cells.' =>  array(
        1 =>  '<img src="Chemistry/CHG 5/16.png" alt="image" width="100%" class="img1">',
        2 =>  'Zn is more reactive than Cu',
        3 =>  'Zn releases electrons → Zn is anode',
        4 =>  'Half reaction at anode (zinc electrode): Zn → Zn2+ + 2e-',
        5 =>  'Half reaction at cathode (copper electrode): 2H+ + 2e- → H2',
        6 =>  'Overall reaction: Zn + H2SO4 → ZnSO4 + H2 (Zn2+ ions react with remaining SO4- ions in electrolyte to form zinc sulfate)',

    ),
    'What are the cathodes and anodes in galvanic cells?' =>  array(
        1 =>  'electrode with more reactive metal will always be anode because it releases electrons ',
        2 =>  'anode: electrode where oxidation occurs',
        3 =>  'cathode: electrode where reduction occurs',
    ),
      'Past Paper Question 4_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 5/17.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 5/18.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/O/N/19',    
    
      ),
      'Past Paper Question 4_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 5/19.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 5/20.png" alt="image" width="100%" class="img1">',
        3 =>  '<img src="Chemistry/CHG 5/21.png" alt="image" width="100%" class="img2">',    
        4 =>  'from: 0620/42/M/J/17',    
    
      ),
      'Past Paper Question 4_7'  =>  array(
        1 =>  '<img src="Chemistry/CHG 5/22.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 5/23.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/M/J/17',    
    
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
      last_visit($conn,$_SESSION['userid'],100);
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
              if($key=='Past Paper Question 4_1' || $key == 'Past Paper Question 4_2' || $key == 'Past Paper Question 4_3' || $key == 'Past Paper Question 4_4' || $key == 'Past Paper Question 4_5' || $key == 'Past Paper Question 4_6' || $key == 'Past Paper Question 4_7' || $key == 'Describe the production of electrical energy from simple galvanic cells.'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="100" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

