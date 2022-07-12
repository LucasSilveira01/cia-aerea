<?php
	$id=$_GET['id'];
	include('connection.php');
	mysqli_query($conn,"delete from `aeroporto` where codaeroporto='$id'");
	header('location:../index.php?pagina=aeroporto');
?>