<?php
	require("configs/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Recuperar Senha</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php
if(isset($_GET['codigo'])){
	$codigo = $_GET['codigo'];
	$email_codigo = base64_decode($codigo);

	$select = $mysqli->query("SELECT * FROM codigo_senha WHERE codigo = '$codigo' AND data > NOW()");
	$row = $select->num_rows;
	if($row >= 1){
		if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){
			$nova_senha = $_POST['novasenha'];

			$atualizar = $mysqli->query("UPDATE usuarios_n SET senha = '".md5($nova_senha)."' WHERE email = '$email_codigo' ");
			if($atualizar){
				$mudar = $mysqli->query("DELETE FROM codigo_senha WHERE codigo = '$codigo'");
				echo 'atualizou';
			}
		}
		?>
		<div class="formulario" class="form bradius">
			<div class="message">

			</div>
			<div class="logo"></div>
			<div class="acomodar";>
				<h1>Digite a nova senha</h1>
				<form action="" method="POST" enctype="multipart/form-data">
					<label for="email">E-mail</label><input id="email" type="password" class="txt bradius" name="novasenha" values=""/>
					<input type="hidden" name="acao" value="mudar"/>
					<input type="submit" id="logar" class="sb bradius" value="mudar senha" name="recupera"/>
				</form>
			</div>
		</div>
		<?php
	}else{
		echo '<h1>Desculpe mas este link ja expirou</h1>';
	}
}

?>
</body>
