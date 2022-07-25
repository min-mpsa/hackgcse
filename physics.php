<?php
session_start();
if(!isset($_SESSION["userid"])) {
    header("location: sign-in.php");
    exit(); 
}
include_once 'physicsheader.php';
?>

<body>
<?php 
	
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
	
	function showChapters($conn){
		$subject = 'physics';
		$sql = "SELECT * FROM chapters WHERE subject_name = ?";
    	$stmt = mysqli_stmt_init($conn);
    	mysqli_stmt_prepare($stmt, $sql);
    	mysqli_stmt_bind_param($stmt, "s",$subject);
    	mysqli_stmt_execute($stmt);
    	$resultData = mysqli_stmt_get_result($stmt);
    	while($data = mysqli_fetch_assoc($resultData)){
			$countBoxes= getColors($conn,$_SESSION['userid'],$data['id']);
			$green= getGreenColor($conn,$_SESSION['userid'],$data['id']);
			$yellow = getYellowColor($conn,$_SESSION['userid'],$data['id']);
			$red = getRedColor($conn,$_SESSION['userid'],$data['id']);
			$totalQuestions=$data['no_of_questions'];
			$totalPercentage = ($countBoxes*100)/$totalQuestions;
			$greenPercentage =  ($green*100)/$totalQuestions;
			$yellowPercentage = ($yellow*100)/$totalQuestions;
			$redPercentage = ($red*100)/$totalQuestions;
			if ($greenPercentage >= 80 ) {
			$Average_Rank = "Easy";
			$BGcolor = '#3bb079';
		}
		else if($redPercentage >= 30 && $greenPercentage <= 30){
			$Average_Rank = "Hard";
			$BGcolor = '#9c2215';
		} 
		else{
			$Average_Rank = "Okay";
			$BGcolor = '#fff291';
		}

		$last_visit = getLastVisit($conn,$_SESSION['userid'],$data['id']);
		$days_diff = 0;
		if ($last_visit==null){
			$days_diff == 'null';
		}else{
			$date1 = new DateTime($last_visit);
			$date2 = new DateTime ();
			$diff = date_diff($date1,$date2);
			$days_diff=$diff->format("%a");
		}
				
		if($data['topic_no']==0){
			echo '
			<tr class="row100 body odd">
			<td class="cell100 column1">'.$data['name'].'</td>
			<td class="cell100 column2"></td>
			<td class="cell100 column3"></td>
			<td class="cell100 column4"></td>
			<td class="cell100 column5"></td>
			<td class="cell100 column6"></td>
			<td class="cell100 column7"></td>
			<td class="cell100 column8"></td>
			
			</tr>
			';
			} else{
			echo '
			<tr class="row100 body">
			
			<td class="cell100 column1"><a style="color:grey;" href="'.$data['link'].'">'.$data['name'].'</a></td>
			<td class="cell100 column2">'.number_format((float)$totalPercentage, 2, '.', '').'%</td>
			<td class="cell100 column3">'.$green.'<div class="green"></div></td>
			<td class="cell100 column4">'.$yellow.'<div class="yellow"></div></td>
			<td class="cell100 column5">'.$red.'<div class="red"></div></td>
			<td class="cell100 column6">Last revised on: ';
			if($last_visit==null) {echo 'not visited';}else{ echo $last_visit;}
			echo '</td>
			<td class="cell100 column7">';
			if($days_diff==0 && $last_visit!=null ){ echo 'Today';}else if($last_visit==null){echo '';} else{ echo $days_diff.' days ago';}
			echo'</td>
			<td class="cell100 column8" style="background-color:'.$BGcolor.'">'.$Average_Rank.'</td>
			
			</tr>';
			}
		}
	}
?>
<header class="header">
  <div class="tab">
    <img class="logo" src="hack gcses logo.png" alt="logo" width="242px" height="50px" >
                <a href="logout.inc.php"><button class="hide">Logout</button></a>
<div class="dropdown">
                <button class="dropbtn" onclick="myFunction()">Contact</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="https://www.facebook.com/Hack-GCSE-100463108673856" target="_blank">Facebook</a>
                    <a href="https://www.youtube.com/channel/UCRon4Aoacufhl_eD5mC18Yw" target="_blank">YouTube</a>
                    <a href="https://www.instagram.com/hackgcse/" target="_blank">Instagram</a>
                    <a>hackgcses@gmail.com</a>

                  </div>
                </div>                <a href="comingsoon.php"><button>Notes</button>
                <a href="comingsoon.php"><button class="hide">Definitions</button></a>
                <a href="dashboard.php"><button class="hide2">Dashboard</button></a>
            </div>
        </header>

<h1 style="text-align: center;">Physics</h1>

<div class="table100 ver5 m-b-110">
					
	<div class="table100-body" style="overflow-x:auto;">
		<table>
			<tbody>
				
				<?php showChapters($conn); ?>
				
			</tbody>
		</table>
	</div>
</div>

     <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function myFunction() {
              document.getElementById("myDropdown").classList.toggle("show");
            }
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
              if (!e.target.matches('.dropbtn')) {
              var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                  myDropdown.classList.remove('show');
                }
              }
            }
            </script>

<?php
	include_once 'biologyfooter.php';
?>