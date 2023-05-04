<!DOCTYPE html>
<html>
<head>
	
	<title>My Landing Page</title>
	<style>
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			box-sizing: border-box;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th, td {
			padding: 10px;
			border: 1px solid #ccc;
			text-align: left;
		}

		th {
			background-color: #eee;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>My Landing Page</h1>
		<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "users";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			// Retrieve data
			$sql = "SELECT * FROM users";
			$result = $conn->query($sql);
			
			$conn->close();
   
			   if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
				}
			} else {
				echo "0 results";
			}
            ?>
        </table>
	</div>
</body>
</html>