<?php
include '../config.php';
session_start();
error_reporting(0);
?>

<?php
  if(isset($_POST['submit']))
  {
    $courseNa = $_POST['course'];
    $credit = $_POST['credits'];
    $programId = $_POST['programId'];
    $sql_insert = 
      "INSERT INTO Courses(courseName,credits,programId)
          VALUES ('$courseNa','$credit','$programId')";
          
        if(mysqli_query($conn,$sql_insert))
      {
          echo '<script>alert("Course added sucessfully")</script>';
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
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

.container:hover input ~ .checkmark {
  background-color: #ccc;
}

.container input:checked ~ .checkmark {
  background-color: #A2133B;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}


.container input:checked ~ .checkmark:after {
  display: block;
}


.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 30%;
	background: white;
}



form {
  width: 30%;
  margin: 60px auto;
  background: #efefef;
  padding: 60px 120px 80px 120px;
  text-align: center;
  -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
  box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}


label {
  display: block;
  position: relative;
  margin: 40px 0px;
}

.label-txt {
  position: absolute;
  top: -1.6em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: rgb(120,120,120);
  transition: ease .3s;
}


.input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
}

.line-box {
  position: relative;
  width: 100%;
  height: 1px;
  background: #BCBCBC;
}

.line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: #A2133B;
  transition: ease .6s;
} 



.input:focus + .line-box .line {
  width: 100%;
}

.label-active {
  top: -3em;
}

button {
  display: inline-block;
  padding: 12px 24px;
  background: rgb(220,220,220);
  font-weight: bold;
  color: rgb(120,120,120);
  border: none;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
  transition: ease .3s;
} 

button:hover {
  background: #A2133B;
  color: #ffffff;
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

<h1 style="text-align:center; color: black;">Add a course</h1>
<div>
  
  <form  method="POST">  
      <label>
        <input type="text" class="input" name="course" placeholder="Enter Course Name" required/>
          <div class="line-box">
            <div class="line"></div>
          </div>
      </label>
      
      <label>
        <input type="number" min="1" max="20" class="input" name="credits" placeholder="Enter the Credits" required/>
          <div class="line-box">
            <div class="line"></div>
          </div>
      
          <label>Select a Program </label>
  <select name="programId">

  <?php 
    $sql = "SELECT programId, programName FROM Programs";
    $result = mysqli_query($conn,$sql);

    while($row=$result->fetch_assoc()) {

      echo '<option value="' .$row["programId"].  '">'. $row["programName"] .'</option>';
      }

  ?>
  
  </select>

     
<br><br>
    <button type="submit"  value="submit" name="submit">submit</button>
  </form>
</div>
</section>
  <script src="bar_script.js"></script>

</body>
</html>
`````````````````