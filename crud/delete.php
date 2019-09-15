<?php
	require "/../session/ongoingSession.php";
?>

<!DOCTYPE html>
<html>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "moviedb";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "DELETE FROM movielist WHERE movieId=$_GET[id]";
		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
		header('Location:/../AAA/crud/show.php?action=delete');
	?>
</html>
