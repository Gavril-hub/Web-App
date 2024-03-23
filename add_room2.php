<?php
  session_start();
  if(!isset($_SESSION['user'])){
	
	header("location: login2.php");
	exit();
}
if(!empty($_POST))
{
	include "db2.php";
	$query = "INSERT INTO rooms(room_id,floor,l_r,square_surface)
VALUES('".$_POST["room_id"]."','".$_POST["floor"]."','".$_POST["l_r"]."',
'".$_POST["square_surface"]."')";
if($result = mysqli_query($link,$query))
	$message = "working room is added succesfully";
else
	 $message = "Error by adding";
 
}

?>

<html lang = "en">
<head>
       <title>Adding new working room</title>
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
		   <h2>Adding new working room</h2>
		   <?php if(isset($message))echo $message;?>
		   <form method = "POST" action = "add_room2.php">
		   <table border = "1">
		   <tr>
		      <td>Room number</td>
			  <td><input type = "text" name = "room_id"/></td>
			  
			</tr>
			<tr>
               <td>Floor</td>
               <td><input type  "text" name = "floor"/></td>	
             </tr>
            <tr>
			    <td>Left/Right</td>
				<td><input type = "text" name = "l_r"/></td>
            </tr>			
			<tr>
			  <td>Qadrature</td>
			  <td><input type = "text" name="square_surface"/></td>
			  
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