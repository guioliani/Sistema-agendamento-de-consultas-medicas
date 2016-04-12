<?php
	$user = "root";
	$serv = "localhost";
	$pass = "";
	$data = "login";

	$mysqli = new mysqli($serv, $user, $pass, $data);
	if($mysqli-> connect_error){
		echo "Erro de conexao com o banco de dados";
		exit();
	}else{
		echo "Conectado com sucesso";
	}

?>