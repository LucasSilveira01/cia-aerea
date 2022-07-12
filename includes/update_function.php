<?php
	$conexao = mysqli_connect("mrs-stgobain.colluvtyxnud.sa-east-1.rds.amazonaws.com","admin","72230F4F4A","em800");
    $id = $_POST['option_value'];
    $sql = "select mac from funcionario where id = $id";
    $buscar = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($buscar);
    echo $dados['mac'];

?>