<?php

    $conn = mysqli_connect("localhost","root","","ajax_db");

    if($conn){
        echo('connected');
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_pwd = hash('sha256',$password);


    $sql = "INSERT INTO users (uname, pwd) VALUES ('".$username."','".$hashed_pwd."')";

    if(mysqli_query($conn,$sql)){
        echo('done');
    }else{
        echo(mysqli_error($conn));
    }