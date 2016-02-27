<?php
include("include/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>pagina de cadastro</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
	<div id="cadastrar"><a href="index.php" title="faça o login">login &raquo;</a></div>
	<div id="login" class="form bradius">
		<div class="message bradius"><?php echo $msg;?></div> 
		<div class="logo"></div>
		<div class="acomodar";>
			<form action="?acao=cadastrar"method="POST">
				<label for="nome">Nome</label><input id="nome" type="text" class="txt bradius" name="nome"/>
				<label for="email">E-mail</label><input id="email" type="text" class="txt bradius" name="email"/>
				<label for="idade">Idade</label><input id="idade" type="text" class="txt bradius" name="idade"/>
				<label for="telefone">Telefone</label><input id="telefone" type="text" class="txt bradius" name="telefone"/>
				<label for="endereço">Endereço</label><input id="endereço" type="text" class="txt bradius" name="endereço"/>
				<label for="senha">Senha</label><input id="senha" type="password" class="txt bradius" name="senha"/>
				<input type="submit" class="sb bradius" value="Cadastrar"/>
			</form>
		</div>
	</div>
</body>
</html>



