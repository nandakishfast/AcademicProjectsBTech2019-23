<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Logout please</title>
</head>
<style>
.container {
  height: 200px;
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>
<body>
        <br><br>
        <h1 style="text-align:center; color: #A2133B;">Alert !</h1>
        <h2 style="text-align:center">You have closed the browser directly! </h2>
        <h2 style="text-align:center">To ensure data security logout and login again !</h2>
        
        <div class="container">
        <a href="./logout.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="position:center">Logout</a>
        </div>
</body>
</html>
