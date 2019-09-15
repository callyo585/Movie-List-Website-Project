<?php
	require "/../session/ongoingSession.php";
?>

<!DOCTYPE html>
<html>
	<body>
		<h6> ADMIN PAGE </h6>
		<link rel="stylesheet" href="/../AAA/style/style2.css">
		<?php
			$target_dir = "../cover/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}


			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "moviedb";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$title = $_POST['title'];
			$year = $_POST['year'];
			$synopsis = $_POST['synopsis'];
			$genre = $_POST['genre'];

			$sql = "INSERT INTO movielist (title, yearShow, genre, cover, synopsis) VALUES ('$title', '$year', '$genre', '$target_file', '$synopsis')";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			header('Location:/../AAA/crud/show.php?action=create');
		?>
	</body>
</html>
