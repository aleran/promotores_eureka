<?php require_once("php/aut.php"); ?>
<?php
require_once('conexion/bdd.php');

$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";
$req_periodo = $bdd->prepare($sql_periodo);
$req_periodo->execute();
$gp_periodo = $req_periodo->fetch();

$sql = "SELECT id, id_colegio, color, start, end, id_objetivo FROM plan_trabajo WHERE id_promotor='".$_SESSION['id']."'";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Plan de Trabajo</title>

		<meta name="description" content="Sistema Aula máxima" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
		.suggest-element{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:120px;
			height:70px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}

		.suggest-element_c{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions_c {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:120px;
			height:150px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}

		input[type=number] { -moz-appearance:textfield; }
			input[type=number]::-webkit-inner-spin-button, 
			input[type=number]::-webkit-outer-spin-button { 
  				-webkit-appearance: none; 
  				margin: 0; 
			}
		</style>
	</head>

	<body class="no-skin">
		<?php include("template/nav.php"); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php include("template/sidebar.php"); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Plan de trabajo</li>
						</ul><!-- /.breadcrumb -->

						<!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div>--><!-- /.nav-search -->
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Plan de trabajo
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Planifique sus visitas
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
            <div class="col-lg-12 text-center">
                
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>

        <!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="ajax/addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agendar visita</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-group">
						<label for="colegio" class="col-sm-2 control-label">Oficina:</label>
						<div class="col-sm-10">
						  <input type="checkbox" name="oficina" id="oficina">
						</div>
				  	</div>

				   <div class="form-group ocultar_oficina">
					<label for="colegio" class="col-sm-2 control-label">Colegio<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <input type="text" name="colegio" id="colegio" class="form-control" id="profesor" placeholder="Nombre del colegio" autocomplete="off" onkeyup="bus_c()" required=>
					  <input type="hidden" name="cole" id="cole"><div id="suggestions_c"></div>
					</div>
				  </div>
					
				  <div class="form-group ocultar_oficina">
					<label for="profesor" class="col-sm-2 control-label">Profesor</label>
					<div class="col-sm-10">
					  <input type="text" name="profesor" class="form-control" id="profesor" placeholder="Nombre del profesor" autocomplete="off" onkeyup="bus_h()">
					  <input type="hidden" name="profe" id="profe"><div id="suggestions"></div>
					</div>
				  </div>
					
					

				  <div class="form-group ocultar_oficina">
					<label for="objetivo" class="col-sm-2 control-label">Objetivo<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					 <select name="objetivo" id="objetivo" class="form-control" required>
					 	<option value="">Seleccionar</option>
					 	<?php 
					 		$sql = "SELECT id, objetivo FROM objetivos";

							$req = $bdd->prepare($sql);
							$req->execute();
							$objetivos = $req->fetchAll();

							foreach($objetivos as $objetivo) {
							    $id = $objetivo['id'];
							    $nom = $objetivo['objetivo'];
							    echo '<option value="'.$id.'">'.$nom.'</option>';
							}
					 	?>
					 </select>
					</div>
				  </div>

			
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" >
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fin</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" >
					</div>
				  </div>
				  <div id="muestreo" class="hidden">
					  <div class="otro_l">
						<label id="l_materia" for="materia" class="col-sm-2 control-label">Materia:<small style="color:red;"> *</small></label>
						 <select name="materia[]" id="materia" class="form-control">
						 	<option value="">Seleccionar</option>
						 	<?php 
						 		$sql = "SELECT id, materia FROM materias";

								$req = $bdd->prepare($sql);
								$req->execute();
								$colegios = $req->fetchAll();

								foreach($colegios as $colegio) {
								    $id = $colegio['id'];
								    $nom = $colegio['materia'];
								    echo '<option value="'.$id.'">'.$nom.'</option>';
								}
						 	?>
						 </select>
						
						<label id="l_grado" for="grado" class="col-sm-2 control-label">Grado:<small style="color:red;"> *</small></label>
						 <select name="grado[]" id="grado" class="form-control">
						 	<option value="">Seleccionar</option>
						 	<?php 
						 		$sql = "SELECT id, grado FROM grados";

								$req = $bdd->prepare($sql);
								$req->execute();
								$grados = $req->fetchAll();

								foreach($grados as $grado) {
								    $id = $grado['id'];
								    $nom = $grado['grado'];
								    echo '<option value="'.$id.'">'.$nom.'</option>';
								}
						 	?>
						 </select>
						<label id="l_libro" for="libro" class="col-sm-2 control-label">Libro:<small style="color:red;"> *</small></label>
						
						  <select name="libro" id="libro" class="form-control">
						  	
						  </select>
						<input type="hidden" name="libro_e[]" id="libro_e">

						<label id="l_cantidad" for="cantidad" class="col-sm-2 control-label">Cantidad:<small style="color:red;"> *</small></label>
						<input type="number" class="form-control" name="cantidad" id="cantidad">
					</div>
					<center><label for="observaciones">Observaciones:</label><br>
					<textarea name="observaciones" id="observaciones" cols="30" rows="3"></textarea></center><br>
					<a id="agregar_libro" style="cursor: pointer;">Agregar libro +</a>
				</div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="ajax/editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Seleccionar</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
						  <option style="color:#000;" value="#000">&#9724; Negro</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Aula Máxima</span>
							 &copy; Eureka Libros SAS
						</span>

						&nbsp; &nbsp;
						<!--<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>-->
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		
		<script src='assets/js/fullcalendar/fullcalendar.min.js'></script>
		<script src='assets/js/fullcalendar/locale/es.js'></script>
		<script src="assets/js/bootbox.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script>

	$(document).ready(function() {

		var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        	monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        	dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    		dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],

    		defaultView: 'agendaWeek',
    		
    		allDaySlot: false,

    		nowIndicator: true,
    		slotDuration: '01:00:00',
			header: {
				 language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: '',

			},
			hiddenDays: [ 0 ],
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			minTime: "06:00:00",
			maxTime: "20:00:00",
			select: function(start, end) {

		      	// leemos las fechas de inicio de evento y hoy
		      	var check = moment(start).format('YYYY-MM-DD');
		     	var today = moment(new Date()).format('YYYY-MM-DD');

		      	// si el inicio de evento ocurre hoy o en el futuro mostramos el modal
		     	if (check >= today) {

			        // éste es el código que tenías originalmente en el select
			        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
			        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
			        $('#ModalAdd').modal('show');
		      	}
		      // si no, mostramos una alerta de error
			    else {
			        alert("No se pueden crear eventos en el pasado!");
			    }
  			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}

				$sql = "SELECT colegio FROM colegios WHERE id='".$event['id_colegio']."' ";
				$req = $bdd->prepare($sql);
				$req->execute();

				$col = $req->fetch();

				$sql_ob = "SELECT objetivo FROM objetivos WHERE id='".$event['id_objetivo']."' ";
				$req_ob = $bdd->prepare($sql_ob);
				$req_ob->execute();

				$objetivo = $req_ob->fetch();
					
			?>
				{
					
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $col['colegio']?>'+"\n"+'<?php echo $objetivo["objetivo"]; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
					url: 'evento.php?evento=<?php echo $event['id']; ?>'
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'ajax/editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Evento se ha guardado correctamente');
					}else{
						alert('No se pudo guardar. Inténtalo de nuevo.'); 
					}
				}
			});
		}
		
	});

