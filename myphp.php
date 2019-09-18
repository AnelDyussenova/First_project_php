<html>
<head>
<style>
#create_form{
visibility: hidden;
display: none;
}
#update_form{
visibility: hidden;
display: none;
}
</style>
</head>
<body>
<button id="create_btn" onclick="cr_vis()">Create</button>
<button id="update_btn" onclick="up_vis()">Update</button>
<form id='create_form' action='create.php' method='POST'>
	Name: <input type='text' name='f_name'><br/>
	Surname: <input type='text' name='surname'><br/>
	Email: <input type='text' name='email'><br/>
	<input type='submit' name='create' value='Create'>
</form>
<form id='update_form' action='update.php' method='POST'>
	Id: <input type='text' name='id'><br/>
	Name: <input type='text' name='f_name'><br/>
	Surname: <input type='text' name='surname'><br/>
	Email: <input type='text' name='email'><br/>
	<input type='submit' name='update' value='Update'>
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
                <form action='' method='POST'>
                    <input type='button' name='delete' value='Delete' onclick='deleterow(this,".$row['id'].")'>
                </form>
        </td>
</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
<script>
    function deleterow(r,id){
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
	function cr_vis(){
	    document.getElementById("create_form").style.visibility = "visible"; 
	    document.getElementById("create_form").style.display = "block";
	    document.getElementById("update_form").style.display = "none";  
	}
	function up_vis(){
	    document.getElementById("update_form").style.visibility = "visible"; 
	    document.getElementById("update_form").style.display = "block"; 
	    document.getElementById("create_form").style.display = "none";
	}
</script>


