<?php
    $server="localhost";
    $usr="root";
    $psw="";
    $db="PPTPM";

    //Create Connection
    $conn = new mysqli($server,$usr,$psw,$db);

    //Check Connection
    if ($conn->connect_error) {
        die("Connection failed");
    } 
?>