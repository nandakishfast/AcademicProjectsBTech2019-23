<?php
include_once 'config.php';
session_start();
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include_once 'vendor/autoload.php';

if (isset($_SESSION["user_id"])) {
  header("Location: welcome.php");
}

if (isset($_POST["verify"])) 
{
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'autoelectiveprocess@gmail.com';
        $mail->Password = 'jptapduwhbxxhbnd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('autoelectiveprocess@gmail.com', 'Elective Processing System');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Subject = 'Password update request ';
        $mail->Body    = '<p>Om Namah Shivaya,</p>
        <p>Your verification code is :<br> <b style="font-size: 20px;">' . $verification_code . '</b></p>
        <p>If you have any queries, please write to autoelectiveprocess@gmail.com</p>';
        $mail->send();

        $sql = "UPDATE users SET verification_code = '$verification_code'  WHERE email = '" . $email . "' AND username = '" . $username. "'";
        if (mysqli_query($conn, $sql)) {
          //echo "<script>alert('User registered sucessfully ! Login again !');window.location.href='login_page.php'</script>";
          header("Location: email-verification-pass.php?username=" . $username);
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/ea356287ed.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&family=Roboto+Serif:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Email verification page</title>
  </head>
  <body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Password update request</h2>
          <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" value="<?php echo $_POST["username"]; ?>" placeholder="Username (Roll no / Emp ID)" autocomplete="off" required/>
            </div>
          <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" value="<?php echo $_POST["email"]; ?>" placeholder="Email id " aria-describedby="emailHelp"
              autocomplete="off" required />
            </div>
          

          <input type="submit" name="verify" value="submit" class="btn solid" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <img src="img/reset.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/ea356287ed.js" crossorigin="anonymous"></script>

</body>

</html>