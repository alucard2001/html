<?php

$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 
$sql="select e.codigo_estudiante, e.nombre,e.apellido,(SELECT TIMESTAMPDIFF( YEAR, e.fecha_nacimiento, CURDATE( ) ) )AS edad,
e.codigo_curso,e.codigo_seccion,e.estado_estudiante,c.curso,s.seccion
 from prueba.estudiantes as e,prueba.cursos as c,prueba.secciones as s
where e.codigo_curso=c.codigo_curso
and e.codigo_seccion=s.codigo_seccion"; 
$resultado =  mysql_query($sql, $conexion); 
$r=mysql_num_rows($resultado);

echo"<h6>El total de estudiantes es: $r</h5>";


?>