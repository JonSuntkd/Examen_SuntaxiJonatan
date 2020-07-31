<?php 

	include('conexion.php');
	$COD_MODULO = $_POST['COD_MODULO'];
	$NOMBRE = $_POST['NOMBRE'];
	$ESTADO = $_POST['ESTADO'];
	

	$sql = "INSERT INTO SEG_MODULO (NOMBRE,ESTADO) 
				VALUES ($NOMBRE','$ESTADO');";
	$res = mysql_query($sql);
	if ( isset( $res ) )
		echo "correcto";
	else
		echo "error";	

?>
