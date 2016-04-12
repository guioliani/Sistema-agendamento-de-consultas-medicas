<?php
	require("../configs/connection.php");
	session_start();
	require("../configs/protect.php");
	protegerAdmin();

	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Profissional</title>
	<div id="sair" class="form bradius"><a href="?action=sair" title="sair">sair</a></div>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../css/styletemplates.css"/>
</head>

<body>
<div id="nav">
		<ul>
			<li id="consulta"><a href="#">chat</a></li>
			<li id="agenda"><a href="#">Minha agenda</a></li>
			<li id="favorito"><a href="#">Ultima consulta</a></li>
			<li id="atcad"><a href="#">Atualizar cadastro</a></li>
			<li id="sair"><a href="?action=sair">sair</a></li>
		</ul>
	</div>
</body>

</html>