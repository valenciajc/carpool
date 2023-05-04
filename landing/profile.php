<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="profile.css" />
    <title>My Profile</title>
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$name = "";
$email = "";

if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];

  $query = "SELECT * FROM users WHERE id = '{$id}'";
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

    <div class="profile-card">
      <div class="image">
        <img
          src="https://www.w3schools.com/howto/img_avatar.png"
          alt=""
          class="profile-img"
        />
      </div>

      <div class="text-data">
  <span class="name"><?php echo $name ?></span>
  <span class="email"><?php echo $email ?></span>
</div>


      <div class="media-buttons">
        <a href="#" style="background: #4267b2" class="link">
          <i class="bx bxl-facebook"></i>
        </a>
        <a href="#" style="background: #1da1f2" class="link">
          <i class="bx bxl-twitter"></i>
        </a>
        <a href="#" style="background: #e1306c" class="link">
          <i class="bx bxl-instagram"></i>
        </a>
        <a href="#" style="background: #ff0000" class="link">
          <i class="bx bxl-youtube"></i>
        </a>
      </div>

      <div class="buttons">
      <form action="profile.php" class="inline">
        <button class="button">Edit Profile</button>
      </form> 

      <form action="register.html" class="inline">
        <button class="button">Register as Driver</button>
      </form>
      </form>
      <form action="http://localhost/carpool_app/landing.php" class="inline">
        <button class="button">See all Users</button>
      </form>

      </div>
      <div class="text">
        <br>
        <h3><a href="index.html"> Go Back</a></h3>
      </div>
    </form>
    </div>
    
  </body>
</html>
