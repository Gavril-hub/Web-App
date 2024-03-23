<?php  session_start(); ?>
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
<h2>Full Information in the company</h2>
<div style="overflow-x:auto;">
<table border="1">
    
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
       <th>Department name</th>
	  <th>function of the department</th>
	   <th>Room number</th>
	 <th>Floor</th>
	  <th>Left/Right</th>
	   <th>Area</th>
	 
</tr>
<?php
     include "db.php";
	
	$query = "SELECT employee.*,departments.*,rooms.*
	FROM employee
	LEFT JOIN Departments
	ON employee.depart_id = departments.depart_id
	LEFT JOIN rooms ON employee.room_id = rooms.room_id
	ORDER BY pers_id";
	if($result = mysqli_query($link,$query))
	{
		
		while($row = mysqli_fetch_assoc($result)) {
			?>
            
            <style>
            table-size: auto;
            color:red;
            </style>
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
            <td><?php echo $row['depart']; ?></td>
			<td><?php echo $row['function']; ?></td>
			<td><?php echo $row['room_id']; ?></td>
			<td><?php echo $row['floor']; ?></td>
			<td><?php echo $row['l_r']; ?></td>
			<td><?php echo $row['square_surface']; ?> qu.m.</td>
			
            </tr>
			<?php
		}
	}
	else {
		?>
		<tr><td colspan = '4' align = 'right'>No rcords</td></tr>
		<?php
	}
	?>
	
	</table>
    </div>
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
