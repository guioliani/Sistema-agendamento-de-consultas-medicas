<?php
require("../../configs/connection.php");
session_start();
require("../../configs/protect.php");
protegerAdmin();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Controle usuario</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

	<script type="text/javascript" src="../../js/jquery.js"></script>

	<link rel="stylesheet" type="text/css" href="../../css/styleuser.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/styletemplates.css"/>
</head>

<body>
	<div class="formulario">
	<h2>Digite sua busca</h2>
		<form>
			<input type="text" name="campo" class="campo"/>
		</form>

		<div class="menu-superior">
			<form method="POST">
				<input type="submit" value="Usuario Nivel 1" name="nivel1" id="button"/>
				<input type="submit" value="Usuario Nivel 2" name="nivel2" id="button"/>
			</form>
		</div>
	</div>

	<div class="resultado">
	<?php
		if(isset($_POST['nivel1'])){
			$select = $mysqli->query('SELECT * FROM usuarios_n');
			$row = $select->num_rows;
	?>
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Email</td>
				<td>Telefone</td>
				<td>Nivel</td>
				<td>Status</td>
			</tr>
		</thead>
		<tbody>
		<?php	
		if($row){
			while($get = $select->fetch_array()){
		?>
		<tr>
			<td><?php echo $get['id']; ?></td>
			<td><?php echo $get['nome']; ?></td>
			<td><?php echo $get['email']; ?></td>
			<td><?php echo $get['telefone']; ?></td>
			<td><?php echo $get['nivel']; ?></td>
			<td><?php echo $get['status']; ?></td>

			<td>
				<a href='controle-usuario.php?idaceptnivel1=<?=$get["id"];?>'><i class="fa fa-check-square icone acept" aria-hidden="true"></i></a>
				<a href='controle-usuario.php?idrefusenivel1=<?=$get["id"];?>'><i class="fa fa-ban icone ban" aria-hidden="true"></i></a>
				<?php
					if(isset($_GET['idaceptnivel1'])){
						$idaceptnivel1 = $_GET['idaceptnivel1'];
						$update = $mysqli->query("UPDATE usuarios_n SET status = 1 WHERE id = '$idaceptnivel1'");			
					}elseif(isset($_GET['idrefusenivel1'])){
						$idrefusenivel1 = $_GET['idrefusenivel1'];
						$update = $mysqli->query("UPDATE usuarios_n SET status = 0 WHERE id = '$idrefusenivel1'");
					}
				?>
			</td>
		</tr>
		<?php } } }elseif(isset($_POST['nivel2'])){

/*____________________________________________________________________*/

			$select = $mysqli->query('SELECT * FROM usuarios_prof');
			$row = $select->num_rows;
			?>
			<table>
				<thead>
					<tr>
						<td>ID</td>
						<td>Nome</td>
						<td>Email</td>
						<td>Telefone</td>
						<td>Nivel</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
				<?php	
				if($row){
					while($get = $select->fetch_array()){
				?>
				<tr>
					<td><?php echo $get['id']; ?></td>
					<td><?php echo $get['nome']; ?></td>
					<td><?php echo $get['email']; ?></td>
					<td><?php echo $get['telefone']; ?></td>
					<td><?php echo $get['nivel']; ?></td>
					<td><?php echo $get['status']; ?></td>

					<td>
						<a href='controle-usuario.php?idaceptnivel2=<?=$get["id"];?>'><i class="fa fa-check-square icone acept" aria-hidden="true"></i></a>
						<a href='controle-usuario.php?idrefusenivel2=<?=$get["id"];?>'><i class="fa fa-ban icone ban" aria-hidden="true"></i></a>
						<?php
						if(isset($_GET['idaceptnivel2'])){
							$idaceptnivel2 = $_GET['idaceptnivel2'];
							$update = $mysqli->query("UPDATE usuarios_prof SET status = 1 WHERE id = '$idaceptnivel2'");
						}elseif(isset($_GET['idrefusenivel2'])){
							$idrefusenivel2 = $_GET['idrefusenivel2'];
							$update = $mysqli->query("UPDATE usuarios_prof SET status = 0 WHERE id = '$idrefusenivel2'");
						}

						?>

					</td>
				</tr>

	<?php	} } } ?>




		<div style="clear:both;"></div>
	</div>
</body>
</html>