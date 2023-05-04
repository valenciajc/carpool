<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carpool";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Set the target directory and file path
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["car_image"]["name"]);

// Create the directory if it doesn't exist
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

// Move the uploaded file to the target directory
if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
    // Retrieve data from the form
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $license = $_POST['license'];
   

    // Insert the data into the database
    $sql = "INSERT INTO car_registration (brand, model, license_number, image) VALUES ('$brand', '$model', '$license', '$target_file')";
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Your Car has been registered succesfully!');window.location.href='http://localhost/carpool_app/landing/profile.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading file.";
}

// Close the database connection
$conn->close();
?>
