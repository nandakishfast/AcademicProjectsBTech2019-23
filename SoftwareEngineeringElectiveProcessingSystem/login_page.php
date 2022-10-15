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

if (isset($_POST["signup"])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $email = mysqli_real_escape_string($conn, $_POST["signup_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["signup_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["signup_cpassword"]));
  $check_username = mysqli_num_rows(mysqli_query($conn, "SELECT username FROM users WHERE username='$username'"));
  
  if ($password !== $cpassword) {
    echo "<script>alert('Passwords did not match !');</script>";
  } elseif ($check_username > 0) {
    echo "<script>alert('Account has been already registered !');</script>";
  } else 
  {
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
        $mail->Subject = 'Account Email verification';
        $mail->Body    = '<p>Om Namah Shivaya,</p>
        <p>Your verification code is :<br> <b style="font-size: 20px;">' . $verification_code . '</b></p>
        <p>If you have any queries, please write to autoelectiveprocess@gmail.com</p>';
        $mail->send();

        $sql = "INSERT INTO users (username,email,password,verification_code,status) VALUES ('$username','$email','$password','$verification_code',0)";
        if (mysqli_query($conn, $sql)) {
          //echo "<script>alert('User registered sucessfully ! Login again !');window.location.href='login_page.php'</script>";
          header("Location: email-verification.php?email=" . $email);
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



    
  }
}

if (isset($_POST["signin"])) {

  $susername = mysqli_real_escape_string($conn, $_POST["susername"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
  
  if ((substr( $susername,0,3)==="CB.")||(substr( $susername,0,3)==="cb.")){
  $check_user = mysqli_query($conn,"SELECT * FROM users WHERE username='$susername' AND password='$password' AND status=1");
  $check_user_verification = mysqli_query($conn,"SELECT * FROM users WHERE username='$susername' AND password='$password' AND status=0");

  if (mysqli_num_rows($check_user_verification) > 0) 
  {
    echo "<script>alert('Account has been registered ! Please verify your email to login !');window.location.href='login_page.php'</script>";
  }
  else if (mysqli_num_rows($check_user) > 0)
  {
    $row = mysqli_fetch_assoc($check_user);
    $_SESSION["user_id"] = $row['id'];
    header("Location: student_home.php");
  } 
  else {
        echo "<script>alert('Invalid credentials. Please try again.');window.location.href='login_page.php'</script>";
  }
}

 if ((substr( $susername,0,4)==="FAC.")||(substr( $susername,0,4)==="fac.")){
  
  $check_user = mysqli_query($conn,"SELECT id FROM users WHERE username='$susername' AND password='$password'");
  $check_user_verification = mysqli_query($conn,"SELECT * FROM users WHERE username='$susername' AND password='$password' AND status=0");

  if (mysqli_num_rows($check_user_verification) > 0) 
  {
    echo "<script>alert('Account has been registered ! Please verify your email to login !');window.location.href='login_page.php'</script>";
  }
  else if (mysqli_num_rows($check_user) > 0) {
    $row = mysqli_fetch_assoc($check_user);
    $_SESSION["user_id"] = $row['id'];
    header("Location: faculty_home.php");
  } else {
    echo "<script>alert('Invalid credentials. Please try again.');window.location.href='login_page.php'</script>";
  }
}

 if ((substr( $susername,0,5)==="DEPT.")||(substr( $susername,0,5)==="dept.")){
  $check_user = mysqli_query($conn,"SELECT id FROM users WHERE username='$susername' AND password='$password'");
  $check_user_verification = mysqli_query($conn,"SELECT * FROM users WHERE username='$susername' AND password='$password' AND status=0");

  if (mysqli_num_rows($check_user_verification) > 0) 
  {
    echo "<script>alert('Account has been registered ! Please verify your email to login !');window.location.href='login_page.php'</script>";
  }
  else if (mysqli_num_rows($check_user) > 0) {
    $row = mysqli_fetch_assoc($check_user);
    $_SESSION["user_id"] = $row['id'];
    header("Location: dept_home.php");
  } else {
    echo "<script>alert('Invalid credentials. Please try again.');window.location.href='login_page.php'</script>";
  }
}

 if ((substr( $susername,0,4)==="ADM.")||(substr( $susername,0,3)==="adm.")){
  $check_user = mysqli_query($conn,"SELECT id FROM users WHERE username='$susername' AND password='$password'");
  $check_user_verification = mysqli_query($conn,"SELECT * FROM users WHERE username='$susername' AND password='$password' AND status=0");

  if (mysqli_num_rows($check_user_verification) > 0) 
  {
    echo "<script>alert('Account has been registered ! Please verify your email to login !');window.location.href='login_page.php'</script>";
  }
  else if (mysqli_num_rows($check_user) > 0) {
    $row = mysqli_fetch_assoc($check_user);
    $_SESSION["user_id"] = $row['id'];
    header("Location: admin_home.php");
  } else {
    echo "<script>alert('Invalid credentials. Please try again.');window.location.href='login_page.php'</script>";
  }
}
else {
  echo "<script>alert('Invalid credentials. Please try again.');window.location.href='login_page.php'</script>";
}}

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
    <title>Login page</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="POST">
            <h2 class="titleo">AMRITA UNIVERSITY ELECTIVE</h2>
            <h2 class="titleo2">PROCESSING SYSTEM</h2><br>
            <h3 class="title">Sign in</h3>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username (Roll no / Emp ID)" name="susername" value="<?php echo $_POST['susername'];?>" autocomplete="off" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" autocomplete="off" required/>
            </div>
            <input type="submit" value="Login" class="btn solid" name="signin"/>
            <p class="social-text">Or Sign in using other platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fa-brands fa-microsoft"></i>
              </a>
            </div>
            <br><br>
            <p class="text">
              Registered but Verification Pending !
              <a href='./verify_email.php'>Click here</a> 
            </p>
            <br>
            <p class="text">
              Forgotten your password or your login details?
              <a href='./pass_mail_verify.php'>Get help</a> signing in 
            </p>
          </form>
          <form class="sign-up-form" action="login_page.php" method="POST">
            <h2 class="titleo">AMRITA UNIVERSITY ELECTIVE</h2>
            <h2 class="titleo2">PROCESSING SYSTEM</h2><br>
            <h3 class="title">Sign up</h3>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" value="<?php echo $_POST["username"]; ?>" placeholder="Username (Roll no / Emp ID)" autocomplete="off" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="signup_email" value="<?php echo $_POST["signup_email"]; ?>" placeholder="University Email id " aria-describedby="emailHelp"
              autocomplete="off" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="signup_password" value="<?php echo $_POST["signup_password"]; ?>" placeholder="Password" autocomplete="off" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="signup_cpassword" value="<?php echo $_POST["signup_cpassword"]; ?>" placeholder="Confirm Password" autocomplete="off" required/>
            </div>
            
            <input type="submit" class="btn" value="Sign up" name="signup"/>
            <br>
            <p class="text">
              Need some help ? 
              <a href='./pass_mail_verify.php'>Click here</a> 
            </p>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New User ?</h3><br>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Existing User ?</h3>
            <br>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>


    <script src="loginpage_swing.js"></script>
    </div>
  </body>
</html>