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
	<script src="Scripts/jquery-1.11.2.js"></script>
</head>
<script>

	function updateAtr() {
		var id = <?=$_SESSION["user_id"] ?>;
		var response = "";
		$.ajax({
			type: "GET",
			url: "getAttr.php?id=" + id,
			dataType : "json",
			async: false,
			success : function(text){
				 response = text;
			}
			
		});
		$("#ad").text(response['ad']);
		$("#ap").text(response['ap']);
		$("#speed").text(response['speed']);
		$("#armor").text(response['armor']);
		$("#mr").text(response['mr']);
	}

	$(document).ready(
		function() {
			setInterval(function(){
				updateAtr();
			}, 5000);
		}
	)
	
</script>
<body onload="updateAtr()">
	
	<div id="charInfo">
		<div id="avatar">
			
		</div>
		<p id="lblUsername"><?php echo $username?> (<a href="login.php">Log Out</a>)</p>
		<div class="quebra"></div>
	</div>
	
	<div id="atr">
		<div class="atr"><b>AD:</b> <div id="ad" class="atr"></div></div>
		<div class="atr"><b>AP:</b> <div id="ap" class="atr"></div></div>
		<div class="atr"><b>SPEED:</b> <div id="speed" class="atr"></div></div>
		<div class="atr"><b>ARMOR:</b> <div id="armor" class="atr"></div></div>
		<div class="atr"><b>MR:</b> <div id="mr" class="atr"></div></div>
	</div>
	
	<div id="game"></div>

</body>
</html>
