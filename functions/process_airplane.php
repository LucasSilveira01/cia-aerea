<?php
	$conexao = mysqli_connect("localhost","root","","cia_aerea");
    if(isset($_POST['cad_airplane'])){
        $codaviao = $_POST['codaviao'];
        $qtlugares = $_POST['qtlugares'];
        $type = $_POST['type'];

        $sql = "insert into aviao values($codaviao, $qtlugares, '$type');";
        $query = mysqli_query($conexao, $sql);
        header("location: ../index.php?pagina=aviao");

    }
?>