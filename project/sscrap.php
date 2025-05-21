<?php
if(isset($_POST["upload"])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sns";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if(mysqli_connect_error()){
        die("connection to this database failed due to" .mysqli_connect_error());
    }
    // echo "Success connecting to db";
    
    $material = $_POST['material'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $phone = $_POST['phone'];
    $locality = $_POST['locality'];
    $file = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $folder = "sscrapimg/".$file;
    $sql="INSERT INTO sscrap VALUES (DEFAULT,'$material', '$amount', '$price', '$phone', '$locality', '$file', current_timestamp())";
    if(move_uploaded_file($temp,$folder))
    NULL;
    else echo "Unknown error";
    if(mysqli_query($con,$sql)){
        echo "<div class='alert alert-success alert-dismissible fade show my-5' role='alert'>
        <strong>Success!</strong> Your record has been inserted successfully
        </div>";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    
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
    <title>Spare'n'scrap website</title>
</head>

<body>
    <!-- Navbar starts here -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SnS</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar ends here -->
    <p class="fs-3 mx-auto fw-bolder my-5" style="width: 300px;">Sell scrap here!</p>

    <!-- form starts here -->
    <form action="./sscrap.php" method="post" enctype="multipart/form-data">
        <!-- <div class="mx-auto" style="width: 200px;">
            Buy spare parts here!
        </div>
        <div class="mb-3 col-md-6">
                <label>First Name<span class="text-danger">*</span></label>
                <input type="text" name="first" class="form-control" placeholder="Enter First Name" required>
              </div>
        <div class="mx-auto" style="width: 200px;">
            successfully uploaded!
        </div> -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="material" class="form-control" placeholder="What kind of material is your scrap"
                aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="amount" class="form-control" placeholder="What is the amount of scrap you want to sell(in KG's)"
                aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="price" class="form-control" placeholder="Enter the rate you want to fix to the scrap(in ₹)"
                aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" aria-label="Username"
                aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="locality" class="form-control" placeholder="Enter your locality" aria-label="Username"
                aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">upload the pitcure :</span>
            <input type="file" name="file" class="form-control" placeholder="Upload the pitcure of scrap" aria-label="Upload"
                aria-describedby="basic-addon1" required>
        </div>

        <div class="mx-auto" style="width: 100px;">
            <button class="btn btn-danger" type="upload" name="upload">Upload</button>
        </div>
    </form>
    <!-- form endss here -->
</body>

</html>