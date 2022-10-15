<?php
include 'config.php';
session_start();
error_reporting(0);

if (isset($_POST["resetPassword"])) {
  $id = $_SESSION["user_id"];
  $password = mysqli_real_escape_string($conn, md5($_POST["new_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["cnew_password"]));
  if ($password === $cpassword) {
   
    $sql = "UPDATE users SET password='$password' WHERE id = '$id'";
    mysqli_query($conn, $sql);
    session_unset();
    session_destroy();
    echo "<script>alert('password updated sucessfully ! Login again !');window.location.href='login_page.php'</script>";
  } else {
      echo "<script>alert('Password did not match.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/ea356287ed.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&family=Roboto+Serif:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css" />  
<title>password update</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Update Password</h2>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="new_password" value="<?php echo $_POST["new_password"]; ?>" placeholder="New Password" autocomplete="off" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="cnew_password" value="<?php echo $_POST["cnew_password"]; ?>" placeholder="Confirm new Password" autocomplete="off" required/>
          </div>

          <input type="submit" value="update" name="resetPassword" class="btn solid" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <img src="img/update.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/ea356287ed.js" crossorigin="anonymous"></script>

</body>

</html>