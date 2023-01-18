<?php
    //For Local
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "financeproj";

    //Setup Connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
?>