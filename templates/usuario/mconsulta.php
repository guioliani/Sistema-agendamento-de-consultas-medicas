<?php
require("../../configs/protect.php");
//protegerUser();


?>

<html>
	<head>
		<title></title>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
		<link rel="stylesheet" type="text/css" href="../../css/styleuser.css"/>
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript" src="../../js/busca.js"></script>
		<?php include "../header.php"; ?>
	</head>
	
	<body>
	
		<div class="formulario">
		<h2>Digite sua busca</h2>
			<form>
				<input type="text" name="campo" class="campo"/>
			</form>
		</div>
		
		<div class="resultado">
			<?php
				include ('../../configs/connection.php');
				$sql=$mysqli->prepare('SELECT id, id_medico, nome_medico, idade, sexo, endereco_consulta, telefone, estado, especializacao, numregistro, valor, data, hora, status FROM agenda WHERE status = 0 AND data >= NOW()');
				$sql->execute();
				$sql->bind_result($id, $id_medico, $nome_medico, $idade, $sexo, $endereco_consulta, $telefone, $estado, $especializacao, $numregistro, $valor, $data, $hora, $status);
		?>
			<table>
				<thead>
					<tr>
						<td>Nome</td>
						<td>idade do medico</td>
						<td>sexo do medico</td>
						<td>Numero do registro</td>
						<td>especialização</td>
						<td>endereço</td>
						<td>telefone</td>
						<td>valor</td>
						<td>data da consulta</td>
						<td>horario de atendimento</td>

					</tr>
				</thead>
			<tbody>
				<?php
					
				while($sql->fetch()){
			?>
			<tr>
				<td><?php echo $nome_medico; ?></td>
				<td><?php echo $idade; ?></td>
				<td><?php echo $sexo; ?></td>
				<td><?php echo $numregistro; ?></td>
				<td><?php echo $especializacao; ?></td>
				<td><?php echo $endereco_consulta; ?></td>
				<td><?php echo $telefone; ?></td>
				<td><?php echo $valor; ?></td>
				<td><?php echo date('d/m/Y', strtotime($data)); ?></td>
				<td><?php echo $hora; ?></td>

				<td>
					<a href="agendar.php?id=<?=$id;?>">Agendar</a>
				</td>

			</tr>
			<?php
			}
			?>
			<div style="clear:both;"></div>
		</div>
	</body>
</html>