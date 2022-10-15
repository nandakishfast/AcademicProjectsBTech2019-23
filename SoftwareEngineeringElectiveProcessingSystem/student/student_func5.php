<?php
include '../config.php';
session_start();
error_reporting(0);
$userid = $_SESSION["user_id"];
//echo $userid;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bar_style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<title>Elective Preference Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@-webkit-keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }
  
  @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }
  
  @media only screen and (max-width: 300px) {
    .text {font-size: 11px}
  }
  body 
  {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }
  
  .topnav {
    overflow: hidden;
    background-color: #6d6666;
  }
  
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 22px 75px 22px 75px;
    text-decoration: none;
    font-size: 17px;
  }
  
  
  .topnav a.active {
    background-color: #04AA6D;
    color: white;
  }
  
  .topnav-right {
    padding-top: 20px;
    float: right;
  }
  html, body 
      {
      min-height: 100%;
      }
      body, div, form, input, p 
      { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 
      {
      font-weight: 400;
      }
      h4 
      {
      margin-bottom: 0;
      }
      hr 
      {
      margin: 20px 0;
      }
      span.required 
      {
      color: red;
      }
      .main-block 
      {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 3px;
      }
      form 
      {
      width: 100%;
      padding: 20px;
      box-shadow: 0 2px 5px #ccc; 
      background: #fff;
      }
      th, td 
      {
      width: 12%;
      text-align: center;
      vertical-align: unset;
      line-height: 18px;
      font-weight: 400;
      word-break: break-all;
      }
      .first-col 
      {
      width: 38%;
      text-align: left;
      }
      textarea:hover 
      {
      border: 1px solid #095484;
      outline: none;
      }
      .comments-block, .radio-block 
      {
      margin: 30px 0;
      }
      .comments, question, .answer, .question-answer, table 
      {
      width: 100%;
      }
      .comments 
      {
      margin: 0;
      }
      small 
      {
      display: block;
      line-height: 18px;
      opacity: 0.5;
      }
      textarea 
      {
      width: calc(100% - 6px);
      }
      .question-answer >div 
      {
      display: inline-block;
      margin-left: 30px;
      }
      .btn-block 
      {
      text-align: center;
      }
      button 
      {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover 
      {
      background: #0666a3;
      }
      @media (min-width: 568px) 
      {
      .comments-block, .radio-block 
      {
      display: flex;
      justify-content: space-between;
      }
      .comments  
      {
      width: 30%;
      }
      .answer 
      {
      width: 70%;
      }
      .question, .question-answer 
      {
      width: 50%;
      }
      th, td 
      {
      word-break: keep-all;
      }
      }

  </style>
</head>
<body>
<div class="topnav">
    <div class="topnav-right">
  <a> Student Dashboard </a>
  </div>
</div>
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">&nbsp &nbspAmrita &nbspVishwa &nbsp&nbsp&nbspVidyapeetham</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

      <li>
        <a href="../student_home.php">
          <i class='bx bxs-home'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a href="../student/student_func1.php">
        <i class='bx bxs-user-detail'></i>
         <span class="links_name">Profile</span>
       </a>
       <span class="tooltip">Profile</span>
     </li>
     <li>
       <a href="../update_pass.php">
        <i class='bx bx-key'></i>
         <span class="links_name">Update Password</span>
       </a>
       <span class="tooltip">Update Password</span>
     </li>
     <li>
       <a href="../student/student_func2.php">
        <i class='bx bx-select-multiple' ></i>
         <span class="links_name">Cast Preference</span>
       </a>
       <span class="tooltip">Cast Preference</span>
     </li>
     <li>
       <a href="../student/student_func3.php">
        <i class='bx bx-spreadsheet'></i>
         <span class="links_name">View Courses </span>
       </a>
       <span class="tooltip">View Courses</span>
     </li>
     <li>
       <a href="../student/student_func4.php">
        <i class='bx bxs-group'></i>
         <span class="links_name">View Faculties</span>
       </a>
       <span class="tooltip">View Faculties</span>
     </li>
     
     <li>
      <a href="../logout.php">
        <i class='bx bx-log-out'></i>
        <span class="links_name">Logout</span>
      </a>
      <span class="tooltip">Logout</span>
    </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.png" alt="profileImg">
           <div class="name_job">
             <div class="name">Karan M</div>
             <div class="job">CB.EN.U4CSE19428</div>
           </div>
         </div>
         <i class='bx bxs-user-pin' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <section class="home-section">
</div>
<div class="main-block">
        <form class="classesName" align="center" action="./student_func6.php" method="POST">
        <h1 style="text-align: center;">Elective Preference Form</h1>
        <br>
        <br>
        <?php 
        if (isset($_POST['submit']))
        {
          //echo $userid;
          $uname = "SELECT username FROM users WHERE id=$userid";
$username = mysqli_query($conn,$uname);
          $r = $username->fetch_assoc();
          $usrname = $r["username"];

          $usname =  strval($usrname);
          //echo $usname;
          //echo gettype($usname);
          $studentid = "SELECT studentId From Student WHERE username='$usname'";
          $student=mysqli_query($conn,$studentid);
          /*if($student->num_rows >0) 
{
while($row=$studentid->fetch_assoc()) {
echo "<h3>" . $row["studentid"].  "</h3>";
}
}*/
          $s = $student->fetch_assoc();
          $sid = $s["studentId"];
          //echo $sid;
          $_SESSION['studentId'] = $sid;
          $_SESSION['processid'] = $_POST["process"];
          $id = $_POST["process"];
          $query = "SELECT * from CourseOfferHistory JOIN CoursesUnderElectiveProcess ON CourseOfferHistory.offerId = CoursesUnderElectiveProcess.offerId WHERE CoursesUnderElectiveProcess.processId=$id";

          $result = mysqli_query($conn,$query);
          $count = mysqli_num_rows($result);
          foreach($result as $row)
          {
            echo '<br><br><h2> '.$row["offerName"].'</h2><br><br>';
            echo '<input style="width:100px" type="number" name="'.$row["offerName"].'" min="1" max="'.$count.'"required="">';
          }
        }
      ?>
      <div class="btn-block">
          <br>

            <input type="submit" value="submit" onclick="return val()" name="submit">
        </div>
      </form>
    </div>
<script type="text/javascript">
  

//frm.addEventListener('submit', function(e) {
  function val()
  {
    var frm = document.querySelector('form.classesName');
var inputs = frm.querySelectorAll('input[type=number]');
    var classArr = [];

    for(var i = 0; i < inputs.length; i++) {
        if(classArr.indexOf(inputs[i].value) != -1) {
            inputs[i].style.backgroundColor = "red";
            return false;
        }
        else
        {
            classArr.push(inputs[i].value);
        }
    }
    return true;
}
</script>
</script>
<script src="bar_script.js"></script>
</body>
</html>
