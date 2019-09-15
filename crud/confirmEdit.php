<?php
	require "/../session/ongoingSession.php";
?>

<!DOCTYPE html>
<html>
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

		if (isset($_POST["movieId"])) {
			$movieId = $_POST["movieId"];
		}

		if ($_POST['title'] != null) {
			$title = $_POST["title"];
			$sql = "UPDATE movielist SET title='$title' WHERE movieId='$movieId'";

			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}

		if ($_POST['year'] != null) {
			$year = $_POST["year"];
			$sql2 = "UPDATE movielist SET yearShow='$year' WHERE movieId='$movieId'";

			if ($conn->query($sql2) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}

		if ($_POST['genre'] != null) {
			$genre = $_POST["genre"];
			$sql3 = "UPDATE movielist SET genre='$genre' WHERE movieId='$movieId'";

			if ($conn->query($sql3) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}

		if ($_POST['synopsis'] != null) {
			$synopsis = $_POST["synopsis"];
			$sql4 = "UPDATE movielist SET synopsis='$synopsis' WHERE movieId='$movieId'";

			if ($conn->query($sql4) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
		if($_FILES["fileToUpload"]["name"] != "") {
			$sql5 = "UPDATE movielist SET cover='$target_file' WHERE movieId='$movieId'";

				if ($conn->query($sql5) === TRUE) {
					echo "Record updated successfully";
				} else {
					echo "Error updating record: " . $conn->error;
				}
		}
		$conn->close();
		header('Location:/../AAA/crud/show.php?action=update');
	?>
</html>
