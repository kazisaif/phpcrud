<?php
$servername = "localhost";
$username="root";
$password="";
$database="usersdb";

$conn=mysqli_connect($servername,$username,$password,$database);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id= $_GET ['id'];
//@mysqli_select_db($database) or die( "Unable to connect database");
$query="DELETE FROM Users WHERE id=$id";
$result=mysqli_query($conn,$query);

if($result){
    //echo "deleted";
    //echo "<script>alert('User Deleted')</script>";
    header("location:viewuser.php");
    //echo "<script>alert('User Deleted');</script>";
}
else {
    echo "Error Deleting Record: " . $conn->error;
}

mysqli_close($conn);
?>