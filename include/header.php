<div uk-grid>
	<div class="uk-width-1-2@m">
		<h1>CYP Mediendatenbank</h1>
	</div>
	<div class="uk-width-1-2@m" align="right">
        <?php if(isset($_SESSION['email'])) {
		echo '<p>Eingeloggt als <a href="#">' . $_SESSION['email'] . '</a>';
        }
        ?>
         | <a href="page/logout.php">Logout</a></p>
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
                    <li><a href="#">Mein Konto</a></li>
                </ul>';
        }
        ?>

    </div>
    <div class="uk-navbar-right">
        <div>
            <a class="uk-navbar-toggle" uk-search-icon href="#"></a>
            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Suche..." autofocus>
                </form>
            </div>
        </div>
    </div>
</nav>
