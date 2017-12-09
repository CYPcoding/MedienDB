<div uk-grid>
	<div class="uk-width-1-2@m">
		<h1>CYP Mediendatenbank</h1>
	</div>
	<div class="uk-width-1-2@m" align="right">
		<p>Eingeloggt als <a href="#">Sabrina Thoma</a> | <a href="logout">Logout</a></p>
	</div>
</div>

<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-top">

        <!-- TODO für Marcel
            Wenn Benutzer nicht eingeloggt ist, sollte die erste Navbar angzeigt werden.
            Wenn Benutezr eingeloggt ist, sollte die zweite Navbar angezeigt werden. -->

        <!-- Sobald PHP-Code steht kann dieser Teil aktiviert werden
        <ul id="navbar1" class="uk-navbar-nav">
            <li <?php //echo (@$_GET['page']=='login' ? 'class="uk-active"' : null); ?>><a href="login">Login</a></li>
        </ul>
        -->

        <ul id="navbar2" class="uk-navbar-nav">
            <li <?php echo (@$_GET['page']=='home' ? 'class="uk-active"' : null); ?>><a href="../home" >Medien</a></li>
            <li <?php echo (@$_GET['page']=='upload' ? 'class="uk-active"' : null); ?>><a href="../upload">Upload</a></li>
            <li><a href="#">Mein Konto</a></li>
        </ul>

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
