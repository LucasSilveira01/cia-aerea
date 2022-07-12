<?php
    $conn = mysqli_connect("localhost","root","","cia_aerea");
    $chegada= $_POST['destino'];
    $partida = $_POST['origin'];
    $sql = "(SELECT DataPartida FROM voo where aeroportochegada = $chegada and aeroportopartida = $partida ORDER BY DataPartida DESC LIMIT 1) union (SELECT DataPartida FROM voo where aeroportochegada = $chegada and aeroportopartida = $partida ORDER BY DataPartida asc LIMIT 1);";
    $query = mysqli_query($conn, $sql);
    $datas = array();
    while($row=mysqli_fetch_array($query)){
        array_push($datas, $row['DataPartida']);
    }
    if(count($datas) == 1){
        $min = $datas[0];
        $max = $datas[0];
    }else{
        $max = $datas[0];
        $min = $datas[1];
    }
   
    $horarios = array();
    array_push($horarios, array("max"=>$max,"min"=> $min));
    echo json_encode($horarios);
?>
