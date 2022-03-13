<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP CRUD</title>
</head>
  
<body>
    <center>
        <?php
  
       
        $conn = mysqli_connect("localhost", "root", "", "usersdb");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
          
        
        $first_name =  $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $gender =  $_REQUEST['gender'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['email'];
          
        
        $sql = "INSERT INTO Users(firstname,lastname,gender,raddress,email) VALUES ('$first_name','$last_name','$gender','$address','$email')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>User Created Successfully.</h3>"; 
            
            echo ("<table border='1px solid' cellpadding='10'><tr><td>ID: </td><td>$first_name</td></tr>");
            echo ("<tr><td>First Name: </td><td>$first_name</td></tr>");
            echo ("<tr><td>Last Name: </td><td>$last_name</td></tr>");
            echo ("<tr><td>Gender: </td><td>$gender</td></tr>");
            echo ("<tr><td>Address: </td><td>$address</td></tr>");
            echo ("<tr><td>Email: </td><td>$email</td></tr><table>");
            echo ("<tr><td colspan='2' align='center'><hr><a href='viewuser.php'>View All Users</a></td></tr>");
  
            //echo nl2br("\n$first_name\n $last_name\n ". "$gender\n $address\n $email");
        } else{
            echo "ERROR: $sql. ". mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>