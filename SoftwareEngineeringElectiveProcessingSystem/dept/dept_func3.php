<?php
include '../config.php';
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bar_style.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
  table {
    border-collapse: collapse;
    width: 80%;
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
    .center {
  margin-left: auto;
  margin-right: auto;
}
.print button{
  
    float: right;
    margin-right: 150px;

}

.button-15 {
  background-image: linear-gradient(#42A1EC, #0070C9);
  border: 1px solid #0077CC;
  border-radius: 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  direction: ltr;
  display: block;
  font-family: "SF Pro Text","SF Pro Icons","AOS Icons","Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 17px;
  font-weight: 400;
  letter-spacing: -.022em;
  line-height: 1.47059;
  min-width: 30px;
  overflow: visible;
  padding: 4px 15px;
  text-align: center;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
}

.button-15:disabled {
  cursor: default;
  opacity: .3;
}

.button-15:hover {
  background-image: linear-gradient(#51A9EE, #147BCD);
  border-color: #1482D0;
  text-decoration: none;
}

.button-15:active {
  background-image: linear-gradient(#3D94D9, #0067B9);
  border-color: #006DBC;
  outline: none;
}

.button-15:focus {
  box-shadow: rgba(131, 192, 253, 0.5) 0 0 0 3px;
  outline: none;
}

@media print {
  body *{
    visibility: hidden;
  }
  .print-css, .print-css * {
    visibility: visible;

  }
  .print-css{
    position: absolute;
    left:0;
    top:0; 
}
}
  </style>
</head>
<body>
<div class="topnav">
    <div class="topnav-right">
  <a>Department Dashboard </a>
</div>
</div>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">&nbsp &nbspAmrita &nbspVishwa &nbsp&nbsp&nbspVidyapeetham</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

      <li>
        <a href="../dept_home.php">
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
       <a href="../dept/dept_func1.php">
        <i class='bx bx-select-multiple' ></i>
         <span class="links_name">Add an elective</span>
       </a>
       <span class="tooltip">Add an elective</span>
     </li>
     <li>
       <a href="../dept/dept_func2.php">
       <i class='bx bxs-group'></i>
         <span class="links_name">View Student List</span>
       </a>
       <span class="tooltip">View Student List</span>
     </li>
     <li>
       <a href="../dept/dept_func3.php">
       <i class='bx bxs-group'></i>
         <span class="links_name">View Faculty List</span>
       </a>
       <span class="tooltip">View Faculty List</span>
     </li>
     <li>
       <a href="../dept/dept_func4.php">
        <i class='bx bx-spreadsheet'></i>
         <span class="links_name">View Electives</span>
       </a>
       <span class="tooltip">View Electives</span>
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
<div class=print-css>
<h1 style="text-align:center; color: black;">FACULTIES HANDLING ELECTIVE COURSES </h1>
<table class="center">
<tr>
<th>Year</th>
<th>Semester</th>
<th>Course</th>
<th>Name</th>
</tr>
<?php
$sql = "SELECT co.year, co.semester, c.courseName, f.facultyName FROM CourseOfferHistory co, Courses c, Faculty f WHERE co.courseId = c.courseId AND co.facultyId = f.facultyId";
$result = mysqli_query($conn,$sql);
if($result->num_rows >0) 
{
while($row=$result->fetch_assoc()) {
echo "<tr><td>" . $row["year"]. "</td><td>" . $row["semester"] . "</td><td>"
. $row["courseName"]. "</td><td>". $row["facultyName"]. "</td></tr>";
}
echo "</table>";
} else { echo "no records found"; }

?>
</table></div>
<div class="print">
  <br>
  <button onclick="window.print()" type="button" class="button-15">Print Page</button>
</div>
</section>
  <script src="bar_script.js"></script>
</body>
</html>
