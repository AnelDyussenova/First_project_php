<?php
	echo "juiip;jn";
	$con = mysqli_connect('localhost','root','') or die('No connection');
	mysqli_select_db($con,'database1') or die('db will not open');
	$sql= "Insert into users (name,surename,email) values ('".$_POST['f_name']."','".$_POST['surname']."','".$_POST['email']."')";
	$res= mysqli_query($con,$sql) or die("Invalid query");
?>
