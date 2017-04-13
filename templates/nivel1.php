<?php

	require("../configs/connection.php");
	session_start();
	require("../configs/protect.php");
	protegerUser();

	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../index.html");
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
			<li class="agenda"><a href="#">Minha agenda</a></li>
			<li id="favorito"><a href="#">Meus favoritos</a></li>
			<li class="atcad"><?php echo "<a href=usuario/minha-conta.php?id=".$_SESSION['id'].">Atualizar cadastro</a>" ?></li>
			<li id="suporte"><a href="#">Suporte</a></li>
			<li class="sair"><a href="?action=sair">sair</a></li>
		</ul>
	</div>

	<?php
		$id = $_SESSION["id"];
		$select = $mysqli->query("SELECT * FROM usuarios_n WHERE id='$id'");
		$row = $select->num_rows;
        $get = $select->fetch_array();

        $nome = $get['nome'];
        $_SESSION['nome'] = $nome;
		
	?>

	<div class="dados">
		<ul>
			 <h2>bem vindo <?php echo $nome; ?></h2>
		</ul>
	</div>

</body>

</html>