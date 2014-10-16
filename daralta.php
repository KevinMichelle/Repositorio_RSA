<?php

function daralta(){
	$nombre=$_POST['nombre'];
	$e=$_POST['e'];
	$n=$_POST['n'];

	$enlace = conectarServidor();

	if ($enlace){
		$basedatos = conectarBaseDatos($enlace);
		if ($basedatos){
			$consulta = "INSERT INTO usuarios (nombre, e, n) values ('".$nombre."', ".$e.", ".$n.")";
			$bienvenida = "Hola ".$nombre.", bienvenid@ al sistema. En breve te redireccionaremos a la pagina principal.";
			print $bienvenida;
			mysql_query($consulta, $enlace);
			mysql_close($enlace);
			if ($consulta){
				header('Refresh: 5; url=http://ayumu.site90.com/rsa/inicio.php', true, 303);
			}
		}
	}
	}
?>
