<?php
session_start();
require_once 'db-connect.php';
 
// if session is not set this will redirect to login page
if( !isset($_SESSION['email']) ) {
  	header("Location: page/login.php");
	exit;
}
 
// select loggedin users detail
$query = "SELECT * FROM users WHERE email=".$_SESSION['email'];
$result = mysqli_query($conn,$query);
$userRow = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<head>
<?php
	$page=@$_GET['page'];
	$pages=array('home','medien');
	//require_once(('meta/'.(in_array($page,$pages) ? $page : 'home')).'.php');
?>
	<title>Medienübersicht &ndash; CYP Mediendatenbank</title>
    <link rel="stylesheet" href="assets/css/uikit.min.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body>
	<div class="uk-container uk-margin">
<?php
	require_once('db-connect.php');
	require_once('include/header.php'); 
	$page=@$_GET['page'];
	$pages=array('home','upload','login');
	require_once(('page/'.(in_array($page,$pages) ? $page : 'medienuebersicht')).'.php');
	require_once('include/footer.php');	
?>
	</div>
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
	<script src="assets/js/uikit.min.js"></script>
	<script src="assets/js/uikit-icons.min.js"></script>
	<!-- TODO Infinite-Scroll implementieren
	<script src="assets/js/infinite-scroll.pkgd.min.js"></script> -->
</body>
</html>
