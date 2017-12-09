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

?>

<div class="uk-box-shadow-medium uk-padding uk-position-center uk-text-center">
	<img class="uk-margin-bottom" style="vertical-align: middle;" width="140" height="120" src="../assets/img/logo.png" alt="CYP Logo">
  <form autocomplete="off">
    <div class="uk-text-left">
      <div class="uk-margin">
        <p>Bitte gib deine E-Mailadresse an und wir senden dir ein neues Passwort zu.</p>
          <label for="email" class="uk-text-left" style="margin-right: 16px;">E-Mail&nbsp;&nbsp;</label>
          <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <input name="email" class="uk-input" type="text" value="<?php echo $email; ?>" size="50">
              <span class="text-danger"><?php //TODO: echo  $emailError; ?></span>
          </div>
      </div>
    </div>
    <div class="uk-margin uk-text-center" uk-margin>
          <button class="uk-button uk-button-primary" name="btn-login">Neues Passwort zusenden</button>
      </div>
      <div class="uk-text-center-small uk-text-center">
            <a class="uk-link-muted" href="../page/login.php">Einloggen</a>
      </div>
  </form>
	<div class="uk-text-warning"><?php //TODO: echo $error_message; echo $success_message; ?></div>
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

