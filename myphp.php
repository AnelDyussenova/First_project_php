<html>
<body>
<form actiom='' method='POST'>
	<input type='text' name='f_name'>
	<input type='text' name='surname'>
	<input type='text' name='email'>
	<input type='submit' name='create' value='Create' onclick='createR()'>
</form>
</body>
<?php 
$conn = mysqli_connect('localhost','root','') or die('No connection');
mysqli_select_db($conn,'database1') or die('db will not open');
$query="Select * from users";
$result= mysqli_query($conn,$query) or die("Invalid query");
echo "<table id='table' border ='1'><tr><th>id</th><th>name</th><th>surname</th><th>email</th></tr>";
while($row=mysqli_fetch_array($result)){
echo "<tr>
	<td>".$row['id']."</td>
	<td>".$row['name']."</td>
	<td>".$row['surename']."</td>
	<td>".$row['email']."</td>
	<td>
                <form action='' method='post'>
                    <input type='button' name='delete' value='Delete' onclick='deleteR(this,".$row['id'].")'>
                    <input type='button' name='update' value='Update' onclick='updateR(this,".$row['id'].")'>
                </form>
        </td>
</tr>";
}
echo "</table>";

//if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['create']))
//    {
//        createR();
//    }
//else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
//    {
//        deleteR();
//  }
//function createR(){
//	$create_value= $_POST["create"];
//	$con = mysqli_connect('localhost','root','') or die('No connection');
//	mysqli_select_db($con,'database1') or die('db will not open');
//	$sql= "Insert into users (name,surename,email) values ('".$_POST['f_name']."','".$_POST['surname']."','".$_POST['email']."')";
//	$res= mysqli_query($con,$sql) or die("Invalid query");
//}
//function deleteR(){
//	$create_value= $_POST["delete"];
//	$con = mysqli_connect('localhost','root','') or die('No connection');
//	mysqli_select_db($con,'database1') or die('db will not open');
//	$sql= "delte from users where id=";
//	$res= mysqli_query($con,$sql) or die("Invalid query");
//}



?>

<script>
    function deleteR(r,id){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {                     

        if (req.readyState == 4 && req.status == 200) {

            }
        };
        var i = r.parentNode.parentNode.parentNode.rowIndex;
        console.log(i);
        document.getElementById("table").deleteRow(i);
        req.open("GET", "delete.php?id="+id, true);
        req.send();
    }  
    function updateR(r,id){
	
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {                     

        if (req.readyState == 4 && req.status == 200) {

            }
        };
        var i = r.parentNode.parentNode.parentNode.rowIndex;
        console.log(i);
//       document.getElementById("table").deleteRow(i);
        req.open("GET", "update.php?id="+id, true);
        req.send();
    } 
    function createR(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {                     

        if (req.readyState == 4 && req.status == 200) {

            }
        };
        var i = r.parentNode.parentNode.parentNode.rowIndex;
        console.log(i);
        document.getElementById("table").deleteRow(i);
        req.open("POST", "create.php", true);
        req.send();
    }  
</script>
