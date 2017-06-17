<?php

require("../configs/connection.php");
session_start();
require("../configs/protect.php");
protegerAdmin();

if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
	session_destroy();
	header("Location: ../index.html");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Usuario</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../css/styletemplates.css"/>
</head>

<body>
	<div id="nav">
		<ul>
			<li id="suporteAdmin"><a href="administrador/suporte.php">Suporte</a></li>
			<li id="usuarios"><a href="administrador/controle-usuario.php">Usuarios</a></li>
			<li id="sairAdmin"><a href="?action=sair">sair</a></li>
		</ul>
	</div>
<?php
	$id = $_SESSION['id'];
	$select = $mysqli->query("SELECT * FROM administrador WHERE id = '$id'");
	$row = $select->num_rows;
	$get = $select->fetch_array();

	$nome = $get['nome'];
	$_SESSION['nome'] = $nome;

	$foto = $get['foto'];
	$_SESSION['foto'] = $foto;

	if($foto == NULL){
		$foto = 'default.png';
	}
?>


<!--menu superior esquerdo-->

<div class="b-divider b-userbar i-user-select_none">

  <div class="b-divider__side b-userbar__icons">
	<?php
      $select = $mysqli->query("SELECT * FROM suporte WHERE status = 0");            
      $row = $select->num_rows;
    ?>
    <a href="administrador/suporte.php" class="b-userbar__icons-item i-font-size_none">
      <img src="../img/menssagens.png" width="25" height="25" alt="Userbar icon" class="b-userbar__icons-item-ico" />
      <span class="b-userbar__icons-item-notify i-font_normal"><?php echo $row; ?></span>
    </a>

    <a href="#" class="b-userbar__icons-item i-font-size_none">
      <img src="http://commondatastorage.googleapis.com/johnius/activity.png" width="25" height="25" alt="Userbar icon" class="b-userbar__icons-item-ico" />
    </a>

  </div>

    <a href="#" class="b-divider__base b-userbar__account">
      <span class="b-divider">
        <span class="b-divider__side">
          <img src="../uploads/<?php echo $foto; ?>" width="25" height="25" alt="User avatar" class="b-userbar__account-avatar">
        </span>
        <span class="b-divider__side_rt">
          <span class="b-arrow b-arrow_down b-arrow_userbar">
            <span class="b-arrow_userbar-text">[Show]</span>
          </span>
        </span>
        <span class="b-divider__base b-userbar__account-name i-overflow_ellipsis"><?php echo $nome; ?></span>
      </span>
    </a>
</div>



<!--fim menu superior esquerdo-->
<script src="../js/prefixfree.min.js"></script>
</body>
</html>