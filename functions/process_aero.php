<?php
	$conexao = mysqli_connect("localhost","root","","cia_aerea");
    if(isset($_POST['cad_aero'])){
        $codaero = $_POST['codaero'];
        $nomeaero = $_POST['nomeaero'];
        $cityaero = $_POST['cityaero'];
        $stateaero = $_POST['stateaero'];

        $sql = "insert into aeroporto values($codaero, '$nomeaero', '$cityaero',  '$stateaero');";
        $query = mysqli_query($conexao, $sql);
        header("location: ../index.php?pagina=aeroporto");

    }
?>