<?php
    session_start();
    $error = "";
    if(isset($_SESSION['cod_user'])){
        header("index.php", true);
    }
    session_destroy();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($_POST['password'] == $_POST['repeatpassword']){
            echo "test";
            $con = mysqli_connect("localhost", "root", "", "strategyleague");
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            $queryInsert = "INSERT INTO users (username, password, email, enabled, tipo) VALUES $username, $password, $email, 0, user";
            
            mysqli_query($con, $queryInsert);
            mysqli_close($con);
            
        }else{
            $error = "Repeat Password is wrong";
        }
    
    }
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Strategy League - Register</title>
    <link href="mystyle.css" rel="stylesheet">
</head>
<body>
    <div id="container">
        <div id="register">
        <form action="register.php" method="post" autocomplete="off">
            <header>
                <div class="logo"></div>
                <h1>SIGN UP</h1>
                <p>Register to the best Strategy game on the interWebs</p>
            </header>
            <label for="username">Username</label>
            <input id="username" class="form-control" type="text" name="username"/>
            
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password"/>
            
            <label for="repeatpassword">Repeat Password</label>
            <input id="repeatpassword" class="form-control" type="password" name="repeatpassword"/>
            
            <label for="email">E-mail</label>
            <input id="email" class="form-control" type="email" name="email"/>
            
            <input type="submit" value="Submit">
                <?php echo $error ?>
        </form>
        </div>
    </div>


</body>
</html>
