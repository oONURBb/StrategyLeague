<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
	<link href="mystyle.css" rel="stylesheet" />
</head>

<?php
	session_start();
	session_destroy();
	$username = "";
	$password = "";
	$error = "";
	$num_rows = 0;
	include "mydata.php"; //Variaveis ligação MySQL
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$con = mysqli_connect($MySqlHost, $MySqlUser, "", $MySqlSchema);
		
		if(mysqli_connect_errno())
		    echo "Connect failed:" . mysqli_connect_error();
		    
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		
		$exists = false;
		$query = "SELECT username, password, cod_user FROM login WHERE username='$username'";
		$result = mysqli_query($con, $query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows > 0){
		    
			while($row = mysqli_fetch_array($result)){
			    if(password_verify($password, $row['password'])){
				$cod = $row['cod_user'];
				$nivel = $row['nivel'];
				$exists = true;
			    }
			}
		}
		if($exists == true)
		{
		    session_start();
		    $_SESSION['login'] = $username;
		    $_SESSION['user_id'] = $cod;
		    header("Location: gamepage.php");
		}else{
		    session_start();
		    $_SESSION['login'] = "";
		    $error = "Username ou Password errados";
		}
	}
?>

<body>
	<div id="container">
		<div id="register">
			<div class="logo"></div>
			SIGN IN
			<form action="login.php" method="post">		
				<ul>
					<li><input type="text"  id="user"/></li>
					<li><input type="password" id="password" /></li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>
