<?php

      session_start();
      include "db2.php";
      
      
      
	  if(!empty($_POST)){
		  
		  $query = "SELECT*FROM users
		               WHERE user = '".$_POST['user']."'
					   AND password = '".md5($_POST['pass'])."'";
		$result = mysqli_query($link,$query);
        $user_data = mysqli_fetch_assoc($result);
		if(!empty($user_data)){
			$_SESSION['user'] = $user_data['user'];
			$_SESSION['type'] = $user_data['type'];
			session_write_close();
			header("location: index2.php");
			exit();
			
		}
		else $message = "Wrong user name or password!";
	  }

?>
<html lang = "en">
  <head>
      <title>ENTER</title>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link href = "site.css" rel="stylesheet" type = "text/css"/>
	  <meta http-equiv="Content-Type" content="text/html; charset = utf-8">
  </head>
	  <body>
	  <div id = "main">
	  <div id = "menu">
	       <?php include ("menu11.php");?>
		   </div>
           <div id = "menu2">
<?php include "menu22.php";?>
</div>
		   <div id = "content">
		   <center>

		   <h2>Pleas enter user name and pssword</h2>
		   <?php if (isset($message))echo $message;?>
		   <form action="login2.php" method = "post">
		   <table align = "center" border = "1" style = "border:1px solid #000000;">
		   <tr>
		   <td>USER</td>
		   <td><input type="text" name="user" style = "width:200px"/></td>
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
		   