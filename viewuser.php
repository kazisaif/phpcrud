<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP CRUD</title>
</head>
<body>
<h3><a href="userregister.html">Back to Register Page</h3>
<h1 align="center">All Registered Users</h1>
<table cellpadding="10" border="1px solid" align="center">
<tr>
<td align="center">ID</td>
<td align="center">First Name</td>
<td align="center">Last Name</td>
<td align="center">Gender</td>
<td align="center">Address</td>
<td align="center">E-mail</td>
<td colspan="2" align="center">Action</td>

</tr>

<?php
$servername = "localhost";
$username="root";
$password="";
$database="usersdb";

$conn=mysqli_connect($servername,$username,$password,$database);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//@mysqli_select_db($database) or die( "Unable to connect database");
$query="SELECT * FROM Users";
$result=mysqli_query($conn,$query);
//mysql_close();

while ($row=mysqli_fetch_array($result)){
//echo "<table>";
echo ("<tr><td>$row[id]</td>");
echo ("<td>$row[firstname]</td>");
echo ("<td>$row[lastname]</td>");
echo ("<td>$row[gender]</td>");
echo ("<td>$row[raddress]</td>");
echo ("<td>$row[email]</td>");
echo ("<td><a href=\"edituser.php?id=".$row['id']."\">Edit</a></td>");
echo ("<td><a href=\"deleteuser.php?id=".$row['id']."\">Delete</a></td></tr>");

}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>