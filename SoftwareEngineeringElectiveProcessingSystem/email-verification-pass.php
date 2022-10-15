<?php
include_once 'config.php';
session_start();
error_reporting(0);
if (isset($_POST["verify_email"]))
{
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $verification_code = mysqli_real_escape_string($conn,$_POST["verification_code"]);
    
    $sql = "SELECT * FROM users WHERE verification_code = '$verification_code' AND username = '$username' ";
    $result  = mysqli_num_rows(mysqli_query($conn, $sql));

    if ($result > 0)
    {
        header("Location: reset_password.php?username=" . $username);
    }
    else{
    echo "<script>alert('Oops! Incorrect code try agin !');window.location.href='login_page.php'</script>";}
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
            <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>" required>

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