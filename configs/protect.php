<?php
//bloqueia usuario nivel 1 acessar a url de admin
	function protegerAdmin(){
		if($_SESSION["nivel"] != 2){
			echo "<script>location.href='../index.php'</script>";
		
		}
	}

	/*function protegerUser(){
		if($_SESSIO["nivel"] != 1){
			echo "<script>location.href='../index.php'</script>";
			
		}

	}*/

?>