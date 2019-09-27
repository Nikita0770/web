<?php
	$con=mysqli_connect("localhost","root","","web28");
	$id = $_REQUEST['id'];
	$q="DELETE FROM `friends` WHERE `id`='$id'";
	mysqli_query($con,$q);
	header("Location: index.php");
?>
