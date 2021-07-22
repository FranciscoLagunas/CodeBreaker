<?php
/* Destruir la sesion */
session_start();
session_destroy();

/*BORRAR ARHIVO*/
$exist = file_exists("BD.txt");
if ($exist)
{
	unlink("BD.txt");
}

/* Redirigir */
header('Location: PFunciones.php');
?>