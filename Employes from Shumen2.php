<?php  session_start();?>
<html lang = "en">
<head>
<title>EMFROMSHU</title>
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
<h2>Information about emlpoyees from Shumen</h2>
<table border = "1">
<tr>
    <th>Name</th>
	 <th>Last</th>
	  <th>Department</th>
	   <th>Room</th>
       <th>City</th>
</tr>
<?php
     include "db2.php";
	
	$query = "SELECT employee.*
	FROM employee
	WHERE city = 'Шумен'
	ORDER BY pers_id";
	if($result = mysqli_query($link,$query))
	{
		
		while($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
			
			<td><?php echo $row['first']; ?></td>
			<td><?php echo $row['last']; ?></td>
			<td><?php echo $row['depart_id']; ?></td>
			<td><?php echo $row['room_id']; ?></td>
			<td><?php echo $row['city']; ?></td>
			</tr>
			<?php
		}
	}
	else {
		?>
		<tr><td colspan = '4' align = 'center'>No records</td></tr>
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