<?php

function create_conn(){
    include ('config.php');
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    
    if(!$conn){
        die("Connection failed: " .mysqli_connect_error());
    } else return $conn;
}

function create_mysqli(){
    include ('config.php');
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } else return $conn;
}

function close_mysqli($conn){
    mysqli_close($conn);
}

function close_conn($conn){
    $conn->close();
}