<?php
	require "/../session/ongoingSession.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title> AAA Admin </title>
	</head>
	<body>
		<h6> ADMIN PAGE </h6>
	<?php
		if (isset($_SESSION["admin"])) {
			$admin = $_SESSION["admin"];
		}

		if (isset ($_GET["deleted"])) {
			echo "Movie successfully deleted";
		}

		if (isset ($_GET["edited"])) {
			echo "Movie successfully edited";
		}

		if (isset ($_GET["created"])) {
			echo "Movie successfully created";
		}
	?>

	<link rel="stylesheet" href="/../AAA/style/style2.css">

		<h1> Welcome, <?php echo $admin ?> </h1>
		<p> Please select an action </p>

		<form action="/../AAA/crud/crud.php" method="post">
		<select name="crud">
		<option value="show"> Show List </option>
		<option value="create"> Add </option>
		<option value="edit"> Update </option>
		<option value="delete">  Delete </option>
		</select>
		<input type="submit">
		</form>
		<br>
		<form action="/../AAA/logout/logout.php" method="post">
		<button type="submit" class="button"> Logout </button>
		</form>
	</body>
</html>
