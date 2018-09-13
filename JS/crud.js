	$(document).ready(function(){

		//====OBTENEMOS LOS VALORES DE LOS CAMPOS DE LA VENTANA MODAL CON LOS DATOS DEL NUEVO CLIENTE A REGISTRAR
		
		var id = $('#Hid').val();
		var nombre= $('#Hnombre').val();
		var apellido = $('#Hapellido').val();
		var edad = $('#Hedad').val();
		var telefono =$('#Htelefono').val();
		var correo =$('#Hcorreo').val();

		if(nombre && apellido)
		{

			$('#RegistrarClienteModal').modal('toggle');	
			$('#RegistrarClienteModal').modal('show');


			$('#Nombre').val(nombre);
			$('#Apellidos').val(apellido);
			$('#Edad').val(edad);
			$('#Telefono').val(telefono);
			$('#Correo').val(correo);

			$('.Actualizar').removeClass('nover');
			$('.Registrar').addClass('nover');
		
		}

		$('#Agregar').click(function(){


			$('.Registrar').removeClass('nover');
			$('.Actualizar').addClass('nover');

		});

		

		
		$('#Registrar').click(function(){

			var nombre=$('#Nombre').val();
			var apellidos=$('#Apellidos').val();
			var edad =$('#Edad').val();
			var tel = $('#Telefono').val();
			var correo=$('#Correo').val();

			$.ajax({
							type: "POST",
							url: '../FUNCIONES/RegistrarPersona.php',
							data: 'Nombre='+nombre+'&Apellidos='+apellidos+'&Edad='+edad+'&Telefono='+tel+'&Correo='+correo,
							success: function()
							{
									$('.Contenido').load("../FUNCIONES/TablaPersona.php");
		

							}


			});

		});


		$('.Actualizar').click(function(){

			var id = $('#Hid').val();
			var nombre=$('#Nombre').val();
			var apellidos=$('#Apellidos').val();
			var edad =$('#Edad').val();
			var tel = $('#Telefono').val();
			var correo=$('#Correo').val();


			$.ajax({
			type:'GET',
			url:'../FUNCIONES/ActualizarPersona.php',
			data: "id="+id+"&Nombre="+nombre+"&Apellidos="+apellido+"&Edad="+edad+"&Telefono="+telefono+"&Correo="+correo,
				success: function(res){

					if(res=="1"){
						alert("PERSONA ACTUALIZADA CORRECTAMENTE");
						$('.Contenido').load("../FUNCIONES/TablaPersona.php");
					}
					else
					{
						alert("nose actualizo correctametne");
					}


			}

		});
		



		});


		



	});
