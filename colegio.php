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
