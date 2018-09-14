



<?php

$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 

$sql = "select count(1) 
from prueba.estudiantes as e,prueba.cursos as c,prueba.secciones as s
where e.codigo_curso=c.codigo_curso
and e.codigo_seccion=s.codigo_seccion"
;
 
$resultado =  mysql_query($sql, $conexion); 
$total = mysql_num_rows($resultado);
$page = ((isset($_GET['_page'])) ? $_GET['_page'] : 0);
$size = (isset($_GET['_size'])) ? $_GET['_size'] : 10 ;
$offset = ceil($page * $size);

$sql="select e.codigo_estudiante, e.nombre,e.apellido,(SELECT TIMESTAMPDIFF( YEAR, e.fecha_nacimiento, CURDATE( ) ) )AS edad,
e.codigo_curso,e.codigo_seccion,e.estado_estudiante,c.curso,s.seccion
 from prueba.estudiantes as e,prueba.cursos as c,prueba.secciones as s
where e.codigo_curso=c.codigo_curso
and e.codigo_seccion=s.codigo_seccion
limit $size offset $offset";

$resultado =  mysql_query($sql, $conexion);

while ($estudiante=mysql_fetch_object($resultado)) 
{ 
echo"<tr>
	<td>$estudiante->nombre</td>
	<td>$estudiante->apellido</td>
	<td>$estudiante->edad</td>
	<td>$estudiante->curso</td>
	<td>$estudiante->seccion</td>
    <td>$estudiante->estado_estudiante</td>		
	<td><a href='../FUNCIONES/editar.php?id=$estudiante->codigo_estudiante'><button class='btn btn-warning glyphicon glyphicon-pencil'>Editar</button></a> | 
		<a href='../FUNCIONES/EliminarPersona.php?id=$estudiante->codigo_estudiante'>
			<button id='btnEliminar' class='btn btn-danger glyphicon glyphicon-remove'>
	Eliminar</button> </a></td>
</tr>";

}

?>
