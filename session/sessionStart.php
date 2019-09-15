<?php
	if (isset($_POST["loginId"])) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "moviedb";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$loginId = $conn->real_escape_string($_POST["loginId"]);
		$pass = md5($conn->real_escape_string($_POST["pass"]));
		echo $pass;

		$sql = "SELECT loginId, password, name FROM adminlist";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if ($loginId == $row["loginId"] && $pass == $row["password"]) {
					session_start();

					$_SESSION["admin"] = $row["name"];
					header('Location: /../AAA/admin/admin.php');
				} else {
					header('Location: /../AAA/login/login.php?loginFailed=yes');
				}
			}
		}
	}
	$conn->close();
?>
