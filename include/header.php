<?php
//globais
$home="http:localhost/loginn";
$title="administraçao";
$startaction="";
$msg="";
if(isset($_GET["acao"])){
	$acao=$_GET["acao"];
	$startaction=1;
}
//include das classes
include("classes/DB.class.php");
include("classes/cadastro.class.php");
include("classes/login.class.php");

//conexao com o banco de dados
$conectar=new DB;
$conectar=$conectar->conectar();
//cadastro
	if($startaction == 1){
		if($acao == "cadastrar"){
			$nome =$_REQUEST["nome"];
			$email =$_REQUEST["email"];
			$senha =$_REQUEST["senha"];
			$idade =$_REQUEST["idade"];
			$telefone =$_REQUEST["telefone"];
			$endereço =$_REQUEST["endereço"];

				//os campos nao estao preenchidos
				if(empty($nome)||empty($email)||empty($senha)||empty($idade)||empty($telefone)||empty($endereço)){
					$msg="Preencha todos os campos";
				}
				//todos os campos preenchidos
				else{
					//email valido
					if(filter_var($email,FILTER_VALIDATE_EMAIL)){
						//senha invalida
						if(strlen($senha)<8){
							$msg="Digite sua senha com no minimo 8 caracteres";
						}
						//senha valida
						else{
							//executa classe de cadastro
							$conectar=new cadastro;
							echo"<div class=\"flash\">";
							$conectar=$conectar->cadastrar($nome, $email, $senha, $idade, $telefone, $endereço);
							echo"<\div>";
						}
					}
					//email invalido
					else{
						$msg="Digite seu e-mail corretamente";
					}
				}
		}
	}
	//metodo de login
	if($startaction == 1){
		if($acao == "logar"){
			//dados
			$email=addslashes($_POST["email"]);
			$senha=addslashes(sha1($_POST["senha"]."login"));

			if(empty($email)||empty($senha)){
				$msg="Preencha todos os campos!";
			}else{
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$msg="Digite seu email corretamente!";
				}else{
					//executa a busca pelo usuario
					$login = new login;
					echo"<div class=\"flash\">";
					$login=$login->logar($email, $senha);
					echo"</div>";

				}

			}
		}
	}

	//metodo de checar o usuario
	if(isset($_SESSION["email"]) && isset($_SESSION["senha"])){
		$logado=1;
		$nivel=$_SESSION["nivel"];
	}


	//metodo de checar o nivel de acesso
	if(isset($_SESSION["nivel"])){
		$nivel=1;
		$nivel=$_SESSION["nivel"];
	}

	//variaveis de estilo
	if(empty($msg)){
		$display="display:none;";
	}else{
		$display="display:block;";
	}
?>