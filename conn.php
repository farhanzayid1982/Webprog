<?php
    $servername = "localhost";
    $username = "wp";
    $password = "wp";
    $databasename = "dbwebprog";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $databasename);
    
    // Check connection
    // Check connection
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    };
?>