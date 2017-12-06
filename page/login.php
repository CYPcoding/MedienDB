<!DOCTYPE html>
<head>
  <title>Medienübersicht &ndash; CYP Mediendatenbank</title>
  <link rel="stylesheet" href="../assets/css/uikit.min.css" />
  <link rel="stylesheet" href="../assets/css/custom.css" />
</head>
<body>
  <div class="uk-container uk-margin">
<?php
  require_once('../db-connect.php');
  require_once('../include/header.php'); 

session_start();
require_once('../db-connect.php');
 
//it will never let open index(login) page if session is set
//if (isset($_SESSION['email'])!="" ) {
	//header("Location: home"); --> tbd
	//exit;
//}
 
$error = false;
 
if(isset($_POST['btn-login']) ) { 
  
	// prevent sql injections/ clear user invalid inputs
  	$email = trim($_POST['email']);
  	$email = strip_tags($email);
  	$email = htmlspecialchars($email);
  
  	$pass = trim($_POST['password']);
  	$pass = strip_tags($pass);
  	$pass = htmlspecialchars($pass);
  
  	if(empty($email)){
   		$error = true;
   		$emailError = "Please enter your email address.";
  	} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   		$error = true;
   		$emailError = "Please enter valid email address.";
  	}
  
  	if(empty($pass)){
   		$error = true;
   		$passError = "Please enter your password.";
  	}
  
  	// if there's no error, continue to login
  	if (!$error) {
   
   		//$password = hash('sha256', $pass); // password hashing using SHA256
  
  		$query = "SELECT id, email, password FROM users WHERE email='$email' AND password='$password'";
  		
  		//MD5 Password
  		//$query = "SELECT id, email, password FROM users WHERE email='$email' AND password='".md5($pass)."'";
   		
   		$result = mysqli_query($conn,$query);
   		$rows = mysqli_num_rows($result); // if email/password correct it returns must be 1 row
   
   		if($rows == 1) {
    		$_SESSION['email'] = $email;
    		header("Location: home");
   		} else {
    		$error_message = "Incorrect Credentials! Try again...";
   		} 
  	}
}
?>

<div class="uk-box-shadow-medium uk-padding uk-position-center uk-text-center">
	<img class="uk-margin-bottom" style="vertical-align: middle;" width="140" height="120" src="../assets/img/logo.png" alt="CYP Logo">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
	    <div class="uk-margin">
	        <div class="uk-inline">
	            <span class="uk-form-icon" uk-icon="icon: user"></span>
	            <input name="email" class="uk-input" type="text" placeholder="E-Mail" value="<?php echo $email; ?>">
	            <span class="text-danger"><?php echo $emailError; ?></span>
	        </div>
	    </div>
	    <div class="uk-margin">
	        <div class="uk-inline">
	            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
	            <input name="password" class="uk-input" type="text" placeholder="Passwort">
	            <span class="text-danger"><?php echo $passError; ?></span>
	    </div>
	    <div class="uk-margin" uk-margin>
	        <button class="uk-button uk-button-primary" name="btn-login">Login</button>
	    </div>
	    <div class="uk-text-center-small">
            <a class="uk-link-muted" href="#">Passwort vergessen?</a>
    	</div>
	</form>
	<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_message; ?></div>
</div> 
<?php
  require_once('../include/footer.php'); 
?>
  </div>
  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
  <script src="../assets/js/uikit.min.js"></script>
  <script src="../assets/js/uikit-icons.min.js"></script>
  <!-- TODO Infinite-Scroll implementieren
  <script src="../assets/js/infinite-scroll.pkgd.min.js"></script> -->
</body>
</html>

