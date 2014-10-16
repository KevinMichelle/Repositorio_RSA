<?php
	include 'conectar.php';
	include 'usuarios.php';
	include 'rutinas_php.php';
	$sistema = traerDatos();
	$e_servidor = $sistema['e'];
	$n_servidor = $sistema['n'];
	$d_servidor = $sistema['d'];
	$reto=$_POST['reto_servidor']; #id del usuario
	
	if ($reto >= $n_servidor){
		$reto = $reto % $n_servidor;
		print 'El reto debe estar en modulo n, ya lo solucione para evitar conflictos posteriores :)';
		echo '<br><br>';
	}
	
	$fx_servidor = f_x($reto);
	$fx_encriptado = encrip($fx_servidor, $d_servidor, $n_servidor);
	
	print 'Llave publica del servidor: ('.$e_servidor.', '.$n_servidor.')';
	echo '<br>';
	print 'Reto: x = '.$reto;
	echo '<br><br>';
	print 'Reto contestado: (f(x) ^ d) mod n = '.$fx_encriptado;
	echo '<br>';
?>
