<?php
include '../config.php';
session_start();
error_reporting(0);
$query = "SELECT * FROM ElectiveProcess";

$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>

<title>Elective Preference Form</title>
<link rel="stylesheet" href="bar_style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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

<div class="main-block">
      <form align="center" action="./student_func7.php" method="POST">
        <h1 style="text-align: center;">COURSES</h1>
        <br>
        <br>
        <br>
        <h1>Choose batch</h1>
        <br>
        <br>
      <select id="process" name="process" class="process" style="width:500px;font-size: 20px;text-align: center;">
      <?php

      foreach ($result as $row) 
      {
         echo '<option value="'.$row["processId"].'">'.$row["processName"].'</option>';
      }
      ?>
  </select><br>
    <br>
      </div>
        <div class="btn-block">
          <br>
            <input style= "width: 200px;height: 50px;" type="submit" value="submit" name="submit">
            <br>
            <br>
        </div>
      </form>
</div>
<script src="bar_script.js"></script>
</body>
</html>
