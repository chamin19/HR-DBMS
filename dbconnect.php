<?php

    $hostname = "localhost";
    $username = "user";
    $password = "pass";
    $database = "db";

    $connect = mysqli_connect($hostname, $username, $password, $database);

    if($connect){
        print("Connection Established Successfully");
    }else{
        print("Connection Failed ");
    }
    
?>