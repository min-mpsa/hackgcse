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
    <title>Structure and Bonding</title>
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

<h1 style="font-size: 45px;">Structure and Bonding</h1>

<nav class="navigation">
  <ul class="accordion">
  <?php
  $accordians = array(
    'What is an alloy?' =>  array(
      1 =>  'a mixture of a metal with other elements',
    ),
    'Define ionic bonding.' =>  array(
        1 =>  'electrostatic attraction between oppositely charged ions',
    ),
    'What is meant by the term ionic lattice?' =>  array(
        1 =>  'regular, repeating pattern',
        2 =>  'of alternating positive and negative ions',
    ),
    'Describe the structure and bonding in a metal (metallic bonding).' =>  array(
        1 =>  'lattice of positive ions',
        2 =>  'delocalized electrons',
        3 =>  'attraction between positive ions and sea of delocalized electrons',
    ),
    'Why are some metals malleable?' =>  array(
        1 =>  'it has layers of ions',
        2 =>  'which can slide over each other without breaking the metallic bond',
    ),
    'What is a covalent bond?' =>  array(
        1 =>  'shared pair of electrons between two atoms',
    ),
    'Why is fluorine diatomic and neon isnt. ' =>  array(
        1 =>  'neon has a full outer shell so it does not need to lose or gain electrons',
        2 =>  'fluorine needs one electron to complete outermost shell',
        3 =>  'so it forms bonds with other fluorine atoms',
    ),
    'Explain the differences in melting point and boiling point between sodium chloride, iodine and diamond.' =>  array(
        1 =>  'sodium chloride is a giant ionic lattice',
        2 =>  'electrostatic forces of attraction between ions (ionic bonds) require a lot of energy to overcome',
        3 =>  'it has a high melting point (but not as high as diamond because covalent bonds are stronger than ionic bonds)',
        4 =>  '',
        5 =>  '',
        6 =>  'iodine is a simple covalent molecule',
        7 =>  'they have weak intermolecular forces between molecules - require less energy to break',
        8 =>  'it has a low melting point',
        9 =>  '',
        10 =>  '',
        11 =>  'diamond is has a giant covalent structure',
        12 =>  'strong covalent bonds need to be broken - requires a lot of energy to overcome',
        13 =>  'has the highest melting point',

    ),
    'Explain the electrical conductivity of giant ionic lattices' =>  array(
        1 =>  'giant ionic lattices cannot conduct when solid',
        2 =>  'ions are held in fixed positions by strong electrostatic forces',
        3 =>  'no mobile charge carriers',
        4 =>  'giant ionic lattices conduct when molten or in aqueous solution - ionic lattice collapses - ions are now mobile charge carriers - electricity is conducted',

    ),
    'Explain the electrical conductivity of metallic lattices.' =>  array(
        1 =>  'metallic lattices have delocalized mobile electrons ',
        2 =>  'which are mobile charge carriers',
        3 =>  'so they conduct electricity',
    ),
    'Explain the electron conductivity of simple covalent molecules and giant covalent structures.' =>  array(
        1 =>  'giant covalent structures and simple covalent molecules do not conduct electricity',
        2 =>  'all electrons are used in bonding',
        3 =>  'no delocalized mobile charged particles i.e electrons or ions',
    ),
    'Explain why the term relative molecular mass can be used for butane but not for potassium fluoride.' =>  array(
        1 =>  'butane is covalent',
        2 =>  'potassium fluoride is ionic',
        3 =>  'relative formula mass is used for ionic compounds*',
    ),
    'Why is the boiling point of nitrogen low even though it has a triple bond?' =>  array(
        1 =>  'weak intermolecular forces',
        2 =>  'covalent bonds within atom does nt need to break for melting',
    ),
    'Name two forms of the element carbon that have giant covalent structures?' =>  array(
        1 =>  'diamond, graphite',
    ),
    'Silicon (IV) oxide is a macromolecule. Describe its structure.' =>  array(
        1 =>  'each oxygen is joined to two silicon atoms',
        2 =>  'each silicon is joined to four oxygen atoms',
        3 =>  'shape is tetrahedral around silicon',
    ),
    'Explain in terms of its structure why graphite is soft and is a good conductor of electricity.' =>  array(
        1 =>  'soft because there are weak intermolecular forces between layers',
        2 =>  'layers can slide over each other',
        3 =>  'good conductor because there are mobile electrons',
    ),
    'Why is graphite brittle?' =>  array(
        1 =>  'covalent bonds between atoms are strong but directional',
    ),
    'Why are giant covalent structures insoluble  in water?' =>  array(
        1 =>  'does not form hydrogen bonds with water',
    ),
    'Past Paper Question 2_2_1'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/13.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/14.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/O/N/19',    
    
      ),
      'Past Paper Question 2_2_2'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/15.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/16.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/M/J/18',    
    
      ),
    'Past Paper Question 2_2_3'  =>  array(
      1 =>  '<img src="Chemistry/CHG 3/17.png" alt="image" width="100%" class="img1">',
      2 =>  '<img src="Chemistry/CHG 3/19.png" alt="image" width="100%" class="img2">',
      3 =>  '<img src="Chemistry/CHG 3/18.png" alt="image" width="100%" class="img3">',    
      4 =>  '<img src="Chemistry/CHG 3/20.png" alt="image" width="100%" class="img4">',
      5 =>  'from: 0620/43/O/N/19',    
  
    ),
    'Past Paper Question 2_2_4'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/21.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/22.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/M/J/19',    
    
      ),
      'Past Paper Question 2_2_5'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/23.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/24.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/41/O/N/16',    
    
      ),
      'Past Paper Question 2_2_6'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/25.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/26.png" alt="image" width="100%" class="img2">',
        3 =>  'from: 0620/42/F/M/19',    
    
      ),
      'Past Paper Question 2_2_7'  =>  array(
        1 =>  '<img src="Chemistry/CHG 3/27.png" alt="image" width="100%" class="img1">',
        2 =>  '<img src="Chemistry/CHG 3/28.png" alt="image" width="100%" class="img2">',
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
      last_visit($conn,$_SESSION['userid'],96);
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
              if($key=='Past Paper Question 2_2_1' || $key == 'Past Paper Question 2_2_2' || $key == 'Past Paper Question 2_2_3' || $key == 'Past Paper Question 2_2_4' || $key == 'Past Paper Question 2_2_5' || $key == 'Past Paper Question 2_2_6' || $key == 'Past Paper Question 2_2_7'){ $data .= '<ul style="list-style-type: none;">';
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
                            <button class="color-change" data-topicID="96" data-key="'.$key.'" style="background:'.$color.'"></button>                            
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

