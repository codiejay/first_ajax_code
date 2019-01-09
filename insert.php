<?php

    include 'conn.php';
    

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_pwd = hash('sha256',$password);


    $sql = "INSERT INTO users (uname, pwd) VALUES ('".$username."','".$hashed_pwd."')";

    if(mysqli_query($conn,$sql)){
        exit('user has been created');
    }else{
        exit('user could not be created');
    }