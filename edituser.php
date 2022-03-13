<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP CRUD</title>
</head>


<?php
$servername = "localhost";
$username="root";
$password="";
$database="usersdb";

$conn=mysqli_connect($servername,$username,$password,$database);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id = $_GET['id']; 
$query = "SELECT * FROM Users WHERE id = $id"; 
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
//$id=$row['id'];
//$firstname=$row['firstname'];
//mysqli_close();


if ( isset($_POST['update'])){
    $update=true;
    $id = $_POST['id'];
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $gender = $_POST['gender'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $conn = mysqli_connect("localhost","root","","usersdb");
    $query = "UPDATE Users SET firstname='$firstname', lastname='$lastname', gender='$gender',raddress='$address',email='$email' WHERE id = $id";
    mysqli_query($conn,$query);
    echo mysqli_error($conn);
    mysqli_close($conn);
    header('location: viewuser.php');

}
?>

<form method="post">
<h2><a href="userregister.html">Back to Register Page</h2>
<table>

<tr>
<td><input type="hidden" name="id" value="<?php echo "$row[id]" ?>"></td>
</tr>

<tr>
<td>First Name:</td>
<td><input type="text" name="first" value="<?php echo "$row[firstname]" ?>"></td>
</tr>

<tr>
<td>Last Name:</td>
<td><input type="text" name="last" value="<?php echo "$row[lastname]" ?>"></td>
</tr>

<tr>
<td>Gender:</td>
<td><input type="text" name="gender" value="<?php echo "$row[gender]" ?>"></td>
</tr>
<tr>
<td>Address:</td>
<td><input type="text" name="address" value="<?php echo "$row[raddress]" ?>"></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input type="text" name="email" value="<?php echo "$row[email]" ?>"></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" name="update" value="Update"></td>
</tr>
</table>

</form>

</html>