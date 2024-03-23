<?php

      session_start();
	  include "db.php";
	  
      if(!empty($_POST)){
		  
          $admin = mysqli_real_escape_string($link, $_POST["admin"]);
          $password = mysqli_real_escape_string($link, $_POST["pass"]);
		 
         $query = "SELECT*FROM admins
		               WHERE admin = '".$_POST['admin']."'
					   AND password = '".md5($_POST['pass'])."'";
		
        $result = mysqli_query($link,$query);
        $user_data = mysqli_fetch_assoc($result);
		
        if(!empty($user_data)){
			$_SESSION['admin'] = $user_data['admin'];
			$_SESSION['type'] = $user_data['type'];
			
            session_write_close();
            $_SESSION['login_success'] = true;
			header("location: index.php");
			exit();
			
		}
		else $message = "Wrong admin name or password!";
	  }

?>
<html lang = "en">
  <head>
      <title>ENTER</title>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link href = "site.css" rel="stylesheet" type = "text/css"/>
	  <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
      <meta http-equiv="Pragma" content="no-cache">
  </head>
	  <body>
	  <div id = "main">
	  <div id = "menu">
	       <?php include ("menu.php");?>
		   </div>
           <div id = "menu2">
<?php include "menu2.php";?>
</div>
		   <div id = "content">
		   <center>

		   <h2>Pleas enter user name and password</h2>
		   <?php if (isset($message))echo $message;?>
		   <form action="login.php" method = "post">
		   <table align = "center" border = "1" style = "border:1px solid #000000;">
		   <tr>
		   <td>ADMIN</td>
		   <td><input type="text" name="admin" style = "width:200px"/></td>
		   </tr>
		   <tr>
		   <td>PASSWORD</td>
		   <td><input type = "password" name = "pass" autocomplete = "off" style = "width:200px"/></td>
		   </tr>
		   <tr>
		   <td colspan = "2" align="center"><input type="submit" value = "ENTER"/></td>
		   </tr>
		   </table>
		   </form>
		   </center>
		   </div>
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
		   