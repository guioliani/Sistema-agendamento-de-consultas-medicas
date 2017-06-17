<?php
	require("../../configs/connection.php");
	session_start();
	require("../../configs/protect.php");
	protegerFunc();
	
	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../../index.html");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Configurar consulta</title>
	<div class="voltar" class="form bradius"><a href="../nivel2.php" title="voltar">voltar</a></div>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styletemplates.css"/>
</head>
<body>
	<?php
		$id = $_SESSION['id'];
		$select = $mysqli->query("SELECT * FROM usuarios_prof WHERE id = '$id'");
		$row = $select->num_rows;
		$get = $select->fetch_array();
	?>

<div id="ConfigAgenda" class="form bradius">
<form action="" method="POST">
	<label for="nome" class="ConfigMedico">Nome</label><input id="ConfigMedico" type="text" class="txt bradius" name="nome" value="<?php echo $get["nome"]; ?>"/>
	<label for="endcons" class="ConfigMedico">Endereço da consulta</label><input id="ConfigMedico" type="text" class="txt bradius" name="endcons" value="<?php echo $get["endereco"]; ?>"/>
	<label for="espec" class="ConfigMedico">Especialização do medico</label><input id="ConfigMedico" type="text" class="txt bradius" name="espec" value="<?php echo $get["especializacao"]; ?>"/>
	<label for="numreg" class="ConfigMedico">Numero do registro</label><input id="ConfigMedico" type="text" class="txt bradius" name="numreg" value="<?php echo $get["numreg"]; ?>"/>
	<label for="idade" class="ConfigMedico">Idade medico</label><input id="ConfigMedico" type="text" class="txt bradius" name="idade" value="<?php echo $get["idade"]; ?>"/>
	<label for="sexo" class="ConfigMedico">Sexo medico</label><input id="ConfigMedico" type="text" class="txt bradius" name="sexo" value="<?php echo $get["sexo"]; ?>"/>
	<label for="telefone" class="ConfigMedico">Telefone contato</label><input id="ConfigMedico" type="text" class="txt bradius" name="telefone" value="<?php echo $get["telefone"]; ?>"/>
	<label for="estado" class="ConfigMedico">Estado do hospital ou consultorio</label><input id="ConfigMedico" type="text" class="txt bradius" name="estado" value="<?php echo $get["estado"]; ?>"/>
	
	
	<label for="valor" class="ConfigMedico">Valor da consulta</label><input id="ConfigMedico" type="text" class="txt bradius" name="valor" value=""/>
	<label for="data" class="ConfigMedico">Data da consulta</label><input id="ConfigMedico" type="date" class="txt bradius" name="data" value=""/>
	<label for="hora" class="ConfigMedico">Hora da consulta</label><input id="ConfigMedico" type="time" class="txt bradius" name="hora" value=""/>
	<input type="submit" class="sb bradius" value="Enviar" name="button" id="button"/>

</form>
</div>
</body>
</html>
<?php
	if(isset($_POST['button'])){
		$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
		$endcons = mysqli_real_escape_string($mysqli, $_POST['endcons']);
		$espec = mysqli_real_escape_string($mysqli, $_POST['espec']);
		$numreg = mysqli_real_escape_string($mysqli, $_POST['numreg']);
		$idade = mysqli_real_escape_string($mysqli, $_POST['idade']);
		$sexo = mysqli_real_escape_string($mysqli, $_POST['sexo']);
		$telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
		$estado = mysqli_real_escape_string($mysqli, $_POST['estado']);
		$valor = mysqli_real_escape_string($mysqli, $_POST['valor']);
		$data = mysqli_real_escape_string($mysqli, $_POST['data']);
		$hora = mysqli_real_escape_string($mysqli, $_POST['hora']);

		if($nome == "" || $endcons == "" || $espec == "" || $numreg == "" || $idade == "" || $sexo == "" || $telefone == "" || $estado == "" || $valor == "" || $data == "" || $hora == ""){
			echo "<script>alert('Preencha todos os campos');</script>";
			return true;
		}

		$select = $mysqli->query("SELECT * FROM agenda WHERE nome_medico = '$nome' AND data = '$data' AND hora = '$hora'");
		if($select){
			$row = $select->num_rows;
			if($row > 0){
				echo "<script>alert('Voce ja configurou uma consulta nesse dia e horario');</script>";
			}else{
				$insert = $mysqli->query("INSERT INTO `agenda` (`id_medico`, `nome_medico`, `idade`, `sexo`, `endereco_consulta`, `telefone`, `estado`, `especializacao`, `numregistro`, `valor`, `data`, `hora`, `status` ) VALUES ('$id' ,'$nome', '$idade', '$sexo', '$endcons', '$telefone', '$estado', '$espec', '$numreg', '$valor', '$data', '$hora', 0)");
				if($insert){
					echo "<script>alert('consulta configurada');</script>";
				}else{
					echo $mysqli->error;
				}
			}
		}else{
			echo $mysqli->error;
		}
	}
?>
