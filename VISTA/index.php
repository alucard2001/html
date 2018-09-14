<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
  <title>CRUD PHP + AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
<body >


<nav class="navbar navbar-inverse bg-primary">

<center><h3><b>Carlos Cedeno</b></h3></center>
</nav>
<?php
	if(isset($_GET['nombre'])){

	$id =$_GET['id'];
	$nombre=$_GET['nombre'];
	$apellido=$_GET['apellido'];
	$edad=$_GET['Edad'];
	$cursos=$_GET['Curso'];
	$seccion=$_GET['seccion'];

	echo "<input type='hidden' id='Hid' value='$id'>";
	echo "<input type='hidden' id='Hnombre' value='$nombre'>";
	echo "<input type='hidden' id='Hapellido' value='$apellido'>";
	echo "<input type='hidden' id='Hedad' value='$edad'>";
	echo "<input type='hidden' id='HCursos' value='$cursos'>";
	echo "<input type='hidden' id='Hseccion' value='$seccion'>";
	?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <h2>Actualizar Estudiante</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#RegistrarClienteModal	" id="Agregar">AGREGAR</button> 

<table name="tabla1" width="800" height="65" border="1" class="table table-bordered table-hover">
    <thead class="active">
      <tr class="active">
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Curso</th>
        <th>Seccion</th>
		<th>Estado</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody class="Contenido">

     <?php
     	include '../FUNCIONES/TablaPersona.php';
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
<div >
  <h2>Estudiante</h2>
<button class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#RegistrarClienteModal" id="Agregar">AGREGAR</button> 
</div>
 <table width="800" height="65" border="1" class="table table-bordered table-hover">
    <thead class="active">
      <tr class="active">
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Curso</th>
        <th>Seccion</th>
		<th>Estado</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody class="Contenido">

     <?php
     	include '../FUNCIONES/TablaPersona.php';
     ?>

    </tbody>
  </table>
  <?php
     	include '../FUNCIONES/total.php';
		
     
   ?>
</div>


</body>
</html>
<?php


 } //cerramos ELSE

 ?>

<script type="text/javascript" src="../JS/CRUD.js"> </script>
</html>
 
<div id="RegistrarClienteModal" class="modal fade" role="dialog" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Agregar Estudiante</h4>
 </div>
 <div class="modal-body">
 <form role="form" id="fkd"  method="post">
		 <div class="form-group">
			   <label class="control-label" for="inputPatient">Nombre</label>
			   <div class="field desc">
			  	 <input class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="" >
			  </div>
     	 </div>

          <div class="form-group">
	          <label class="control-label" for="inputPatient">Apellidos</label>
	          <div class="field desc">
	       		  <input class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos" type="text" value="" >
	         </div>
         </div>

          <div class="form-group">
	          <label class="control-label" for="inputPatient">Fecha Nacimiento</label>
	          <div class="field desc">
	       		  <input class="form-control" id="Edad" name="Edad" placeholder="Edad" type="date" min="0" value="<?php echo $_GET['Edad'];?>" >
	         </div>
         </div>
		 
 <label for="name">Curso</label>
       <div class="form-group">
	   <?php
	   $conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 
                         $sql = "SELECT codigo_curso,curso FROM cursos where estado_curso=0";
                         $res = mysql_query($sql, $conexion);
                         $num = mysql_num_rows($res);
                        ?>
<select class="form-control" name="Cursos" id="Cursos">
  <option value="">Seleccionar Curso:</option>
   <?php
                    for ($i = 1; $row = mysql_fetch_row($res); $i++) {
                    if ($row[0] == $seleccionado) {
                    echo "<option value = '" . $row[0] . "' selected>" . $row[1] . "</option>";} 
					else {
                        echo "<option value = '" . $row[0] . "'>" . $row[1] . "</option>";}
                            }?>
  
</select>
<div class="text-center">
    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#Registrar_Curso">Registrar Curso</a>
</div>
							</div>

           
    <label for="name">Seccion</label>
       <div class="form-group">
	   <?php
	   $conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba'); 
                         $sql = "SELECT * FROM `secciones` where estado_secion=0";
                         $res = mysql_query($sql, $conexion);
                         $num = mysql_num_rows($res);
                        ?>
<select class="form-control" name="Seccion" id="Seccion">
  <option value="">Seleccionar Seccion:</option>
   <?php
                    for ($i = 1; $row = mysql_fetch_row($res); $i++) {
                    if ($row[0] == $seleccionado) {
                    echo "<option value = '" . $row[0] . "' selected>" . $row[1] . "</option>";} 
					else {
                        echo "<option value = '" . $row[0] . "'>" . $row[1] . "</option>";}
                            }?>
  
</select>
<button type="submit" class="btn btn-primary Registrar"  href="Curso.php"id="Registrar_Seccion">Registrar Seccion</button>
							</div>

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
$Apellidos=$_POST['Apellidos'];
$Edad=$_POST['Edad'];
$Curso=$_POST['Cursos'];
$Seccion=$_POST['Seccion'];
							$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba', $conexion); 
$sql="INSERT INTO estudiantes VALUES(0, '$Nombre', '$Apellidos', '$Edad', $Curso, $Seccion,0) ";

 mysql_query($sql);
						}
						if (isset($_POST['Actualizar'])) {
							$id=$_SESSION['cod'];
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Edad=$_POST['Edad'];
$Curso=$_POST['Cursos'];
$Seccion=$_POST['Seccion'];

							$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba', $conexion); 
$sql="UPDATE estudiantes SET nombre='$Nombre', apellido = '$Apellidos', fecha_nacimiento = '$Edad', codigo_curso=$Curso, codigo_seccion=$Seccion where codigo_estudiante=$id ";

 
mysql_query($sql);
						}}
						?>
 </div>

 
 
 
 </div>
 <div class="modal fade" id="Registrar_Curso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Registrar Curso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                   <label data-error="wrong" data-success="right" for="form34">Curso</label>
                    <input type="text" id="Curso" class="form-control validate">
                    
                </div>

                     <label for="name">Estado</label>
       <div class="form-group">
<select class="form-control" name="Estado" id="Estado">
  <option value="">Seleccionar Estado:</option>
  <option value=0>Activo</option>
  <option value=1>Inactivo</option>
  
</select>
							</div>

            </div>
			
            <div class="modal-footer d-flex justify-content-center">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
               <button type="submit"  name="registrar_curso" id="registrar_curso" value="Insertar"
             class="btn btn-primary " >Registrar</button>
            </div>
        </div>
    </div>
</div>
 <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

						if (isset($_POST['registrar_curso'])) {
							$Curso=($_POST['Curso']);
							$Estado = ($_POST['Estado']);
							
						}}
						?>
 
 </div>
</div>