</script>
<script>
	function bus_h(){
		var prof= document.getElementById('profesor').value;
		var colegio= document.getElementById('cole').value;
		var dataString = 'profesor='+prof+"/"+colegio;
		$("#profesor").change(function(){
			$("#profe").val("");
		});
		$.ajax({
			type: "POST",
			url: "ajax/buscar_profesor.php",
			data: dataString,
			success: function(resp) {

				$("#profesor").blur(function(){
					$('#suggestions').fadeOut();
				})
				if (resp !="") {
					$('#suggestions').fadeIn().html(resp);
				}

				if (resp =="") {
					$('#suggestions').fadeOut().html(resp);
					$('#profe').val("no");
				}
				
				$('.suggest-element a').on('click', function(){
					var id = $(this).attr('id');
					var profe= $(this).attr('data-profe');
					$('#profesor').val(profe);
					$('#profe').val(id);
					$('#suggestions').fadeOut();

					return false;
				});


			}
		});
	}

	function bus_c(){
		var colegio= document.getElementById('colegio').value;
		var dataString = 'colegio='+colegio;
		$("#colegio").change(function(){
			$("#cole").val("");
		});
		$.ajax({
			type: "POST",
			url: "ajax/buscar_colegio.php",
			data: dataString,
			success: function(resp) {

				$("#colegio").blur(function(){
					$('#suggestions_c').fadeOut();
				})
				if (resp !="") {
					$('#suggestions_c').fadeIn().html(resp);
				}

				if (resp =="") {
					$('#suggestions_c').fadeOut().html(resp);
					$('#cole').val("no");
				}
				
				$('.suggest-element_c a').on('click', function(){
					var id = $(this).attr('id');
					var cole= $(this).attr('data-colegio');
					$('#colegio').val(cole);
					$('#cole').val(id);
					$('#suggestions_c').fadeOut();

					return false;
				});


			}
		});
	}


	$('#objetivo').on('change',function(){
        var valor = $(this).val();
         if (valor == 2) {

          	$("#muestreo").removeClass("hidden");
          	$("#materia").attr("required","required");
          	$("#grado").attr("required","required");
          	$("#libro").attr("required","required");

        }else{

          	$("#muestreo").addClass("hidden");

          	$("#materia").removeAttr("required");
          	$("#grado").removeAttr("required");
          	$("#libro").removeAttr("required");
        }
            
                
    });
