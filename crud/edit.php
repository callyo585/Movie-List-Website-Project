<?php
	require "/../session/ongoingSession.php";
?>

<!DOCTYPE html>
<html>
	<body>
		<h6> ADMIN PAGE </h6>
		<link rel="stylesheet" href="/../AAA/style/style2.css">

		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "moviedb";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			if (isset($_GET["id"])) {
				$movieId = $_GET["id"];
			}

			echo "<form action='/../AAA/admin/admin.php' method='post'>";
			echo "<button type='submit' class='button'> Back </button>";
			echo "</form>";

			$sql = "SELECT movieId, title, yearShow, genre, cover, synopsis FROM movielist";
			$result = $conn->query($sql);

			echo "<p> Movie to edit: </p>";
			if ($result->num_rows > 0) {
				echo "<table>";
				echo "<thead><th>Cover</th> <th>Title</th> <th>Year Show</th> <th>Genre</th> <th>Synopsis</th></thead>";
				while($row = $result->fetch_assoc()) {
					if ($movieId == $row["movieId"]) {
						$title = $row["title"];
						$synopsis = $row["synopsis"];
						$path = $row["cover"];
						echo
						"<tr>
						<td>"."<img id='cover' src='$path'>"."</a></td>
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

			echo "<div id='add'>";
			echo "<h2> Movie Edit Form </h2>";
			echo "<form name='edit' onsubmit='return checkEdit()' action='confirmEdit.php' method='post' enctype='multipart/form-data'>";
			echo "Movie ID: <br> <input type='text' name='movieId' value=$movieId readonly> <br><br>";
			echo "Title: <br> <input type='text' placeholder='Enter Title' name='title'> <br><br>";
			echo "Year: <br> <select name='year'>";
			echo "<option disabled selected value> --select a year-- </option>";
   					for($i = 1950 ; $i <= date('Y'); $i++){
      					echo "<option>$i</option>";
						}
			echo "</select> <br><br>";
			//echo "Year Show: <br> <input type='text' name='year'> <br><br>";
			//echo "Genre: <br> <input type='text' name='genre'> <br><br>";
			echo "Genre: <br> <select name='genre'>";
			echo "<option disabled selected value> --select a genre-- </option>";
			echo "<option> ACTION </option>";
			echo "<option> SCI-FI </option>";
			echo "<option> HORROR </option>";
			echo "<option> ROMANCE </option>";
			echo "<option> COMEDY </option>";
			echo "<option> THRILLER </option>";
			echo "<option> DRAMA </option>";
			echo "<option> MYSTERY </option>";
			echo "<option> CRIME </option>";
			echo "<option> ANIMATION </option>";
			echo "<option> ADVENTURE </option>";
			echo "<option> FANTASY </option>";
			echo "</select> <br><br>";
			echo "Synopsis: <br> <textarea placeholder='Enter Synopsis' name='synopsis'  rows='5' cols='40'></textarea> <br><br>";
			echo "Select image to upload: <br> ";
			echo "<input type='file' name='fileToUpload' id='fileToUpload'> <br><br>";
			echo "<input type='submit' class='button'> </div> <br><br>";

				$conn->close();
		?>
			<br><br><br><br>

			<script>
				function checkEdit() {
					var isNum = /^[0-9]+$/;
					var isAlphabet = /^[A-Za-z]+$/;
					var title = document.forms["edit"]["title"].value;
					var year = document.forms["edit"]["year"].value;
					var genre = document.forms["edit"]["genre"].value;
					var synopsis = document.forms["edit"]["synopsis"].value;
					var fuData = document.getElementById('fileToUpload');
					var uploadPath = fuData.value;

					if (year == "" && genre == "" && uploadPath == "" && title == "" && synopsis == "") {
						alert("There is no input for changes!");
						return false;
					}

					if(/^\s+$/.test(title) && /^\s+$/.test(synopsis)) {
						alert("Input cannot be white space only for : TITLE & SYNOPSIS!");
						return false;
					} else if(/^\s+$/.test(title)) {
						alert("Input cannot be white space only for : TITLE!");
						return false;
					} else if(/^\s+$/.test(synopsis)) {
						alert("Input cannot be white space only for : SYNOPSIS!");
						return false;
					}

					if (uploadPath != "") {
						var Extension = uploadPath.substring(
								uploadPath.lastIndexOf('.') + 1).toLowerCase();


						if (Extension == "jpeg" || Extension == "jpg") {
								if (fuData.files && fuData.files[0]) {
									var reader = new FileReader();

									reader.onload = function(e) {
										$('#blah').attr('src', e.target.result);
									}

									reader.readAsDataURL(fuData.files[0]);
								}
						} else {
							alert("Only JPG or JPEG allowed!");
							return false;
						}
					}

					if (confirm("Confirm changes?")) {
						return true;
					} else {
						return false;
					}
				}
			</script>
	</body>
</html>
