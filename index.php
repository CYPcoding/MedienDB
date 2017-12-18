<?php
session_start();
require_once 'db-connect.php';
require_once('include/get_userdetails.php');
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
<?php
	$page=@$_GET['page'];
	$pages=array('bilder','login','uploadimg','uploadvid', 'upload', 'userprofile', 'userprofiledc', 'videos', 'pwforgot');
	require_once(('page/meta/'.(in_array($page,$pages) ? $page : '../login')).'.php');
?>
	<title>Medienübersicht &ndash; CYP Mediendatenbank</title>
    <link rel="stylesheet" href="assets/css/uikit.min.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <style>
    	div#load_screen {
    		background: #333;
    		opacity: 0.5;
    		position: fixed;
    		z-index: 10;
    		top: 0px;
    		width: 100%;
    		height: 100vh;
    	}
    	div#load_screen > div#loading {
    		color: #fff;
    		width: 600px;
    		height: 24px;
    		margin: 200px auto;
    	}
    	div#load_screen > div#loading > p {
    		font-size: 48px;
    		text-align: center;
    	}
    </style>
    <script>
    	window.addEventListener("load", function() {
    		var load_screen = document.getElementById("load_screen");
    		document.body.removeChild(load_screen);
    	});
    </script>
</head>
<body>
	<div id="load_screen">
		<div id="loading"><p>Applikation wird geladen</p></div>
	</div>
	<style>
	#hideAll {
	   position: fixed;
	   left: 0px; 
	   right: 0px; 
	   top: 0px; 
	   bottom: 0px; 
	   background-color: white;
	   z-index: 9999;
	 }
	</style>
	<div class="uk-container uk-margin">
<?php
	require_once('include/header.php'); 
	require_once(('page/'.(in_array($page,$pages) ? $page : 'index')).'.php');

?>

	<div id="footer">

<?php
	require_once('include/footer.php');
?>

	</div>
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
