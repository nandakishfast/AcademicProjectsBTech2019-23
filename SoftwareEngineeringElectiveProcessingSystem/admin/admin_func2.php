<?php
include '../config.php';
session_start();
//error_reporting(0);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
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
    color: black;
    font-family: 'PT Sans', sans-serif;
    font-size: 18px;
    text-align: left;
    max-width: 100%;
    height: auto;
    width: auto\9; /* ie8 */
    }
    th {
    background-color: #a2133b;
    color: white;
    text-align:center;
    }
    tr:nth-child(even) {background-color: #f2f2f2;
      text-align:center;}
    tr:nth-child(odd) {
    text-align:center;}
    .center {
  margin-left: auto;
  margin-right: auto;
}
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


  <div id="#1" style="width: 100%; float:left; height:90px; background:green; margin:10px">
  
  <form method="post">
  <center>
  <label style="font-size:30px;color:white">Select Elective Processing</label>
  <select name="ChooseElectiveProcessId" style="font-size:30px">

  <?php
$sql = "SELECT processId, processName FROM ElectiveProcess";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row["processId"] . '">' . $row["processName"] . '</option>';
}
?>
  </select></center><br><center>
        <input type="submit" name="button1"
                class="button" value="Show Allotment" style="font-size:20px"/>
        
                

        <input type="submit" name="button2"
                class="button" value="Start Allotment" style="font-size:20px"/></center>
    </form>
  </div>
  <div id="#2" style="width: 100%; float:left;  height:500px;background:white; margin:10px">

  <?php
if (array_key_exists('button1', $_POST)) {
    button1();
} else if (array_key_exists('button2', $_POST)) {
    button2();
}
function button1() {
    $electiveid = $_POST['ChooseElectiveProcessId'];
    //echo "electiveid".$electiveid."<br>";
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "final";
    $conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    $sql = "SELECT offerId FROM CoursesUnderElectiveProcess where processId = $electiveid";
    $result = mysqli_query($conn, $sql);
    $courseid=array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($courseid,$row["offerId"]);
      }
      //print_r($courseid);
    } else {
      echo "no courses under this elective process";
  }

  $sql = "SELECT DISTINCT(studentId) FROM StudentPreference WHERE processId=$electiveid";
    $result = mysqli_query($conn, $sql);
    $studids=array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($studids,$row["studentId"]);
      }
      //print_r($studids);
    } else {
      echo "no students under this elective process";
  }

  echo '<h1 style="text-align:center; color: black;">';
  $sql = "SELECT processName FROM ElectiveProcess WHERE processId=$electiveid";
              $result = mysqli_query($conn, $sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $row["processName"];
                }
              }
              else{
                echo "<tr>Some error</tr>";
              }
    
    echo '</h1>
            <table class="center">
            <tr>
            <th>Student Name</th>';

            foreach ($courseid as $value){
              $sql = "SELECT offerName FROM CourseOfferHistory where offerId = $value";
              $result = mysqli_query($conn, $sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<th>" . $row["offerName"] . "</th>";
                }
              }
              else{
                echo "<th>Some error</th>";
              }
            }
            echo "<th>Allotted</th></tr>";

            foreach($studids as $stdid){
              $sql = "SELECT studentName FROM Student where studentId = $stdid";
              $result = mysqli_query($conn, $sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["studentName"] . "</td>";
                }
              }
              else{
                echo "<tr>Some error</tr>";
              }
              foreach ($courseid as $value){
                $sql = "SELECT preferenceNumber FROM StudentPreference where offerId = $value AND processId = $electiveid AND studentId = $stdid";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "<td>" . $row["preferenceNumber"] . "</td>";
                  }
                }
                else{
                  echo "<td>Some error</td>";
                }
              }
              $sql = "SELECT offerId FROM EnrollHistory where processId = $electiveid AND studentId = $stdid";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $allot = $row["offerId"];
                  $sql = "SELECT offerName FROM CourseOfferHistory where offerId = $allot";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<th>" . $row["offerName"] . "</th>";
                      }
                    }
                    else{
                      echo "<th>Some error</th>";
                    }
                  }
                }
                else{
                  echo "<td>UnAllotted</td>";
                }
              echo "</tr>";
            }

            
}
function button2() {
  $electiveid = $_POST['ChooseElectiveProcessId'];
  //echo "electiveid".$electiveid."<br>";
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "final";
  $conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
  $sql = "SELECT offerId FROM CoursesUnderElectiveProcess where processId = $electiveid";
  $result = mysqli_query($conn, $sql);
  $courseid=array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      array_push($courseid,$row["offerId"]);
    }
    //print_r($courseid);
  } else {
    echo "no courses under this elective process";
}

