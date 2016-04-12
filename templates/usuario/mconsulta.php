<?php
	require("../../configs/connection.php");
	require("../../configs/reais.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Marcar Consulta</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styleuser.css"/>
	<!--
	<script language="JavaScript" type="text/javascript" src="../../js/jquery.js"></script>
	<script language="JavaScript" type="text/javascript" src="../../js/configtabela.js"></script>
-->

</head>
<body>
<table id="tabela">
		<thead>
			<tr>
				<th>
					Nome
				</th>

				<th>
					Numero do registro
				</th>

				<th>
					Tipo profissional
				</th>

				<th>
					especialização
				</th>

				<th>
					endereço
				</th>

				<th>
					telefone
				</th>

				<th>
					valor
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$select = $mysqli->query("SELECT * FROM consulta");
				$row = $select->num_rows;
				if($row){
					while($get = $select->fetch_array()){
			?>
			<tr>
				<td>
					<?php echo $get["nome"]; ?>
				</td>

				<td>
					<?php echo $get["numreg"]; ?>
				</td>

				<td>
					<?php echo $get["tipoprof"]; ?>
				</td>

				<td>
					<?php echo $get["especializacao"]; ?>
				</td>

				<td>
					<?php echo $get["endereco"]; ?>
				</td>

				<td>
					<?php echo $get["telefone"]; ?>
				</td>

				<td>
					<?php echo Reais($get["valor"]); ?>
				</td>

				<td>
					<a href="agendar.php ?id=<?=$get["id"]?>">#</a>
					<!--
					<a href="agendar.php">
					<input type="submit" class="sb bradius" value="agendar" name="button">
				</a>-->
				</td>

			</tr>
			<?php
		}
			}else{
					echo "Nenhuma consulta encontrada";
				}

			?>
		</tbody>
	</table>
</body>
</html>