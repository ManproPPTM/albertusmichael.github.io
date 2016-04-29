<?php
   /* $server="mysql.idhostinger.com";
    $usr="u446092311_pptpm";
    $psw="pQeMfcMxiv6VETzQMf";
    $db="u446092311_pptpm";

    //Create Connection
    $conn=new mysqli($server,$usr,$psw);
    $conn->select_db($db);*/


    mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("PPTPM") or die("database tidak ditemukan");
?>