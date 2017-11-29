<?php   

    $connect = mysqli_connect("localhost", "root", "040182", "db_todolist");

    if(!$connect){

        die("Database connection failed!");

    }