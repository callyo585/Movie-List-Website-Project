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

		<h3> Movie List </h3>

		<div id="div2">
		<h6> Click on image or title for further movie details </h6>

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

				if ($result->num_rows > 0) {
					echo "<table id='movie'>";
					echo "<tr>";
					$count = 0;
					while($row = $result->fetch_assoc()) {
						$path = $row["cover"];
						echo "<td id='movie'>"."<a href='/../AAA/frontend/select.php?id=$row[movieId]'><img id='cover' src='$path'>"."</a><br><a href='/../AAA/frontend/select.php?id=$row[movieId]'>".$row["title"]."</a></td>";
						$count++;

						if ($count%4 == 0) {
							echo "</tr><tr>";
						}
					}
					echo "</table>";
				} else {
					echo "0 results";
				}
				$conn->close();
				?>
		</div>

		<button type='submit' class='button' id='top' onclick='backToTop()'> Back to Top </button>

		<script>
			/*
			back to top button will cause scrolling function to stop abruptly when button appears.
			this seems to be a problem with Google Chrome itself.
			almost all of the pages with this button will encounter this problem.
			Used Microsoft Edge and Mozilla Firefox, this problem did not occur.
			*/

      window.onscroll = function() {scroll()};

      function scroll() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              document.getElementById("top").style.display = "block";
          } else {
              document.getElementById("top").style.display = "none";
          }
      }

      function backToTop() {
				document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
	</body>
</html>
