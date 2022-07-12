<?php
    $conn = mysqli_connect("localhost","root","","cia_aerea");
    $cod = $_POST['codaero'];
	$nome = $_POST['nomeaero'];
    $cidade = $_POST['cityaero'];
    $estado = $_POST['stateaero'];
    $sql = "UPDATE aeroporto set nome='$nome', cidade='$cidade', estado = '$estado' where codaeroporto = $cod;";
    mysqli_query($conn, $sql);
	header("Location:../index.php?pagina=aeroporto");
?>