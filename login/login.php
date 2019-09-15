<!DOCTYPE html>
<html>
	<head>
		<title> AAA Login </title>
	<head>
	<body>
		<div id="div1">
		<?php include"../links/links.php" ?>
		<link rel="stylesheet" href="/../AAA/style/style.css"> <br>
		</div>

		<div id="div2">
			<h1> Administrator Login </h1> <br>
			<?php
			if (isset($_GET["loginFailed"]))
				if ($_GET["loginFailed"] == 'yes')
					echo "<p style='color:Red;' text-align='center'> Invalid username or password! </p>";
			?>
			<br>
			<form name='login' method="post" action="/../AAA/session/sessionStart.php" onsubmit='return checkLogin()'>
				<div id='login'>
					Admin Login ID <input type="text" placeholder='Enter ID' name="loginId"> <br><br>
					Password <input type="password"  placeholder='Enter Password' name="pass"> <br><br>
					<input type="submit" class='button' value='Log In'>
				</div>
			</form>
			<br><br><br><br><br><br>
		</div>

		<script>
			function checkLogin() {
				var loginID = document.forms['login']['loginId'].value;
				var passw = document.forms['login']['pass'].value;
				if (loginID == "" || passw == "") {
					alert("Please do not leave the login ID or password field empty!");
					return false;
				}
			}
			window.scroll(0, document.documentElement.scrollHeight);

		</script>
	</body>
</html>
