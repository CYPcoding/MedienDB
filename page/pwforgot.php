<?php

if(isset($_POST['resetpw'])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  if(empty($email)){
    header("Location: pwforgot?reset=empty");
    exit();
  } else {
    
    // generate random password
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $password = array();
    $alpha_length = strlen($data) - 1;
    for($i = 0; $i < 8; $i++) {
      $n = rand(0, $alpha_length);
      $password[] = $data[$n];
    }
    $newPassword = implode($password);
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // save new password in db
    $sql = "UPDATE users
            SET password = '$hashedPassword'
            WHERE email = '$email';";
    mysqli_query($conn, $sql);

    // send email with new password
    $to = $email;;
    $subject = "Neues Passwort fuer MedienDB";
    $txt = "Ihr neues Passwort lautet " . $newPassword;
    $headers = "From: vlado.repic@cyp.ch";
    mail($to,$subject,$txt,$headers);

  }
}

?>

<div class="uk-box-shadow-medium uk-padding uk-position-center uk-text-center">
	<img class="uk-margin-bottom" style="vertical-align: middle;" width="140" height="120" src="assets/img/logo.png" alt="CYP Logo">
  <form action="pwforgot" method="post" autocomplete="off">
    <div class="uk-text-left">
      <div class="uk-margin">
        <p>Bitte gib deine E-Mailadresse an und wir senden dir ein neues Passwort zu.</p>
          <label for="email" class="uk-text-left" style="margin-right: 16px;">E-Mail&nbsp;&nbsp;</label>
          <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <input name="email" class="uk-input" type="text" value="<?php echo $email; ?>" size="50">
          </div>
      </div>
    </div>
    <div class="uk-margin uk-text-center" uk-margin>
          <button class="uk-button uk-button-primary" name="resetpw" type="submit">Neues Passwort zusenden</button>
      </div>
      <div class="uk-text-center-small uk-text-center">
            <a class="uk-link-muted" href="login">Einloggen</a>
      </div>
  </form>
</div> 
<?php

?>
