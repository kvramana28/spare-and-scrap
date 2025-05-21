<?php
if(isset($_POST["submit"])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sns";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if(mysqli_connect_error()){
        die("connection to this database failed due to" .mysqli_connect_error());
    }
    // echo "Success connecting to db";
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql="INSERT INTO 1login VALUES (DEFAULT,'$email','$pass', current_timestamp())";
    echo $sql;
    // if(move_uploaded_file($temp,$folder))
    // echo "Successfully uploaded";
    // else echo "Unknown error";
    if(mysqli_query($con,$sql)){
        echo "Successfully inserted";
        header("location:index.html");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <title>Login page</title>
</head>

<body>
  <div class="container bg-white">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login-form">
          <form action="./1login.php" class="mt-5 border p-4 bg-light shadow" method="post" enctype="multipart/form-data">
          <!-- <form action="./spare.php" method="post" enctype="multipart/form-data"> -->
            <h4 class="mb-5 text-secondary">Login here!</h4>
            <div class="row">
            <div class="row">
              <div class="mb-3 col-md-12">
                <label>Email<span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
              </div>

              <div class="mb-3 col-md-12">
                <label>Password<span class="text-danger">*</span></label>
                <input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
              </div>
              <div class="col-md-12">
                <input type="submit" name="submit" class="btn btn-danger"></input>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>