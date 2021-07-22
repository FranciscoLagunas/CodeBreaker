<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}

/*VARIABLES RECIBIDAS POR METODO POST*/
$Primero = $_REQUEST['Primero'];
$Segundo = $_REQUEST['Segundo'];
$Tercero = $_REQUEST['Tercero'];
$Cuarto = $_REQUEST['Cuarto'];

/*GUARDAR INFORMACIÓN EN LA BD*/
/*USO DE ARCHIVO COMO BD*/
$file = fopen("BD.txt", "a+");

/*CREACIÓN DEL ARREGLO CON LOS DATOS INGRESADOS POR EL USUARIO*/
$nuevo = $Primero." ".$Segundo." ".$Tercero." ".$Cuarto;

/*ESCRIBIMOS EN EL DOCUMENTO LOS NÚMEROS INGRESADOS POR EL USUARIO*/
fwrite($file, $nuevo."\r\n");

/*CREACIÓN DE VARIABLES GLOBALES A LOCALES PARA FACILIDAD DE MANEJO*/
$Codigo1 = $_SESSION['Codigo'];
$Probar = explode(' ',$nuevo); /*Probar es el arreglo para los datos nuevos*/

/*COMPROBAR QUE LOS DIGITOS SEAN SIMILARES*/
/*NO IMPORTA POSICIÓN*/
$resultado = array_diff($Codigo1, $Probar);
$Similitud = 4 - count($resultado);

/*SE ALMACENA CON EL CARACTER * POR COINCIDENCIAS*/
if ($Similitud===0) {
fwrite($file, ""."\r\n");	
}elseif ($Similitud===1) {
fwrite($file, "*"."\r\n");	
}elseif ($Similitud===2) {
fwrite($file, "**"."\r\n");	
}elseif ($Similitud===3) {
fwrite($file, "***"."\r\n");
}

if ($Similitud === 4) {
	/*COMPROBAR QUE LOS DIGITOS SEAN SIMILARES*/
	/*Y TENGAN LA MISMA POSICIÓN*/
	$result_array = array_intersect_assoc($Codigo1, $Probar);
	$MismaPosición = count($result_array);

	/*SE ALMACENA CON EL CARACTER - POR NUMEROS COLOCADOS EN LA POSICIÓN CORRECTA*/
	if ($MismaPosición===0) {
	fwrite($file, "****"."\r\n");	
	}elseif ($MismaPosición===1) {
	fwrite($file, "-***"."\r\n");	
	}elseif ($MismaPosición===2) {
	fwrite($file, "--**"."\r\n");	
	}elseif ($MismaPosición===3) {
	fwrite($file, "---*"."\r\n");
	}elseif ($MismaPosición===4) {
	fwrite($file, "----"."\r\n");
	/*EL JUEGO FINALIZA*/
	$_SESSION['JuegoTerminado'] = TRUE;
	}
}

/*CERRAMOS EL DOCUMENTO*/
fclose($file);

/*SE AÑADE UNA NUEVA CELDA EN LA TABLA*/
$_SESSION['sumar'] += 1;

/*DIRIGIMOS AL MENU PRINCIPAL*/
header('Location: HCode.php');
?>