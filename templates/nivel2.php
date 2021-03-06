<?php
	require("../configs/connection.php");
	session_start();
	require("../configs/protect.php");
	protegerFunc();

	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../index.html");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Profissional</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../css/styletemplates.css"/>


</head>

<body>
<div id="nav">
		<ul>
			<li class="agenda"><a href="usuprof/minha-agenda.php">Minha agenda</a></li>
			<li id="ultconsulta"><a href="usuprof/ultima-consulta.php">Ultima consulta</a></li>
			<li class="atcad"><a href="usuprof/minha-conta.php">Atualizar cadastro</a></li>
			<li id="comecar"><a href="usuprof/configuraconsulta.php">Começe a atender</a></li>
			<li id="suporte"><a href="usuprof/suporte.php">Suporte</a></li>
			<li class="sair"><a href="?action=sair">sair</a></li>
		</ul>
	</div>

	<?php
		$id = $_SESSION["id"];
		$select = $mysqli->query("SELECT * FROM usuarios_prof WHERE id='$id'");
		$row = $select->num_rows;
        $get = $select->fetch_array();

        $nome = $get['nome'];
        $_SESSION['nome'] = $nome;

        $foto = $get['foto'];
        $_SESSION['foto'] = $foto;
		
		$nivel = $_SESSION['nivel'];

        if($foto == NULL){
        	$foto = 'default.png';
        }
		
	?>

	<!--menu superior esquerdo-->

<div class="b-divider b-userbar i-user-select_none">

  <div class="b-divider__side b-userbar__icons">
  
  <?php
	  $select = $mysqli->query("SELECT * FROM mensagem_enviada WHERE id_usuario = '$id' AND status = 0 AND nivel = '$nivel'");
	  $row = $select->num_rows;
  
	?>

    <a href="usuprof/caixa-mensagem.php" class="b-userbar__icons-item i-font-size_none">
      <img src="../img/menssagens.png" width="25" height="25" alt="Userbar icon" class="b-userbar__icons-item-ico" />
      <span class="b-userbar__icons-item-notify i-font_normal"><?php echo $row;	  ?></span>
    </a>

    <a href="#" class="b-userbar__icons-item i-font-size_none">
      <img src="http://commondatastorage.googleapis.com/johnius/activity.png" width="25" height="25" alt="Userbar icon" class="b-userbar__icons-item-ico" />
    </a>

    <a href="usuprof/minha-agenda.php" class="b-userbar__icons-item i-font-size_none">
      <img src="../img/calendario.png" width="25" height="25" alt="Userbar icon" class="b-userbar__icons-item-ico" />
      <span class="b-userbar__icons-item-notify i-font_normal">1</span>
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

  <script src="../js/jquery.js"></script>
  <script src="../js/prefixfree.min.js"></script>
</body>

</html>