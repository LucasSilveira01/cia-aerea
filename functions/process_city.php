<?php
    $conn = mysqli_connect("localhost","root","","cia_aerea");
    $origem= $_POST['origin'];
    $sql = "select DISTINCT a.cidade, a.nome, v.aeroportochegada from voo v join aeroporto a on(v.aeroportochegada = a.codaeroporto) where v.aeroportopartida = $origem";
    $busca = mysqli_query($conn, $sql);
    $voos = array();
    while($query = mysqli_fetch_array($busca)){
        array_push($voos,array(
            "cidade"=>$query['cidade'],
            "nome" => $query['nome'],
            "val" => $query['aeroportochegada']
        ));
    }
    echo json_encode($voos);
?>
