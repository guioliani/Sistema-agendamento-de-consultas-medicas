<?php
function Reais($value){
	$valueReais = number_format($value, 2, ',', '-');
	return $valueReais;
}
?>