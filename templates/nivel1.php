<?php
	require("../configs/connection.php");
	session_start();
	require("../configs/protect.php");
	protegerUser();

	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Usuario</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../css/styletemplates.css"/>
</head>

<body>
	<div id="nav">
		<ul>
			<li id="consulta"><a href="usuario/mconsulta.php">Marcar consulta</a></li>
			<li id="agenda"><a href="#">Minha agenda</a></li>
			<li id="favorito"><a href="#">Meus favoritos</a></li>
			<li id="atcad"><?php echo "<a href=minha-conta.php?id=".$_SESSION['id'].">Atualizar cadastro</a>" ?></li>
			<li id="suporte"><a href="cliente.php">Suporte</a></li>
			<li id="sair"><a href="?action=sair">sair</a></li>
<!--
			<div id="consulta"><a href="#" title="Consulta">Marcar consulta</a></div>
			<div id="agenda" class="form bradius"><a href="#" title="agenda">Minha agenda</a></div>
			<div id="favorito" class="form bradius"><a href="#" title="favorito">Meus favoritos</a></div>
			<div id="atcad" class="form bradius"><a href="./formulario.html" title="atualizar">Atualizar cadastro</a></div>
			<div id="sair" class="form bradius"><a href="?action=sair" title="sair">sair</a></div>

		-->
		</ul>
	</div>
</body>

</html>