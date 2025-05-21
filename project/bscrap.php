<?php
$insert = false;
$update = false;
$delete = false;

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "sns"; // Ensure this database exists

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Uncomment and modify as needed for update functionality
    // if (isset($_POST['snoEdit'])) {
    //     $sno = $_POST["snoEdit"];
    //     $material = $_POST["materialEdit"];
    //     $amount = $_POST["amountEdit"];
    //     $price = $_POST["priceEdit"];
    //     $phone = $_POST["phoneEdit"];
    //     $locality = $_POST["localityEdit"];
    //     $file = $_POST["fileEdit"];

    //     $sql = "UPDATE `sscrap` SET `material` = '$material', `amount` = '$amount' WHERE `sno` = $sno";
    //     $result = mysqli_query($conn, $sql);

    //     if ($result) {
    //         $update = true;
    //     } else {
    //         echo "We could not update the record successfully";
    //     }
    // } else {
        $material = $_POST["material"];
        $amount = $_POST["amount"];
        $price = $_POST["price"];
        $phone = $_POST["phone"];
        $locality = $_POST["locality"];
        $file = $_POST["file"];

        $sql = "INSERT INTO `sscrap` (`material`, `amount`, `price`, `phone`, `locality`, `file`) 
                VALUES ('$material', '$amount', '$price', '$phone', '$locality', '$file')";
        $result = mysqli_query($conn, $sql);

        if ($result) { 
            $insert = true;
        } else {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
    //}
}
?>
