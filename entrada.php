<?php

include 'conectar.php';
include 'usuarios.php';
include 'rutinas_php.php';

$usuario=$_POST['usuarios']; #id del usuario
$respuesta=$_POST['respuesta'];
$reto=$_POST['reto'];

$datos_usuario = traerUsuario($usuario);
$nombre_usuario = $datos_usuario['nombre'];
$e_usuario = $datos_usuario['e'];
$n_usuario = $datos_usuario['n'];
$fecha_usuario = $datos_usuario['fecha'];
$hora_usuario = $datos_usuario['hora'];

$fx = f_x($reto);
$recuperar_mensaje = encrip($respuesta, $e_usuario, $n_usuario);

print 'Reto: x = '.$reto;
echo '<br>';
print 'Calculo del servidor: f(x) = '.$fx;
echo '<br>';
echo '<br>';
print 'Usuario: '.$nombre_usuario;
echo '<br>';
print 'Clave publica: (e = '.$e_usuario.', n ='.$n_usuario.' )';
echo '<br>';
print 'Respuesta del usuario: (f(x) ^ d) mod n = '.$respuesta;
echo '<br>';
print 'Recuperar f(x): = '.$recuperar_mensaje;
echo '<br>';
echo '<br>';

$fecha_total = getdate();

$fecha = $fecha_total['mday'].'/'.$fecha_total['mon'].'/'.$fecha_total['year'];
$hora = $fecha_total['hours'].':'.$fecha_total['minutes'];

if ($fx === $recuperar_mensaje){
	if (is_null($fecha_usuario) && is_null($hora_usuario)){
		print 'Bienvenido por primera vez '.$nombre_usuario.'.';
		
	}
	else{
		print 'Hola '.$nombre_usuario.' tu ultima sesion fue en la fecha '.$fecha_usuario.', en la hora '.$hora_usuario.' .';
	}
	actualizarFecha($usuario, $fecha, $hora);
}
else{
	print 'No eres '.$nombre_usuario.'; sal del sistema, impostor.';
}

?>
