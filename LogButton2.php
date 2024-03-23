<?php
	 if(isset($_SESSION['user']))
	 {
?>
<a href = "logout2.php">Exit</a> 

 <?php
     } else if (isset($_SESSION['user']))
     {
         ?>
         <a href = "logout.php">Exit</a>
         <?php
     }
 else {
	 ?>
<a href = "Llogin1.php">Login</a>

<?php
}
?>