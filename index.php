<?php
session_start();
?>
<!DOCTYPE html>
<head>
<?php
	$page=@$_GET['page'];
	$pages=array('home','upload','login','uploadimg','uploadvid');
	//require_once(('meta/'.(in_array($page,$pages) ? $page : 'home')).'.php');
?>
	<title>Medienübersicht &ndash; CYP Mediendatenbank</title>
    <link rel="stylesheet" href="assets/css/uikit.min.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body>
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
	<div id="hideAll" style="display: none;"><p>Applikation wird geladen...</p></div>
	<script>
		document.getElementById("hideAll").style.display = "block";
	</script>
	<div class="uk-container uk-margin">
<?php
	require_once('db-connect.php');
	require_once('include/header.php'); 
	$page=@$_GET['page'];
	$pages=array('home', 'upload','login','uploadimg','uploadvid');
	require_once(('page/'.(in_array($page,$pages) ? $page : 'medienuebersicht')).'.php');
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
	<script>
		window.onload = function()
		{ document.getElementById("hideAll").style.display = "none"; }
	</script>
</body>
</html>
