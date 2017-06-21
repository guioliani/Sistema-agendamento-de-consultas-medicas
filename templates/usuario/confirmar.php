<?php
require("../../configs/connection.php");
require("../../configs/protect.php");
protegerUser();

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
	<div class="voltar" class="form bradius"><a href="mconsulta.php" title="voltar">voltar</a></div>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'/>
	<link rel="stylesheet" type="text/css" href="../../css/styleuser.css"/>
	<?php include "../header.php"; ?>
</head>

<body>
	<li id="agenda"><a href="#">agenda</a></li>
</body>
</html>