<?php
	include('functions.php');
	session_cache_expire(30);
	session_start();
	$erros = array();
	
	$conexao = mysqli_connect("localhost","root","","cia_aerea");

	mysqli_query($conexao,"SET NAMES 'utf8'");
	mysqli_query($conexao,'SET character_set_connection=utf8');
	mysqli_query($conexao,'SET character_set_client=utf8');
	mysqli_query($conexao,'SET character_set_results=utf8');
	if (isset($_POST['loginUsuario'])) {
		$usuario =	mysql_escape_mimic($_POST['usuario']);
		$senha   = 	md5(mysql_escape_mimic($_POST['senha']));
		

		$sql = "select * from user where user='$usuario' and password = '$senha';";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_num_rows($resultado) == 1) {
			session_name(md5('seg'.$_SERVER['REMODE_ADDR'.$_SERVER['HTTP_USER_AGENT']]));
			$_SESSION['usuario'] = $usuario;
			$linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
			$_SESSION['id']= $linha['id'];
			$_SESSION['usuario'] = $linha['user'];
			header('location: index.php?pagina=main');
		}
		else 
			array_push($erros, "Login ou senha inválios, tente novamente!");	
	}
?>