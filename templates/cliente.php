<?php
	include_once('../configs/connection.php');
	session_start();
	require("../configs/protect.php");
	protegerUser();

	if(isset($_GET["action"]) AND $_GET["action"] == "sair"){
		session_destroy();
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title>Cliente</title>
</head>

<body>
<h1>Cliente</h1>
</body>
</html>
