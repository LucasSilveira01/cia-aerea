<?php
	$id=$_GET['id'];
	include('connection.php');
	mysqli_query($conn,"delete from `aviao` where codaviao='$id'");
	header('location:../index.php?pagina=aviao');
?>