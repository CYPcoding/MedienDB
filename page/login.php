<?php
 
if (isset($_SESSION['email'])) {
  header("Location: bilder");
  exit;
}
 
if(isset($_POST['login']) ) { 
  
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Error handlers
    // Check if inputs are empty
    if(empty($email) || empty($password)) {
        header("Location: login?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1) {
            header("Location: login?login=error");
            exit();
        } else if($row = mysqli_fetch_assoc($result)) {
            // De-hashing the password
            $hashedPwdCheck = password_verify($password, $row['password']);
            if($hashedPwdCheck == false) {
                header("Location: login?login=error");
                exit();
            } elseif($hashedPwdCheck == true) {
                // Logging the user in
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                header("Location: bilder?login=success");
                exit();
            }
        }
    }
}

?>

<div class="uk-box-shadow-medium uk-padding uk-position-center uk-text-center login">
  <img class="uk-margin-bottom" style="vertical-align: middle;" width="140" height="120" src="assets/img/logo.png" alt="CYP Logo">
  <form action="login" method="post" autocomplete="off">
    <div class="uk-text-left">
      <div class="uk-margin">
          <label for="email" class="uk-text-left" style="margin-right: 16px;">E-Mail&nbsp;&nbsp;</label>
          <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <input name="email" class="uk-input" type="text" value="<?php echo $email; ?>">
              <span class="uk-text-danger"><?php echo $emailError; ?></span>
          </div>
      </div>
      <div class="uk-margin">
          <label for="password" class="uk-text-left">Passwort&nbsp;&nbsp;</label>
          <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: lock"></span>
              <input type="password" name="password" class="uk-input" type="text">
              <span class="uk-text-danger"><?php echo $passError; ?></span>
          </div>
      </div>
      <div class="uk-margin uk-text-center" uk-margin>
          <button class="uk-button uk-button-primary" name="login" type="submit">Login</button>
      </div>
      <div class="uk-text-center-small uk-text-center">
            <p class="uk-text-danger"><?php echo $error_message; echo $success_message; ?></p>
            <a class="uk-link-muted" href="pwforgot">Passwort vergessen?</a>
      </div>
    </div>
  </form>
</div> 
<?php

?>