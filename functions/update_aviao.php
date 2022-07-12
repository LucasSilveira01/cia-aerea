<?php
    $conn = mysqli_connect("localhost","root","","cia_aerea");
    $cod = $_POST['codaviao'];
	$qtlugares = $_POST['qtlugares'];
    $tipo = $_POST['type'];
    $sql = "UPDATE aviao set qtlugares=$qtlugares, tipo='$tipo' where codaviao = $cod;";
    mysqli_query($conn, $sql);
	header("Location:../index.php?pagina=aviao");
?>