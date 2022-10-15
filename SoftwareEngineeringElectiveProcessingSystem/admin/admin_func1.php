<?php
include '../config.php';
session_start();
//error_reporting(0);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>


<?php
  if(isset($_POST['submit']))
  {
    $course = $_POST['ChooseCourse'];
    $faculty = $_POST['Faculty'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $cap = $_POST['cap'];
    $offername = $_POST['offername'];
    $sql_insert = 
      "INSERT INTO CourseOfferHistory(offerName,courseId,year,semester,facultyId,studentCap)
          VALUES ('$offername','$course','$year','$sem','$faculty','$cap')";
          
        if(mysqli_query($conn,$sql_insert))
      {
          echo '<script>alert("Course offer added sucessfully")</script>';
      }
      else{
        echo '<script>alert("Some trouble")</script>'; 
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bar_style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}


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
  
  table {
    border-collapse: collapse;
    width: 100%;
    color: black;
    font-family: 'PT Sans', sans-serif;
    font-size: 25px;
    text-align: left;
    }
    th {
    background-color: #a2133b;
    color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2}

</style>
</head>
<body>

<div class="topnav">
    <div class="topnav-right">
  <a>Admin Dashboard </a>
</div>
</div>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">&nbsp &nbspAmrita &nbspVishwa &nbsp&nbsp&nbspVidyapeetham</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

      <li>
        <a href="../admin_home.php">
          <i class='bx bxs-home'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
     <li>
       <a href="../update_pass.php">
        <i class='bx bx-key'></i>
         <span class="links_name">Update Password</span>
       </a>
       <span class="tooltip">Update Password</span>
     </li>
     <li>
       <a href="../admin/admin_func1.php">
       <i class='bx bxs-offer'></i>
         <span class="links_name">Add a course offer</span>
       </a>
       <span class="tooltip">Add a course offer</span>
     </li>
     <li>
       <a href="../admin/admin_func2.php">
       <i class='bx bx-code-alt'></i>
         <span class="links_name">Allocate Electives</span>
       </a>
       <span class="tooltip">Allocate Electives</span>
     </li>
     <li>
       <a href="../admin/admin_func3.php">
       <i class='bx bxs-hand-up'></i>
         <span class="links_name">Set courses for Elective</span>
       </a>
       <span class="tooltip">Set courses for Elective</span>
     </li>
     <li>
       <a href="../admin/admin_func5.php">
       <i class='bx bxs-group' ></i>
         <span class="links_name">Add Faculty </span>
       </a>
       <span class="tooltip">Add Faculty</span>
     </li>
     <li>
       <a href="../admin/admin_func6.php">
       <i class='bx bx-group' ></i>
         <span class="links_name">Add Student </span>
       </a>
       <span class="tooltip">Add Student </span>
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

<center>
<br><br><br>
<form method="POST">
  
  <label>Select a Course to offer</label>
  <select name="ChooseCourse">

  <?php 
    $sql = "SELECT courseId, courseName FROM Courses";
    $result = mysqli_query($conn,$sql);

    while($row=$result->fetch_assoc()) {

      echo '<option value="' .$row["courseId"].  '">'. $row["courseName"] .'</option>';
      }

  ?>
  </select>
  <br>
  <label>Offer Name</label>
  <input type="text" name="offername" required><br>
  <label>Year</label>
  <input type="number" min="1990" max="3000" name="year" required><br>
  <label>Semester</label>
  <input type="number" min="1" max="10" name="sem" required><br>
  <label>Student Cap</label>
  <input type="number" min="0" max="1000" name="cap" required><br>

  <label>Select Faculty Handling</label>
  <select name="Faculty">

  <?php 
    $sql = "SELECT facultyId, facultyName FROM Faculty";
    $result = mysqli_query($conn,$sql);

    while($row=$result->fetch_assoc()) {

      echo '<option value="' .$row["facultyId"].  '">'. $row["facultyName"] .'</option>';
      }

  ?>
  </select><br>
  <input type="submit" value="submit" name="submit">
</form>
<br>
</section>
  <script src="bar_script.js"></script>
</body>
</html>
