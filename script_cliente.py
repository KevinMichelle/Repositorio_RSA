import sys

def sonNumeros(arreglo):
	areNumber = True
	for i in xrange(1, len(arreglo)):
		if not arreglo[i].isdigit(): # Si alguno de los argumentos no son numeros
			areNumber = False
			break
	return areNumber

def f_x(x):
	return (x * 2)
	
def encrip(mensaje, clave, n):
	return pow(mensaje, clave, n)
	

if len(sys.argv) != 4:
	print 'El numero de argumentos es invalido'
else:
	areNumber = sonNumeros(sys.argv)
	if areNumber:
		x = int(sys.argv[1])
		d = int(sys.argv[2])
		n = int(sys.argv[3])
		fx = f_x(x)
		respuesta = encrip(fx, d, n)
		print
		print 'La respuesta es {}.'.format(respuesta)
	else:
		print 'Todos los argumentos deben ser numeros enteros.'
