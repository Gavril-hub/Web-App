<?php
session_start();
include "db.php";
if(isset($_GET['pers_id']))
{
	if(!isset($_SESSION['admin']))
	{
		header("location: login.php");
		exit();
	} else if (!isset($_SESSION['admin'])) {
        header("location: login1.php");
        exit();
    }
	$query = "DELETE FROM employee WHERE pers_id = ".$_GET['pers_id'];
	if(mysqli_query($link,$query))
		   $message = "The Employe is successfully deleted";
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
<h2>Information about employees in the company</h2>
<?php if (isset($message)) echo $message; ?>
<table border = "1">
<tr>
    <th>Employee number</th>
	 <th>Name</th>
	  <th>Sirname</th>
	   <th>Family name</th>
	   <th>Gender</th>
	   <th>Birthday</th>
	   <th>Cityy</th>
	   <th>Street</th>
	   <th>Phone</th>
	   <th>Department number</th>
	   <th>Room number</th>
	   <?php
			     if(isset($_SESSION['admin']))
				 {
			?>
	   <th style = "background-color:coral" >Edit</th>
	   <th style = "background-color:red" >Delete</th>
	   <?php
				 } else if(isset($_SESSION['admin'])) 
                   {
				 ?>
                  <th style = "background-color:coral">Edit</th>
                  <?php 
                   }
                   ?>
                 
</tr>
<?php
	
	$query = "SELECT * FROM employee";
	if($result = mysqli_query($link,$query))
	{
		
		while($row = mysqli_fetch_assoc($result)) {
			?>
			
			<tr>
			
			<td><?php echo $row['pers_id']; ?></td>
			<td><?php echo $row['first']; ?></td>
			<td><?php echo $row['father']; ?></td>
			<td><?php echo $row['last']; ?></td>
			<td><?php echo $row['sex']; ?></td>
			<td><?php echo $row['b_day']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['street']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['depart_id']; ?></td>
			<td><?php echo $row['room_id']; ?></td>
			<?php
			     if(isset($_SESSION['admin']))
				 {
			?>
			    <td>
                       <a href = "edit_employee.php?pers_id=<?php echo $row['pers_id'];?>">Edit</a></td>
			      <td>
                    <style>
                             a {color:C40707;}
                     </style>
                       <a class="deleteButton" href="employee.php?pers_id=<?php echo $row['pers_id']; ?>">Delete</a>
		         <?php
				        } else if(isset($_SESSION['admin'])) 
                    {
		               ?>
                 <td>
                    <style>
                              a {color:C40707;}
                     </style>
            <a href = "edit_employee.php?pers_id=<?php echo $row['pers_id'];?>">Edit</a></td>
            
			<?php
                 }
				 ?>
			</tr>
			<?php
		}
	}
	else {
		?>
		<tr><td colspan = '13' align = 'center'>No rcords</td></tr>
		<?php
	}
	?>
	<?php
			     if(isset($_SESSION['admin']))
				 {
			?>
	 <tr>
	        <td colspan = '13' align='center'>
			   <a href="add_employee.php">Add new employee</а>
			   </td>
	 </tr>
	 <?php
				 } else if (isset($_SESSION['admin'])){
				 ?>
                 <tr>
	        <td colspan = '12' align='center'>
			   <a href="add_employee.php">Add new employee</а>
			   </td>
	 </tr>
     <?php
     }
?>	
    </table>
	</center>
	</div>
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
             const mainElement = document.getElementById('main');
    const deleteButtons = document.querySelectorAll('.deleteButton');

    deleteButtons.forEach(deleteButton => {
        deleteButton.addEventListener('mouseover', function() {
            mainElement.style.borderColor = 'red';
        });

        deleteButton.addEventListener('mouseout', function() {
            mainElement.style.borderColor = 'silver';
        });
    });
        });
    </script>
	</body>
	</html>
