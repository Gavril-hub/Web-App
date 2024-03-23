<?php
session_start();
include "db2.php";
if(isset($_GET['room_id']))
{
	if(!isset($_SESSION['user']))
	{
		header("location: login2.php");
		exit();
	}
	$query = "DELETE FROM rooms WHERE room_id = ".$_GET['room_id'];
	if(mysqli_query($link,$query))
		   $message = "The working room is successfully deleted";
	   else 
		   $message = "Error";
  
}
?>

<html lang = "en">

<head>

<title>Rooms</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href = "site.css" rel="stylesheet" type="text/css" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		  
</head>

<body>

<div id="main">
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
<h2>Information about working rooms in the company</h2>

<?php if(isset($message))echo $message;?>


<table border = "1">

<tr>
    <th>Room number</th>
	 <th>Floor</th>
	  <th>Left/Right</th>
	   <th>Area</th>
	   <?php
			     if(isset($_SESSION['user']))
				 {
			?>
	    <th style = "background-color:coral" >Edit</th>
		<?php
				 }
				 ?>
	   </tr>
	   
	 
<?php
	
	$query = "SELECT * FROM rooms";
	if($result = mysqli_query($link,$query))
	{
		
		while($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
			
			<td><?php echo $row['room_id']; ?></td>
			<td><?php echo $row['floor']; ?></td>
			<td><?php echo $row['l_r']; ?></td>
			<td><?php echo $row['square_surface']; ?> qu.m.</td>
			<?php
			     if(isset($_SESSION['user']))
				 {
			?>
			<td>
             <style>
            a {color:C40707;}
            </style>
            <a href = "edit_room2.php?room_id=<?php echo $row['room_id'];?>">Edit</a></td>
			<?php
				 }
				 ?>
			</tr>
			<?php
		}
	}
	else {
		?>
		<tr><td colspan = '6' align = 'center'>No rcords</td></tr>
		<?php
	}
	?>
	<?php
			     if(isset($_SESSION['user']))
				 {
			?>
	 <tr>
	        <td colspan = '6' align='center'>
			   <a href="add_room2.php">Добавяне на стая</а>
			   </td>
	 </tr>
	 <?php
				 }
				 ?>
	
	</table>
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
	