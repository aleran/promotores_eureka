<?php require_once("php/aut.php"); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Inicio</title>

		<meta name="description" content="Sistema Aula máxima" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

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
							<li class="active">Dashboard</li>
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
						<div class="ace-settings-container hidden" id="ace-settings-container">
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
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Bienvenido
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Pagina Principal
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
									<div class="space-6"></div>
									
									<?php 
										if ($_SESSION["tipo"] !=3 ) {
											$sql = "SELECT id FROM zonas";

											$req = $bdd->prepare($sql);
											$req->execute();

											$zonas = $req->rowCount();
										}

										else {

											$sql = "SELECT zona FROM zonas WHERE codigo='".$_SESSION["zona"]."'";

											$req = $bdd->prepare($sql);
											$req->execute();

											$zona = $req->fetch();
										}

										if ($_SESSION["tipo"] !=3 ) {
											$sql = "SELECT id FROM colegios";
										}

										else {
											$sql = "SELECT c.id FROM colegios c JOIN zonas z ON c.cod_zona=z.codigo JOIN usuarios u ON c.cod_zona=u.cod_zona WHERE u.id='".$_SESSION["id"]."' GROUP BY c.id ";
										}

										$req = $bdd->prepare($sql);
										$req->execute();

										$colegios = $req->rowCount();

										if ($_SESSION["tipo"] !=3 ) {
											$sql_pt = "SELECT id FROM plan_trabajo";
										}

										else {
											$sql_pt = "SELECT id FROM plan_trabajo WHERE id_promotor='".$_SESSION["id"]."'";
										}

										$req_pt = $bdd->prepare($sql_pt);
										$req_pt->execute();

										$plan_trabajo = $req_pt->rowCount();

										if ($_SESSION["tipo"] !=3 ) {
											$sql_vi = "SELECT id FROM visitas";
										}

										else {
											$sql_vi = "SELECT id FROM visitas WHERE id_promotor='".$_SESSION["id"]."'";
										}

										$req_vi = $bdd->prepare($sql_vi);
										$req_vi->execute();

										$visitas = $req_vi->rowCount();

										if ($_SESSION["tipo"] !=3 ) {
										$sql = "SELECT id FROM usuarios WHERE tipo=3";

										$req = $bdd->prepare($sql);
										$req->execute();

										$promotores = $req->rowCount();
										}
									?>

									<div class="row">
										<div class="col-sm-12 infobox-container">
											<div class="infobox infobox-green">
												<div class="infobox-icon">
													<i class="ace-icon glyphicon glyphicon-road"></i>
												</div>
												<?php if ($_SESSION["tipo"] !=3) { ?>
													<div class="infobox-data">
														<span class="infobox-data-number"><?php echo $zonas ?></span>
														<div class="infobox-content">Zonas</div>
													</div>
												<?php } else{?>
													<div class="infobox-data">
														<span class="infobox-data-number"><?php echo $zona["zona"]; ?></span>
														<div class="infobox-content">Zona</div>
													</div>
												<?php } ?>
												<!--<div class="stat stat-success">8%</div>-->
											</div>
										
											<div class="infobox infobox-blue">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-book"></i>
												</div>
										
												<div class="infobox-data">
													<span class="infobox-data-number"><?php echo $colegios ?></span>
													<div class="infobox-content">Colegios</div>
												</div>
										
												<!--<div class="badge badge-success">
													+32%
													<i class="ace-icon fa fa-arrow-up"></i>
												</div>-->
											</div>
											<?php if ($_SESSION["tipo"] != 3) { ?>
												<div class="infobox infobox-pink">
													<div class="infobox-icon">
														<i class="ace-icon fa fa-users"></i>
													</div>
											
													<div class="infobox-data">
														<span class="infobox-data-number"><?php echo $promotores ?></span>
														<div class="infobox-content">Promotores</div>
													</div>
													<!--<div class="stat stat-important">4%</div>-->
												</div>
											<?php } ?>
											
											<!--<div class="infobox infobox-red">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-flask"></i>
												</div>
										
												<div class="infobox-data">
													<span class="infobox-data-number">7</span>
													<div class="infobox-content">experiments</div>
												</div>
											</div>
										
											<div class="infobox infobox-orange2">
												<div class="infobox-chart">
													<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
												</div>
										
												<div class="infobox-data">
													<span class="infobox-data-number">6,251</span>
													<div class="infobox-content">pageviews</div>
												</div>
										
												<div class="badge badge-success">
													7.2%
													<i class="ace-icon fa fa-arrow-up"></i>
												</div>
											</div>
										
											<div class="infobox infobox-blue2">
												<div class="infobox-progress">
													<div class="easy-pie-chart percentage" data-percent="42" data-size="46">
														<span class="percent">42</span>%
													</div>
												</div>
										
												<div class="infobox-data">
													<span class="infobox-text">traffic used</span>
										
													<div class="infobox-content">
														<span class="bigger-110">~</span>
														58GB remaining
													</div>
												</div>
											</div>-->
										
											<div class="space-6"></div>
										
											<!--<div class="infobox infobox-green infobox-small infobox-dark">
												<div class="infobox-progress">
													<div class="easy-pie-chart percentage" data-percent="61" data-size="39">
														<span class="percent">61</span>%
													</div>
												</div>
										
												<div class="infobox-data">
													<div class="infobox-content">Task</div>
													<div class="infobox-content">Completion</div>
												</div>
											</div>
										
											<div class="infobox infobox-blue infobox-small infobox-dark">
												<div class="infobox-chart">
													<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
												</div>
										
												<div class="infobox-data">
													<div class="infobox-content">Earnings</div>
													<div class="infobox-content">$32,000</div>
												</div>
											</div>
										
											<div class="infobox infobox-grey infobox-small infobox-dark">
												<div class="infobox-icon">
													<i class="ace-icon fa fa-download"></i>
												</div>
										
												<div class="infobox-data">
													<div class="infobox-content">Downloads</div>
													<div class="infobox-content">1,205</div>
												</div>
											</div>-->
										</div>
									</div>

									<div class="vspace-12-sm"></div>

									<div class="row">
										<center><h4>Visitas Planificadas: <?php echo $plan_trabajo;?> Visitas Ejecutadas: <?php echo $visitas;?> </h4></center>
										<div class="col-sm-6 col-sm-offset-3">
												<br><div class="widget-box">
													<div class="widget-header widget-header-flat widget-header-small">
														<h5 class="widget-title">
															<i class="ace-icon fa fa-signal"></i>
															<b>Gráfica de visitas ejecutadas</b>
														</h5>
											
														<!--<div class="widget-toolbar no-border">
															<div class="inline dropdown-hover">
																<button class="btn btn-minier btn-primary">
																	This Week
																	<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
																</button>
											
																<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
																	<li class="active">
																		<a href="#" class="blue">
																			<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																			This Week
																		</a>
																	</li>
											
																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																			Last Week
																		</a>
																	</li>
											
																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																			This Month
																		</a>
																	</li>
											
																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																			Last Month
																		</a>
																	</li>
																</ul>
															</div>
														</div>-->
													</div>
											
													<div class="widget-body">
														<div class="widget-main">
															<div id="piechart-placeholder"></div>
											
															<!--<div class="hr hr8 hr-double"></div>
											
															<div class="clearfix">
																<div class="grid3">
																	<span class="grey">
																		<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
																		&nbsp; likes
																	</span>
																	<h4 class="bigger pull-right">1,255</h4>
																</div>
											
																<div class="grid3">
																	<span class="grey">
																		<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
																		&nbsp; tweets
																	</span>
																	<h4 class="bigger pull-right">941</h4>
																</div>
											
																<div class="grid3">
																	<span class="grey">
																		<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
																		&nbsp; pins
																	</span>
																	<h4 class="bigger pull-right">1,050</h4>
																</div>
															</div>-->
														</div><!-- /.widget-main -->
													</div><!-- /.widget-body -->
												</div><!-- /.widget-box -->
											</div><!-- /.col --></div>
								</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

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

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			

			  <?php
			  		include("conexion/bdd.php");

			  		$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

					$req_periodo = $bdd->prepare($sql_periodo);
					$req_periodo->execute();
					$gp_periodo = $req_periodo->fetch();
					if ($_SESSION["tipo"] != 3) {

						$sql = "SELECT p.id_objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE v.id_periodo='".$gp_periodo["id"]."'";

					}

					else {

						$sql = "SELECT p.id_objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";
					}
			  		
					$req = $bdd->prepare($sql);
					$req->execute();

					$objetivos = $req->rowCount();

					if ($_SESSION["tipo"] != 3) {

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=1 AND v.id_periodo='".$gp_periodo["id"]."'";
					}
					else{

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=1 AND v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";

					}

					$req = $bdd->prepare($sql);
					$req->execute();

					$contacto = $req->rowCount();
					$contacto= ($contacto / $objetivos) * 100;
					if ($_SESSION["tipo"] != 3) {

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=2 AND v.id_periodo='".$gp_periodo["id"]."'";
					}

					else {

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=2 AND v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";
					}

					$req = $bdd->prepare($sql);
					$req->execute();
					$muestreo = $req->rowCount();
					$muestreo= ($muestreo / $objetivos) * 100;

					if ($_SESSION["tipo"] != 3) {

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=3 AND v.id_periodo='".$gp_periodo["id"]."'";
					}

					else{

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=3 AND v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";
					}

					$req = $bdd->prepare($sql);
					$req->execute();

					$presentacion = $req->rowCount();
					$presentacion= ($presentacion / $objetivos) * 100;

					if ($_SESSION["tipo"] != 3) {

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=4 AND v.id_periodo='".$gp_periodo["id"]."'";
					}
					else {

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=4 AND v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";
					}

					$req = $bdd->prepare($sql);
					$req->execute();

					$seguimiento = $req->rowCount();
					$seguimiento= ($seguimiento / $objetivos) * 100;

					if ($_SESSION["tipo"] != 3) {

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=5 AND v.id_periodo='".$gp_periodo["id"]."'";
					}
					else{

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=5 AND v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";
					}

					$req = $bdd->prepare($sql);
					$req->execute();

					$definicion_a = $req->rowCount();
					$definicion_a= ($definicion_a / $objetivos) * 100;
					if ($_SESSION["tipo"] != 3) {
						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=6 AND v.id_periodo='".$gp_periodo["id"]."'";
					}
					else{

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=6 AND v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";
					}

					$req = $bdd->prepare($sql);
					$req->execute();

					$definicion_f = $req->rowCount();
					$definicion_f= ($definicion_f / $objetivos) * 100;
					if ($_SESSION["tipo"] != 3) {
						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=7 AND v.id_periodo='".$gp_periodo["id"]."'";
					}
					else{

						$sql = "SELECT p.id_objetivo as objetivo FROM plan_trabajo p JOIN visitas v ON p.id=v.id_plan_trabajo WHERE p.id_objetivo=7 AND v.id_periodo='".$gp_periodo["id"]."' AND p.id_promotor='".$_SESSION["id"]."'";
					}
					$req = $bdd->prepare($sql);
					$req->execute();

					$otro = $req->rowCount();
					$otro= ($otro / $objetivos) * 100;
			  ?>

			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "Contacto",  data: <?php echo $contacto; ?>, color: "#68BC31"},
				{ label: "Muestreo",  data: <?php echo $muestreo; ?>, color: "#2091CF"},
				{ label: "Presentación",  data: <?php echo $presentacion; ?>, color: "#AF4E96"},
				{ label: "Seguimiento",  data: <?php echo $seguimiento; ?>, color: "#F71206"},
				{ label: "Definición anticipada",  data: <?php echo $definicion_a; ?>, color: "#EFF80E"},
				{ label: "Definición final",  data: <?php echo $definicion_f; ?>, color: "#FF4F00"},
				{ label: "Otro",  data: <?php echo $otro; ?>, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,4]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
	</body>
</html>
