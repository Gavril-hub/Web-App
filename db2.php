<?php
    $sql_host = "127.0.0.1";
	$sql_user = "root";
	$sql_password = "";
	$sql_db = "company";
	
	$link = mysqli_connect($sql_host,$sql_user,$sql_password,$sql_db);
	
	mysqli_query($link,"SET NAMES 'UTF8'");
?>