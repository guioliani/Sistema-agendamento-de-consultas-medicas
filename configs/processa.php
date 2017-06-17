<?php
	include('connection.php');
	
	$campo= "%{$_POST['campo']}%";
	
		$sql=$mysqli->prepare('SELECT id, id_medico, nome_medico, idade, sexo, endereco_consulta, telefone, estado, especializacao, numregistro, valor, data, hora, status FROM agenda WHERE nome_medico like ?');
		$sql->bind_param("s", $campo);
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
				<td><?php echo $data; ?></td>
				<td><?php echo $hora; ?></td>

				<td>
					<a href="agendar.php?id=<?=$id;?>">Agendar</a>
				</td>

			</tr>
			<?php
			}
			?>

	</tbody>
	</table>
	
