<?php
	$conexao = mysqli_connect("localhost","root","","cia_aerea");
    if(isset($_POST['cad_voo'])){
        $codvoo = $_POST['codvoo'];
        $partida = $_POST['partida'];
        $startdate = $_POST['startdate'];
        $hourstart = $_POST['hourstart'];
        $chegada = $_POST['chegada'];
        $enddate = $_POST['enddate'];
        $endhour = $_POST['endhour'];
        $aviao = $_POST['aviao'];
        $sql = "insert into voo values('$codvoo', '$partida', '$startdate', '$hourstart','$chegada', '$enddate', '$endhour','$aviao');";
        $query = mysqli_query($conexao, $sql);
        header("location: ../index.php?pagina=voo");

    }
?>