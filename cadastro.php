<?php
require("configs/connection.php");
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
		<div class="message bradius"></div> 
		<div class="logo"></div>
		<div class="acomodar";>
			<form action="" method="POST" onsubmit="return validaCampo(); return false;">
				<label for="nome">Nome</label><input id="nome" type="text" class="txt bradius" name="nome"/>
				<label for="email">E-mail</label><input id="email" type="text" class="txt bradius" name="email"/>
				<label for="idade">Idade</label><input id="idade" type="text" class="txt bradius" name="idade"/>
				<input type="radio" name="sexo" values="F">Feminino
				<input type="radio" name="sexo" values="M">Masculino
                <br>
				<td>Estado:</td>
     			<td><select name="estado" id="estado">
       				<option>Selecione...</option>
        			<option value="AC">AC</option>
       				<option value="AL">AL</option>
       				<option value="AP">AP</option>
        			<option value="AM">AM</option>
        			<option value="BA">BA</option>
        			<option value="CE">CE</option>
        			<option value="ES">ES</option>
        			<option value="DF">DF</option>
        			<option value="MA">MA</option>
        			<option value="MT">MT</option>
        			<option value="MS">MS</option>
        			<option value="MG">MG</option>
        			<option value="PA">PA</option>
        			<option value="PB">PB</option>
        			<option value="PR">PR</option>
        			<option value="PE">PE</option>
        			<option value="PI">PI</option>
        			<option value="RJ">RJ</option>
        			<option value="RN">RN</option>
        			<option value="RS">RS</option>
        			<option value="RO">RO</option>
        			<option value="RR">RR</option>
        			<option value="SC">SC</option>
        			<option value="SP">SP</option>
        			<option value="SE">SE</option>
        			<option value="TO">TO</option>
          		</select>

				<label for="telefone">Telefone</label><input id="telefone" type="text" class="txt bradius" name="telefone"/>
				<label for="endereco">Endereço</label><input id="endereco" type="text" class="txt bradius" name="endereco"/>
				<label for="senha">Senha</label><input id="senha" type="password" class="txt bradius" name="senha"/>
				<input type="submit" class="sb bradius" value="Cadastrar" name="button"/>
			</form>
		</div>
	</div>
</body>
</html>


<?php
    if(isset($_POST['button'])){
        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $idade = mysqli_real_escape_string($mysqli, $_POST['idade']);
        $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
        $estado = mysqli_real_escape_string($mysqli, $_POST['estado']);
        $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
        $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

        if($nome == "" || $email == "" || $idade == "" || $sexo == "" || $estado == "" || $telefone == "" || $endereco == "" || $senha == "" ){
            echo "<script>alert('Preencha todos os campos');</script>";
            return true;
        }
        if(strlen($senha)<8){
            echo "<script>alert('a senha precisa ter no minimo 8 caracteres');</script>";
            
        }

        $select = $mysqli->query("SELECT * FROM usuarios_n WHERE email='$email'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo "<script>alert('ja existe um usuario cadastrado com esse email');</script>";
        }else{
            $insert = $mysqli->query("INSERT INTO `usuarios_n`(`nome`, `email`, `idade`, `sexo`, `estado`, `telefone`, `endereco`, `senha`, `nivel`, `status`) VALUES ('$nome', '$email', '$idade', '$sexo', '$estado', '$telefone', '$endereco', '".md5($senha)."', 1,0 )");
            if($insert){
                echo "<script>alert('usuario registrado com sucesso');</script>";
            }else{
                echo $mysqli->error;
            }
        }
    }else{
        echo $mysqli->error;
    }
}

?>