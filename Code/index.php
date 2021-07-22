<?php
/*BORRAR ARHIVO*/
$exist = file_exists("BD.txt");
if ($exist)
{
	unlink("BD.txt");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Code Breaker</title>
	<link rel="stylesheet" type="text/css" href="css/inicio.css">
	<meta charset="utf-8">
</head>
<body>

	<h1>Code breaker</h1>

	<h2>Instrucciones</h2>
	<h3>Se generará un numero de cuatro cifras, los números no se repiten y van del 0 al 9</h3>
	<h3>Intenta adivinar cual es el número que se generó</h3>
	<h3>Ingresa los números en las casillas</h3>
	<h2>Primer nivel</h2>
	<h3>Durante este nivel tendras que encontrar los numeros que integran la cifra final, por cada acierto obtendras un asterisco [*]</h3>
	<h3>La posición del asterisco no pertenece al número correcto</h3>
	<h3>Pasas al siguiente nivel cuando obtienes cuatro asteriscos</h3>
	<h2>Segundo nivel</h2>
	<h3>En el segundo nivel tendrás que encontrar la posición correcta de los números</h3>
	<h3>Por cada acierto en la posición de un digito el asterisco [*] cambiará por un guión [-]</h3>
	<h3>La posición del guión no pertenece al número correcto</h3>
	<h3>No existen límite de intentos</h3>

	<form method='POST' action='PFunciones.php'>
	<input type='submit' value='Iniciar'>
	</form>

</body>
</html>