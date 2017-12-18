<?php

// include 'get_userdetails.php';
session_start();

?>
<noscript>JavaScript ist auf diesem Browser DEAKTIVIERT. Damit die Mediendatenbank ordnungsgemaess funktioniert, muessen Sie JavaScript zwingend aktivieren.</noscript>
<div uk-grid>
	<div class="uk-width-1-2@m">
		<h1>CYP Mediendatenbank</h1>
	</div>
	<div class="uk-width-1-2@m" align="right">
        <?php if(isset($_SESSION['email'])) {
		echo '<p>Eingeloggt als <a href="userprofile">' . $userName . '</a> | <a href="page/logout.php">Logout</a></p>';
        }
        ?>
	</div>
</div>

<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-top">

        <?php if(!isset($_SESSION['email'])) {
            echo '<ul id="navbar1" class="uk-navbar-nav">
            <li><a href="login">Login</a></li>
        </ul>';
        } else if(isset($_SESSION['email'])) {
            echo'
                <ul id="navbar2" class="uk-navbar-nav">
                    <li><a href="bilder">Bilder</a></li>
                    <li><a href="videos">Videos</a></li>
                    <li><a href="upload">Upload</a></li>
                    <li><a href="userprofile">Mein Konto</a></li>
                </ul>';
        }
        ?>

    </div>
    <?php
    if($page=='bilder' || $page=='videos') {
        echo '<div class="uk-navbar-item uk-navbar-right"><button class="uk-button uk-button-small" uk-toggle="target: #filters; animation: uk-animation-slide-top">Tag-Cloud öffnen</button></div><div class="uk-navbar-item uk-navbar-right">
        <form class="uk-search uk-search-navbar uk-search-default" name="searchform" action="" method="get">
            <a class="uk-search-icon" uk-search-icon href="#"></a>
            <input id="s" name="s" class="uk-search-input" type="search" placeholder="Suchen ';
            if($page=='bilder'){
                echo 'oder Bild-ID';
            } else if ($page=='videos'){
                echo 'oder Video-ID';
            }
            echo ' eingeben">
        </form>
    </div>';
    }
?>
</nav>
