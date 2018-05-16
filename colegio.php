<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Colegio</title>

		<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
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
									tal
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

	                                $sql = "SELECT id, codigo, colegio, direccion, barrio,telefono, representante, web, telefono, cumpleaños FROM colegios WHERE codigo='".$_GET["codigo"]."'";

									$req = $bdd->prepare($sql);
									$req->execute();

									$colegio = $req->fetch();


                            	?>
                        	</div>
                        </div>
                        <div class="row">
                        	<table class="table table-bordered table-hover">
                        		
                        		<tr>
                        			<td>Nombre de la institución: <?php echo $colegio['colegio']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Código interno: <?php echo $colegio['codigo']; ?></td>
                        			<td>Dirección: <?php echo $colegio['direccion']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Barrio: <?php echo $colegio['barrio']; ?></td>
                        			<td>Representante: <?php echo $colegio['representante']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Teléfono: <?php echo $colegio['telefono']; ?></td>
                        			<td>Pagina Web: <?php echo $colegio['web']; ?></td>
                        		</tr>
                        		<tr>
                        			<td>Cumpleaños del colegio: <?php echo $colegio['cumpleaños']; ?></td>
                        			
                        		</tr>
                        			
                        	</table>
                        </div>
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
										<label class="control-label no-padding-right" for="nombre"> Nombre: </label>

										
											<input required required type="text" name="nombre" id="nombre" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular"> Celular: </label>

										
											<input required required type="tel" name="celular" id="celular" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre"> Email: </label>

										
											<input required required type="email" name="email" id="email" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños" id="cumpleaños" required required type="text" data-date-format="yyyy-mm-dd"/>
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
										<label class="control-label no-padding-right" for="nombre1"> Nombre: </label>

										
											<input required required type="text" name="nombre1" id="nombre1" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular1"> Celular: </label>

										
											<input required required type="tel" name="celular1" id="celular1" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email1"> Email: </label>

										
											<input required required type="email" name="email1" id="email1" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños1"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños1" id="cumpleaños1" required required type="text" data-date-format="yyyy-mm-dd"/>
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
										<label class="control-label no-padding-right" for="nombre2"> Nombre: </label>

										
											<input required required type="text" name="nombre2" id="nombre2" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular2"> Celular: </label>

										
											<input required required type="tel" name="celular2" id="celular2" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email2"> Email: </label>

										
											<input required required type="email" name="email2" id="email2" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños2"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños2" id="cumpleaños2" required required type="text" data-date-format="yyyy-mm-dd"/>
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
										<label class="control-label no-padding-right" for="nombre3"> Nombre: </label>

										
											<input required required type="text" name="nombre3" id="nombre3" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular3"> Celular: </label>

										
											<input required required type="tel" name="celular3" id="celular3" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email3"> Email: </label>

										
											<input required required type="email" name="email3" id="email3" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños3"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños3" id="cumpleaños3" required required type="text" data-date-format="yyyy-mm-dd"/>
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
										<label class="control-label no-padding-right" for="nombre4"> Nombre: </label>

										
											<input required required type="text" name="nombre4" id="nombre4" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular4"> Celular: </label>

										
											<input required required type="tel" name="celular4" id="celular4" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email4"> Email: </label>

										
											<input required required type="email" name="email4" id="email4" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños4"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños4" id="cumpleaños4" required required type="text" data-date-format="yyyy-mm-dd"/>
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
										<label class="control-label no-padding-right" for="nombre5"> Nombre: </label>

										
											<input required required type="text" name="nombre5" id="nombre5" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular5"> Celular: </label>

										
											<input required required type="tel" name="celular5" id="celular5" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email5"> Email: </label>

										
											<input required required type="email" name="email5" id="email5" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños5"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños5" id="cumpleaños5" required required type="text" data-date-format="yyyy-mm-dd"/>
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
										<label class="control-label no-padding-right" for="nombre6"> Nombre: </label>

										
											<input required required type="text" name="nombre6" id="nombre6" placeholder="Nombre completo" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular6"> Celular: </label>

										
											<input required required type="tel" name="celular6" id="celular6" placeholder="" class="form-control" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email6"> Email: </label>

										
											<input required required type="email" name="email6" id="email6" placeholder="" class="form-control" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños6"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños6" id="cumpleaños6" required required type="text" data-date-format="yyyy-mm-dd"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
							</div>
							

							<center><button class="btn btn-primary">Guardar</button></center>
							<input required required type="hidden" name="id_colegio" value='<?php echo $colegio["id"] ?>'>
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
							?>

						<b>Propietario</b><br><br>
						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
								<form action="php/actualizar_trabajadores.php" method="POST">
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre"> Nombre: </label>

										
											<input required required type="text" name="nombre" id="nombre" placeholder="Nombre completo" class="form-control" value="<?php echo $trabajadores["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular"> Celular: </label>

										
											<input required required type="tel" name="celular" id="celular" placeholder="" class="form-control"  value="<?php echo $trabajadores["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="nombre"> Email: </label>

										
											<input required required type="email" name="email" id="email" placeholder="" class="form-control"  value="<?php echo $trabajadores["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños" id="cumpleaños" required required type="text" data-date-format="yyyy-mm-dd"/  value="<?php echo $trabajadores["cumpleaños"]?>">
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
										<label class="control-label no-padding-right" for="nombre1"> Nombre: </label>

										
											<input required required type="text" name="nombre1" id="nombre1" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores1["nombre"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular1"> Celular: </label>

										
											<input required required type="tel" name="celular1" id="celular1" placeholder="" class="form-control" value="<?php echo $trabajadores1["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email1"> Email: </label>

										
											<input required required type="email" name="email1" id="email1" placeholder="" class="form-control" value="<?php echo $trabajadores1["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños1"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños1" id="cumpleaños1" required required type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores1["cumpleaños"]?>"/>
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
										<label class="control-label no-padding-right" for="nombre2"> Nombre: </label>

										
											<input required required type="text" name="nombre2" id="nombre2" placeholder="Nombre completo" class="form-control" value="<?php echo $trabajadores2["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular2"> Celular: </label>

										
											<input required required type="tel" name="celular2" id="celular2" placeholder="" class="form-control" value="<?php echo $trabajadores2["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email2"> Email: </label>

										
											<input required required type="email" name="email2" id="email2" placeholder="" class="form-control" value="<?php echo $trabajadores2["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños2"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños2" id="cumpleaños2" required required type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores2["cumpleaños"]?>"/>
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
										<label class="control-label no-padding-right" for="nombre3"> Nombre: </label>

										
											<input required required type="text" name="nombre3" id="nombre3" placeholder="Nombre completo" class="form-control" value="<?php echo $trabajadores3["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular3"> Celular: </label>

										
											<input required required type="tel" name="celular3" id="celular3" placeholder="" class="form-control"  value="<?php echo $trabajadores3["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email3"> Email: </label>

										
											<input required required type="email" name="email3" id="email3" placeholder="" class="form-control"  value="<?php echo $trabajadores3["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños3"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños3" id="cumpleaños3" required required type="text" data-date-format="yyyy-mm-dd"  value="<?php echo $trabajadores3["cumpleaños"]?>"/>
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
										<label class="control-label no-padding-right" for="nombre4"> Nombre: </label>

										
											<input required required type="text" name="nombre4" id="nombre4" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores4["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular4"> Celular: </label>

										
											<input required required type="tel" name="celular4" id="celular4" placeholder="" class="form-control"    value="<?php echo $trabajadores4["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email4"> Email: </label>

										
											<input required required type="email" name="email4" id="email4" placeholder="" class="form-control"  value="<?php echo $trabajadores4["email"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños4"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños4" id="cumpleaños4" required required type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores4["cumpleaños"]?>" />
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
										<label class="control-label no-padding-right" for="nombre5"> Nombre: </label>

										
											<input required required type="text" name="nombre5" id="nombre5" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores5["nombre"]?>"/>
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular5"> Celular: </label>

										
											<input required required type="tel" name="celular5" id="celular5" placeholder="" class="form-control"  value="<?php echo $trabajadores5["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email5"> Email: </label>

										
											<input required required type="email" name="email5" id="email5" placeholder="" class="form-control"  value="<?php echo $trabajadores5["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños5"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños5" id="cumpleaños5" required required type="text" data-date-format="yyyy-mm-dd"  value="<?php echo $trabajadores5["cumpleaños"]?>" />
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
										<label class="control-label no-padding-right" for="nombre6"> Nombre: </label>

										
											<input required required type="text" name="nombre6" id="nombre6" placeholder="Nombre completo" class="form-control"  value="<?php echo $trabajadores6["nombre"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="celular6"> Celular: </label>

										
											<input required required type="tel" name="celular6" id="celular6" placeholder="" class="form-control" value="<?php echo $trabajadores6["telefono"]?>" />
										
									</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-8">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="email6"> Email: </label>

										
											<input required required type="email" name="email6" id="email6" placeholder="" class="form-control" value="<?php echo $trabajadores6["email"]?>" />
										
									</div>
							</div>
							<div class="col-sm-4">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="control-label no-padding-right" for="cumpleaños6"> Fecha de cumpleaños: </label>
											
											<div class="input-group">
												<input required required type="text" class="form-control date-picker" name="cumpleaños6" id="cumpleaños6" required required type="text" data-date-format="yyyy-mm-dd" value="<?php echo $trabajadores6["cumpleaños"]?>"/>
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										
									</div>
								<input required required type="hidden" name="id6" value="<?php echo $trabajadores6["id"]?>">
							</div>
							

							<center><button class="btn btn-primary">Actualizar</button></center>
							<input required required type="hidden" name="id_colegio" value='<?php echo $colegio["id"] ?>'>
							</form>

							<?php } ?>

						</div>
						<br><center><h4>Información de población</h4></center>
						<?php 
							$sql = "SELECT id FROM grados_paralelos WHERE id_colegio='".$colegio['id']."'";

							$req = $bdd->prepare($sql);
							$req->execute();

							$num = $req->rowCount();
									
							if ($num < 1) {
						 ?>
						<form action="php/poblacion.php" method="POST" >
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<th>Grados:</th>
										<th>PRE</th>
										<th>JAR</th>
										<th>TRA</th>
										<th>1</th>
										<th>2</th>
										<th>3</th>
										<th>4</th>
										<th>5</th>
										<th>6</th>
										<th>7</th>
										<th>8</th>
										<th>9</th>
										<th>10</th>
										<th>11</th>
										<!--<th>Total pri</th>
										<th>Total bach</th>
										<th>Global</th>-->
									</thead>
									<tbody>
										<tr><td>Paralelos</td><td><input type="number" class="poblacion" name="p_pre"></td><td><input type="number" class="poblacion" name="p_jar"></td><td><input type="number" class="poblacion" name="p_tra"></td><td><input type="number" class="poblacion" name="p_1"></td><td><input type="number" class="poblacion" name="p_2"></td><td><input type="number" class="poblacion" name="p_3"></td><td><input type="number" class="poblacion" name="p_4"></td><td><input type="number" class="poblacion" name="p_5"></td><td><input type="number" class="poblacion" name="p_6"></td><td><input type="number" class="poblacion" name="p_7"></td><td><input type="number" class="poblacion" name="p_8"></td><td><input type="number" class="poblacion" name="p_9"></td><td><input type="number" class="poblacion" name="p_10"></td><td><input type="number" class="poblacion" name="p_11"></td></tr>
										<tr><td>Alumnos reales</td><td><input type="number" class="poblacion" name="a_pre"></td><td><input type="number" class="poblacion" name="a_jar"></td><td><input type="number" class="poblacion" name="a_tra"></td><td><input type="number" class="poblacion" name="a_1"></td><td><input type="number" class="poblacion" name="a_2"></td><td><input type="number" class="poblacion" name="a_3"></td><td><input type="number" class="poblacion" name="a_4"></td><td><input type="number" class="poblacion" name="a_5"></td><td><input type="number" class="poblacion" name="a_6"></td><td><input type="number" class="poblacion" name="a_7"></td><td><input type="number" class="poblacion" name="a_8"></td><td><input type="number" class="poblacion" name="a_9"></td><td><input type="number" class="poblacion" name="a_10"></td><td><input type="number" class="poblacion" name="a_11"></td></tr>
									</tbody>
								</table>
							</div>
						</div>
						<input type="hidden" name="id_colegio" value="<?php echo $colegio['id'] ?>">
						<center><button class="btn btn-success">Guardar</button></center>
						</form>
						<?php }else{

							$sql_pre = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=1";
							$req_pre = $bdd->prepare($sql_pre);
							$req_pre->execute();
							$gp_pre = $req_pre->fetch();

							$sql_jar = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=2";
							$req_jar = $bdd->prepare($sql_jar);
							$req_jar->execute();
							$gp_jar = $req_jar->fetch();

							$sql_tra = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=3";
							$req_tra = $bdd->prepare($sql_tra);
							$req_tra->execute();
							$gp_tra = $req_tra->fetch();

							$sql_1 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=4";
							$req_1 = $bdd->prepare($sql_1);
							$req_1->execute();
							$gp_1 = $req_1->fetch();

							$sql_2 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=5";
							$req_2 = $bdd->prepare($sql_2);
							$req_2->execute();
							$gp_2 = $req_2->fetch();

							$sql_3 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=6";
							$req_3 = $bdd->prepare($sql_3);
							$req_3->execute();
							$gp_3 = $req_3->fetch();

							$sql_4 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=7";
							$req_4 = $bdd->prepare($sql_4);
							$req_4->execute();
							$gp_4 = $req_4->fetch();

							$sql_5 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=8";
							$req_5 = $bdd->prepare($sql_5);
							$req_5->execute();
							$gp_5 = $req_5->fetch();

							$sql_6 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=9";
							$req_6 = $bdd->prepare($sql_6);
							$req_6->execute();
							$gp_6 = $req_6->fetch();

							$sql_7 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=10";
							$req_7 = $bdd->prepare($sql_7);
							$req_7->execute();
							$gp_7 = $req_7->fetch();

							$sql_8 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=11";
							$req_8 = $bdd->prepare($sql_8);
							$req_8->execute();
							$gp_8 = $req_8->fetch();

							$sql_9 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=12";
							$req_9 = $bdd->prepare($sql_9);
							$req_9->execute();
							$gp_9 = $req_9->fetch();

							$sql_10 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=13";
							$req_10 = $bdd->prepare($sql_10);
							$req_10->execute();
							$gp_10 = $req_10->fetch();

							$sql_11 = "SELECT paralelos,alumnos FROM grados_paralelos WHERE id_colegio='".$colegio['id']."' AND id_grado=14";
							$req_11 = $bdd->prepare($sql_11);
							$req_11->execute();
							$gp_11 = $req_11->fetch();

							$paralelos_pre=$gp_pre["paralelos"];

							$paralelos_jyt=$gp_jar["paralelos"] + $gp_tra["paralelos"];

							$paralelos_pri=$gp_1["paralelos"] + $gp_2["paralelos"] + $gp_3["paralelos"] + $gp_4["paralelos"] + $gp_5["paralelos"];

							$paralelos_bach=$gp_6["paralelos"] + $gp_7["paralelos"] + $gp_8["paralelos"] + $gp_9["paralelos"] + $gp_10["paralelos"] + $gp_11["paralelos"];

							$paralelos_global= $paralelos_pri + $paralelos_bach + + $paralelos_pre + $paralelos_jyt;

							$alumnos_pre=$gp_pre["alumnos"];

							$alumnos_jyt=$gp_jar["alumnos"] + $gp_tra["alumnos"];

							$alumnos_pre=$gp_pre["paralelos"];

							$alumnos_pri=$gp_1["alumnos"] + $gp_2["alumnos"] + $gp_3["alumnos"] + $gp_4["alumnos"] + $gp_5["alumnos"];

							$alumnos_bach=$gp_6["alumnos"] + $gp_7["alumnos"] + $gp_8["alumnos"] + $gp_9["alumnos"] + $gp_10["alumnos"] + $gp_11["alumnos"];

							$alumnos_global= $alumnos_pri + $alumnos_bach+ $alumnos_pre + $alumnos_jyt;


							
							
						?>
						<form action="php/actualizar_poblacion.php" method="POST" >
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<th>Grados:</th>
										<th>PRE</th>
										<th>JAR</th>
										<th>TRA</th>
										<th>1</th>
										<th>2</th>
										<th>3</th>
										<th>4</th>
										<th>5</th>
										<th>6</th>
										<th>7</th>
										<th>8</th>
										<th>9</th>
										<th>10</th>
										<th>11</th>
										<th>Total pre</th>
										<th>Total jar y tra</th>
										<th>Total pri</th>
										<th>Total bach</th>
										<th>Global</th>
									</thead>
									<tbody>
										<tr><td>Paralelos</td><td><input type="number" class="poblacion" name="p_pre" value="<?php echo $gp_pre["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_jar" value="<?php echo $gp_jar["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_tra" value="<?php echo $gp_tra["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_1" value="<?php echo $gp_1["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_2" value="<?php echo $gp_2["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_3" value="<?php echo $gp_3["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_4" value="<?php echo $gp_4["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_5" value="<?php echo $gp_5["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_6" value="<?php echo $gp_6["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_7" value="<?php echo $gp_7["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_8" value="<?php echo $gp_8["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_9" value="<?php echo $gp_9["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_10" value="<?php echo $gp_10["paralelos"]; ?>"></td><td><input type="number" class="poblacion" name="p_11" value="<?php echo $gp_11["paralelos"]; ?>"></td><td><?php echo $paralelos_pre ?></td><td><?php echo $paralelos_jyt ?></td><td><?php echo $paralelos_pri ?></td></td><td><?php echo $paralelos_bach ?></td><td><?php echo $paralelos_global ?></td></tr>

										<tr><td>Alumnos</td><td><input type="number" class="poblacion" name="a_pre" value="<?php echo $gp_pre["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_jar" value="<?php echo $gp_jar["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_tra" value="<?php echo $gp_tra["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_1" value="<?php echo $gp_1["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_2" value="<?php echo $gp_2["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_3" value="<?php echo $gp_3["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_4" value="<?php echo $gp_4["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_5" value="<?php echo $gp_5["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_6" value="<?php echo $gp_6["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_7" value="<?php echo $gp_7["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_8" value="<?php echo $gp_8["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_9" value="<?php echo $gp_9["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_10" value="<?php echo $gp_10["alumnos"]; ?>"></td><td><input type="number" class="poblacion" name="a_11" value="<?php echo $gp_11["alumnos"]; ?>"></td></td></td><td><?php echo $alumnos_pre ?></td><td><?php echo $alumnos_jyt ?></td><td><?php echo $alumnos_pri ?></td></td><td><?php echo $alumnos_bach ?></td><td><?php echo $alumnos_global ?></td></tr>
									</tbody>
								</table>
							</div>
						</div>
						<input type="hidden" name="id_colegio" value="<?php echo $colegio['id'] ?>">
						<center><button class="btn btn-success">Actualizar</button></center>
						</form>
						<?php } ?>
						<br><br><center><h4>Mercado editorial</h4></center>
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<label class="control-label no-padding-right" for="nombre"> Materia: </label>

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
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="grado" class="control-label no-padding-right">Grado</label>
						
								 		<select name="grado" id="grado" class="form-control grado">
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
				  			<div class="col-sm-4">
				  				<div class="form-group">
				  					<label for="" class="control-label no-padding-right">Editorial</label>
				  					<input type="text" class="form-control">
				  				</div>
				  			</div>
				  			<div class="col-sm-4">
				  				<div class="form-group">
				  					<label for="" class="control-label no-padding-right">Título</label>
				  					<input type="text" class="form-control">
				  				</div>
				  			</div>

						</div>
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
							<span class="blue bolder">Eureka</span>
							Applicación &copy; 2018
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
		<!-- inline scripts related to this page -->
	</body>
</html>
