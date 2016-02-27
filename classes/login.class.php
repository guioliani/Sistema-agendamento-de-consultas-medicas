<?php
	class login{
		public function logar ($email, $senha){
			$buscar=mysql_query("SELECT * FROM usuario WHERE email='$email' AND senha='$senha' AND status='1' LIMIT 1");
			if(mysql_num_rows($buscar)==1){
				$dados=mysql_fetch_array($buscar);
				$_SESSION["email"]=$dados["email"];
				$_SESSION["senha"]=$dados["senha"];
				$_SESSION["nivel"]=$dados["nivel"];
				setcookie("logado",1);
				$log="1";
				$nivel=$_SESSION["nivel"];
			}
				if(isset($log)){
					$flash="Voce foi logado com sucesso";

					if($nivel == 1){
					header('Location: templates/nivel1.php');
				}else{
					header('Location: templates/nivel2.php');
				}


				}else{
					$flash="Ops! digite seu email e sua senha corretamente";
				}
			echo $flash;
		}
	}

?>