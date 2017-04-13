<?php
require("../../configs/connection.php");
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
			$id = $_GET["id"];
			$select = $mysqli->query("SELECT * FROM usuarios_prof WHERE id='$id'");
			$row = $select->num_rows;
			if($row > 0){
				$get = $select->fetch_array();
				?>
			<div id="agenda">
				<form action="" method="POST">
					<h2>Dados do profissional</h2>					
					<p>Nome: <?php echo $get["nome"]; ?></p>
					<p>Numero do registro: <?php echo $get["numreg"]; ?></p>
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