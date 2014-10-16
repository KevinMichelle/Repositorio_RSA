<html>
<head>
	<script type="text/javascript" src="rutinas.js">
	</script>
</head>
<body>
	<a href="inicio.php">Inicio</a>
	<br><br>
	<form onsubmit='return RSA()'>
		<input type='submit' value='Generar Llave'>
	</form>
	<form name='registro' onsubmit='return validar(this)' action='registro.php' method='POST'>
		Nombre: <input type='text' name='nombre'>
		e: <input type='text' name='e' id='e' readonly>
		n: <input type='text' name='n' id='n' readonly>
		<input type='submit' value='Registro' name='submit'>
	</form>
	d: <input type='text' id='d' readonly> No compartas d con nadie :)
	<br><br>
		<?php
		include 'conectar.php';
		include 'daralta.php';
		if (isset($_POST['submit'])){
			daralta();
		}
		else if (!isset($_POST['submit'])){
			print "Registrate ;)";
		}
	?>
	<br><br>
	<table border = 1>
	<caption>Lista de usuarios (modo debug)</caption>
		<tr>
			<th>Ususario</th>
			<th>Llave publica</th>
		</tr>
		<?php
		include 'usuarios.php';
		traerUsuarios(1);
		?>
	</table>
	<br>
</body>
</html>
