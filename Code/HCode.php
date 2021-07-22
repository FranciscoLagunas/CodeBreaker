<?php
session_start();
if($_SESSION['validacion']){}
else{header("Location:Index.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/HCode.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<title>Code Breaker</title>
</head>
<body>

	<h1 class="titulo">Code breaker</h1>	

	<div class="Digitos">
		<!-- CUANDO EL USUARIO COMPLETA EL JUEGO SE MUESTRA LA CIFRA -->		
		<?php
		$Codigo1 = $_SESSION['Codigo'][0];
		$Codigo2 = $_SESSION['Codigo'][1];
		$Codigo3 = $_SESSION['Codigo'][2];
		$Codigo4 = $_SESSION['Codigo'][3];		
		if ($_SESSION['JuegoTerminado'] === TRUE) {
			print("<h1>¡Felicidades haz encontrado la cifra correcta!</h1>");
			print("<h2>$Codigo1 $Codigo2 $Codigo3 $Codigo4</h2>");				
			}else
			{
				print("<!-- AQUÍ SE INGRESAN LOS DATOS  -->
				<div class='principal'>
				<form name='form1' class='form' method='POST' action='PCode.php'>
				<input name='Primero' type='text' id='Primero' maxlength='1' onkeypress='return validaNumericos(event)''>
				<input name='Segundo' type='text' id='Segundo' maxlength='1' onkeypress='return validaNumericos(event)''>
				<input name='Tercero' type='text' id='Tercero' maxlength='1' onkeypress='return validaNumericos(event)''>
				<input name='Cuarto' type='text' id='Cuarto' maxlength='1' onkeypress='return validaNumericos(event)''>
				<input name='Entrar' type='submit' class='button1' id='Entrar' value='Probar'>
				</div>");
			}
		?>	
		 <!-- SE COMPRUEBA QUE LOS DIGITOS INGRESADOS SEAN NÚMEROS Y NO LETRAS -->
		 <script type="text/javascript">
		 	function validaNumericos(event) {
		 		if(event.charCode >= 48 && event.charCode <= 57){
		 			return true;
		 		}
		 		return false;        
		 	}
		 </script>
	</form>
	</div>
	<!-- TABLA CON INFORMACIÓN SOBRE LOS INTENTOS REALIZADOS -->
	<div class="intentos">		
		<?php
			
		if ($_SESSION['sumar'] >= 1) {	
		$pru = file( 'BD.txt' );
		$IntentosRealizados = 0;
		$Puntos = 1;
			print("<table>
				<tr>
				<td>Intentos</td>
				<td>Puntuación</td>
				</tr>");
			for ($i=0; $i < $_SESSION['sumar']; $i++) { 
				print("<tr>
					<td>$pru[$IntentosRealizados]</td>
					<td>$pru[$Puntos]</td>
					</tr>");
				$IntentosRealizados += 2;
				$Puntos += 2;
			}						
			print("</table>");
		}		
		?>
	</div>
	<div class="Botones">
		<!-- BOTONES PARA REINICIAR EL JUEGO O REGRESAR AL INICIO -->
	<form method='POST' action='destruir.php'>
			<input type='submit' class="button" value='Reiniciar'>
	</form>
	<form method='POST' action='Index.php'>
			<input type='submit' class="button2" value='Inicio'>
	</form>
	</div>
</body>
</html>