</script>
	<script>
		$(".plan_trabajo").addClass("active");

	$("#oficina").click(function(){


		if( $('#oficina').prop('checked') ) {
	   		$(".ocultar_oficina").addClass("hidden")
	   		$(".ocultar_oficina").removeClass("show")
	   		$("#colegio").removeAttr("required");
	   		$("#objetivo").removeAttr("required");

		}else {
			$(".ocultar_oficina").addClass("show")
			$(".ocultar_oficina").removeClass("hidden")
			$("#colegio").attr("required","required");
	   		$("#objetivo").attr("required","required");

		}
	})


	$('#materia').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#grado').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#cantidad').keyup(function(){
			var cant =$('#cantidad').val();
			var libro=$('#libro').val();
			$('#libro_e').val(libro+'/'+cant);

		})

		var m = 1;
		var g = 1;
		var l = 1;
		var c = 1;
		var le = 1;
		$("#agregar_libro").click(function(){
			if (m>8) {
				$("#agregar_libro").addClass("hidden");
			}
			$("#l_materia").clone().appendTo(".otro_l");
			$("#materia").clone().appendTo(".otro_l").attr("id","materia"+(m++));
			$("#l_grado").clone().appendTo(".otro_l");
			$("#grado").clone().appendTo(".otro_l").attr("id","grado"+(g++));
			$("#l_libro").clone().appendTo(".otro_l");
			$("#libro").clone().appendTo(".otro_l").attr("id","libro"+(l++));
			$("#l_cantidad").clone().appendTo(".otro_l");
			$("#cantidad").clone().appendTo(".otro_l").attr("id","cantidad"+(c++)).val("");
			$("#libro_e").clone().appendTo(".otro_l").attr("id","libro_e"+(le++));


			$('#materia1').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado1").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro1").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

        	


		$('#grado1').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia1").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro1").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});
		
		$('#cantidad1').keyup(function(){
			var cant =$('#cantidad1').val();
			var libro=$('#libro1').val();
			$('#libro_e1').val(libro+'/'+cant);

		})

		$('#materia2').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado2").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro2").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#grado2').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia2").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro2").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#cantidad2').keyup(function(){
			var cant =$('#cantidad2').val();
			var libro=$('#libro2').val();
			$('#libro_e2').val(libro+'/'+cant);

		})

		$('#materia3').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado3").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro3").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#grado3').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia3").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro3").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

			$('#cantidad3').keyup(function(){
				var cant =$('#cantidad3').val();
				var libro=$('#libro3').val();
				$('#libro_e3').val(libro+'/'+cant);

			})

			$('#materia4').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado4").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro4").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#grado4').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia4").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro4").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

			$('#cantidad4').keyup(function(){
				var cant =$('#cantidad4').val();
				var libro=$('#libro4').val();
				$('#libro_e4').val(libro+'/'+cant);

			})

			$('#materia5').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado5").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro5").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#grado5').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia5").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro5").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

			$('#cantidad5').keyup(function(){
				var cant =$('#cantidad5').val();
				var libro=$('#libro5').val();
				$('#libro_e5').val(libro+'/'+cant);

			})

			$('#materia6').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado6").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro6").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});



		$('#grado6').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia6").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro6").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

			$('#cantidad6').keyup(function(){
				var cant =$('#cantidad6').val();
				var libro=$('#libro6').val();
				$('#libro_e6').val(libro+'/'+cant);

			})

			$('#materia7').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado7").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro7").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#grado7').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia7").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro7").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

			$('#cantidad7').keyup(function(){
				var cant =$('#cantidad7').val();
				var libro=$('#libro7').val();
				$('#libro_e7').val(libro+'/'+cant);

			})

		$('#materia8').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado8").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro8").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});
		});

		$('#grado8').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia8").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro8").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

			$('#cantidad8').keyup(function(){
				var cant =$('#cantidad8').val();
				var libro=$('#libro8').val();
				$('#libro_e8').val(libro+'/'+cant);

			})

			$('#materia9').on('change',function(){
	            var valor = $(this).val();
	            var grado = $("#grado9").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+valor+'/'+grado;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro9").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

		$('#grado9').on('change',function(){
	            var valor = $(this).val();
	            var materia = $("#materia9").val()
	             //alert(valor);
	            var dataString = 'mat_gra='+materia+'/'+valor;
	            
	            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#libro9").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});

			$('#cantidad9').keyup(function(){
				var cant =$('#cantidad9').val();
				var libro=$('#libro9').val();
				$('#libro_e9').val(libro+'/'+cant);

			})
	
		
	                                           
	</script>
		
	</body>
</html>
