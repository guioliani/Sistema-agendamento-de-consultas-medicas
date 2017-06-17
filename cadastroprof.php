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
	<div class="cadastrar"><a href="index.html" title="faça o login">inicio &raquo;</a></div>
	<div class="formulario" class="form bradius">
		<div class="message bradius"></div> 
		<div class="logo"></div>
		<div class="acomodar";>
			<form action="" method="POST" enctype="multipart/form-data">
				<label for="nome">Nome</label><input id="nome" type="text" class="txt bradius" name="nome"/>
				<label for="email">E-mail</label><input id="email" type="text" class="txt bradius" name="email"/>
				<label for="idade">Idade</label><input id="idade" type="text" class="txt bradius" name="idade"/>
				<input type="radio" name="sexo" values="F" checked="checked">Feminino
				<input type="radio" name="sexo" values="M">Masculino
                <br>
				<td>Estado:</td>
     			<td><select name="estado" id="estado" class="txt bradius">
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
                <label for="cpf">CPF</label><input id="cpf" type="text" class="txt bradius" name="cpf"/>
                <label for="numreg">Numero de registro</label><input id="numreg" type="text" class="txt bradius" name="numreg"/>
                <br>

                <td>Escolha sua profissao:</td>
                <td><select name="tipoprof" id="tipoprof" class="txt bradius">
                    <option>Selecione...</option>
                    <option value="Medico">Cardiologista</option>
					<option value="Medico">Otorrinolaringologista</option>
					<option value="Medico">Pediatria</option>
					<option value="Medico">Endocrinologista</option>
                </select>


                <label for="especializacao">Especialização</label><input id="especializacao" type="text" class="txt bradius" name="especializacao"/>
                <label for="senha">Senha</label><input id="senha" type="password" class="txt bradius" name="senha"/>
				Foto: <input type="file" required name="foto">
                
                <input type="checkbox" name="termos" onclick="if(document.getElementById('button').disabled==true){document.getElementById('button').disabled=false}"><a class="termos" href="termos.html" target="_blank">Termos e serviços</a>
                
                <input type="submit" class="sb bradius" value="Cadastrar" name="button" id="button" disabled="disabled"/>
			</form>
		</div>
	</div>
</body>
</html>


<?php
    if(isset($_POST['button']) || isset($_FILES['foto'])){
        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $idade = mysqli_real_escape_string($mysqli, $_POST['idade']);
        $sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
        $estado = mysqli_real_escape_string($mysqli, $_POST['estado']);
        $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
        $endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
        $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
        $numreg = mysqli_real_escape_string($mysqli, $_POST['numreg']);
        $tipoprof = mysqli_real_escape_string($mysqli, $_POST['tipoprof']);
        $especializacao = mysqli_real_escape_string($mysqli, $_POST['especializacao']);
        $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "uploads/";
        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);


        if($nome == "" || $email == "" || $idade == "" || $sexo == "" || $estado == "" || $telefone == "" || $endereco == "" || $cpf == "" || $numreg == "" || $tipoprof == "" || $especializacao == "" || $senha == "" ){
            echo "<div class='aviso red'>
                        Preencha todos os campos
                      </div>";
            return true;
        }
        
        $select = $mysqli->query("SELECT * FROM usuarios_prof WHERE email='$email'");
        if($select){
        $row = $select->num_rows;
        if($row > 0){
            echo "<<div class='aviso yellow'>
                        Ja existe um usuario cadastrado com esse email
                      </div>";
        }else{
            $insert = $mysqli->query("INSERT INTO `usuarios_prof`(`nome`, `email`, `idade`, `sexo`, `estado`, `telefone`, `endereco`, `cpf`, `numreg`, `tipoprof`, `especializacao`, `senha`, `foto`, `nivel`, `status`) VALUES ('$nome', '$email', '$idade', '$sexo', '$estado', '$telefone',  '$endereco', '$cpf', '$numreg', '$tipoprof', '$especializacao', '".md5($senha)."', '$novo_nome', 2,0 )");
            if($insert){
                echo "<div class='aviso green'>
                        Usuario registrado com sucesso
                      </div>";
            }else{
                echo $mysqli->error;     
            }
        }
    }else{
        echo $mysqli->error;
    }
}

?>