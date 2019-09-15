<?php
	require "/../session/ongoingSession.php";
?>

<!DOCTYPE html>
<html>
	<body>
		<h6> ADMIN PAGE </h6>
		<link rel="stylesheet" href="/../AAA/style/style2.css">
		<?php
			if (isset($_POST["crud"])) {
				$crud = $_POST["crud"];
			}

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

			if ($crud == "show") {
				header('Location: show.php?action=show');
			} else if ($crud == "create") {
				echo "<form name='back' action='/../AAA/admin/admin.php' method='post'>";
				echo "<button type='submit' class='button'> Back </button>";
				echo "</form>";

				echo "<div id='add'>";
				echo "<h2> New Movie Registration Form </h2>";
				echo "<form name='addnew' onsubmit='return checkInput()' action='create.php' method='post' enctype='multipart/form-data'>";
				echo "<span class='error'> * required field </span> <br><br>";
				echo "Title: <br> <input type='text' placeholder='Enter Title' name='title'> <span class='error'> * </span> <br><br>";
				echo "Year: <br> <select name='year'>";
				echo "<option disabled selected value> --select a year-- </option>";
	   					for($i = 1950 ; $i <= date('Y'); $i++){
	      					echo "<option> $i </option>";
							}
				echo "</select> <br><br>";
				//echo "Genre: <br> <input type='text' name='genre'> <span class='error'> *Alphabets only! </span> <br><br>";
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
				echo "Synopsis: <br> <textarea name='synopsis' placeholder='Enter Synopsis' rows='5' cols='40'></textarea> <span class='error'> * </span> <br><br>";
				echo "Select image to upload: <br> ";
				echo "<input type='file' name='fileToUpload' id='fileToUpload'> <span class='error'> * </span> <br><br>";
				echo "<input type='submit' class='button'>";
				echo "</form> </div> <br><br><br><br>";
			} else if ($crud == "edit") {
				if ($result->num_rows > 0) {

					echo "<form action='/../AAA/admin/admin.php' method='post'>";
					echo "<button type='submit' class='button'> Back </button>";
					echo "</form>";

					echo "<h3> Movie List </h3>";
					echo "<h4> Select one movie to edit (click on image or title) </h4>";

					echo "<table>";
					echo "<thead><th>No</th> <th>Cover</th> <th>Title</th> <th>Year Show</th> <th>Genre</th> <th>Synopsis</th></thead>";
					while($row = $result->fetch_assoc()) {
						$path = $row["cover"];
						echo
						"<tr>
						<td>".$row['movieId']."</a></td>
						<td>"."<a href='edit.php?id=$row[movieId]'><img id='cover' src='$path'>"."</a></td>
						<td>"."<a href='edit.php?id=$row[movieId]'>".$row["title"]."</td>
						<td>".$row["yearShow"]."</td>
						<td>".$row["genre"]."</td>
						<td>".$row["synopsis"]."</td>
						</tr>";
					}
					echo "</table>";
				} else {
					echo "0 results";
				}
			} else if ($crud == "delete") {
				if ($result->num_rows > 0) {

					echo "<form action='/../AAA/admin/admin.php' method='post'>";
					echo "<button type='submit' class='button'> Back </button>";
					echo "</form>";

					echo "<h5> Movie List </h5>";
					echo "<p> Select one movie to delete(Click on image or title) </p>";

					echo "<table>";
					echo "<thead><th>No</th> <th>Cover</th> <th>Title</th> <th>Year Show</th> <th>Genre</th> <th>Synopsis</th></thead>";
					while($row = $result->fetch_assoc()) {
						$path = $row["cover"];
						echo
						"<tr>
						<td>".$row['movieId']."</a></td>
						<td>"."<a href='delete.php?id=$row[movieId]' onclick='return confirmDelete()'><img id='cover' src='$path'>"."</a></td>
						<td>"."<a href='delete.php?id=$row[movieId]' onclick='return confirmDelete()'>".$row["title"]."</td>
						<td>".$row["yearShow"]."</td>
						<td>".$row["genre"]."</td>
						<td>".$row["synopsis"]."</td>
						</tr>";
					}
					echo "</table>";
				} else {
					echo "0 results";
				}
			}
			$conn->close();
		?>
		<br><br><br><br>
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
				document.documentElement.scrollTop = 0;
			}

			function checkInput() {
				var isNum = /^[0-9]+$/;
				var isAlphabet = /^[A-Za-z]+$/;
				var fuData = document.getElementById('fileToUpload');
				var uploadPath = fuData.value;
				var title = document.forms["addnew"]["title"].value;
				var year = document.forms["addnew"]["year"].value;
				var genre = document.forms["addnew"]["genre"].value;
				var synopsis = document.forms["addnew"]["synopsis"].value;

				if (!/\S/.test(title) && !/\S/.test(synopsis)) {
					alert("Please FILL IN the fields or EMPTY SPACE(S) is not allowed in: TITLE & SYNOPSIS!");
					return false;
				}  else if (!/\S/.test(title)) {
					alert("Please FILL IN the fields or EMPTY SPACE(S) is not allowed in: TITLE!");
					return false;
				} else if (!/\S/.test(synopsis)) {
					alert("Please FILL IN the fields or EMPTY SPACE(S) is not allowed in: SYNOPSIS!");
					return false;
				}

				if (year == "" || genre == "") {
					alert("Please choose an option for year or genre!");
					return false;
				}

				if (uploadPath == "") {
					alert("Please upload an image!");
					return false;

				} else {
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

				if(confirm("Add new movie?")) {
					return true;
				} else {
					return false;
				}
			}

			function confirmDelete() {
				if (confirm('Are you sure to delete?')) {
					return true;
				} else {
					return false;
				}
			}
		</script>
	</body>
</html>
