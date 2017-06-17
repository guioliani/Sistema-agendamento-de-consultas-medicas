<?php
session_start();
//date_default_timezone_set('America/Sao_Paulo');
require("../../configs/connection.php");
require("../../configs/reais.php");
require("../../configs/protect.php");
protegerUser();



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Profissional</title>
	<div class="voltar" class="form bradius"><a href="mconsulta.php" title="voltar">voltar</a></div>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styleuser.css"/>
</head>

<body>
	<?php
		if(isset($_GET["id"])){

			$nomeUsuario = $_SESSION['nome'];
			$telefoneUsuario = $_SESSION['telefone'];

			$idUser = $_SESSION['id'];
			$id = $_GET["id"];
			$select = $mysqli->query("SELECT * FROM agenda WHERE id = '$id'");
			$row = $select->num_rows;
			if($row > 0){
				$get = $select->fetch_array();
				?>
			<div id="agenda">
				<form action="" method="POST">
					<h2>Dados do profissional</h2>					
					<p>Nome do medico: <?php echo $get["nome_medico"]; ?></p>
					<p>Numero do registro: <?php echo $get["numregistro"]; ?></p>
					<p>Especialização do medico: <?php echo $get["especializacao"]; ?></p>
					<p>Endereço da consulta: <?php echo $get["endereco_consulta"]; ?></p>
					<p>Valor da consulta: <?php echo "R$" . Reais($get["valor"]); ?></p>
					<p>data da consulta: <?php echo date('d/m/Y', strtotime ($get["data"])); ?></p>
					<p>Horario da consulta: <?php echo $get["hora"]; ?></p>
					<input type="submit" class="sb bradius" value="Agendar" name="button" id="button"/>
				</form>
			</div>
		<?php
			}else{
				echo "<script>alert('id nao existe')</script>";
			}
		}
	?>

</body>
</html>
<?php
	if(isset($_POST['button'])){
		$idConsulta = $id;
		$idMedico = $get['id_medico'];
		$nomeMedico = $get['nome_medico'];
		$numeroRegistro = $get['numregistro'];
		$dataConsulta = $get["data"];
		$horaConsulta = $get['hora'];
		$Valor = $get['valor'];

		$idUsuario = $idUser;
		$especializacao = $get['especializacao'];
		$endereco = $get['endereco_consulta'];

		$dataFormatada = date('Y/m/d', strtotime($dataConsulta));
		$select = $mysqli->query("SELECT * FROM consulta_m WHERE id_medico = '$idMedico' AND hora = '$horaConsulta' AND data = '$dataFormatada'");
		if($select){
			$row = $select->num_rows;
			if($row > 0){
				echo "<script>alert('escolha outro horario')</script>";
			}else{
				$insert = $mysqli->query("INSERT INTO `consulta_m`(`id_paciente`, `id_medico`, `nome_medico`, `tipoprof`, `end_consulta`, `nome_paciente`, `telefone_paciente`, `data`, `hora`) VALUES ('$idUsuario', '$idMedico', '$nomeMedico', '$especializacao', '$endereco', '$nomeUsuario', '$telefoneUsuario', '$dataFormatada' ,'$horaConsulta')");
				if($insert){
					echo "<script>alert('Consulta agendada')</script>";
					$update = $mysqli->query("UPDATE agenda SET status = 1 WHERE id='$idConsulta'");
				}else{
					 echo $mysqli->error;
				}
			}
		}else{
			echo $mysqli->error;
		}
	}


?>