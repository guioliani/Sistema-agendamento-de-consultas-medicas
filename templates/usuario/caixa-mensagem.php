<?php
require("../../configs/connection.php");
session_start();
require("../../configs/protect.php");
protegerUser();



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Suporte</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styletemplates.css"/>
</head>
<body>

<?php
$id = $_SESSION['id'];
$nivel = $_SESSION['nivel'];

$select = $mysqli->query("SELECT * FROM mensagem_enviada WHERE id_usuario = '$id' AND status = 0 AND nivel = '$nivel'");
$row = $select->num_rows;

?>



<div id="SuportePagina" class="form bradius">
	<ul class="ca-menu">
		<?php
		if($row){
				while($get = $select->fetch_array()){

		?>
		<li>
	        <a href="caixa-mensagem.php?id=<?= $get['id']; ?>">
	            <!--<span class="ca-icon"><img class="zoom-mais" src="../<?php //echo $get["img"]; ?>"></span>-->
	            <div class="ca-content">
	                <h2 class="ca-main">Nome: <?php echo $get["nome_usuario"]; ?></h2>
	                <h3 class="ca-sub">Email: <?php echo $get["email_usuario"]; ?></h3>
	                <h3 class="ca-sub">Mensagem enviada pela equipe de suporte: <?php echo $get["mensagem"]; ?></h3>
	               <!-- <h1><?php //echo 'id:'.$id;?></h1>-->

	            </div>
	        </a>
	    </li>
		<?php }} ?>
	</ul>
</div>
</body>
</html>
<?php
if(isset($_GET['id'])){
	$id_mensagem = $_GET['id'];
	$update = $mysqli->query("UPDATE mensagem_enviada SET status = 1 WHERE id ='$id_mensagem'");
	echo "<script>alert('usuario atendido ele sera removido da sua agenda');</script>";
	header("Location: caixa-mensagem.php");
	//echo 'alo ' .$id_mensagem;
}
?>