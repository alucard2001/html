<?php

$id=$_GET['id'];

$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 

echo $sql= "SELECT * FROM prueba.secciones WHERE codigo_seccion =$id ";

if($resultado=mysql_query($sql, $conexion)){

	while ($estudiante=mysql_fetch_object($resultado)) {

		$cod 	  = $estudiante->codigo_seccion;
		$nombre   = $estudiante->seccion;
		$apellido = $estudiante->estado_secion;
	
session_start();
 $_SESSION['cod'] = $cod ;
		header("location:../VISTA/Seccion.php?nombre=".$nombre."&estado=".$apellido."&id=".$cod ."");


		
	}


}