<?php
	$id=$_GET['id'];
	include('connection.php');
	mysqli_query($conn,"delete from `voo` where codvoo='$id'");
	header('location:../index.php?pagina=voo');
?>