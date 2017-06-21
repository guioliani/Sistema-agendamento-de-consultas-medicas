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
	<title>Suporte</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styletemplates.css"/>
	<?php include "../header.php"; ?>
</head>
<body>

<?php
$id = $_SESSION['id'];
$nivel = $_SESSION['nivel'];
$select = $mysqli->query("SELECT * FROM mensagem_enviada WHERE id_usuario = '$id' AND status = 0 AND nivel = '$nivel'");
$row = $select->num_rows;

?>



<div id="SuportePagina" class="form bradius">
<?php
if($row){
		while($get = $select->fetch_array()){
?>
		<form method="POST">
			<label for="email">Nome</label><input type="text" readonly="true" name="nome_usuario" class="txt bradius" value="<?php echo $get["nome_usuario"]; ?>"/> <br/>
			<label for="email">Email</label><input type="text" readonly="true" name="email_usuario" class="txt bradius" value="<?php echo $get["email_usuario"]; ?>"/> <br/>
			<label for="email">Mensagem</label><input type="text" readonly="true" name="mensagem" class="txt bradius" value="<?php echo $get["mensagem"]; ?>"/> <br/>
			<input type="submit" value="Lido" name="button" id="button"/>
		</form>
	<?php }} ?>

</div>
</body>
</html>

<?php
if(isset($_POST['button'])){
	$nome = mysqli_real_escape_string($mysqli, $_POST["nome_usuario"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email_usuario"]);
	$mensagem = mysqli_real_escape_string($mysqli, $_POST["mensagem"]);

	if($mysqli){
		 $query = mysqli_query($mysqli, "UPDATE mensagem_enviada SET nome_usuario='$nome', email_usuario='$email', status=1 WHERE id_usuario='$id'");
            if($query){
                echo "<script>alert('Mensagem marcada como lida');</script>";
            }else{
                echo $mysqli->error;
            }

        }else{
            die("Error: ". mysqli_error($mysqli));
        }

	}
?>