<?php
  session_start();

  $conn = mysqli_connect("localhost", "root", "", "carpool");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];

    $query = "SELECT * FROM users WHERE id = '{$id}' name = '{name}' email = '{email}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $email = $row["email"];
      }
    }
  }

  mysqli_close($conn);
?>
