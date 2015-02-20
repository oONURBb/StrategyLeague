<?php
    include("mydata.php");
    
    $id = $_GET["id"];
    $ad = "";
    $ap = "";
    $speed = "";
    $armor = "";
    $mr = "";
    
    $con = mysqli_connect($MySqlHost, $MySqlUser, $MySqlPwd, $MySqlSchema);
    
    $query = "SELECT ad, ap, armor, speed, mr FROM atributos a, users u WHERE u.cod_user = $id AND a.cod_user = $id";
    
    $res = mysqli_query($con, $query);
    
    $row = mysqli_fetch_array($res);
    
    print json_encode($row);
    
?>