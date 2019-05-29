<?php
    $con = mysqli_connect("localhost","root","root123");
    if(!$con){
        die("connection failed ".mysqli_connect_error());
    }
    else{
        echo "connection sucessfull";
    }
    if(mysqli_query($con,"CREATE DATABASE test")){
        echo "database created";
    }
    else{
        echo "failed to create database ".mysqli_connect_error();
    }
    mysqli_close($con);
?>

