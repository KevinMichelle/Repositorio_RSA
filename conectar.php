<?php

function conectarServidor(){
	$enlace =  mysql_connect("mysql4.000webhost.com", "a5840331_hola", "agnusdei666");
	if (!$enlace) {
		return FALSE;
	}
	else{
		return $enlace;
	}
}

function conectarBaseDatos($enlace){
	$nombredb = "a5840331_hola";
	$basedatos = mysql_select_db($nombredb);
	if ($basedatos){
		return $basedatos;
	}
	else{
		return FALSE;
	}
}
?>
