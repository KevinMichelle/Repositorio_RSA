<html>
<head>
	<script type="text/javascript" src="rutinas.js">
	</script>
</head>
<body>
	<?php
		include 'conectar.php';
		include 'usuarios.php';
		$sistema = traerDatos();
		$e_servidor = $sistema['e'];
		$n_servidor = $sistema['n'];
		print 'Llave publica del servidor: ('.$e_servidor.', '.$n_servidor.')';
	?>
	<br><br>
	<form name='reto' action='reto.php' onsubmit='return validar(this)' method='POST'>
		Retame, si quieres :) <input type='text' name='reto_servidor'>
		<input type='submit' value='Retame'>
	</form>
	<a href="http://ayumu.site90.com/rsa/script_cliente.py">Guarda el script en Python para iniciar con el proceso de retar al servidor</a>
	<br><br>
	<a href="registro.php">Registro</a>
	<br><br>
	<form onsubmit='return pseudo(3, 80)'>
		<input type='submit' value='Generar reto (haz click!)'>
	</form>
	<a href="http://ayumu.site90.com/rsa/reto.py">Guarda el script en Python para continuar con el proceso de autenticacion</a>
	<br><br>
	<form name='entrar' action='entrada.php' onsubmit='return validar(this)' method='POST'>
		Reto: <input id='reto' type='text' name='reto' readonly>
		<br>
		<?php
			traerUsuarios(2);
		?>
		<br>
		Respuesta: <input type='text' name='respuesta'>
		<br>
		<input type='submit' value='Entrar'>
	</form>
</body>
</html>
