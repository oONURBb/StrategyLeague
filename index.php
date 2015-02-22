<!DOCTYPE HTML>
<html>
<head>
	<?php
		session_start();
		$username = $_SESSION["username"];
		if($_SESSION["username"] === null)
			header("Location: login.php");
	?>
	<title>StrategyLeague</title>
	<link href="mystyle.css" rel="stylesheet" />
</head>

<body>
	
	<div id="charInfo">
		<div id="avatar">
			
		</div>
		<p id="lblUsername"><?php echo $username?> (<a href="login.php">Log Out</a>)</p>
		<div class="quebra"></div>
	</div>
	
	<div id="atr">
		
	</div>
	
	<div id="game">
		<div id="game-top"></div>
	</div>

</body>
</html>
