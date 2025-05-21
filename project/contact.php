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
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $sql="INSERT INTO contact VALUES (DEFAULT,'$name', '$email', '$msg', current_timestamp())";
    // echo $sql;
    // if(move_uploaded_file($temp,$folder))
    // NULL;
    // else echo "Unknown error";
    if(mysqli_query($con,$sql)){
        echo "<div class='alert alert-success alert-dismissible fade show my-5' role='alert'>
        <strong>Inconvenience!</strong> We will respond to your concern as soon as possible
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
    <p class="fs-3 mx-auto fw-bolder my-5" style="width: 200px;">Contact Us!</p>

    <!-- form starts here -->
    <div class="my-2" id="contact">
        <!-- <div class="mx-auto text-white fs-3 my-5" style="width: 180px;">
            <h2>Contact Us</h2>
        </div> -->
        <!-- <hr class="bg-white text-white"> -->
        <div class="container py-4 text-white" style="margin-top: -38px;">
            <form action="./contact.php" method="post" enctype="multipart/form-data">
            <!-- <form id="contact"> -->
                <div class="mb-3">
                    <label class="form-label" name="name" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Name"
                        data-sb-validations="required" required>
                    <!-- <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div> -->
                </div>
                <div class="mb-3">
                    <label class="form-label" name="email" for="emailAddress">Email Address</label>
                    <input class="form-control" id="emailAddress" name="email" type="email" placeholder="Email Address"
                        data-sb-validations="required, email" required>
                    <!-- <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is
                        required.</div>
                    <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not
                        valid.</div> -->
                </div>
                <div class="mb-3">
                    <label class="form-label" name="msg" for="message">Message</label>
                    <textarea class="form-control" id="message" name="msg" type="text" placeholder="Message" style="height: 10rem;"
                        data-sb-validations="required" required></textarea>
                    <!-- <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div> -->
                </div>
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">Form submission successful!</div>
                </div>
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>
                <div class="mx-auto" style="width: 100px;">
                    <button class="btn btn-danger" type="upload" name="upload">Upload</button>
                </div>
            </form>

        </div>
    </div>
    <!-- form endss here -->
</body>

</html>