<?php  session_start();
$_SESSION['login_success'] = true; 
?>
<html>
  <head>
        <title>HOME</title>
		<link href = "site.css" rel = "stylesheet" type="text/css"/>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		  
  </head>
  <body>
  
<div id="main">
<div id = "menu">
<?php include "menu.php";?>
</div>
<div id = "menu2">
<?php include "menu2.php";?>
</div>
<div id ="content">
<center>
<div id ="logB">
  <?php include "LogButton.php"?>
</div>
<div>
<a href = "CreateAdmin.php"> Create New Admin</a>
<a>OR</a>
<a href = "CreateUser.php"> Create New User</a>
</div>
<div class = "welcome-message">
</div>
<h2>Choose your option from the menu</h2> 
Employe-Information about employe in the company</br>
Departments-Information about departments in the company</br>
Rooms-Information about working rooms in the company</br>
All information-full information about the employes,departments and rooms</br>

</center>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php
            if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
                echo 'document.getElementById("main").classList.add("shine");';
                unset($_SESSION['login_success']); // Reset the session variable
            } 
        ?>
    });
</script>
</body>
</html>  