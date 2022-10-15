<?php
include_once 'config.php';
session_start();
error_reporting(0);
if (isset($_POST["verify_email"]))
{
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $verification_code = mysqli_real_escape_string($conn,$_POST["verification_code"]);

    $sql = "UPDATE users SET status = 1 WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result  = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 0)
    {
      echo "<script>alert('Your Account is already verified ! You can login !');window.location.href='login_page.php'</script>";
    }
    else{
    echo "<script>alert('User registered sucessfully ! Login again !');window.location.href='login_page.php'</script>";}
    exit();
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
<title>Email Verification</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Email Verification</h2>
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>

          <div class="input-field">
          <i class="fa-solid fa-key"></i>
            <input type="text" name="verification_code" placeholder="Enter verification code" required  autocomplete="off" />
          </div>
          

          <input type="submit" name="verify_email" value="Verify Email" class="btn solid" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <img src="img/mail4.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/ea356287ed.js" crossorigin="anonymous"></script>

</body>

</html>