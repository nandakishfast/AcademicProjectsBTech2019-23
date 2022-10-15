<?php
include '../config.php';
session_start();
error_reporting(0);
$id = $_SESSION["user_id"];
//echo "$id" 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    <title>Student Profile Page</title>
    <link rel="stylesheet" href="bar_style.css">
    <meta name="author" content="student" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>

<style>
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
    color: white;
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

  .topnav-right a {
    color: white;
  }



.student-profile .card {
    border-radius: 10px;
}

.student-profile .card .card-header .profile_img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 10px auto;
    border: 10px solid #ccc;
    border-radius: 50%;
}

.student-profile .card h3 {
    font-size: 20px;
    font-weight: 700;
}

.student-profile .card p {
    font-size: 16px;
    color: #000;
}

.student-profile .table th,
.student-profile .table td {
    font-size: 14px;
    padding: 5px 10px;
    color: #000;
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
      <h1 style="text-align:center; color: black;">YOUR PROFILE </h1><div class="student-profile py-4">
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="img/profile.png" alt="student dp">
            <?php
            $uname = "SELECT username FROM users WHERE id=$id";
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
$sql = "SELECT * FROM Student WHERE studentId =$sid";
$result = mysqli_query($conn,$sql);
if($result->num_rows >0) 
{
while($row=$result->fetch_assoc()) {
echo "<h3>" . $row["studentName"].  "</h3>";
}
}
else { echo "no records found"; }
?>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID:</strong>321000001</p>
            <p class="mb-0"><strong class="pr-1">Department:</strong>CSE</p>
            <p class="mb-0"><strong class="pr-1">Section:</strong>E</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Roll</th>
                <td width="2%">:</td>
                <td><?php
$uname = "SELECT username FROM users WHERE id=$id";
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
$sql = "SELECT * FROM Student WHERE studentId =$sid";
$result = mysqli_query($conn,$sql);
if($result->num_rows >0) 
{
while($row=$result->fetch_assoc()) {
echo "<p>" . $row["rollNo"].  "</p>";
}
}
else { echo "no records found"; }
?></td>
              </tr>
              <tr>
                <th width="30%">Academic Year	</th>
                <td width="2%">:</td>
                <td><?php
$uname = "SELECT username FROM users WHERE id=$id";
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
$sql = "SELECT * FROM Student WHERE studentId =$sid";
$result = mysqli_query($conn,$sql);
if($result->num_rows >0) 
{
while($row=$result->fetch_assoc()) {
echo "<p>" . $row["yearOfJoining"].  "</p>";
}
}
else { echo "no records found"; }
?></td>
              </tr>
              <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td>Male</td>
              </tr>
              <tr>
                <th width="30%">blood</th>
                <td width="2%">:</td>
                <td>O+</td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p>Secured top rank in National engineering Olympiad</p>
              <p>Won Awards in coding</p></div>
        </div>
      </div>
    </div>
  </div>
</div>


  </section>
  <script src="bar_script.js"></script>

</body>
</html>
