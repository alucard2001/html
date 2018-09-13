<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
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

</head>
<body>
<nav class="navbar navbar-inverse bg-primary">

<center><h3><b>Carlos Cedeno</b></h3></center>
</nav>
<?php
	if(isset($_GET['nombre'])){

	$id =$_GET['id'];
	$nombre=$_GET['nombre'];
	$apellido=$_GET['estado'];
	

	echo "<input type='hidden' id='Hid' value='$id'>";
	echo "<input type='hidden' id='Hnombre' value='$nombre'>";
	echo "<input type='hidden' id='Hapellido' value='$apellido'>";

	?>
<div class="container">
  <h2>Actualizar Seccion</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#RegistrarClienteModal	" id="Agregar">AGREGAR</button> 

 <table class="table">
    <thead class="active">
      <tr class="active">
        <th>Seccion</th>
        <th>Estado</th>
      
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody class="Contenido">

     <?php
     	include '../FUNCIONES/TablaSecciones.php';
     ?>

    </tbody>
  </table>
</div>

<?php
	}


else
{

?>
<div class="container">
  <h2>Seccion</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#RegistrarClienteModal	" id="Agregar">AGREGAR</button> 

 <table class="table">
    <thead class="active">
      <tr class="active">
        <th>Seccion</th>
        <th>Estado</th>

        <th>Opciones</th>
      </tr>
    </thead>
    <tbody class="Contenido">

     <?php
     	include '../FUNCIONES/TablaSecciones.php';
     ?>

    </tbody>
  </table>
</div>


</body>
</html>
<?php


 } //cerramos ELSE

 ?>

<script type="text/javascript" src="../JS/CRUD.js"> </script>
</html>

<div id="RegistrarClienteModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Agregar Seccion</h4>
 </div>
 <div class="modal-body">
 <form role="form" id="fkd"  method="post">
		 <div class="form-group">
			   <label class="control-label" for="inputPatient">Nombre</label>
			   <div class="field desc">
			  	 <input class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="" required>
			  </div>
     	 </div>
    <label for="name">Estado:</label>
       <div class="form-group">
<select class="form-control" name="Estado" id="Estado">
  <option value="">Seleccionar Estado:</option>
  <option value="0">Activo</option>
  <option value="1">Inactivo</option>
  
</select>
  

		 
 

		 <div class="control-group">

		 <div class="controls controls-row" id="when" style="margin-top:5px;">
		 </div>
		 </div>
		  <div class="modal-footer">
 <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
 <button  class="btn btn-primary Registrar" type="submit" value="Insertar" name="Inserta" id="Inserta">Registrar</button>
  <button type="submit" class="btn btn-success Actualizar nover"  value="Actualizar" name="Actualizar" id="Actualizar ">Actualizar</button>
 </div>
		</form > 
		<?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

						if (isset($_POST['Inserta'])) {
							
$Nombre=$_POST['Nombre'];
$Estado=$_POST['Estado'];

							$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba', $conexion); 
$sql="INSERT INTO secciones VALUES(0, '$Nombre', '$Estado') ";

 mysql_query($sql);
						}
						if (isset($_POST['Actualizar'])) {
							$id=$_SESSION['cod'];
$Nombre=$_POST['Nombre'];
$Estado=$_POST['Estado'];

							$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba', $conexion); 
$sql="UPDATE secciones SET seccion='$Nombre', estado_secion = '$Estado' where codigo_seccion=$id ";

 
 mysql_query($sql);
						}}
						
						?>
						
 </div>

 
 </div>
 
 </div>
</div>
