<?php

$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Edad=$_POST['Edad'];
$Curso=$_POST['Curso'];
$Seccion=$_POST['Seccion'];




$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba');

		$sql = "UPDATE estudiantes SET nombre='$Nombre', apellido = '$Apellidos', fecha_nacimiento = '$Edad', codigo_curso=$Curso, codigo_seccion=$Seccion WHERE codigo_estudiante = $Id";
	if(mysql_query($sql, $conexion)){
		echo "1";
	}





?>