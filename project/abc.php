<?php
if(isset($_POST['content'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testing";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if(mysqli_connect_error()){
        die("connection to this database failed due to" .mysqli_connect_error());
    }
    // echo "Success connecting to db";
    
    $material = $_POST['material'];
    // $file = $_POST['file'];
    $sql="INSERT INTO adhitya VALUES ('$material')";
    echo $sql;

    if(mysqli_query($con,$sql)){
        echo "Successfully inserted";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="abc.php">
        <input type="text" name="material">
        <input type="submit">
    </form>
</body>
</html>