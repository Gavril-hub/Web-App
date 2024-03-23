<?php
session_start();
if(!isset($_SESSION['admin'])){
	
	header("location: login.php");
	exit();
}
	include "db.php";
if(!empty($_POST))
{

	$query = "UPDATE departments
SET depart = '".$_POST["depart"]."',
function = '".$_POST["function"]."'
WHERE depart_id = " .$_GET['depart_id'];
if($result = mysqli_query($link,$query))
	$message = "Information is edited succesfully";
else
	 $message = "Error by editing";
 
}

if(isset($_GET["depart_id"])&&  $_GET["depart_id"]>0) {
	
	$query = "SELECT * FROM departments WHERE depart_id = ".$_GET['depart_id'];
	if($result = mysqli_query($link,$query))
		$data = mysqli_fetch_assoc($result);
	else $message = "Department with this number,doesn't exist";
}

?>

<html lang = "en">
<head>
       <title>Edit new department</title>
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
		   <h2>Edit new department</h2>
		   <?php if(isset($message))echo $message;?>
		   <form action = "edit_department.php?depart_id=<?php echo $_GET['depart_id'];?>" method = "post"> 
		   <table border = "1">
		   <tr>
		      <td>Department</td>
			  <td><input type = "text" name = "depart" value="<?php echo $data["depart"];?>"/></td>
			  
			</tr>
			<tr>
               <td>Function of the department</td>
               <td><input type = "text" name = "function" value="<?php echo $data["function"];?>"/></td>	
             </tr>
           
            <tr>
               <td colspan = '2' align = 'center' ><input type = "submit" value = "EDIT" /></td>
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