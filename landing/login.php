<?php
// connect to your database
$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', '');

// get the user's email and password from the form submission
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->execute([$email, $password]);
$user = $stmt->fetch();

// if a matching user was found, redirect to the home page
if ($user) {
  header('Location: index.html');
  exit;
}
// otherwise, display an error message
else {
  echo "Invalid email or password";
}
?>
