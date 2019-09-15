<!DOCTYPE html>
<html>
	<body>
		<div id="div1">
			<?php include"../links/links.php" ?>
			<link rel="stylesheet" href="/../AAA/style/style.css"> <br>
		</div>

		<div id="div2">
		<h6> Select search category </h6>
		<?php
			if (isset($_POST['search'])) {
				if(isset($_POST['order'])) {
					if($_POST['order'] == "asc") {
						$order2 = 'ASCENDING';
					} else if ($_POST['order'] == "desc") {
						$order2 = 'DESCENDING';
					}
				}

				if ($_POST['search'] == 'title') {
					echo "<p> Movies arranged according to: <b> TITLE($order2) </b> </p> <br>";
				} else if ($_POST['search'] == 'genre') {
					echo "<p> Movies arranged according to: <b> GENRE($order2) </b> </p> <br>";
				} else if ($_POST['search'] == 'year') {
					echo "<p> Movies arranged according to: <b> YEAR ON SHOW($order2) </b> </p> <br>";
				}
			}
		?>
		<form id='group' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post'>
		<input type="radio" id='search' name="search" value="title"> Title
		<input type="radio" name="search" value="genre"> Genre
		<input type="radio" name="search" value="year"> Year <br><br>
		<select name='order'>
			<option value="asc"> Ascending </option>
			<option value="desc"> Descending </option>
		</select>
		<input type="submit" class="button" value='Search' onclick='checkInput()'>
		</form> <br>

		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$search = $_POST['search'];

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "moviedb";

				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				if(isset($_POST['order'])) {
					if($_POST['order'] == "asc") {
						$order = 'ASC';
					} else if ($_POST['order'] == "desc") {
						$order = 'DESC';
					}
				}

				if ($search == 'title') {
					$sql = "SELECT * FROM movielist ORDER BY title $order";
					$result = $conn->query($sql);
				} else if($search == 'genre') {
					$sql = "SELECT * FROM movielist ORDER BY genre $order, title";
					$result = $conn->query($sql);
				} else if($search == 'year') {
					$sql = "SELECT * FROM movielist ORDER BY yearShow $order, title";
					$result = $conn->query($sql);
				}

				if ($result->num_rows > 0) {
					echo "<table id='movie'>";
					echo "<thead><th>Cover</th> <th>Title</th> <th>Year</th> <th>Genre</th> <th>Synopsis</th></thead>";
					while($row = $result->fetch_assoc()) {
						$path = $row["cover"];
						echo
						"<tr>
						<td>"."<a href='/../AAA/frontend/select.php?id=$row[movieId]'><img id='search' src='$path'>"."</a></td>
						<td>".$row["title"]."</td>
						<td>".$row["yearShow"]."</td>
						<td>".$row["genre"]."</td>
						<td>".$row["synopsis"]."</td>
						</tr>";
					}
					echo "</table>";

				} else {
					echo "0 results";
				}
				$conn->close();
			}
		?>
	</div> <br><br><br><br>
	<button type='submit' class='button' id='top' onclick='backToTop()'> Back to Top </button>
		<script>
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

			function checkInput() {
				document.getElementById('search').required = true;
			}
		</script>
	</body>
</html>
