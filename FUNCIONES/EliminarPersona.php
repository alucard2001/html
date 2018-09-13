<?php
 

	$id = $_GET['id'];
	
	$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 
			
	$sql = "DELETE FROM estudiantes WHERE codigo_estudiante='$id'";	
	mysql_query($sql);
	
	header("location:../VISTA/index.php");


?>