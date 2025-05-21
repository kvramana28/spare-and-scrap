<?php
if (isset($_POST["upload"])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sns";

    // Establish a connection to the database
    $con = mysqli_connect($server, $username, $password, $dbname);

    // Check for a connection error
    if (mysqli_connect_error()) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Retrieve form data
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $amount = $_POST['amount'];
    $locality = $_POST['locality'];
    $phone = $_POST['phone'];
    $file = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $folder = "sspareimg/" . $file;

    // SQL query to insert data into the database
    $sql = "INSERT INTO sspare VALUES (DEFAULT, '$type', '$brand', '$amount', '$locality', '$phone', '$file', current_timestamp())";

    // Move uploaded file to the designated folder
    if (move_uploaded_file($temp, $folder)) {
        // Execute the SQL query
        if (mysqli_query($con, $sql)) {
            echo "<div class='alert alert-success alert-dismissible fade show my-5' role='alert'>
            <strong>Success!</strong> Your record has been inserted successfully
            </div>";
        } else {
            echo "ERROR: $sql <br> " . mysqli_error($con);
        }
    } else {
        echo "Unknown error while uploading the file.";
    }

    // Close the database connection
    mysqli_close($con);
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
    <p class="fs-3 mx-auto fw-bolder my-5" style="width: 300px;">Sell spare here!</p>

    <!-- Form starts here -->
    <form action="./sspare.php" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="type" class="form-control" placeholder="Enter the type of spare part you want to sell"
            aria-label="Type" aria-describedby="basic-addon1" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="brand" class="form-control" placeholder="What is the brand of spare parts" aria-label="Brand"
            aria-describedby="basic-addon1" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="amount" class="form-control" placeholder="What amount do you want to fix to the spare part (in Rs.)"
            aria-label="Amount" aria-describedby="basic-addon1" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="locality" class="form-control" placeholder="Enter your locality" aria-label="Locality"
            aria-describedby="basic-addon1" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"></span>
            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" aria-label="Phone"
            aria-describedby="basic-addon1" required>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Upload the picture:</span>
            <input type="file" name="file" class="form-control" placeholder="Upload the picture of spare part" aria-label="File"
            aria-describedby="basic-addon1" required>
        </div>
        
        <div class="mx-auto" style="width: 100px;">
            <button class="btn btn-danger" name="upload" type="submit">Upload</button>
        </div>
    </form>
    <!-- Form ends here -->
</body>
</html>
