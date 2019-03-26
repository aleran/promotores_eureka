<?php require_once("php/aut.php"); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="theme-color" content="#52004F">
		<meta charset="utf-8" />
		<title>Visitas</title>

		<meta name="description" content="Sistema Bitácora" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

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
       /* Set the size of the div element that contains the map */
	      #map {
	        height: 500px;  /* The height is 400 pixels */
	        width: 100%;  /* The width is the width of the web page */
	       }
    </style>

	</head>

	<body class="no-skin">
		<?php include("template/nav.php"); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script required type="text/javascript">
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

							<li>
								<a href="#">Reportes</a>
							</li>
							<li>
								<a href="#">Reportes de visitas</a>
							</li>
							<li class="active">Reporte detallado</li>
						</ul><!-- /.breadcrumb -->

						<!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input required type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div>--><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
						<?php
							include("conexion/bdd.php");	
							$sql = "SELECT * FROM plan_trabajo WHERE id='".$_GET["planid"]."'";

								$req = $bdd->prepare($sql);
								$req->execute();
								$visita = $req->fetch();

								list($fecha, $hora)=explode(" ", $visita['start']);

								list($a,$m,$d)=explode("-", $fecha);
								$fecha= $d."/".$m."/".$a;
								

							$sql_colegio = "SELECT colegio, barrio, direccion,telefono FROM colegios WHERE id='".$visita["id_colegio"]."'";

								$req_colegio = $bdd->prepare($sql_colegio);
								$req_colegio->execute();
								$colegio = $req_colegio->fetch();


							$sql_objetivo = "SELECT objetivo FROM objetivos WHERE id='".$visita["id_objetivo"]."'";

								$req_objetivo = $bdd->prepare($sql_objetivo);
								$req_objetivo->execute();
								$objetivo = $req_objetivo->fetch();

							$sql_profesor = "SELECT t.nombre,t.cargo,t.area, c.cargo as nombrecargo FROM trabajadores_colegios t JOIN cargos c ON t.cargo=c.id WHERE t.codigo='".$visita["cod_profesor"]."'";

								$req_profesor = $bdd->prepare($sql_profesor);
								$req_profesor->execute();
								$profesor = $req_profesor->fetch();

							$sql_grado = "SELECT grado FROM grados a JOIN grados_materias b ON a.id=b.id_grado WHERE cod_profesor='".$visita["cod_profesor"]."'";

								$req_grado = $bdd->prepare($sql_grado);
								$req_grado->execute();
								$grado = $req_grado->fetch();

							$sql_materia = "SELECT materia FROM materias a JOIN grados_materias b ON a.id=b.id_materia WHERE cod_profesor='".$visita["cod_profesor"]."'";

								$req_materia = $bdd->prepare($sql_materia);
								$req_materia->execute();
								$materia = $req_materia->fetch();

								
						?>
						<div class="page-header">
							<h1>
								Plan de trabajo
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo $colegio["colegio"]; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<a class="btn btn-warning" href="visitas_semanal.php?planid=<?php echo $_GET["planid"] ?>&desde=<?php echo $_GET["desde"] ?>&hasta=<?php echo $_GET["hasta"] ?>">Atras</a>
						<div class="row">
							<h4>Datos del colegio:</h4>

							<table class="table table-bordered table-hover">
                        		
                        		<tr>
                        			<td>Colegio: <?php echo $colegio['colegio']; ?></td>
                        			<td>Telefonos: <?php echo $colegio['telefono']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Barrio: <?php echo $colegio['barrio']; ?></td>
                        			<td>direccion: <?php echo $colegio['direccion']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Fecha: <?php echo $fecha; ?></td>
                        			<td>Hora: <?php echo $hora; ?></td>
                        		</tr>
                        			
                        	</table>

						</div>

						<div class="row">
							<h4>Datos del profesor:</h4>
							<?php if ($profesor["cargo"]== 1 || $profesor["cargo"]== 2 || $profesor["cargo"]== 7 || $profesor["cargo"]== 8 || $profesor["cargo"]== 9 || $profesor["cargo"]== 10 ){ ?>
								
							<table class="table table-bordered table-hover">
                        		
                        		<tr>
                        			<td>Nombre: <?php echo $profesor['nombre']; ?></td>
                        			<td>Cargo: <?php echo $profesor['nombrecargo']; ?></td>
                        		</tr>
                        			
                        	</table>

							<?php }if ($profesor["cargo"]== 3){ 

								$sql_materia = "SELECT materia FROM materias WHERE id='".$profesor["area"]."'";

								$req_materia = $bdd->prepare($sql_materia);
								$req_materia->execute();
								$materia = $req_materia->fetch();
							?>

								<table class="table table-bordered table-hover">
                        		
                        		<tr>
                        			<td>Nombre: <?php echo $profesor['nombre']; ?></td>
                        			<td>Cargo: Coordinador académico</td>
                        		</tr>
                        			
                        		</table>
							<?php } if($profesor["cargo"]== 5){

								$sql_materia = "SELECT materia FROM materias WHERE id='".$profesor["area"]."'";

								$req_materia = $bdd->prepare($sql_materia);
								$req_materia->execute();
								$materia = $req_materia->fetch();

							?>
							
							<table class="table table-bordered table-hover">
                        		
                        		<tr>
                        			<td>Nombre: <?php echo $profesor['nombre']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Grado: <?php echo $grado['grado']; ?></td>
                        			<td>Materia: <?php echo $materia['materia']; ?></td>
                        		</tr>
                        			
                        	</table>
                        	<?php } if($profesor["cargo"]== 6) {?>
                        	<table class="table table-bordered table-hover">
                        		
                        		<tr>
                        			<td>Nombre: <?php echo $profesor['nombre']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Grado: <?php echo $grado['grado']; ?></td>
                        			<td>Materia: <?php echo $materia['materia']; ?></td>
                        		</tr>
                        			
                        	</table>
                        	<?php } ?>
						</div>

						<div class="row">
							<div class="col-sm-6 col-sm-offset-4">
								<h4>Objetivo de la Visita: <?php echo $objetivo["objetivo"] ?></h4>
							</div>

						</div>

						<?php 
							if ($visita["resultado"]==1) {

								$sql = "SELECT observaciones,fecha,efectiva,longitud,latitud FROM visitas WHERE id_plan_trabajo='".$_GET["planid"]."'";

								$req = $bdd->prepare($sql);
								$req->execute();
								$visita_e = $req->fetch();

							
						 ?>
							
							<div class="row">
								<div class="col-sm-6 col-sm-offset-4">
									<h5>Fecha de ejecución: <?php echo $visita_e["fecha"] ?></h5>
								</div>

							</div>

							<div class="row">
								<div class="col-sm-6 col-sm-offset-4">
									<h5>Comentarios: <?php echo $visita_e["observaciones"] ?></h5>
								</div>

							</div>
						<?php } ?>
							<?php if ($visita["id_objetivo"]==2 || $visita["id_objetivo"]==3 ) {

								echo'<table class="table table-bordered">
									<thead>
										<th>Libro</th>
										<th>Materia</th>
										<th>Grado</th>
									</thead>
									<tbody>';
								$sql_mp = "SELECT  id_libro FROM mu_pre WHERE id_plan_trabajo='".$_GET["planid"]."'";

								$req_mp = $bdd->prepare($sql_mp);
								$req_mp->execute();
								$mps = $req_mp->fetchAll();

								foreach ($mps as $mp) {
									
									$sql_libro = "SELECT id_materia, id_grado, libro FROM libros WHERE id='".$mp["id_libro"]."'";

									$req_libro = $bdd->prepare($sql_libro);
									$req_libro->execute();
									$libro = $req_libro->fetch();

									$sql_materia = "SELECT materia FROM materias WHERE id='".$libro["id_materia"]."'";

									$req_materia = $bdd->prepare($sql_materia);
									$req_materia->execute();
									$materia = $req_materia->fetch();

									$sql_grado = "SELECT grado FROM grados WHERE id='".$libro["id_materia"]."'";

									$req_grado = $bdd->prepare($sql_grado);
									$req_grado->execute();
									$grado = $req_grado->fetch();

									echo "<tr>
											<td>".$libro["libro"]."</td>
											<td>".$materia["materia"]."</td>
											<td>".$grado["grado"]."</td>
										</tr>";

								}

								echo "</tbody></table>";
							
							
							}?>
							
							<?php 
							if ($visita["resultado"]==1) { ?>
								<br><center>
									<form action="php/visita_efectiva.php" method="POST">
									<div class="checkbox">
										<?php if ($visita_e["efectiva"] == 1) { ?>
								    	<label><b>Efectiva:</b><br>
								     		<input type="checkbox" name="efectiva" value="1" id="ef_si" checked> Si
								    	</label>
				    					<label>
				     						<input type="checkbox" name="efectiva" value="0" id="ef_no"> No
				    					</label>
				    					<?php }else{ ?>
				    					<label><b>Efectiva:</b><br>
								     		<input type="checkbox" name="efectiva" value="1" id="ef_si" > Si
								    	</label>
				    					<label>
				     						<input type="checkbox" name="efectiva" value="0" id="ef_no" checked=""> No
				    					</label>
				  					</div>
				  					
				  					<?php }?>
				  					
				  					<input type="hidden" name="plan_id" value="<?php echo $_GET["planid"]; ?>">
				  					<br><br><button class="btn btn-primary">Guardar</button>
			  					</center>
			  					</form>
							<div class="row">
								<div class="col-sm-6 col-sm-offset-5">
									<h4>Geolocalización</h4>
								</div>
								<div id="map"></div>
							</div>
							<?php } ?>

						
												
									
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
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
		<script required type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script required type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[required type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{required type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{required type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$.fn.datepicker.dates['es'] = {
			        days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			        daysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
			        daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
			        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    			};

				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true,
					language: 'es'
				})

				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});


			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[required type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
		<script>
		// Initialize and add the map
		function initMap() {
		  // The location of Uluru
		  var uluru = {lat: <?php echo $visita_e["latitud"] ?>, lng: <?php echo $visita_e["longitud"] ?>};
		  // The map, centered at Uluru
		  var map = new google.maps.Map(
		      document.getElementById('map'), {zoom: 17, center: uluru});
		  // The marker, positioned at Uluru
		  var marker = new google.maps.Marker({position: uluru, map: map});
		}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCfKRWI7AB_psEMbo4_Yd9ssbeMk9RU7c&callback=initMap">
    </script>

	<script>
		$("#ef_si").click(function(){
			$("#ef_no").prop("checked", false);

		})
		$("#ef_no").click(function(){
			$("#ef_si").prop("checked", false);

		})
			$(".abrir_reportes").addClass("open");
			$(".visitas").addClass("active");
	</script>	
	</body>
</html>
