<?php

session_start();

require "../connection.php";
$pass=md5($_POST['password']); 
$sql=mysql_query("SELECT username,password  FROM pengguna
                  WHERE username = '$_POST[id]' 
                  AND password = '$pass'"); 
$data=mysql_fetch_array($sql); 
$hasil=mysql_num_rows($sql); 
if ($hasil > 0 ) 
{ 
	$_SESSION['user']=$data['username']; 
	header('location:admpanel.php'); 
} 
else 
{ 
	echo "<script> alert('Password / username tidak tepat...'); </script>";
	echo "<script> window.location='index.php'  </script>";
}

?>