$sql = "SELECT DISTINCT(studentId) FROM StudentPreference WHERE processId=$electiveid";
  $result = mysqli_query($conn, $sql);
  $studids=array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      array_push($studids,$row["studentId"]);
    }
    //print_r($studids);
  } else {
    echo "no students under this elective process";
}

echo '<h1 style="text-align:center; color: black;">';
$sql = "SELECT processName FROM ElectiveProcess WHERE processId=$electiveid";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo $row["processName"];
              }
            }
            else{
              echo "<tr>Some error</tr>";
            }
  
  echo '</h1>
          <table align="center">
          <tr>
          <th>Student Name</th>';

          foreach ($courseid as $value){
            $sql = "SELECT offerName FROM CourseOfferHistory where offerId = $value";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<th>" . $row["offerName"] . "</th>";
              }
            }
            else{
              echo "<th>Some error</th>";
            }
          }
          echo "<th>Allotted</th></tr>";

          foreach($studids as $stdid){
            $sql = "SELECT studentName FROM Student where studentId = $stdid";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["studentName"] . "</td>";
              }
            }
            else{
              echo "<tr>Some error</tr>";
            }
            foreach ($courseid as $value){
              $sql = "SELECT preferenceNumber FROM StudentPreference where offerId = $value AND processId = $electiveid AND studentId = $stdid";
              $result = mysqli_query($conn, $sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<td>" . $row["preferenceNumber"] . "</td>";
                }
              }
              else{
                echo "<td>Some error</td>";
              }
            }

            $preference_size = sizeof($courseid);
            
            $i = 0;
            while($i<$preference_size){
              $i = $i + 1;
              $sql = "SELECT offerId FROM EnrollHistory where processId = $electiveid AND studentId = $stdid";
              $result2 = mysqli_query($conn, $sql);
              if ($result2->num_rows == 0){
                $sql = "SELECT offerId FROM StudentPreference where preferenceNumber = $i AND processId = $electiveid AND studentId = $stdid";
                $result2 = mysqli_query($conn, $sql);
                $row2 = $result2->fetch_assoc();
                $request = $row2["offerId"]; 

                $sql = "SELECT COUNT(offerId) AS FILL FROM EnrollHistory where processId = $electiveid AND offerId = $request";
                $result2 = mysqli_query($conn, $sql);
                $row2 = $result2->fetch_assoc();
                $filled = $row2["FILL"];

                $sql = "SELECT studentCap FROM CourseOfferHistory where offerId = $request";
                $result2 = mysqli_query($conn, $sql);
                $row2 = $result2->fetch_assoc();
                $cap = $row2["studentCap"];

                if($filled < $cap){
                  $sql_insert = 
      "INSERT INTO EnrollHistory(offerId,processId,studentId)
          VALUES ('$request','$electiveid','$stdid')";
          
        if(mysqli_query($conn,$sql_insert)){
          //dfv
        }
        else{
          echo "Some error while alloting elective";
        }
                }

              }
        
            }


            $sql = "SELECT offerId FROM EnrollHistory where processId = $electiveid AND studentId = $stdid";
              $result = mysqli_query($conn, $sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $allot = $row["offerId"];
                  $sql = "SELECT offerName FROM CourseOfferHistory where offerId = $allot";
                  $result = mysqli_query($conn, $sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<th>" . $row["offerName"] . "</th>";
                    }
                  }
                  else{
                    echo "<th>Some error</th>";
                  }
                }
              }
              else{
                echo "<td>UnAllotted</td>";
              }
            echo "</tr>";
          }

          
}
?>


  </div>

  </section>
  <script src="bar_script.js"></script>
</body>
</html>
