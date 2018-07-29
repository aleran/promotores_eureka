<?php require_once("php/aut.php"); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Colegio</title>

		<meta name="description" content="Sistema Aula máxima" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />


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
			.poblacion{
				width:30px;
			}
			input[type=number] { -moz-appearance:textfield; }
			input[type=number]::-webkit-inner-spin-button, 
			input[type=number]::-webkit-outer-spin-button { 
  				-webkit-appearance: none; 
  				margin: 0; 
			}

			.prescolar {
				background-color: #E4F61F;
				color: #000;
				text-align: center;
			}
			.primaria {
				background-color: #2AB510;
				color: #000;
				text-align: center;
			}
			.bachillerato {
				background-color: #438EB9;
				color: #000;
				text-align: center;
			}
			.poblacion tr td {
				text-align: center;
			}
		</style>
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

		.suggest-element1{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions1 {
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

		.suggest-element1{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions1 {
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
		</style>
	</head>

	<body class="no-skin">
		<?php include("template/nav.php"); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script required required type="text/javascript">
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
								<a href="#">Colegio</a>
							</li>
							<li class="active">Colegio</li>
						</ul><!-- /.breadcrumb -->

						<!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input required required type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
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
										<input required required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input required required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input required required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input required required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input required required type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input required required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input required required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input required required type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Colegio
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Colegio
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<!--<div class="alert alert-info">
									<button class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-hand-o-right"></i>
									Please note that demo server is not configured to save the changes, therefore you may see an error message.
								</div>-->

								<?php 
	                                include("conexion/bdd.php");
	                                if (isset($_GET["codigo"])) {
	                                	$codigo_col= $_GET["codigo"];
	                                }
	                                else {
	                                	$codigo_col= $_POST["codigo"];
	                                }
	                              
	                                $sql = "SELECT id, codigo, colegio, direccion, barrio,telefono, web, telefono, cumpleaños FROM colegios WHERE codigo='".$codigo_col."'";

									$req = $bdd->prepare($sql);
									$req->execute();

									$colegio = $req->fetch();

									if (isset($_POST["periodo"])) {
										$periodo=$_POST["periodo"];
									}
									else {
										$periodo=$_GET["periodo"];
									}
									
									$sql_periodo="SELECT id, periodo, f_cierre FROM periodos WHERE id='".$periodo."'";

									$req_periodo = $bdd->prepare($sql_periodo);
									$req_periodo->execute();
									$gp_periodo = $req_periodo->fetch();

                            	?>
                        	</div>
                        </div>
                        <div class="row">
                        	<table class="table table-bordered table-hover">
                        		<form action="php/actualizar_colegio.php" method="POST">
                        		<tr>
                        			<td>Nombre de la institución:<small style="color:red;"> *</small><input type="text" name="colegio" class="form-control" value="<?php echo $colegio['colegio']; ?>" required></td>
                        			<td>Código interno: <?php echo $colegio['codigo']; ?></td>
                        		</tr>
                        		<tr>
                        			
                        			<td>Dirección:<small style="color:red;"> *</small>  <input type="text" name="direccion" class="form-control" value="<?php echo $colegio['direccion']; ?>" required></td>
                        			<td>Barrio:<small style="color:red;"> *</small> <input type="text" name="barrio" class="form-control" value="<?php echo $colegio['barrio']; ?>" required></td>
                        		</tr>
                        
                        		<tr>
                        			<td>Teléfono: <input type="text" name="telefono_c" class="form-control" value="<?php echo $colegio['telefono']; ?>"></td>
                        			<td>Pagina Web: <input type="text" name="web" class="form-control" value="<?php echo $colegio['web']; ?>"></td>
                        		</tr>
                        		<tr>
                        			<td>Cumpleaños del colegio: <div class="input-group"><input type="text" class="form-control date-picker" name="cumpleaños_c" id="cumpleaños_c" value="<?php echo $colegio['cumpleaños']; ?>" type="text" data-date-format="yyyy-mm-dd"/>
									<span class="input-group-addon">
										<i class="fa fa-calendar bigger-110"></i>
									</span></div></td>
                        			
                        		</tr>
	
                        	</table>
                        	<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
                        	<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
                        	<center><button class="btn btn-success">Actualizar</button></center><br><br>
                        	<?php } ?>
                        	</form>
                        </div>
                        <center>
                        <h4>
                        	Periodo: <?php
                        		echo $gp_periodo["periodo"];
                        		if ($gp_periodo["f_cierre"] < date("Y-m-d")) {
                        			echo " <span style='color: red;'>Cerrado</span>";
                        		}
                        	?>
                        	
                        </h4>
                        </center>
                        <div id="accordion" class="accordion-style1 panel-group">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
															<i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Información básica
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse in" id="collapseOne">
													<div class="panel-body">
														<?php 
                        	$sql = "SELECT id FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."'";

							$req = $bdd->prepare($sql);
							$req->execute();

							$num = $req->rowCount();
									
							if ($num < 1) {
								
							
                        ?>   
						<b>Propietario</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
								<form action="php/trabajadores_colegio.php" method="POST">
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre"> Nombre:</label>

										
											<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular"> Celular:</label>

										
											<input type="tel" name="celular" id="celular" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre"> Email: </label>

										
											<input type="email" name="email" id="email" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños" id="cumpleaños" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
						</div>

						<b>Rector</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre1"> Nombre:</label>

										
											<input type="text" name="nombre1" id="nombre1" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular1"> Celular:</label>

										
											<input type="tel" name="celular1" id="celular1" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email1"> Email:</label>

										
											<input type="email" name="email1" id="email1" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños1"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños1" id="cumpleaños1" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
						</div>

						<b>Coordinador académico</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre2"> Nombre:</label>

										
											<input type="text" name="nombre2" id="nombre2" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular2"> Celular:</label>

										
											<input type="tel" name="celular2" id="celular2" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email2"> Email:</label>

										
											<input type="email" name="email2" id="email2" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños2"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños2" id="cumpleaños2" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
						</div>

						<b>Jefe área español</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre3"> Nombre:</label>

										
											<input type="text" name="nombre3" id="nombre3" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular3"> Celular:</label>

										
											<input type="tel" name="celular3" id="celular3" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email3"> Email:</label>

										
											<input type="email" name="email3" id="email3" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños3"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños3" id="cumpleaños3" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
						</div>

						<b>Jefe área matemáticas</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre4"> Nombre:</label>

										
											<input type="text" name="nombre4" id="nombre4" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular4"> Celular: </label>

										
											<input type="tel" name="celular4" id="celular4" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email4"> Email:</label>

										
											<input type="email" name="email4" id="email4" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños4"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños4" id="cumpleaños4" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
						</div>
						<b>Jefe área sociales</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre5"> Nombre:</label>

										
											<input type="text" name="nombre5" id="nombre5" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular5"> Celular:</label>

										
											<input type="tel" name="celular5" id="celular5" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email5"> Email:</label>

										
											<input type="email" name="email5" id="email5" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños5"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños5" id="cumpleaños5" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
						</div>
						<b>Jefe área inglés</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre6"> Nombre:</label>

										
											<input type="text" name="nombre6" id="nombre6" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular6"> Celular:</label>

										
											<input type="tel" name="celular6" id="celular6" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email6"> Email: </label>

										
											<input type="email" name="email6" id="email6" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños6"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños6" id="cumpleaños6" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
								
							</div>
						</div>

						<b>Jefe área informatica</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre7"> Nombre:</label>

										
											<input type="text" name="nombre7" id="nombre7" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular7"> Celular:</label>

										
											<input type="tel" name="celular7" id="celular7" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email6"> Email: </label>

										
											<input type="email" name="email7" id="email7" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños7"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños7" id="cumpleaños7" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
								
							</div>
						</div>
						
						<label class="col-sm-3"><b>Otro cargo:</b></label> 
							<select class="col-sm-3" name="otro_cargo" id="otro_cargo" class="form-control materia">
							<option value="20">Seleccionar</option>
									<?php 
										$sql = "SELECT id, cargo FROM cargos WHERE id > 6";
							
									$req = $bdd->prepare($sql);
									$req->execute();
									$materias = $req->fetchAll();
							
									foreach($materias as $materia) {
													$id = $materia['id'];
													$nom = $materia['cargo'];
													echo '<option value="'.$id.'">'.$nom.'</option>';
									}
									?>
						</select></b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre8"> Nombre:</label>

										
											<input type="text" name="nombre8" id="nombre8" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular8"> Celular:</label>

										
											<input type="tel" name="celular8" id="celular8" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email8"> Email: </label>

										
											<input type="email" name="email8" id="email8" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños8"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños8" id="cumpleaños8" type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
								
							</div>









							
							<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
								<center><button class="btn btn-primary">Guardar</button></center>
							<?php } ?>
							
							<input required required type="hidden" name="id_colegio" value='<?php echo $colegio["id"] ?>'>
							<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
							<input type="hidden" name="periodo" value="<?php echo $gp_periodo['id'] ?>">
							</form>
							<?php } else { 
								$sql = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=1";

								$req = $bdd->prepare($sql);
								$req->execute();
								$trabajadores = $req->fetch();

								$sql1 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=2";

								$req1 = $bdd->prepare($sql1);
								$req1->execute();
								$trabajadores1 = $req1->fetch();

								$sql2 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=3";

								$req2 = $bdd->prepare($sql2);
								$req2->execute();
								$trabajadores2 = $req2->fetch();

								$sql3 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=5 AND area=3";

								$req3 = $bdd->prepare($sql3);
								$req3->execute();
								$trabajadores3 = $req3->fetch();

								$sql4 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=5 AND area=2";

								$req4 = $bdd->prepare($sql4);
								$req4->execute();
								$trabajadores4 = $req4->fetch();

								$sql5 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=5 AND area=6";

								$req5 = $bdd->prepare($sql5);
								$req5->execute();
								$trabajadores5 = $req5->fetch();

								$sql6 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=5 AND area=7";

								$req6 = $bdd->prepare($sql6);
								$req6->execute();
								$trabajadores6 = $req6->fetch();

								$sql7 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo=5 AND area=10";

								$req7 = $bdd->prepare($sql7);
								$req7->execute();
								$trabajadores7 = $req7->fetch();

								$sql8 = "SELECT id, cargo, nombre, telefono, email, cumpleaños FROM trabajadores_colegios WHERE id_colegio='".$colegio['id']."' AND cargo > 6";

								$req8 = $bdd->prepare($sql8);
								$req8->execute();
								$trabajadores8 = $req8->fetch();
							?>

						<b>Propietario</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
								<form action="php/actualizar_trabajadores.php" method="POST">
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre"> Nombre:</label>

										
											<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" class="form-control" value="<?php echo $trabajadores["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular"> Celular:</label>

										
											<input type="tel" name="celular" id="celular" placeholder="" class="form-control"  value="<?php echo $trabajadores["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre"> Email:</label>

										
											<input type="email" name="email" id="email" placeholder="" class="form-control"  value="<?php echo $trabajadores["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños" id="cumpleaños" type="text" data-date-format="yyyy-mm-dd"/  value="<?php echo $trabajadores["cumpleaños"]?>">
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
							<input required required type="hidden" name="id" value="<?php echo $trabajadores["id"]?>">
						</div>

						<b>Rector</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre1"> Nombre:</label>

										
											<input type="text" name="nombre1" id="nombre1" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores1["nombre"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular1"> Celular:</label>

										
											<input type="tel" name="celular1" id="celular1" placeholder="" class="form-control" value="<?php echo $trabajadores1["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email1"> Email:</label>

										
											<input type="email" name="email1" id="email1" placeholder="" class="form-control" value="<?php echo $trabajadores1["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños1"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños1" id="cumpleaños1" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores1["cumpleaños"]?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
							<input required required type="hidden" name="id1" value="<?php echo $trabajadores1["id"]?>">
						</div>

						<b>Coordinador académico</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre2"> Nombre:</label>

										
											<input type="text" name="nombre2" id="nombre2" placeholder="Nombre completo" class="form-control" value="<?php echo $trabajadores2["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular2"> Celular:</label>

										
											<input type="tel" name="celular2" id="celular2" placeholder="" class="form-control" value="<?php echo $trabajadores2["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email2"> Email:</label>

										
											<input type="email" name="email2" id="email2" placeholder="" class="form-control" value="<?php echo $trabajadores2["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños2"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input  type="text" class="form-control date-picker" name="cumpleaños2" id="cumpleaños2" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores2["cumpleaños"]?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
							<input required required type="hidden" name="id2" value="<?php echo $trabajadores2["id"]?>">
						</div>

						<b>Jefe área español</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre3"> Nombre:</label>

										
											<input type="text" name="nombre3" id="nombre3" placeholder="Nombre completo" class="form-control" value="<?php echo $trabajadores3["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular3"> Celular:</label>

										
											<input type="tel" name="celular3" id="celular3" placeholder="" class="form-control"  value="<?php echo $trabajadores3["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email3"> Email:

										
											<input type="email" name="email3" id="email3" placeholder="" class="form-control"  value="<?php echo $trabajadores3["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños3"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños3" id="cumpleaños3" type="text" data-date-format="yyyy-mm-dd"  value="<?php echo $trabajadores3["cumpleaños"]?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
							<input required required type="hidden" name="id3" value="<?php echo $trabajadores3["id"]?>">
						</div>

						<b>Jefe área matemáticas</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre4"> Nombre:</label>

										
											<input type="text" name="nombre4" id="nombre4" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores4["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular4"> Celular:</label>

										
											<input type="tel" name="celular4" id="celular4" placeholder="" class="form-control"    value="<?php echo $trabajadores4["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email4"> Email:</label>

										
											<input type="email" name="email4" id="email4" placeholder="" class="form-control"  value="<?php echo $trabajadores4["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños4"> Fecha de cumpleaños:</label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños4" id="cumpleaños4" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores4["cumpleaños"]?>" />
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
							<input required required type="hidden" name="id4" value="<?php echo $trabajadores4["id"]?>">
						</div>

						<b>Jefe área sociales</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre5"> Nombre:</label>

										
											<input type="text" name="nombre5" id="nombre5" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores5["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular5"> Celular:</label>

										
											<input  type="tel" name="celular5" id="celular5" placeholder="" class="form-control"  value="<?php echo $trabajadores5["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email5"> Email:</label>

										
											<input type="email" name="email5" id="email5" placeholder="" class="form-control"  value="<?php echo $trabajadores5["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños5"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input type="text" class="form-control date-picker" name="cumpleaños5" id="cumpleaños5" type="text" data-date-format="yyyy-mm-dd"  value="<?php echo $trabajadores5["cumpleaños"]?>" />
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
							<input required required type="hidden" name="id5" value="<?php echo $trabajadores5["id"]?>">
						</div>

						<b>Jefe área inglés</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre6"> Nombre:</label>

										
											<input type="text" name="nombre6" id="nombre6" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores6["nombre"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular6"> Celular:</label>

										
											<input type="tel" name="celular6" id="celular6" placeholder="" class="form-control" value="<?php echo $trabajadores6["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email6"> Email:</label>

										
											<input type="email" name="email6" id="email6" placeholder="" class="form-control" value="<?php echo $trabajadores6["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños6"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input  type="text" class="form-control date-picker" name="cumpleaños6" id="cumpleaños6" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores6["cumpleaños"]?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
								<input required required type="hidden" name="id6" value="<?php echo $trabajadores6["id"]?>">
							</div>
						</div>

						<b>Jefe área informatica</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre7"> Nombre:</label>

										
											<input type="text" name="nombre7" id="nombre7" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores7["nombre"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular7"> Celular:</label>

										
											<input type="tel" name="celular7" id="celular7" placeholder="" class="form-control" value="<?php echo $trabajadores7["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email7"> Email:</label>

										
											<input type="email" name="email7" id="email7" placeholder="" class="form-control" value="<?php echo $trabajadores7["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños7"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input  type="text" class="form-control date-picker" name="cumpleaños7" id="cumpleaños7" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores7["cumpleaños"]?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
								<input required required type="hidden" name="id7" value="<?php echo $trabajadores6["id"]?>">
							</div>
						</div>
						
						<?php 
							$sql_cargos="SELECT id, cargo FROM cargos WHERE id='".$trabajadores8["cargo"]."'";

							$req_cargos = $bdd->prepare($sql_cargos);
							$req_cargos->execute();
							$cargo = $req_cargos->fetch();
						?>
						<label class="col-sm-3"><b>Otro Cargo: <?php echo $cargo["cargo"] ?></b></label>
						<select class="col-sm-3" name="otro_cargo" id="otro_cargo" class="form-control materia">
							<option value="20">Seleccionar</option>
								<?php 
									$sql = "SELECT id, cargo FROM cargos WHERE id > 6";
							
									$req = $bdd->prepare($sql);
									$req->execute();
									$materias = $req->fetchAll();
							
									foreach($materias as $materia) {
										$id = $materia['id'];
										$nom = $materia['cargo'];
										echo '<option value="'.$id.'">'.$nom.'</option>';
									}
									?>
						</select></b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre8"> Nombre:</label>

										
											<input type="text" name="nombre8" id="nombre8" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores8["nombre"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular7"> Celular:</label>

										
											<input type="tel" name="celular8" id="celular8" placeholder="" class="form-control" value="<?php echo $trabajadores8["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email7"> Email:</label>

										
											<input type="email" name="email8" id="email8" placeholder="" class="form-control" value="<?php echo $trabajadores8["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños8"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input  type="text" class="form-control date-picker" name="cumpleaños8" id="cumpleaños8" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores8["cumpleaños"]?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
								<input required required type="hidden" name="id8" value="<?php echo $trabajadores8["id"]?>">
							</div>



							
							<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
							<center><button class="btn btn-primary">Actualizar</button></center>
							<?php } ?>
							<input required required type="hidden" name="id_colegio" value='<?php echo $colegio["id"] ?>'>
							<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
							<input type="hidden" name="periodo" value="<?php echo $gp_periodo['id'] ?>">
							</form>

							<?php } ?>

						</div>
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Directorio de profesores
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseTwo">
													<div class="panel-body">
														<form action="php/crear_profesor.php" method="POST">
						<div class="row">
							<br><center><h4>Añadir nuevo</h4></center>
				  			<div class="col-sm-4">
				  				<div class="form-group">
				  					<label for="profesor" class="control-label no-padding-right">Nombre Profesor<small style="color:red;"> *</small></label>
				  					 <input type="text" required name="profesor" id="profesor" class="form-control" placeholder="">
				  				</div>
				  			</div>
				  			<div class="col-sm-4">
				  				<div class="form-group">
				  					<label for="telefono_p" class="control-label no-padding-right">Telefono<small style="color:red;"> *</small></label>
				  					<input type="tel" name="telefono_p" id="telefono_p" class="form-control" placeholder="" >
				  				</div>

				  			</div>
				  			
							<div class="col-sm-4">
								<label for="email_p" class="control-label no-padding-right">Email</label>
					  			<input type="text" name="email_p" id="email_p" class="form-control" placeholder="" >
							</div>
							<br>
				  			<input type="hidden" name="id_colegio" value="<?php echo $colegio['id'] ?>">
				  			<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
				  			<input type="hidden" name="periodo" value="<?php echo $gp_periodo['id'] ?>">
						</div>
						<div class="otro_p">
							<div class="row profesor">
								<div class="col-sm-6">
									<form action="php/mercado_editorial.php" method="POST">
									<div class="form-group">
										<label class="control-label no-padding-right" for="materia_p"> Materia:<small style="color:red;"> *</small></label>
							
										<select name="materia[]" id="materia_p" class="form-control materia" required=>
											<option value="">Seleccionar</option>
											 	<?php 
											 		$sql = "SELECT id, materia FROM materias";
							
													$req = $bdd->prepare($sql);
													$req->execute();
													$materias = $req->fetchAll();
							
													foreach($materias as $materia) {
													    $id = $materia['id'];
													    $nom = $materia['materia'];
													    echo '<option value="'.$id.'">'.$nom.'</option>';
													}
											 	?>
										</select>
											
									</div>
							
								</div>
								<div class="col-sm-6">
									<form action="php/mercado_editorial.php" method="POST">
									<div class="form-group">
										<label class="control-label no-padding-right" for="grado_p"> Grado:<small style="color:red;"> *</small></label>
							
										<select name="grado[]" id="grado_p" class="form-control materia" re>
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
											
									</div>
									
								</div>
							</div>
						</div>
						<a id="agregar_materia" style="cursor: pointer;">Agregar materia +</a>
						<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
						<center><button class="btn btn-success">Guardar</button></center>
						<?php } ?>
						</form>
						
						<div class="row">
							<br><center><h4>Modificar</h4></center>
							<?php 
								$sql = "SELECT a.id  as aid, a.id_materia, a.id_grado, b.materia,a.cod_profesor , c.grado, d.* FROM grados_materias a JOIN materias b ON a.id_materia=b.id JOIN grados c ON a.id_grado=c.id JOIN trabajadores_colegios d ON d.codigo=a.cod_profesor WHERE id_colegio='".$colegio['id']."' AND a.id_periodo='".$gp_periodo["id"]."' GROUP BY a.id_grado,a.id_materia,a.cod_profesor ORDER by a.cod_profesor ASC;";
							
								$req = $bdd->prepare($sql);
								$req->execute();
								$profes = $req->fetchAll();
							
								foreach($profes as $profe) {

									echo'<form action="php/modificar_profesor.php" method="POST">
									<div class="row">
				  			<div class="col-sm-4">
				  				<div class="form-group">
				  					<label for="profesor" class="control-label no-padding-right">Nombre Profesor<small style="color:red;"> *</small></label>
				  					 <input type="text" required name="profesor" id="profesor" class="form-control" value="'.$profe["nombre"].'">
				  				</div>
				  			</div>
				  			<div class="col-sm-4">
				  				<div class="form-group">
				  					<label for="telefono_p" class="control-label no-padding-right">Telefono<small style="color:red;"> *</small></label>
				  					<input type="tel" name="telefono_p" id="telefono_p" class="form-control" placeholder="" value="'.$profe["telefono"].'">
				  				</div>

				  			</div>
				  			
							<div class="col-sm-4">
								<label for="email_p" class="control-label no-padding-right">Email</label>
					  			<input type="text" name="email_p" id="email_p" class="form-control" placeholder="" value="'.$profe["email"].'">
							</div>
							<br>
				  			<input type="hidden" name="id_colegio" id="cole" value="'.$colegio["id"].'">
				  			<input type="hidden" name="cod_colegio" value="'.$colegio["codigo"].'">
				  			<input type="hidden" name="cod_profesor" value="'.$profe["cod_profesor"].'">
				  			<input type="hidden" name="periodo" value="'.$gp_periodo["id"].'">	
						</div>';

									echo'<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label no-padding-right" for="materia_p"> Materia: '.$profe["materia"].'</label>
							
										
											
									</div>
							
								</div>
								<div class="col-sm-6">
									
									<label class="control-label no-padding-right" for="grado_p"> Grado: '.$profe["grado"].'</label>
							
									
								</div>
							</div>';
							if ($gp_periodo["f_cierre"] > date("Y-m-d")){
							echo'<center><button class="btn btn-primary">Actualizar</button></center>
							</form>';
							}

								}
							?>
						</div>

													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Información de población
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseThree">
													<div class="panel-body">
														
						
						<?php 
							$sql = "SELECT id FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_periodo='".$gp_periodo["id"]."'";

							$req = $bdd->prepare($sql);
							$req->execute();

							$num = $req->rowCount();
									
							if ($num < 1) {
						 ?>
						<form action="php/poblacion.php" method="POST" >
						<center>
							<div class="row">
								<div class="table-responsive">
									<table class="table table-bordered table-hover poblacion">
										<thead>
											<th>Grados:</th>
											<th class="prescolar">PRE</th>
											<th class="prescolar">JAR</th>
											<th class="prescolar">TRA</th>
											<th class="primaria">1</th>
											<th class="primaria">2</th>
											<th class="primaria">3</th>
											<th class="primaria">4</th>
											<th class="primaria">5</th>
											<?php if ($_SESSION["pais"]==2) { ?>
												<th class="primaria">6</th>
											<?php } else{ ?>
												<th class="bachillerato">6</th>
											<?php } ?>
											<th class="bachillerato">7</th>
											<th class="bachillerato">8</th>
											<th class="bachillerato">9</th>
											<th class="bachillerato">10</th>
											<th class="bachillerato">11</th>
											<!--<th class="prescolar">Total prescolar</th>
											<th class="primaria">Total primaria</th>
											<th class="bachillerato">Total bachillerato</th>
											<th>Global</th>-->
										</thead>
										<tbody>
											<tr><td>Paralelos</td><td><input type="number" class="poblacion" name="p_pre"></td><td><input type="number" class="poblacion" name="p_jar"></td><td><input type="number" class="poblacion" name="p_tra"></td><td><input type="number" class="poblacion" name="p_1"></td><td><input type="number" class="poblacion" name="p_2"></td><td><input type="number" class="poblacion" name="p_3"></td><td><input type="number" class="poblacion" name="p_4"></td><td><input type="number" class="poblacion" name="p_5"></td><td><input type="number" class="poblacion" name="p_6"></td><td><input type="number" class="poblacion" name="p_7"></td><td><input type="number" class="poblacion" name="p_8"></td><td><input type="number" class="poblacion" name="p_9"></td><td><input type="number" class="poblacion" name="p_10"></td><td><input type="number" class="poblacion" name="p_11"></td></tr>
											<tr><td>Alumnos reales</td><td><input type="number" class="poblacion" name="a_pre"></td><td><input type="number" class="poblacion" name="a_jar"></td><td><input type="number" class="poblacion" name="a_tra"></td><td><input type="number" class="poblacion" name="a_1"></td><td><input type="number" class="poblacion" name="a_2"></td><td><input type="number" class="poblacion" name="a_3"></td><td><input type="number" class="poblacion" name="a_4"></td><td><input type="number" class="poblacion" name="a_5"></td><td><input type="number" class="poblacion" name="a_6"></td><td><input type="number" class="poblacion" name="a_7"></td><td><input type="number" class="poblacion" name="a_8"></td><td><input type="number" class="poblacion" name="a_9"></td><td><input type="number" class="poblacion" name="a_10"></td><td><input type="number" class="poblacion" name="a_11"></td></tr>
										</tbody>
									</table>
								</div>
							</div>
						</center>
						<input type="hidden" name="id_colegio" value="<?php echo $colegio['id'] ?>">
						<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
						<input type="hidden" name="periodo" value="<?php echo $gp_periodo['id'] ?>">
						<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
						<center><button class="btn btn-success">Guardar</button></center>
						<?php } ?>
						</form>
						<?php }else{

							$sql_pre = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=1 AND id_periodo='".$gp_periodo["id"]."'";
							$req_pre = $bdd->prepare($sql_pre);
							$req_pre->execute();
							$gp_pre = $req_pre->fetch();

							$sql_jar = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=2 AND id_periodo='".$gp_periodo["id"]."'";
							$req_jar = $bdd->prepare($sql_jar);
							$req_jar->execute();
							$gp_jar = $req_jar->fetch();

							$sql_tra = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=3  AND id_periodo='".$gp_periodo["id"]."'";
							$req_tra = $bdd->prepare($sql_tra);
							$req_tra->execute();
							$gp_tra = $req_tra->fetch();

							$sql_1 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=4  AND id_periodo='".$gp_periodo["id"]."'";
							$req_1 = $bdd->prepare($sql_1);
							$req_1->execute();
							$gp_1 = $req_1->fetch();

							$sql_2 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=5  AND id_periodo='".$gp_periodo["id"]."'";
							$req_2 = $bdd->prepare($sql_2);
							$req_2->execute();
							$gp_2 = $req_2->fetch();

							$sql_3 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=6 AND id_periodo='".$gp_periodo["id"]."'";
							$req_3 = $bdd->prepare($sql_3);
							$req_3->execute();
							$gp_3 = $req_3->fetch();

							$sql_4 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=7  AND id_periodo='".$gp_periodo["id"]."'";
							$req_4 = $bdd->prepare($sql_4);
							$req_4->execute();
							$gp_4 = $req_4->fetch();

							$sql_5 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=8  AND id_periodo='".$gp_periodo["id"]."'";
							$req_5 = $bdd->prepare($sql_5);
							$req_5->execute();
							$gp_5 = $req_5->fetch();

							$sql_6 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=9  AND id_periodo='".$gp_periodo["id"]."'";
							$req_6 = $bdd->prepare($sql_6);
							$req_6->execute();
							$gp_6 = $req_6->fetch();

							$sql_7 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=10 AND  id_periodo='".$gp_periodo["id"]."'";
							$req_7 = $bdd->prepare($sql_7);
							$req_7->execute();
							$gp_7 = $req_7->fetch();

							$sql_8 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=11 AND  id_periodo='".$gp_periodo["id"]."'";
							$req_8 = $bdd->prepare($sql_8);
							$req_8->execute();
							$gp_8 = $req_8->fetch();

							$sql_9 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=12 AND id_periodo='".$gp_periodo["id"]."'";
							$req_9 = $bdd->prepare($sql_9);
							$req_9->execute();
							$gp_9 = $req_9->fetch();

							$sql_10 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=13 AND id_periodo='".$gp_periodo["id"]."'";
							$req_10 = $bdd->prepare($sql_10);
							$req_10->execute();
							$gp_10 = $req_10->fetch();

							$sql_11 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=14 AND id_periodo='".$gp_periodo["id"]."'";
							$req_11 = $bdd->prepare($sql_11);
							$req_11->execute();
							$gp_11 = $req_11->fetch();

							$paralelos_prescolar=$gp_pre["paralelos"] + $gp_jar["paralelos"] + $gp_tra["paralelos"];

							if ($_SESSION["pais"]==2) {

								$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"] + $gp_6["paralelos"];

								$paralelos_bach=$gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];
							}

							else {

								$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"];

								$paralelos_bach=$gp_6["paralelos"] + $gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];

							}
							

							$paralelos_global= $paralelos_pri + $paralelos_bach + $paralelos_prescolar;


							$alumnos_prescolar=$gp_pre["alumnos"] + $gp_jar["alumnos"] + $gp_tra["alumnos"];

							if ($_SESSION["pais"]==2) {

							$alumnos_pri=$gp_1["alumnos"] + $gp_2["alumnos"] + $gp_3["alumnos"] + $gp_4["alumnos"] + $gp_5["alumnos"]+ $gp_6["alumnos"];

							$alumnos_bach=$gp_7["alumnos"] + $gp_8["alumnos"] + $gp_9["alumnos"] + $gp_10["alumnos"] + $gp_11["alumnos"];
							}

							else {

								$alumnos_pri=$gp_1["alumnos"] + $gp_2["alumnos"] + $gp_3["alumnos"] + $gp_4["alumnos"] + $gp_5["alumnos"];

								$alumnos_bach=$gp_6["alumnos"] + $gp_7["alumnos"] + $gp_8["alumnos"] + $gp_9["alumnos"] + $gp_10["alumnos"] + $gp_11["alumnos"];
							}

							$alumnos_global= $alumnos_pri + $alumnos_bach + $alumnos_prescolar;


							
							
						?>
						<form action="php/actualizar_poblacion.php" method="POST" >
						<center>
							<div class="row">
								<div class="table-responsive">
									<table class="table table-bordered table-hover poblacion">
										<thead>
											<th>Grados:</th>
											<th class="prescolar">PRE</th>
											<th class="prescolar">JAR</th>
											<th class="prescolar">TRA</th>
											<th class="primaria">1</th>
											<th class="primaria">2</th>
											<th class="primaria">3</th>
											<th class="primaria">4</th>
											<th class="primaria">5</th>
											<?php if ($_SESSION["pais"]==2) { ?>
												<th class="primaria">6</th>
											<?php } else{ ?>
												<th class="bachillerato">6</th>
											<?php } ?>
											<th class="bachillerato">7</th>
											<th class="bachillerato">8</th>
											<th class="bachillerato">9</th>
											<th class="bachillerato">10</th>
											<th class="bachillerato">11</th>
											<th class="prescolar">Total prescolar</th>
											<th class="primaria">Total primaria</th>
											<th class="bachillerato">Total bachillerato</th>
											<th>Global</th>
										</thead>
										<tbody>
											<tr><td>Paralelos</td><td><input type="number" class="poblacion" name="p_pre" value="<?php echo $gp_pre["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_jar" value="<?php echo $gp_jar["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_tra" value="<?php echo $gp_tra["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_1" value="<?php echo $gp_1["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_2" value="<?php echo $gp_2["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_3" value="<?php echo $gp_3["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_4" value="<?php echo $gp_4["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_5" value="<?php echo $gp_5["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_6" value="<?php echo $gp_6["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_7" value="<?php echo $gp_7["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_8" value="<?php echo $gp_8["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_9" value="<?php echo $gp_9["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_10" value="<?php echo $gp_10["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_11" value="<?php echo $gp_11["paralelos"]; ?>"></td><td><?php echo $paralelos_prescolar?></td><td><?php echo $paralelos_pri ?></td></td><td><?php echo $paralelos_bach ?></td><td><?php echo $paralelos_global ?></td></tr>
							
											<tr><td>Alumnos</td><td><input type="number" class="poblacion" name="a_pre" value="<?php echo $gp_pre["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_jar" value="<?php echo $gp_jar["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_tra" value="<?php echo $gp_tra["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_1" value="<?php echo $gp_1["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_2" value="<?php echo $gp_2["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_3" value="<?php echo $gp_3["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_4" value="<?php echo $gp_4["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_5" value="<?php echo $gp_5["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_6" value="<?php echo $gp_6["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_7" value="<?php echo $gp_7["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_8" value="<?php echo $gp_8["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_9" value="<?php echo $gp_9["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_10" value="<?php echo $gp_10["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_11" value="<?php echo $gp_11["alumnos"]; ?>"></td></td></td><td><?php echo $alumnos_prescolar ?></td><td><?php echo $alumnos_pri ?></td></td><td><?php echo $alumnos_bach ?></td><td><?php echo $alumnos_global ?></td></tr>
										</tbody>
									</table>
								</div>
							</div>
						</center>
						<input type="hidden" name="id_colegio" value="<?php echo $colegio['id'] ?>">
						<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
						<input type="hidden" name="periodo" value="<?php echo $gp_periodo['id'] ?>">
						<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
						<center><button class="btn btn-primary">Actualizar</button></center>
						<?php }?>
						</form>
						<?php } ?>
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Mercado editorial
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapsefour">
													<div class="panel-body">
						<div class="row">
							<br><center><h4>Añadir nuevo</h4></center><br>
							<form action="php/mercado_editorial.php" method="POST">
							<div class="col-sm-6 col-sm-offset-3">
								<div class="form-group">
				  					<label for="tipo_editorial" class="control-label no-padding-right">Tipo editorial<small style="color:red;"> *</small></label>
				  					<select name="tipo_editorial" id="tipo_editorial" class="form-control" required="">
				  						<option value="">Seleccione</option>
				  						<option value="1">Eureka</option>
				  						<option value="2">Otra</option>
				  					</select>
				  				</div>
				  			</div>
							
						</div>
						<div class="row">
							<div class="col-sm-4">
								
								<div class="form-group">
									<label class="control-label no-padding-right" for="materia"> Materia:<small style="color:red;"> *</small></label>

									<select name="materia" id="materia" class="form-control materia">
					 				<option value="">Seleccionar</option>
								 	<?php 
								 		$sql = "SELECT id, materia FROM materias";

										$req = $bdd->prepare($sql);
										$req->execute();
										$materias = $req->fetchAll();

										foreach($materias as $materia) {
										    $id = $materia['id'];
										    $nom = $materia['materia'];
										    echo '<option value="'.$id.'">'.$nom.'</option>';
										}
								 	?>
					 				</select>
										
								</div>
							</div>
							
				  			<div class="col-sm-4">
				  				
								<div class="form-group">
									<label for="grado" class="control-label no-padding-right">Grado<small style="color:red;"> *</small></label>
						
								 		<select name="grado" id="grado" class="form-control grado">
								 			
											
								 		</select>
								</div>
				  			

				  			</div>
				  			<div class="col-sm-4">
								
								<div class="form-group">
									<label class="control-label no-padding-right" for="tipo_libro"> Tipo:<small style="color:red;"> *</small></label>

									<select name="tipo_libro" id="tipo_libro" class="form-control materia">
					 				<option value="">Seleccionar</option>
								 	<?php 
								 		$sql = "SELECT id, tipo FROM tipos_libro";

										$req = $bdd->prepare($sql);
										$req->execute();
										$materias = $req->fetchAll();

										foreach($materias as $materia) {
										    $id = $materia['id'];
										    $nom = $materia['tipo'];
										    echo '<option value="'.$id.'">'.$nom.'</option>';
										}
								 	?>
					 				</select>
										
								</div>
							</div>	
						</div>
				  			<div class="row">
				  				<div class="col-sm-4 otra_e hidden">
					  				<div class="form-group">
					  					<label for="editorial" class="control-label no-padding-right">Editorial<small style="color:red;"> *</small></label>
					  					 <input type="text" required name="editorial" id="editorial" class="form-control" placeholder="" autocomplete="off" onkeyup="bus_h()">
						  				<div id="suggestions"></div>
					  				</div>
				  				</div>
				  				<div class="col-sm-4 otra_e hidden">
					  				<div class="form-group">
					  					<label for="libro" class="control-label no-padding-right">Título</label>
					  					<input type="text" name="libro" id="libro" class="form-control" placeholder="" autocomplete="off" onkeyup="bus_h1()">
						  				<div id="suggestions1"></div>
					  				</div>

								</div>
							</div>
							<div class="row">
				  				<div class="col-sm-4 col-sm-offset-4 eureka hidden">
									<div class="form-group">
										<label for="libro_e" class="control-label no-padding-right">Título<small style="color:red;"> *</small></label>
							
									 		<select name="libro_e" id="libro_e" class="form-control grado" >
									 			
												
									 		</select>
									</div>
				  				</div>
								

							</div>
							<div class="row">
							
							<div class="row">

								<div class="col-sm-4 col-sm-offset-4">
									<label for="vigencia" class="control-label no-padding-right">Vigencia</label>
					  				<input type="text" name="vigencia" id="vigencia" class="form-control" placeholder="" >
								</div>
							</div><br>
				  			<input type="hidden" name="id_colegio" value="<?php echo $colegio['id'] ?>">
				  			<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
				  			<input type="hidden" name="periodo" value="<?php echo $gp_periodo['id'] ?>">
				  			<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
				  			<center><button class="btn btn-success">Guardar</button></center>
				  			<?php } ?>
							</form>
						</div><br><br>
						<?php 
						$sql = "SELECT a.id  as aid, a.id_materia, a.id_grado,a.editorial, a.id_libro_eureka as lib_eureka,a.libro,a.vigencia, a.id_tipo_libro as tipolibro, b.materia, c.grado FROM mercado_editorial a JOIN materias b ON a.id_materia=b.id JOIN grados c ON a.id_grado=c.id WHERE id_colegio='".$colegio['id']."' AND id_periodo='".$gp_periodo["id"]."'";
							
								$req = $bdd->prepare($sql);
								$req->execute();
								$mercados = $req->fetchAll();
								echo"<br><center><h4>Modificar</h4></center><br>";
								foreach ($mercados as $mercado) {
									if ($mercado["lib_eureka"] > 0) {
										$sq_l = "SELECT libro FROM libros WHERE id='".$mercado["lib_eureka"]."'";
							
										$req_l = $bdd->prepare($sq_l);
										$req_l->execute();
										$libro_e = $req_l->fetch();
										$libro=$libro_e["libro"];
									}
									else {
										$libro=$mercado["libro"];
									}

									$sq_t = "SELECT tipo FROM tipos_libro WHERE id='".$mercado["tipolibro"]."'";
							
										$req_t = $bdd->prepare($sq_t);
										$req_t->execute();
										$tipo_l = $req_t->fetch();

									echo '<form action="php/modificar_mercado.php" method="POST">
									<div class="row">
						 	<div class="col-sm-3">
						 		<label>Materia: '.$mercado["materia"].'</label>
						 	</div>
						 	<div class="col-sm-3">
						 		<label>Grado: '.$mercado["grado"].'</label>
						 	</div>
						 	<div class="col-sm-3">
						 		<div class="form-group">
				  					<label>Editorial: '.$mercado["editorial"].'</label>
				  				</div>
				  			</div>
				  			<div class="col-sm-3">
						 		<div class="form-group">
				  					<label>Tipo: '.$tipo_l["tipo"].'</label>
				  				</div>
				  			</div>
						 </div>
						 <div class="row">
						 	
				  			<div class="col-sm-6">
				  				<div class="form-group">
				  					<label for="libro" class="control-label no-padding-right">Título o paquete</label>';
				  					if ($mercado["lib_eureka"] > 0) {
				  					echo'<input type="text" name="libro" id="libro" class="form-control" placeholder="" value="'.$libro.'" disabled>';
				  					}
				  					else {
				  						echo'<input type="text" name="libro" id="libro" class="form-control" placeholder="" value="'.$libro.'">';
				  					}
				  				echo'</div>

				  			</div>
							<div class="col-sm-6">
								<label for="vigencia" class="control-label no-padding-right">Vigencia</label>
					  			<input type="text" name="vigencia" id="vigencia" class="form-control" placeholder="" value="'.$mercado["vigencia"].'">
							</div>
						 </div>';
						 if ($gp_periodo["f_cierre"] > date("Y-m-d")){
						echo'<center><button class="btn btn-primary">Actualizar</button></center>
						 <input type="hidden" name="id_colegio" id="cole" value="'.$colegio["id"].'">
				  			<input type="hidden" name="cod_colegio" value="'.$colegio["codigo"].'">
				  			<input type="hidden" name="id_mercado" value="'.$mercado["aid"].'">
				  			<input type="hidden" name="periodo" value="'.$gp_periodo["id"].'">						 </form>';
				  		}
								}
						 ?>
													</div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefive">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Areas objetivas
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapsefive">
													<div class="panel-body">
														<div class="row">
															<center><h4>Añadir nuevo</h4></center><br>
															<div class="col-sm-6 col-sm-offset-3">
																<form action="php/areas_objetivas.php" method="POST">
																<div class="form-group">
																	<label class="control-label no-padding-right" for="materia1"> Materia:<small style="color:red;"> *</small></label>

																	<select name="materia1" id="materia1" class="form-control materia">
													 			<option value="">Seleccionar</option>
																 	<?php 
																 		$sql = "SELECT id, materia FROM materias";
																		$req = $bdd->prepare($sql);
																		$req->execute();
																		$materias = $req->fetchAll();
																		foreach($materias as $materia) {
																		    $id = $materia['id'];
																		    $nom = $materia['materia'];
																		    echo '<option value="'.$id.'">'.$nom.'</option>';
																		}
																 	?>
													 		</select>
																		
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="grado1" class="control-label no-padding-right">Grado<small style="color:red;"> *</small></label>
														
																 		<select name="grado1" required id="grado1" class="form-control grado">
																 			
																			
																 		</select>
																</div>
												  			</div>
												  			<div class="col-sm-6">
												  				<div class="form-group">
																	<label for="libro_e1" class="control-label no-padding-right">Libro<small style="color:red;"> *</small></label>
															
																	 <select name="libro_e1" id="libro_e1" class="form-control grado" >
																	 			
																				
																	 </select>
																</div>

												  			</div>
												  			<input type="hidden" name="id_colegio" id="cole" value="<?php echo $colegio['id'] ?>">
												  			<input type="hidden" name="cod_colegio" value="<?php echo $colegio['codigo'] ?>">
												  			<input type="hidden" name="periodo" value="<?php echo $gp_periodo['id'] ?>">
												  			<?php if ($gp_periodo["f_cierre"] > date("Y-m-d")){ ?>
												  			<br><br><center><button class="btn btn-success">Guardar</button></center>
												  			<?php }?>
															</form>
									</div><br><br>
						<?php 
							$sql = "SELECT a.id  as aid, a.id_materia, a.id_grado,a.id_libro_eureka as lib_eureka, b.materia, c.grado FROM areas_objetivas a JOIN materias b ON a.id_materia=b.id JOIN grados c ON a.id_grado=c.id WHERE id_colegio='".$colegio['id']."' AND id_periodo='".$gp_periodo["id"]."'";
							
								$req = $bdd->prepare($sql);
								$req->execute();
								$areas = $req->fetchAll();
								echo "<center><h4>Lista</h4></center><br>";
								echo "<div class='table-responsive'>
										<table class='table table-bordered'>
											<thead>
												<th>Materia</th>
												<th>Grado</th>
												<th>Libro</th>
											</thead>
											<tbody>";
								foreach ($areas as $area) {
									$sq_l = "SELECT libro FROM libros WHERE id='".$area["lib_eureka"]."'";
							
										$req_l = $bdd->prepare($sq_l);
										$req_l->execute();
										$libro_e = $req_l->fetch();
										$libro=$libro_e["libro"];
									echo "<tr>
											<td>".$area["materia"]."</td>
											<td>".$area["grado"]."</td>
											<td>".$libro."</td>
										</tr>";
				  				/*if ($gp_periodo["f_cierre"] > date("Y-m-d")){
				  				echo'<center><button class="btn btn-primary">Actualizar</button></center>
				  				<input type="hidden" name="id_colegio" id="cole" value="'.$colegio["id"].'">
				  			<input type="hidden" name="cod_colegio" value="'.$colegio["codigo"].'">
				  			<input type="hidden" name="id_area" value="'.$area["aid"].'">	
				  				</form></div>';
				  			}*/
								}
								echo "</tbody>
										</table></div>";
						 ?>
													</div>
												</div>
											</div>
											<?php if ($_SESSION["tipo"]==1) {?>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsevisitas">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																&nbsp;Tasabilidad de visitas
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapsevisitas">
													<div class="panel-body">
														<?php 
															$sql = "SELECT o.objetivo, p.id as planid, p.resultado, c.colegio, p.start, z.zona, u.nombres, u.apellidos FROM plan_trabajo p JOIN colegios c ON p.id_colegio=c.id JOIN objetivos o ON p.id_objetivo=o.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON p.id_promotor=u.id  WHERE c.id='".$colegio['id']."' AND p.resultado='1' AND p.id_periodo='".$gp_periodo["id"]."' ORDER BY start ASC";
															$req = $bdd->prepare($sql);
															$req->execute();
															$planes = $req->fetchAll();
														 ?>
														<div class="table-responsive">
                                						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					                                    <thead>
					                                        <tr>
					                                            <th>Zona</th>
					                                            <th>Promotor</th>
					                                            <th>Fecha planificada</th>
					                                            <th>Objetivo</th>
					                                            <th>Resultado</th>
					                                        </tr>
					                                    </thead>
					                                    <tbody>
					                                        <?php 
					                                        	foreach($planes as $plan) {

					                                        		$promotor=$plan["nombres"]." ".$plan["apellidos"];
					                                           
					                                                if ($plan["resultado"]==1) {
                                                						echo'<tr class="odd gradeX success">';
					                                            	}
					                                            	else {
					                                            		echo'<tr class="odd gradeX">';
					                                            	}
					                                                echo'<td class="center">'.$plan["zona"].'</td>';
					                                                echo'<td class="center">'.$promotor.'</td>';
					                                                echo'<td class="center">'.$plan["start"].'</td>';
					                                                echo'<td class="center"><a href="visitas_detallado.php?planid='.$plan["planid"].'" target="_blank">'.$plan["objetivo"].'<a/></td>';
					                                                 if ($plan["resultado"]==1) {
					                                                	 echo'<td class="center">Efectiva</td>';
					                                                }
					                                                else {
					                                                	 echo'<td class="center">No ejecutada</td>';
					                                                }
					                                                
					                                            }
					                                         ?>
					                                        
					                                        </tr>
					                                       
					                                    </tbody>
                               						 </table>
													</div>
													</div>
												</div>
											</div>
										<?php } ?>
                        
						
						

						 
						
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
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
		<script required required type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/grid.locale-en.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
    	<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    	<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
                	"language": {
			            "lengthMenu": "Display _MENU_ registros por página",
			            "zeroRecords": "Nada encontrado, lo siento",
			            "info": "Mostrando página _PAGE_ de _PAGES_",
			            "infoEmpty": "No hay registros disponibles",
			            "infoFiltered": "(filtrado de _MAX_ registros en total )",
			            "search": "Buscar&nbsp;:",
			             paginate: {
				            first:"Primero",
				            previous:"Anterior",
				            next:"Siguiente",
				            last:"Último"
				        }
        			}
                });
            });

            $(".eliminar").click(function(e){

	            e.preventDefault();
	            var cod= $(this).attr('data-codigo');
	            if (confirm("¿Seguro que desea eliminar este colegio")) {
	                window.location="php/eliminar_colegio.php?codigo="+cod
	            }

        	})
    </script>
		<script>
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
		</script>
		<script>
			$('#materia').on('change',function(){
            var valor = $(this).val();
            var colegio=$("#cole").val();
             //alert(valor);
            var dataString = 'materia='+valor+"/"+colegio;
            $.ajax({

                url: "ajax/grados.php",
                type: "POST",
                data: dataString,
                success: function (resp) {
               
                    $("#grado").html(resp);                        
                    //console.log(resp);
                    if(valor =="") {
            			$("#grado").html("");
            		}
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

			$('#materia1').on('change',function(){
            var valor = $(this).val();
            var colegio=$("#cole").val();
             //alert(valor);
            var dataString = 'materia='+valor+"/"+colegio;
            $.ajax({

                url: "ajax/grados1.php",
                type: "POST",
                data: dataString,
                success: function (resp) {
               
                    $("#grado1").html(resp);                        
                    //console.log(resp);
                    if(valor =="") {
            		$("#grado1").html("");
            }
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

		function bus_h1(){	
			var lib= document.getElementById('libro').value;
			var dataString = 'libro='+lib;
			$("#libro").change(function(){
				$("#libro").val($("#libro").val());
			});
			$.ajax({
				type: "POST",
				url: "ajax/buscar_libro.php",
				data: dataString,
				success: function(resp) {

					$("#libro").blur(function(){
						$('#suggestions1').fadeOut();
					})
					if (resp !="") {
						$('#suggestions1').fadeIn().html(resp);
					}

					if (resp =="") {
						$('#suggestions1').fadeOut().html(resp);
						
					}
					
					$('.suggest-element1 a').on('click', function(){
						var libro= $(this).attr('data-libro');
						$('#libro').val(libro);
						$('#suggestions1').fadeOut();

						return false;
					});


				}
			});
		}

		function bus_h2(){	
			var lib= document.getElementById('libro').value;
			var dataString = 'libro='+lib;
			$("#libro2").change(function(){
				$("#libro2").val($("#libro2").val());
			});
			$.ajax({
				type: "POST",
				url: "ajax/buscar_libro2.php",
				data: dataString,
				success: function(resp) {

					$("#libro2").blur(function(){
						$('#suggestions2').fadeOut();
					})
					if (resp !="") {
						$('#suggestions2').fadeIn().html(resp);
					}

					if (resp =="") {
						$('#suggestions2').fadeOut().html(resp);
						
					}
					
					$('.suggest-element2 a').on('click', function(){
						var libro= $(this).attr('data-libro');
						$('#libro2').val(libro);
						$('#suggestions2').fadeOut();

						return false;
					});


				}
			});
		}

		function bus_h(){	
			var edit= document.getElementById('editorial').value;
			var dataString = 'editorial='+edit;
			$("#editorial").change(function(){
				$("#editorial").val($("#editorial").val());
			});
			$.ajax({
				type: "POST",
				url: "ajax/buscar_editorial.php",
				data: dataString,
				success: function(resp) {

					$("#editorial").blur(function(){
						$('#suggestions').fadeOut();
					})
					if (resp !="") {
						$('#suggestions').fadeIn().html(resp);
					}

					if (resp =="") {
						$('#suggestions').fadeOut().html(resp);
						
					}
					
					$('.suggest-element a').on('click', function(){
						var editorial= $(this).attr('data-editorial');
						$('#editorial').val(editorial);
						$('#suggestions').fadeOut();

						return false;
					});


				}
			});
		}


		$("#tipo_editorial").change(function(){
			var valor = $(this).val();

			if (valor==2) {
				$(".otra_e").removeClass("hidden");
				$(".eureka").addClass("hidden");
				$("#editorial").attr("required","required");
			}
			else {
				$(".eureka").removeClass("hidden");
				$(".otra_e").addClass("hidden");
				$("#editorial").removeAttr("required");

				$('#grado').on('change',function(){
		            var valor = $(this).val();
		            var materia=$("#materia").val();
		             //alert(valor);
		            var dataString = 'mat_gra='+materia+"/"+valor;
		            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                success: function (resp) {
	               
	                    $("#libro_e").html(resp);                        
	                    //console.log(resp);
	                    if(valor =="") {
	            			$("#libro_e").html("");
	            		}
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

		}
	});

		$('#grado1').on('change',function(){
		            var valor = $(this).val();
		            var materia=$("#materia1").val();
		             //alert(valor);
		            var dataString = 'mat_gra='+materia+"/"+valor;
		            $.ajax({

	                url: "ajax/buscar_l_eureka.php",
	                type: "POST",
	                data: dataString,
	                success: function (resp) {
	               
	                    $("#libro_e1").html(resp);                        
	                    //console.log(resp);
	                    if(valor =="") {
	            			$("#libro_e1").html("");
	            		}
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

		$("#agregar_materia").click(function(){
			$(".profesor").clone().appendTo(".otro_p");
		});
		</script>
		<script>
			$(".abrir_colegios").addClass("open");
			$(".ver_colegios").addClass("active");
		</script>
		<!-- inline scripts related to this page -->
	</body>
</html>
