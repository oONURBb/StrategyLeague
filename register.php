<?php
    session_start();
    $error = "";
    if(isset($_SESSION['cod_user'])){
        header("index.php", true);
    }
    session_destroy();
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Strategy League - Register</title>
    <link href="mystyle.css" rel="stylesheet">
    <script src="Scripts/jquery-1.11.2.js"></script>
    <script>
        function updateError(string) {
            $(document).ready(function(){
                document.getElementById("error").innerHTML = string;
            })
        }
    </script>
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
            
            <input type="submit" class="btnLogin btn-large-primary btn-large" value="Submit">
                <?php
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if($_POST['password'] == $_POST['repeatpassword']){
                        $con = mysqli_connect("localhost", "root", "", "strategyleague");
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $email = $_POST['email'];
                        
                        $query = "SELECT * FROM users WHERE username = '$username'";
                        
                        $res = mysqli_query($con, $query);
                        
                        if(mysqli_num_rows($res) < 1){
                            
                            $query = "INSERT INTO users(username, password, email,enabled, tipo) VALUES ('$username', '$password', '$email', 0, 'user')";
                            
                            $res = mysqli_query($con, $query);
                            echo "<script type='text/javascript'>updateError('Registado com Sucesso');</script>";
            
                        }else{
                            echo "<script type='text/javascript'>updateError('Ja existe um jogador com esse username');</script>";
                        }
                        
                        
                        mysqli_close($con);
                    }else{
                        echo "<script type='text/javascript'>updateError('Repeat Password is wrong');</script>";
                    }
                
                }
                ?>
            <div id="error"></div>
        </form>
        </div>
    </div>


</body>
</html>
