<?php require_once("php/aut.php"); ?>
<?php
require_once('conexion/bdd.php');
if (isset($_POST["desde"])) {

	$mod_date = strtotime($_POST["desde"]."+ 7 day");
	$mod_date = strtotime($_POST["desde"]."+ 7 day");
	$hasta= date("Y-m-d",$mod_date);
}



if (isset($_POST["zona"])) {

	$sql_u = "SELECT id, nombres, apellidos FROM usuarios WHERE cod_zona='".$_POST['zona']."'";

	$req_u = $bdd->prepare($sql_u);
	$req_u->execute();
	$usuario = $req_u->fetch();

	$promotor=$usuario["nombres"]." ".$usuario["apellidos"];
	$id_user=$usuario["id"];

	$sql_z = "SELECT zona FROM zonas WHERE codigo='".$_POST['zona']."'";

	$req_z = $bdd->prepare($sql_z);
	$req_z->execute();
	$zonas = $req_z->fetch();

	$zona=$zonas["zona"];

	$sql = "SELECT id, id_colegio, color, start, end, id_objetivo FROM plan_trabajo WHERE id_promotor='".$usuario["id"]."' AND start BETWEEN '".$_POST["desde"]."' AND '".$hasta."'";

}
else {

	if (isset($_GET["planid"])) {

		$sql_pl= "SELECT id_promotor FROM plan_trabajo WHERE id='".$_GET["planid"]."'";

		$req_pl = $bdd->prepare($sql_pl);
		$req_pl->execute();
		$pl = $req_pl->fetch();

		$sql = "SELECT id, id_colegio, color, start, end, id_objetivo FROM plan_trabajo WHERE id_promotor='".$pl["id_promotor"]."' AND start BETWEEN '".$_GET["desde"]."' AND '".$_GET["hasta"]."'";

		$sql_u = "SELECT id, nombres, apellidos, cod_zona FROM usuarios WHERE id='".$pl["id_promotor"]."'";
	}

	else{
		$sql = "SELECT id, id_colegio, color, start, end, id_objetivo FROM plan_trabajo WHERE id_promotor='".$_POST['promo']."' AND start BETWEEN '".$_POST["desde"]."' AND '".$hasta."'";

		$sql_u = "SELECT id, nombres, apellidos, cod_zona FROM usuarios WHERE id='".$_POST['promo']."'";
	}

	$req_u = $bdd->prepare($sql_u);
	$req_u->execute();
	$usuario = $req_u->fetch();

	$promotor=$usuario["nombres"]." ".$usuario["apellidos"];
	$id_user=$usuario["id"];

	$sql_z = "SELECT zona FROM zonas WHERE codigo='".$usuario["cod_zona"]."'";

	$req_z = $bdd->prepare($sql_z);
	$req_z->execute();
	$zonas = $req_z->fetch();

	$zona=$zonas["zona"];
}


$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="theme-color" content="#52004F">
		<meta charset="utf-8" />
		<title>Visitas semanal</title>

		<meta name="description" content="Sistema Bitácora" />
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


	@page{
   		margin: 0;
   		size: landscape;
   		
	}
	@media print {
		a {display: none;}
		
		a[href]:after {
    		content: none !important;
 		}
		
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
					<div class="breadcrumbs ace-save-state hidden-print" id="breadcrumbs">
						<ul class="breadcrumb ">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Visitas semanal</li>
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
						

						<div class="page-header hidden-print">
							<h1>
								Reportes
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Reportes de visitas semanal
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<h5> Promotor: <?php echo $promotor." zona: ".$zona;  ?></h5><br>
            <div class="">
               
                <div id="calendar" class="col-centered">
                </div>
				<h5><a href="php/visitas_semanal_excel.php?desde=<?php echo $_POST["desde"] ?>&hasta=<?php echo $hasta ?>&promotor=<?php echo $id_user ?>">Exportar excel</a></h5>
				<center><button class="btn btn-success hidden-print" id="imprimir">Imprimir</button></center>
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
					<label for="colegio" class="col-sm-2 control-label">Colegio<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <input type="text" name="colegio" id="colegio" class="form-control" id="profesor" placeholder="Nombre del profesor" autocomplete="off" onkeyup="bus_c()" required=>
					  <input type="hidden" name="cole" id="cole"><div id="suggestions_c"></div>
					</div>
				  </div>
					
				  <div class="form-group">
					<label for="profesor" class="col-sm-2 control-label">Profesor</label>
					<div class="col-sm-10">
					  <input type="text" name="profesor" class="form-control" id="profesor" placeholder="Nombre del profesor" autocomplete="off" onkeyup="bus_h()">
					  <input type="hidden" name="profe" id="profe"><div id="suggestions"></div>
					</div>
				  </div>
					
					

				  <div class="form-group">
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

				  

				  <!--<div class="form-group">
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
				  </div>-->
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" >
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label hidden">Fecha Final</label>
					<div class="col-sm-10">
					  <input type="hidden" name="end" class="form-control" id="end" >
					</div>
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
						<span class="bigger-120 hidden-print">
							<span class="blue bolder">Bitácora</span>
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
			<?php if (isset($_POST["desde"])) {?>
			defaultDate: '<?php echo $_POST["desde"] ?>',
			<?php }else{ ?>
		defaultDate: '<?php echo $_GET["desde"] ?>',
			<?php } ?>
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			minTime: "06:00:00",
			maxTime: "20:00:00",
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
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
					<?php if (isset($_POST["desde"])) {?>
					url: 'visita_detallado_semanal.php?planid=<?php echo $event['id']; ?>&desde=<?php echo $_POST["desde"]; ?>&hasta=<?php echo $hasta; ?>'
					<?php }else{ ?>
					url: 'visita_detallado_semanal.php?planid=<?php echo $event['id']; ?>&desde=<?php echo $_GET["desde"]; ?>&hasta=<?php echo $_GET["hasta"]; ?>'
					<?php } ?>
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
		var colegio= document.getElementById('colegio').value;
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


	$("#imprimir").click(function(){
		window.print();
	});
</script>
	<script>
		$(".abrir_reportes").addClass("open");
		$(".visitas_semanal").addClass("active");
	</script>
		
	</body>
</html>
