<?php

if(isset($_SESSION['email'])){
    // gets Username
    $email_SS = $_SESSION['email'];
    $sql_username = "SELECT name FROM users WHERE email='$email_SS';";
    $result_username = mysqli_query($conn, $sql_username);
    $resultCheck_username = mysqli_num_rows($result_username);

    if($resultCheck_username > 0){
        while($row_u = mysqli_fetch_assoc($result_username)){
            $userName = $row_u['name'];
        }
    }
}


?>

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
                    <li><a href="home" >Medien</a></li>
                    <li><a href="upload">Upload</a></li>
                    <li><a href="userprofile">Mein Konto</a></li>
                </ul>';
        }
        ?>

    </div>
    <?php
    if($page=='') {
        echo '<div class="uk-navbar-item uk-navbar-right">
        <form class="uk-search uk-search-navbar uk-search-default" name="searchform" action="" method="get">
            <a class="uk-search-icon" uk-search-icon href="#"></a>
            <input id="searchstring" name="s" class="uk-search-input" type="search" placeholder="Suche...">
        </form>
    </div>';
    }
?>
</nav>
