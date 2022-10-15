<?php
include_once 'config.php';

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
        <a href="admin_home.php">
          <i class='bx bxs-home'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
     <li>
       <a href="./update_pass.php">
        <i class='bx bx-key'></i>
         <span class="links_name">Update Password</span>
       </a>
       <span class="tooltip">Update Password</span>
     </li>
     <li>
       <a href="./admin/admin_func1.php">
       <i class='bx bxs-offer'></i>
         <span class="links_name">Add a course offer</span>
       </a>
       <span class="tooltip">Add a course offer</span>
     </li>
     <li>
       <a href="./admin/admin_func2.php">
       <i class='bx bx-code-alt'></i>
         <span class="links_name">Allocate Electives</span>
       </a>
       <span class="tooltip">Allocate Electives</span>
     </li>
     <li>
       <a href="./admin/admin_func3.php">
       <i class='bx bxs-hand-up'></i>
         <span class="links_name">Set courses for Elective</span>
       </a>
       <span class="tooltip">Set courses for Elective</span>
     </li>
     <li>
       <a href="./admin/admin_func5.php">
       <i class='bx bxs-group' ></i>
         <span class="links_name">Add Faculty </span>
       </a>
       <span class="tooltip">Add Faculty</span>
     </li>
     <li>
       <a href="./admin/admin_func6.php">
       <i class='bx bx-group' ></i>
         <span class="links_name">Add Student </span>
       </a>
       <span class="tooltip">Add Student </span>
     </li>
     
     <li>
      <a href="./logout.php">
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

  </section>
  <script src="bar_script.js"></script>
</body>
</html>
