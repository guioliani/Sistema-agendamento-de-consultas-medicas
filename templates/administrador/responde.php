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

<?php
$idUser = $_GET['id'];
$select = $mysqli->query("SELECT * FROM suporte WHERE id_usuario = '$idUser'");
$row = $select->num_rows;
$get = $select->fetch_array();
	
?>

<div id="SuportePagina" class="form bradius">
<form action="" method="POST">
	<label for="nome" id="SuporteNome">Nome</label><input id="SuporteNome" type="text" class="txt bradius" name="nome" value="<?php echo $get["nome"]; ?>"/>
	<label for="email" id="SuporteEmail">E-mail</label><input id="SuporteEmail" type="text" class="txt bradius" name="email" value="<?php echo $get["email"]; ?>"/>
	<label for="mensagem">Mensagem</label><textarea id="SuporteMensagem" name="mensagem" cols="100" rows="10" ></textarea>
	<input type="submit" class="sb bradius" value="Enviar" name="button" id="button"/>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['button'])){
	$nome = mysqli_real_escape_string($mysqli, $_POST["nome"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
	$mensagem = mysqli_real_escape_string($mysqli, $_POST["mensagem"]);

	if($mensagem == "" || $nome == "" || $email == ""){
		echo "<script>alert('Preencha todos os campos');</script>";
		return true;
	}

	if($mysqli){
		$query = mysqli_query($mysqli, "INSERT INTO `mensagem_enviada`(`id_usuario`, `nome_usuario`, `email_usuario`, `mensagem`, `status`) VALUES ('$idUser', '$nome', '$email', '$mensagem', 0)");
		if($query){
			echo "<script>alert('mensagem enviada com sucesso');</script>";
			$query = mysqli_query($mysqli, "UPDATE suporte SET nome='$nome', email='$email', status=1 WHERE id_usuario='$idUser'");
		}else{
			echo $mysqli->error;
		}

	}else{
		die("Error: ". mysqli_error($mysqli));
	}
}
?>