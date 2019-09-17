<!-- <form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
</form> -->
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
input[type=button] {
  background-color: grey;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
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
mysqli_select_db($conn,'database1') or die ('db will not open');
$query="Select * from users order by id";
$result=mysqli_query($conn,$query) or die ("Invalid Query");


echo "<table id='table'><tr><th>id</th><th>name</th><th>surname</th><th>email</th><th>delete</th></tr>";
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

// <td><button onclick='deleteRow(".$row['id'].")'>Delete</button></td>

// $search_value=$_POST["search"];
// if($conn->connect_error){
//     echo 'Connection Faild: '.$conn->connect_error;
// }
// else{
//     $sql="select * from users where id like '%$search_value%'";
//     $res=mysqli_query($conn,$sql);

//     while($row=mysqli_fetch_array($res)){
//         echo 'Name:  '.$row["name"];
//     }       
// }



mysqli_close($conn);
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
        document.getElementById("table").deleteRow(i);
        req.open("GET", "delete.php?id="+id, true);
        req.send();
    }  
    function createR(){
	var req = new XMLHttpRequest();
        req.onreadystatechange = function() {                     

        if (req.readyState == 4 && req.status == 200) {

            }
        };
        req.open("POST", "create.php", true);
        req.send();
    }
        
</script>
