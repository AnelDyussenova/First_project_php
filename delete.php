<?php
$id = $_GET['id'];
echo $id;
$conn = mysqli_connect('localhost','root','') or die('No connection');
mysqli_select_db($conn,'database1') or die ('db will not open');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = 'delete FROM users WHERE id = '.$id;
$res=mysqli_query($conn, $sql);
mysqli_close($conn);
?>
