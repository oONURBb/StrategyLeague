<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<p>Está logado!</p>

<?php
	session_start();
	$userid = $_SESSION["user_id"];
	if($_SESSION["user_id"] === null)
		header("Location: login.php");
?>

</body>
</html>
