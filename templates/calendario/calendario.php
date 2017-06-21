<?php

	require("../../configs/connection.php");
	session_start();
	require("../../configs/protect.php");
	protegerUser();

	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../../index.html");
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>Calendario</title>
	<link rel="stylesheet" type="text/css" href="../../css/styletemplates.css"/>
	<?php include "../header.php"; ?>
</head>

<body>


	<div id="agenda">
		<h1>Minhas Consultas</h1>

	 <ul class="ca-menu">
	 	<?php
	 	$id = $_SESSION['id'];
	 		$select = $mysqli->query("SELECT * FROM consulta_m WHERE id_paciente = '$id' AND data >= NOW()");

	 		 while ($get = $select->fetch_array()){

	 	?>
            <li>
                <a href="#">
                    <!--<span class="ca-icon"><img class="zoom-mais" src="../<?php //echo $get["img"]; ?>"></span>-->
                    <div class="ca-content">
                        <h2 class="ca-main">Nome Medico: <?php echo $get["nome_medico"]; ?></h2>
                        <h3 class="ca-sub">Endereco: <?php echo $get["end_consulta"]; ?></h3>
                        <h3 class="ca-sub">data: <?php echo date('d/m/Y', strtotime($get["data"])); ?></h3>
                        <h3 class="ca-sub">Horario da consulta: <?php echo $get["hora"]; ?></h3>
                       <!-- <h1><?php //echo 'id:'.$id;?></h1>-->

                    </div>
                </a>
            </li>
	    <?php  }?>
	    </ul>
	</div>


</body>
</html>