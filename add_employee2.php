<?php
 session_start();

 if (!isset($_SESSION['user'])){
    header("location: login2.php");
	exit();
}
if(!empty($_POST))
{
    include "db2.php";
	$query = "INSERT INTO employee(pers_id,first,father,last,sex,b_day,city,street,phone,depart_id,room_id)
VALUES('','".$_POST["first"]."','".$_POST["father"]."',
'".$_POST["last"]."','".$_POST["sex"]."','".$_POST["b_day"]."','".$_POST["city"]."','".$_POST["street"]."','".$_POST["phone"]."','".$_POST["depart_id"]."','".$_POST["room_id"]."')";
if($result = mysqli_query($link,$query))
	$message = "New employe is added succesfully";
else
	 $message = "Error by adding";
 
}

?>

<html lang = "en">
<head>
       <title>Adding new employee</title>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <link href = "site.css" rel = "stylesheet" type="text/css"/>
	   <meta http-equiv = "Content-Type" content="text/html; charset=utf-8">
	   </head>
	   <body>
	   
	   <div id = "main">
	       <div id = "menu">
		   <?php include "menu11.php";?>
		   </div>
           <div id = "menu2">
<?php include "menu22.php";?>
</div>
		   <div id = "content">
		   <center>
           <div id ="logB">
  <?php include "LogButton2.php"?>
</div>
		   <h2>Adding new employee</h2>
		   <?php if(isset($message))echo $message;?>
		   <form method = "POST" action = "add_employee2.php">
		   <table border = "1">
           
		   
			<tr>
               <td>Name</td>
               <td><input type  "text" name = "first"/></td>	
             </tr>
            <tr>
			    <td>Sirname</td>
				<td><input type = "text" name = "father"/></td>
            </tr>			
			<tr>
			  <td>Family name</td>
			  <td><input type = "text" name="last"/></td>
			  
			 </tr>
			 <tr>
			  <td>Gender</td>
			  <td><input type = "text" name="sex"/></td>
			  
			 </tr>
			 <tr>
			  <td>Birthday</td>
			  <td><input type = "text" name="b_day"/></td>
			  
			 </tr>
			 <tr>
			  <td>City</td>
			  <td><input type = "text" name="city"/></td>
			  
			 </tr>
			 <tr>
			  <td>Street</td>
			  <td><input type = "text" name="street"/></td>
			  
			 </tr>
			 <tr>
			  <td>Phone</td>
			  <td><input type = "text" name="phone"/></td>
			  
			 </tr>
			 <tr>
			  <td>Department number</td>
			  <td><input type = "text" name="depart_id"/></td>
			  
			 </tr>
			 <tr>
			  <td>Room number</td>
			  <td><input type = "text" name="room_id"/></td>
			  
			 </tr>
            <tr>
               <td colspan = '11' align = 'center' ><input type = "submit" value = "ADD" /></td>
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