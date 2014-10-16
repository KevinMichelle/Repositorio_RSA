import sys
import random

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
	

if len(sys.argv) != 5:
	print 'El numero de argumentos es invalido'
else:
	areNumber = sonNumeros(sys.argv)
	if areNumber:
		x_servidor = int(sys.argv[1])
		fx_servidor = int(sys.argv[2])
		e_servidor = int(sys.argv[3])
		n_servidor = int(sys.argv[4])
		fx_cliente = f_x(x_servidor)
		recuperar_mensaje = pow(fx_servidor, e_servidor, n_servidor)
		print
		print "La f(x) que se espera del servidor es {}.".format(fx_cliente)
		print "El mensaje recuperado es {}.".format(recuperar_mensaje)
		print
		if fx_cliente == recuperar_mensaje:
			print 'El servidor es quien dice que es'
		else:
			print 'El servidor no es quien dice que es, puede ser un sitio peligroso.'
	else:
		print 'Todos los argumentos deben ser numeros enteros.'
