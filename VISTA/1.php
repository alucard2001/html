<form role="form" id="fkd"  method="post">
		 <div class="form-group">
			   <label class="control-label" for="inputPatient">Nombre</label>
			   <div class="field desc">
			  	 <input class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="" required>
			  </div>
     	 </div>

          <div class="form-group">
	          <label class="control-label" for="inputPatient">Apellidos</label>
	          <div class="field desc">
	       		  <input class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos" type="text" value="" required>
	         </div>
         </div>

          <div class="form-group">
	          <label class="control-label" for="inputPatient">Fecha Nacimiento</label>
	          <div class="field desc">
	       		  <input class="form-control" id="Edad" name="Edad" placeholder="Edad" type="date" min="0" value="" required>
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
<select class="form-control" name="Curso" id="Curso">
  <option value="">Seleccionar Curso:</option>
   <?php
                    for ($i = 1; $row = mysql_fetch_row($res); $i++) {
                    if ($row[0] == $seleccionado) {
                    echo "<option value = '" . $row[0] . "' selected>" . $row[1] . "</option>";} 
					else {
                        echo "<option value = '" . $row[0] . "'>" . $row[1] . "</option>";}
                            }?>
  
</select>
<button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Registrar_Curso">Registrar Curso</button>
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
<button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Registrar_Seccion">Registrar Seccion</button>
							</div>

		 <div class="control-group">

		 <div class="controls controls-row" id="when" style="margin-top:5px;">
		 </div>
		 </div>
		  <div class="modal-footer">
 <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
 <button  class="btn btn-primary Registrar" type="submit" value="Insertar" name="Inserta" id="Inserta">Registrar</button>
  <button type="submit" class="btn btn-success Actualizar nover"  data-dismiss="modal" id="Actualizar ">Actualizar</button>
 </div>
		</form > 
		<?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

						if (isset($_POST['Inserta'])) {
							
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Edad=$_POST['Edad'];
$Curso=$_POST['Curso'];
$Seccion=$_POST['Seccion'];
							$conexion = mysql_connect('localhost:3306', 'root','');
mysql_select_db ('prueba', $conexion); 
$sql="INSERT INTO estudiantes VALUES(0, '$Nombre', '$Apellidos', '$Edad', $Curso, $Seccion,0) ";

 if(!mysql_query($sql)){echo 'insectado';}
						}}
						?>