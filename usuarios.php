<?php

function traerUsuarios($filtro){
	$enlace = conectarServidor();
	if ($enlace){
		$basedatos = conectarBaseDatos($enlace);
		if ($basedatos){
			$consulta = "SELECT * FROM usuarios ORDER BY id";
			$resultado = mysql_query($consulta, $enlace);
			$tabla = array();
			while ($fila = mysql_fetch_assoc($resultado)) {
				#echo $fila["nombre"]." - ".$fila["id"]." - ".$fila["e"]." - ".$fila["n"];
				#echo "<br>";
				$tabla[] = $fila;
			}
			if ($filtro == 1){
				foreach($tabla as $usuario){
					echo "<tr>";
						echo "<td>".$usuario['nombre']."</td>";
						echo "<td>e: ".$usuario['e'].", n: ".$usuario['n']."</td>";
					echo "</tr>";
				}
			}
			else if ($filtro == 2){
				echo "Usuarios: <select name='usuarios'>";
				foreach($tabla as $usuarios){
					$cadena = $usuarios["nombre"].", ".$usuarios["e"].", ".$usuarios["n"];
					echo "<option value='".$usuarios["id"]."'>".$cadena."</option>";
		}
		echo "</select>";
			}
			mysql_free_result($resultado);
			mysql_close($enlace);
		}
		else{
			#echo "No se encontro la base de datos";
			#echo "<br>";
		}
	}
	}
	
function traerUsuario($id){
	$enlace = conectarServidor();
	if ($enlace){
		$basedatos = conectarBaseDatos($enlace);
		if ($basedatos){
			$consulta = "SELECT * FROM usuarios WHERE id = ".$id;
			$resultado = mysql_query($consulta, $enlace);
			$usuario = mysql_fetch_assoc($resultado);
			mysql_free_result($resultado);
			mysql_close($enlace);
			return $usuario;
		}
	}
}
function traerDatos(){
	$enlace = conectarServidor();
	if ($enlace){
		$basedatos = conectarBaseDatos($enlace);
		if ($basedatos){
			$consulta = "SELECT * FROM sistema WHERE id = 1";
			$resultado = mysql_query($consulta, $enlace);
			$sistema = mysql_fetch_assoc($resultado);
			mysql_free_result($resultado);
			mysql_close($enlace);
			return $sistema;
		}
	}
}

function actualizarFecha($id, $fecha, $hora){
	$enlace = conectarServidor();
	if ($enlace){
		$basedatos = conectarBaseDatos($enlace);
		if ($basedatos){
			$consulta = "UPDATE usuarios SET fecha='".$fecha."', hora='".$hora."' WHERE id=".$id;
			mysql_query($consulta, $enlace);
			mysql_close($enlace);
		}
	}
}
?>
