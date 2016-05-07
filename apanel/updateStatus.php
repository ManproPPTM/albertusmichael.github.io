<?php 
require "../connection.php";


$kodepinjam = $_POST['kodepinjam'];	
	

$sql = "UPDATE log_peminjaman SET status='KEMBALI' WHERE kode_peminjaman='$kodepinjam'";
$conn->query($sql);

?>