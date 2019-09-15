<!DOCTYPE html>
<html>
	<head>
		<title> AAA Movie Library </title>
	<head>
	<body>
		<div id="div1">
			<?php include"../links/links.php" ?>
			<link rel="stylesheet" href="/../AAA/style/style.css"> <br>
		</div>

		<div id="div2">
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "moviedb";

				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * FROM movielist ORDER BY movieId";
				$result = $conn->query($sql);

				if (isset($_GET["id"])) {
					$movieId = $_GET["id"];
				}

				if ($result->num_rows > 0) {
					echo "<table id='movie'>";
					echo "<thead><th>Cover</th> <th>Title</th> <th>Year Show</th> <th>Genre</th> <th>Synopsis</th></thead>";
					while($row = $result->fetch_assoc()) {
						if ($movieId == $row["movieId"]) {
							$path = $row["cover"];
							echo
							"<tr>
							<td>"."<a href='/../AAA/frontend/select.php?id=$row[movieId]'><img id='cover' src='$path'>"."</a></td>
							<td>".$row["title"]."</td>
							<td>".$row["yearShow"]."</td>
							<td>".$row["genre"]."</td>
							<td>".$row["synopsis"]."</td>
							</tr>";
						}
					}
					echo "</table>";
				} else {
					echo "0 results";
				}

				$conn->close();
			?>
			<form name='back' action='/../AAA/main/index.php' method='post'>
				<button type='submit' class='button2'> Back to Homepage </button>
			</form>
		</div>
		<script>
			window.scroll(0, document.documentElement.scrollHeight);
		</script>
	</body>
</html>
