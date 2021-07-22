<?php	
session_start();
$_SESSION['validacion']=True;
$_SESSION['sumar'] = 0;
	$Codigo = array();
	$x = 0;
	while ($x <= 3) {
	    $SiguienteValor = mt_rand(0, 9);
	    if(in_array($SiguienteValor, $Codigo)){
	        continue;
	    }else{
	    array_push($Codigo, $SiguienteValor);
	    $x++;
	    }
	}
	$_SESSION['Codigo']= $Codigo;	
	$_SESSION['JuegoTerminado'] = FALSE;
	header('Location: HCode.php');
?>

