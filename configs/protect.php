<?php
//bloqueia usuario nivel 1 acessar a url de admin
	
	function protegerUser(){
		if($_SESSION["nivel"] != 1){
				echo "<script>location.href='../index.html'</script>";
				
		}
	}

	function protegerFunc(){
		if($_SESSION["nivel"] != 2){
			echo "<script>location.href='../index.html'</script>";
		
		}
				
	}

	function protegerAdmin(){
		if($_SESSION["nivel"] != 3){
			echo "<script>location.href='../index.html'</script>";
		}
	}
?>