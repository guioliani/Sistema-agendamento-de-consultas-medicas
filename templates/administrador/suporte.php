<?php

require("../../configs/connection.php");
session_start();
require("../../configs/protect.php");
protegerAdmin();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Suporte</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styletemplates.css"/>


</head>

<body>

<div id="geral">
<?php
	$id = $_SESSION['id'];
	$select = $mysqli->query("SELECT * FROM suporte WHERE status = 0");
	while ($get = $select->fetch_array()){

	
?>
	<li id="menuSuporte">
		<a href= "responde.php?id=<?=$get["id_usuario"];?>">
			<div id="usuariosSuporte">
					<?php
						$idUser = $get['id_usuario'];
						$_SESSION['id_usuario'] = $idUser;

						$nome = $get['nome'];
						$_SESSION['nome'] = $nome;

					?>
					<h2><?php echo $get['nome']; ?></h2>
					<h3>Email: <?php echo $get['email']; ?></h3>
					<h3>id: <?php echo $idUser;?></h3>
					<h3>Mensagem: <?php echo substr($get['mensagem'], 0,20); ?></h3>
			</div>
		</a>
	</li>
	<?php } ?>
</div>
</body>
</html>