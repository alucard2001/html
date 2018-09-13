<?php


$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Edad=$_POST['Edad'];
$Curso=$_POST['Curso'];
$Seccion=$_POST['Seccion'];


$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('<head>
  <title>CRUD PHP + AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    .nover
    {
      display: none;
    }

  </style>

</head>'); 


$sql="INSERT INTO estudiantes VALUES(0, '$Nombre', '$Apellidos', '$Edad', $Curso, $Seccion',0) ";

if( mysql_query($sql, $conexion)){
	return true;
}

?>