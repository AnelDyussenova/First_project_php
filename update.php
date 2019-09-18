<?php
	$create_value= $_POST["update"];
	$con = mysqli_connect('localhost','root','') or die('No connection');
	mysqli_select_db($con,'database1') or die('db will not open');
	$sql= "UPDATE users SET name='".$_POST['f_name']."',surename='".$_POST['surname']."',email='".$_POST['email']."' WHERE id='".$_POST['id']."'";
	$res= mysqli_query($con,$sql) or die("Invalid query");
	header('location: myphp.php');
	mysqli_close($con);
?>
