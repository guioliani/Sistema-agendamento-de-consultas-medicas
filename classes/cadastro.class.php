<?php
//error_reporting(E_ALL);
class cadastro{
	public function cadastrar($nome, $email, $senha, $idade, $telefone, $endereço){
		//tratamento das variaveis
		$nome=ucwords(strtolower($nome));
		$senha=sha1($senha."login");	
		//inserçao no banco de dados 	
		$validaremail=mysql_query("SELECT * FROM usuario WHERE email='$email'");
		$contar=mysql_num_rows($validaremail);
		if($contar == 0){
			//inverter depois as ordens no insert 
		$insert=mysql_query("INSERT INTO usuario(nome, email, senha, idade, telefone, endereço nivel, status)VALUES('$nome', '$email', '$senha', '$idade', '$telefone', '$endereço',1,0)");
	} else{
		$flash="ja existe um usuario cadastrado com esse email";
	}
			if(isset($insert)){
				$flash="Cadastro realizado com sucesso, aguarde nossa aprovaçao!";
			}else{
				if(empty($flash)){
				$flash="Ops! houve um erro em nosso sistema, contate o administrador!";
			}
		}
		//retorno para o usuario
		echo $flash;
	}
}
?>