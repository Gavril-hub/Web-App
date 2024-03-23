<?php
  session_start();
  if(!isset($_SESSION['admin'])){
	
	header("location: login.php");
	exit();
}
if(!empty($_POST))
{
	include "db.php";
    
    $password = mysqli_real_escape_string($link, $_POST["pass"]);
    $password2 = mysqli_real_escape_string($link, $_POST["pass2"]);
    $type = "user";
      
	$query = "INSERT INTO users(user_id,user,password,type)
    VALUES('','".$_POST['user']."','".md5($_POST['pass'])."','user')";
    
if($password != $password2) {
    $message = "The both passwords doesn't match!!Please try again!";
}
  else if($result = mysqli_query($link,$query))
	$message = "New User is added succesfully";
else
	 $message = "Error by adding";
 
}

?>

<html lang = "en">
<head>
       <title>Adding new User</title>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <link href = "site.css" rel = "stylesheet" type="text/css"/>
	   <meta http-equiv = "Content-Type" content="text/html; charset=utf-8">
	   </head>
	   <body>
	   
	   <div id = "main">
	       <div id = "menu">
		   <?php include "menu.php";?>
		   </div>
           <div id = "menu2">
<?php include "menu2.php";?>
</div>
		   <div id = "content">
		   <center>
		   <h2>Adding new User</h2>
		   <?php if(isset($message))echo $message;?>
		   <form method = "post" action = "CreateUser.php">
		   <table border = "1">
		   <tr>
		      <td>User</td>
			  <td><input type = "text" name = "user" style = "width:200px"/></td>
			  
			</tr>
			<tr>
               <td>Password1</td>
               <td><input type = "password" name = "pass" autocomplete = "off" style = "width:200px"/></td>	
             </tr>
             <tr>
               <td>Password2</td>
               <td><input type  = "password" name = "pass2" autocomplete = "off" style = "width:200px"/></td>	
             </tr>
		
               <td colspan = '2' align = 'center' ><input type = "submit" value = "Create" /></td>
            </tr>			   
			</table>
			</form>
			</center>
			</div>
            <script>
        document.addEventListener('DOMContentLoaded', function() {
            const headers = document.querySelectorAll('th, td');
            let delay = 0;
            headers.forEach(header => {
                header.style.animationDelay = delay + 's';
                delay += 0.05; // Adjust delay as needed
            });
        });
    </script>
			</body>
			</html>