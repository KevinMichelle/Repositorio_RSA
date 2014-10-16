<?

function f_x($x){
	return ($x * 2);
}

function expmod($a, $b, $n){
	$rexpo = 1;
	$pot = $a % $n;
	while ($b > 0) {
		if ($b % 2 == 1){
			$rexpo = ($rexpo * $pot) % $n;
		}
		$b = $b / 2;
		$pot = ($pot * $pot) % $n;
	}
	return $rexpo;
}

function encrip($mensaje, $clave, $n){
	return expmod($mensaje, $clave, $n);
}

?>
