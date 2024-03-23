<?php
  session_start();
  if(!isset($_SESSION['admin'])){
	
	header("location: login.php");
	exit();
}
if(!empty($_POST))
{
	include "db.php";
	$query = "INSERT INTO departments(depart_id,depart,function)
VALUES('".$_POST["depart_id"]."','".$_POST["depart"]."','".$_POST["function"]."')";
if($result = mysqli_query($link,$query))
	$message = "New Department is added succesfully";
else
	 $message = "Error by adding";
 
}

?>

<html lang = "en">
<head>
       <title>Adding new Department</title>
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
           <div id ="logB">
  <?php include "LogButton.php"?>
</div>
		   <h2>Adding new Department</h2>
		   <?php if(isset($message))echo $message;?>
		   <form method = "POST" action = "add_department.php">
		   <table border = "1">
		   <tr>
		      <td>Department Id</td>
			  <td><input type = "text" name = "depart_id"/></td>
			  
			</tr>
			<tr>
               <td>Name of Department</td>
               <td><input type  "text" name = "depart"/></td>	
             </tr>
            <tr>
			    <td>Function</td>
				<td><input type = "text" name = "function"/></td>
            </tr>			
            <tr>
               <td colspan = '2' align = 'center' ><input type = "submit" value = "ADD" /></td>
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