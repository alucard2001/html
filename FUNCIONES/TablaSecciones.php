

<?php

$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 
$sql="select * from secciones"; 
$resultado =  mysql_query($sql, $conexion); 

while ($estudiante=mysql_fetch_object($resultado)) 
{ 
echo"<tr>
	<td>$estudiante->seccion</td>
	<td>$estudiante->estado_secion</td>		
	<td><a href='../FUNCIONES/EditarSecciones.php?id=$estudiante->codigo_seccion'><button class='btn btn-warning glyphicon glyphicon-pencil'>Editar</button></a> | 
		<a href='../FUNCIONES/EliminarSeccion.php?id=$estudiante->codigo_seccion'>
			<button id='btnEliminar' class='btn btn-danger glyphicon glyphicon-remove'>
	Eliminar</button> </a></td>
</tr>";

}

?>