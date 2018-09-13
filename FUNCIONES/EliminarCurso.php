<?php
 

	$id = $_GET['id'];
	
	$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba');
 
			$sql="SELECT * 
FROM cursos AS c, estudiantes AS e
WHERE c.codigo_curso = e.codigo_curso
and c.codigo_curso='$id'";

$resultado =  mysql_query($sql, $conexion); 
$r=mysql_num_rows($resultado);
if($r==0){

	$sql = "DELETE FROM prueba.cursos WHERE codigo_curso='$id'";	
	mysql_query($sql);
	
	
}
header("location:../VISTA/Curso.php");
?>