	<?php
include_once 'header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="login.inc.php" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="Email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="Password" placeholder="Password" required/>
            </div>
			<input type="submit" name="submit" value="Log In" class="btn solid" />
			
            
		  </form>
          <?php 
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo "<p>Fill in all fields!</p>";
			}
			else if ($_GET["error"] == "wronglogin") {
				echo "<p>Incorrect email or password.</p>";
			}
		}
	?>
         
          <form action="signup.inc.php" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="Name" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="Email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="Password" placeholder="Create Password" required/>
            </div>
			<input type="submit" name="submit" value="Sign Up" class="btn" />
			
            
      </form>
      <?php 
		if (isset($_GET["error"])) {
			/*if ($_GET["error"] == "emptyinput") {
				echo "<p>Fill in all fields!</p>";
      }*/
      if ($_GET["error"] == "emailexists") {
				echo "<p>Email already exists.</p>";
			}
			else if ($_GET["error"] == "stmtfailed") {
				echo "<p>Something went wrong, try again!</p>";
			}
			else if ($_GET["error"] == "usernametaken") {
				echo "<p>Name already exists.</p>";
			}
			else if ($_GET["error"] == "none") {
				echo "<p>Sign-up successful!</p>";
			}
		}
	?>
	</div>
		  
		  
          
        
	  </div>
	  

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Create an account in 10 seconds! If you forget your password, just create a new account. Your email address doesn't need to be real. It's just required to save changes. :)          
            </p><br>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="vector2.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
                Please click here to sign in and access your dashboard.
            </p><br>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
            <img src="vector3.png" class="image" href="https://www.vecteezy.com/free-vector/autumn" alt="Autumn Leaves by Vecteezy" />
        </div>
      </div>
    </div>


<?php
	include_once 'footer.php';
?>
