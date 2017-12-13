<div uk-grid>
	<div class="uk-width-1-2@m">
		<h1>CYP Mediendatenbank</h1>
	</div>
	<div class="uk-width-1-2@m" align="right">
        <?php if(isset($_SESSION['email'])) {
		echo '<p>Eingeloggt als <a href="#">' . $_SESSION['email'] . '</a> | <a href="page/logout.php">Logout</a></p>';
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
        <form class="uk-search uk-search-navbar uk-search-default">
            <a class="uk-search-icon" uk-search-icon href="#"></a>
            <input class="uk-search-input" type="search" placeholder="Suche...">
        </form>
    </div>';
    }
?>
</nav>
