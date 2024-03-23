<?php
	 if(isset($_SESSION['admin']))
	 {
?>
<a href = "logout.php">Exit</a> 

 <?php
     } else if (isset($_SESSION['admin']))
     {
         ?>
         <a href = "logout.php">Exit</a>
         <?php
     }
 else {
	 ?>
<a href = "Llogin.php">Login</a>

<?php
}
?>