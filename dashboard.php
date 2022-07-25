<?php
session_start();
if(!isset($_SESSION["userid"])) {
    header("location: sign-in.php");
    exit(); 
}
include_once 'dashboardheader.php';
?>

<body>
        <header class="header">
            <div class="tab">
                <img class="logo" src="hack gcses logo.png" alt="logo" width="242px" height="50px" >
                <a href="logout.inc.php"><button>Logout</button></a>
                <div class="dropdown">
                <button class="dropbtn" onclick="myFunction()">Contact</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="https://www.facebook.com/Hack-GCSE-100463108673856" target="_blank">Facebook</a>
                    <a href="https://www.youtube.com/channel/UCRon4Aoacufhl_eD5mC18Yw" target="_blank">YouTube</a>
                    <a href="https://www.instagram.com/hackgcse/" target="_blank">Instagram</a>
                    <a>hackgcses@gmail.com</a>

                  </div>
                </div>
            </div>
        </header>

        <section class="dashboard first_dashboard">
            <h1 style="font-size:55px;">My Dashboard</h1>
            <a href="tutorial.php">
            <div class="dashboard_content first_element">
                <img class="icon" src="icon1.png">
                <span class="topicons"style="color:black">Tutorial</span>
            </div></a>
            <a href="comingsoon.php">
            <div class="dashboard_content second_element">
                <img class="icon" src="icon3.png">
                <span class="topicons"style="color:black">News</span>
            </div></a>
            <a href="community.php"><div class="dashboard_content third_element">
                <img class="icon" src="icon2.png">
                <span class="topicons"style="color:black">Community</span>
            </div></a>
        </section>

        <section class="dashboard second_dashboard">
            <h1>Pick a subject:</h1>
             <a href="biology.php"><div class="dashboard_content first_element">
                <img class="icon2" src="icon4.png">
                <span style="color:black">Biology</span>
            </div></a>
            <a href="chemistry.php">
            <div class="dashboard_content second_element">
                <img class="icon2" src="icon5.png">
                <span class="topicons"style="color:black">Chemistry</span>
            </div></a>
            <a href="physics.php">
            <div class="dashboard_content third_element">
                <img style="margin-top:35px;" class="physics" src="icon6.png">
                <span style="margin-top:15px;color:black" class="topicons">Physics</span>
            </div></a>
        </section>
        
        
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
	include_once 'dashboardfooter.php';
?>