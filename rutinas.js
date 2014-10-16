function validar(form) {
	var nombre = form.name;
	var longitud = form.length - 1;
	var todolleno = true
	for (i = 0; i < longitud; i++){
		var temporal = form[i].value;
		if (temporal == null || temporal == ""){
			alert("Se deben llenar todos los campos.");
			todolleno = false
			return todolleno;
		}
	}
	if (todolleno){
		if (nombre == 'entrar'){
			var respuesta = form[2].value
			var boo = isNaN(respuesta);
			if (boo){
				alert("La respuesta debe ser un numero.");
				return false;
			}
		}
		else if (nombre == 'registro'){
			var e = form[1].value;
			var n = form[2].value;
			var boo_1 = isNaN(e);
			var boo_2 = isNaN(n);
			if (boo_1 || boo_2){
				alert("e y n deben ser numeros");
				return false;
			}
		}
		else if (nombre = 'reto'){
			var reto = form[0].value;
			var boo_reto = isNaN(reto);
			if (boo_reto){
				alert("El reto debe ser un numero");
				return false
			}
		}
	}
}

function generarPrimo(){
    var min = 11;
	var max = 9999;
	while (true){
		var p = Math.floor(Math.random() * (max - min) + min);
		var boo = esPrimo(p);
		if (boo){
			return p
		}
	}
}

function esPrimo(numero){
    if (numero % 2 === 0){
		return false
	}
	for (i = 3; i <= Math.ceil(Math.sqrt(numero)); i = i + 2){
		if (numero % i === 0){
			return false
		}
	}
    return true
}

function RSA(){
	var e_generado = document.getElementById('e');
	var d_generado = document.getElementById('d');
	var n_generado = document.getElementById('n');
	var p = generarPrimo();
	var q = generarPrimo();
	while (p === q){
	}
	var n = p * q;
	var fn = (p-1)*(q-1);
	do{
		var max = 1000;
		var min = 2;
		var e = Math.floor(Math.random() * (max - min) + min);
		var egcd_e = egcd(e, fn);
	}while(egcd_e[0] !== 1);
	var d = egcd_e[2];
	while (d <= 0){
		d = d + fn;
	}
	var rsa_resultados = [e, d, n];
	e_generado.value = e;
	d_generado.value = d;
	n_generado.value = n;
	return false
}

function egcd(a, b){
	var arreglo = [a,b];
	a = Math.max.apply(Math, arreglo);
	b = Math.min.apply(Math, arreglo);
	var x = [1, 0];
	var y = [0, 1];
	while (a % b !== 0){
		var q = Math.floor(a / b);
		var c = a % b;
		var nx = x[0] - (x[1] * q);
		var ny = y[0] - (y[1] * q);
		x = [x[1], nx];
		y = [y[1], ny];
		a = b;
		b = c;
	}
	var resultado = [b, x[1], y[1]];
	return resultado
}

function pseudo(min, max){
		var reto = document.getElementById('reto');
		reto.value = Math.floor(Math.random() * (max - min) + min);
		return false
	}
