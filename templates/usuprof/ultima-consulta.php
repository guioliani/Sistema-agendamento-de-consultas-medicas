<?php
	require("../../configs/connection.php");
	session_start();
	require("../../configs/protect.php");
	protegerFunc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>ultimas consultas</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styletemplates.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/styleuser.css"/>
	<?php include "../header.php"; ?>
</head>

<body>
	<?php
	$id = $_SESSION['id'];
	$select = $mysqli->query("SELECT * FROM consulta_m WHERE id_medico = '$id' AND status = 1");
	$row = $select->num_rows;
/*
	$get = $select->fetch_array();
	$idConsulta = $get['id'];
	$idPaciente = $get['id_paciente'];
	$nomeMedico = $get['nome_medico'];
	$enderecoConsulta = $get['end_consulta'];
	$dataConsulta = $get['data'];
	$horaConsulta = $get['hora'];


	if($row > 0){
		$select = $mysqli->query("SELECT * FROM usuarios_n WHERE id = '$idPaciente'");
		$row = $select->num_rows;
	}
*/
?>

<table border='2'>
	<thead>
		<tr>
			<td>data da consulta</td>
			<td>hora da consulta</td>
			<td>Endereço da consulta</td>
			<td>nome do paciente</td>
			<td>Telefone do paciente</td>

		</tr>
	</thead>
<tbody>
	<?php while($get = $select->fetch_array()){

		?>
	<tr>
		<td><?php echo date('d/m/Y', strtotime($get['data'])); ?></td>
		<td><?php echo $get['hora']; ?></td>
		<td><?php echo $get['end_consulta']; ?></td>
		<td><?php echo $get['nome_paciente']; ?></td>
		<td><?php echo $get['telefone_paciente']; ?></td>
	</tr>
	<?php }

	?>
</body>
</html>