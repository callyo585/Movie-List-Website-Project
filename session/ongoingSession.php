<?php
	session_start();

	if (!isset($_SESSION["admin"])) {
		Header('Location: /../AAA/session/notLoggedIn.php');
	}
?>
