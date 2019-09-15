<?php
	require "/../session/ongoingSession.php";
?>

<!DOCTYPE html>
<html>
	<body>
		<h6> ADMIN PAGE </h6>
		<link rel="stylesheet" href="/../AAA/style/style2.css">
    <?php
      if (isset($_GET['action'])) {
        if ($_GET['action'] == 'create') {
          $message = 'Movie is successfully added!';
        } else if ($_GET['action'] == 'update') {
          $message = 'Movie is successfully updated!';
        } else if ($_GET['action'] == 'delete') {
          $message = 'Movie is successfully deleted!';
        } else if ($_GET['action'] == 'show') {
          $message = '';
        }
      }

      echo "<p id='message'> $message </p> <br>";

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
        echo "<form action='/../AAA/admin/admin.php' method='post'>";
        echo "<button type='submit' class='button'> Back </button>";
        echo "</form>";

        echo "<h1> Movie List </h1>";

        echo "<table>";
        echo "<thead><th>No</th> <th>Cover</th> <th>Title</th> <th>Year Show</th> <th>Genre</th> <th>Synopsis</th></thead>";
        while($row = $result->fetch_assoc()) {
          $path = $row["cover"];
          echo
          "<tr>
          <td>".$row["movieId"]."</td>
          <td>"."<img id='cover' src='$path'>"."</td>
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
				document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
  </body>
</html>
