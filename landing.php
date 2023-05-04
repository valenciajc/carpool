<!DOCTYPE html>
<html>
<head>
	<title>My Landing Page</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.container {
			padding: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center">My Landing Page</h1>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "carpool";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);

					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					// Retrieve data
					$sql = "SELECT * FROM user";
					$result = $conn->query($sql);

					$conn->close();

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
						}
					} else {
						echo "<tr><td colspan='3' class='text-center'>0 results</td></tr>";
					}
				?>
			</tbody>
		</table>
		<div class="text-center">
			<a href="landing/profile.php" class="btn btn-primary">Go Back</a>
		</div>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
