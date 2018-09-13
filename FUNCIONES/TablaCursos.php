

<?php

$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 
$sql="select * from cursos"; 
$resultado =  mysql_query($sql, $conexion); 

while ($estudiante=mysql_fetch_object($resultado)) 
{ 
echo"<tr>
	<td>$estudiante->curso</td>
	<td>$estudiante->estado_curso</td>		
	<td><a href='../FUNCIONES/EditarCurso.php?id=$estudiante->codigo_curso'><button class='btn btn-warning glyphicon glyphicon-pencil'> Editar</button></a> | 
		<a href='../FUNCIONES/EliminarCurso.php?id=$estudiante->codigo_curso'>
			<button id='btnEliminar ' class='btn btn-danger glyphicon glyphicon-remove'>
	Eliminar</button> </a></td>
</tr>";

}

?>