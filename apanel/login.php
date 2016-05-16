<?php

session_start();

require "../connection.php";
$pass=md5($_POST['password']); 
$sql="SELECT username,password  FROM pengguna
       WHERE username = '$_POST[id]' 
       AND password = '$pass'"; 
$qry=$conn->query($sql);
$data=$qry->fetch_array(); 
$hasil=$qry->num_rows; 
if ($hasil == 1 ) 
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
