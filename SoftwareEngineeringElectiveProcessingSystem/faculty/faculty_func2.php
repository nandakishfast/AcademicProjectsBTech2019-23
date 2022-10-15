<?php
include '../config.php';
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="bar_style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

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

    * {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #A2133B;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
  
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #f0ccd6;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #fcfafb;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
  </style>
</head>
<body>

<div class="topnav">
    <div class="topnav-right">
  <a>Faculty Dashboard </a>
</div>
</div>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">&nbsp &nbspAmrita &nbspVishwa &nbsp&nbsp&nbspVidyapeetham</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

      <li>
        <a href="../faculty_home.php">
          <i class='bx bxs-home'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a href="../faculty/faculty_func1.php">
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
       <a href="../faculty/faculty_func2.php">
        <i class='bx bx-select-multiple' ></i>
         <span class="links_name">Register for a course</span>
       </a>
       <span class="tooltip">Register for a course</span>
     </li>
     <li>
       <a href="../faculty/faculty_func3.php">
       <i class='bx bxs-group'></i>
         <span class="links_name">View Student List</span>
       </a>
       <span class="tooltip">View Student List</span>
     </li>
     <li>
       <a href="../faculty/faculty_func4.php">
        <i class='bx bx-spreadsheet'></i>
         <span class="links_name">View courses</span>
       </a>
       <span class="tooltip">View courses</span>
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



<form id="regForm">
  <h1>Faculty course Registration form:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Name:
    <p><input placeholder="First name" oninput="this.className = ''" name="fname"></p>
    <p><input placeholder="Last name" oninput="this.className = ''" name="lname"></p>
  </div>
  <div class="tab">Contact Info:
    <p><input placeholder="E-mail" oninput="this.className = ''" name="email"></p>
    <p><input placeholder="Phone" name="phone" input type="number" pattern="[789][0-9]{9}" oninput="this.className = ''" ></p>
    
  </div>
  <div class="tab">
    <label for="courses">Choose a course from below:</label>
    <select id="cars">
        <option value="19CSE311-Computer Security" >19CSE311-Computer Security</option>
        <option value="19CSE313-Principles of Programming language">19CSE313-Principles of Programming language</option>
        <option value="19CSE314-Software Engineering">19CSE314-Software Engineering</option>
        <option value="19CSE440-Biometrics">19CSE440-Biometrics</option>
        <option value="19CSE456-Neural Network and Deep learning">19CSE456-Neural Network and Deep learning</option>
        <option value="19CSE340-Advanced Computer Networks">19CSE340-Advanced Computer Networks</option>
        <option value="19CSE445-Cloud Computing">19CSE445-Cloud Computing</option>
        <option value="19CSE451-Principles of Artificial Intelligance">19CSE451-Principles of Artificial Intelligance</option>
        <option value="19CSE335-Ethical Hacking">19CSE335-Ethical Hacking</option>
        <option value="19CSE357-Big Data Analytics">19CSE357-Big Data Analytics</option>
        <option value="19CSE446-Internet Of Things">19CSE446-Internet Of Things</option>
        <option value="19CSE453-Natural Language Processing">19CSE453-Natural Language Processing</option>
      </select>
  </div>

  <div class="tab">Login Info:
    <p><input placeholder="Username" oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password" oninput="this.className = ''" name="pword" type="password"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:middle;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
</section>
  <script src="bar_script.js"></script>
</body>
</html>
