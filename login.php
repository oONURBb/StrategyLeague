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
		$query = "SELECT * FROM users WHERE username='$username'";
		echo $query;
		$result = mysqli_query($con, $query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows > 0){
		    
			while($row = mysqli_fetch_array($result)){
			    if(password_verify($password, $row['password'])){
				$cod = $row['cod_user'];
				$exists = true;
			    }
			}
		}
		if($exists == true)
		{
		    session_start();
		    $_SESSION['username'] = $username;
		    $_SESSION['user_id'] = $cod;
		    header("Location: index.php");
		}else{
		    session_start();
		    $_SESSION['username'] = "";
		    $error = "Username ou Password errados";
		}
	}
?>

<body>
	<div id="container">
        <div id="register">
        <form action="login.php" method="post" autocomplete="off">
            <header>
                <div class="logo"></div>
                <h1>SIGN UP</h1>
                <p>Register to the best Strategy game on the interWebs</p>
            </header>
            <label for="username">Username</label>
            <input id="username" class="form-control" type="text" name="username"/>
            
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password"/>
            
            <input type="submit" class="btnLogin btn-large-primary btn-large" value="Submit">
                <?php echo $error ?>
        </form>
        </div>
    </div>
</body>
</html>
