<?php
	require("configs/connection.php");
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Login</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
	<div id="cadastrar"><a href="cadastro.php" title="cadastre-se">Cadastre-se &raquo;</a></div>
	<div id="cadprof"><a href="cadastroprof.php" title="cadastre-se">Cadastre-se para trabalhar &raquo;</a></div>
	<div id="login-medico"><a href="login-medico.php" title="cadastre-se">Login medico &raquo;</a></div>

	<div id="login" class="form bradius">
		<div class="message">

		</div>
		<div class="logo"></div>
		<div class="acomodar";>
			<form action="?acao=logar"method="post">
				<label for="email">E-mail</label><input id="email" type="text" class="txt bradius" name="email" values=""/>
				<label for="senha">Senha</label><input id="senha" type="password" class="txt bradius" name="senha" values=""/>
				<input type="submit" id="logar" class="sb bradius" value="entrar" name="button"/>
			</form>
		</div>
	</div>

	<script src="js/jquery.js"></script>
</body>
</html>

<?php
	if(isset($_POST["button"])){
		$email = mysqli_real_escape_string($mysqli, $_POST["email"]);
		$senha = mysqli_real_escape_string($mysqli, md5($_POST["senha"]));

		if($email == "" || $senha == ""){
			echo "
					<div class='aviso yellow'>
					Preencha todos os campos!!
			          </div>
			";
			return true;
		}

		//$select = $mysqli->query("SELECT * FROM usuarios_n WHERE email='$email' AND senha='$senha'");
		$select = $mysqli->query("SELECT id, nome, email, senha, nivel FROM usuarios_n where email='$email' AND senha='$senha'
									UNION
								  SELECT id, nome, email, senha, nivel FROM usuarios_prof WHERE email='$email' AND senha='$senha'");
		$row = $select->num_rows;
		$get = $select->fetch_array();
		$id =$get['id'];
		$_SESSION['id'] = $id;
		$nome =$get['nome'];
		$perm = $get['nivel'];
		if($row > 0){
			if($perm == 1){
				session_start();
				$_SESSION["nivel"] = 1;
				echo '
				<div class="aviso green">
						logado com sucesso!!
				</div>
				';
			sleep(2);
			header('Location: templates/nivel1.php');
		}elseif($perm == 2){
			session_start();
			$_SESSION["nivel"] = 2;
			echo "<script>alert('Bem vindo $nome);'</script>";
			header('Location: templates/nivel2.php');
		}elseif($perm == 3){
			session_start();
			$_SESSION["nivel"] = 3;
			echo "<script>alert('Bem vindo $nome);'</script>";
			header('Location: sys/admin.php');
		}

		}else{
			echo "	<div class='aviso yellow'>
					Usuario ou senha incorretos!!
			          </div>";
		}
	}
?>
