<?php
include("include/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Login</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
	<div id="cadastrar"><a href="cadastro.php" title="cadastre-se">Cadastre-se &raquo;</a></div>
	<div id="login" class="form bradius">
		<div class="message"><?php echo $msg;?></div>
		<div class="logo"></div>
		<div class="acomodar";>
			<form action="?acao=logar"method="post">
				<label for="email">E-mail</label><input id="email" type="text" class="txt bradius" name="email" values=""/>
				<label for="senha">Senha</label><input id="senha" type="password" class="txt bradius" name="senha" values=""/>
				<input type="submit" class="sb bradius" value="entrar"/>
			</form>
		</div>
	</div>
</body>
</html>