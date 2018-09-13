<?php

$id=$_GET['id'];

$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 

$sql= "SELECT * FROM estudiantes WHERE codigo_estudiante =$id";

if($resultado=mysql_query($sql, $conexion)){

	while ($estudiante=mysql_fetch_object($resultado)) {

		$cod 	  = $estudiante->codigo_estudiante;
		$nombre   = $estudiante->nombre;
		$apellido = $estudiante->apellido;
		$fecha_nacimiento     = $estudiante->fecha_nacimiento;
		$codigo_curso = $estudiante->codigo_curso;
		$codigo_seccion   = $estudiante->codigo_seccion;
session_start();
 $_SESSION['cod'] = $cod ;
		header("location:../VISTA/index.php?nombre=".$nombre."&apellido=".$apellido."&Edad=".$fecha_nacimiento."&Curso=".$codigo_curso."&codigo_seccion=".$codigo_seccion."&id=".$cod ."");


		
	}


}






?>