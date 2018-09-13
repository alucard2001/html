<?php
 

	$id = $_GET['id'];
	
	$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 
			$sql="SELECT * 
FROM secciones AS s, estudiantes AS e
WHERE s.codigo_seccion = e.codigo_seccion
and s.codigo_seccion='$id'";

$resultado =  mysql_query($sql, $conexion); 
$r=mysql_num_rows($resultado);
if($r==0){
	$sql = "DELETE FROM prueba.secciones WHERE codigo_seccion='$id'";	
	mysql_query($sql);
	
	header("location:../VISTA/Seccion.php");
}

?>