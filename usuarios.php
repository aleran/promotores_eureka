<?php require_once("php/aut.php"); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Usuarios</title>

		<meta name="description" content="Sistema Aula máxima" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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

							<li>
								<a href="#">Usuarios</a>
							</li>
							<li class="active">Usuarios</li>
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
						<!--<div class="ace-settings-container" id="ace-settings-container">
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
								</div>

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
								</div>
							</div>
						</div>--><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Usuarios
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Usuarios
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
							<button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">Crear Usuario</button><br><br>
							<?php 
                                include("conexion/bdd.php");
                                if ( ($_SESSION["tipo"] ==1) ) {
	                                $sql = "SELECT * FROM usuarios";

									$req = $bdd->prepare($sql);
									$req->execute();

									$usuarios = $req->fetchAll();
								}else{

									$sql = "SELECT * FROM usuarios WHERE tipo !=1";

									$req = $bdd->prepare($sql);
									$req->execute();

									$usuarios = $req->fetchAll();
								}
                                

                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombres <small style="color: red;">*</small></th>
                                            <th>Apellidos <small style="color: red;">*</small></th>
                                            <th>Telefono</th>
                                            <th>E-mail <small style="color: red;">*</small></th>
                                            <th>Clave</th>
                                            <th>Tipo</th>
                                            <th>País</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        	foreach($usuarios as $usuario) {

                                        		$sql = "SELECT pais FROM paises WHERE id='".$usuario["id_pais"]."'";
												$req = $bdd->prepare($sql);
												$req->execute();
												$pais = $req->fetch();
                                            
                                                echo'<tr class="odd gradeX">';
                                                echo'<form action="php/modificar_usuarios.php" method="POST"><td class=""><input type="text" name="nombres" value="'.$usuario["nombres"].'" size="15" required></td>';
                                                echo'<td class=""><input type="text" name="apellidos" value="'.$usuario["apellidos"].'" size="15" required></td>';
                                                echo'<td class=""><input type="text" name="telefono" value="'.$usuario["telefono"].'" size="15"></td>';
                                                echo'<td class=""><input type="email" name="correo" value="'.$usuario["correo"].'" required></td>';
                                                echo'<td class=""><input type="text" name="clave" size="15"></td>';
                                                if ($usuario["tipo"] == 3) {
                                                	echo'<td class="">Promotor</td>';
                                                }
                                                elseif ($usuario["tipo"] == 2) {
                                                	echo'<td class="">Consultor</td>';
                                                }
                                                else {
                                                	echo'<td class="">Administrador</td>';
                                                }
                                                echo'<td class="">'.$pais["pais"].'</td>';
                                                echo '<td>
														<div class="hidden-sm hidden-xs btn-group">
															
															<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button>

														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<a class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</a>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

																	<li>
																		<button class="tooltip-success" data-rel="tooltip" title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</button>
																		<input type="hidden" name="id_usuario" value="'.$usuario["id"].'">
																	</li></form>
																</ul>
															</div>
														</div>
													</td>';
                                            }
                                         ?>
                                        
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>

							 <!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="php/crear_usuario.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Crear Usuario</h4>
			  </div>
			  <div class="modal-body">
				
				   <div class="form-group">
					<label for="nombres" class="col-sm-2 control-label">Nombres<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <input type="text" name="nombres" id="nombres" class="form-control" id="profesor" placeholder="" required>
					</div>
				  </div>
					
				  <div class="form-group">
					<label for="apellidos" class="col-sm-2 control-label">Apellidos<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <input type="text" required name="apellidos" class="form-control" id="apellidos" placeholder="">
					</div>
				  </div>

				  <div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
					  <input type="text" name="telefono" class="form-control" id="telefono" placeholder=""">
					</div>
				  </div>

				  <div class="form-group">
					<label for="correo" class="col-sm-2 control-label">E-mail<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <input type="email" required name="correo" class="form-control" id="correo" placeholder="">
					</div>
				  </div>

				  <div class="form-group">
					<label for="clave" class="col-sm-2 control-label">Clave<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <input type="text" required name="clave" class="form-control" id="clave" placeholder="" minlength="6">
					</div>
				  </div>
					
					
				<div class="form-group">
					<label for="tipo" class="col-sm-2 control-label">Tipo<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					 <select name="tipo" id="tipo" class="form-control" required>
					 	<option value="">Seleccionar</option>
					 	<option value="3">Promotor</option>
					 	<option value="2">Consultor</option>
					 	<?php if ( ($_SESSION["tipo"] ==1) ) {?>
					 		<option value="1">Administrador</option>
						<?php }?>
					 </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="pais" class="col-sm-2 control-label">País<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					 <select name="pais" id="pais" class="form-control" required>
					 	<option value="">Seleccionar</option>
					 	<?php 
					 		$sql = "SELECT id, pais FROM paises";

							$req = $bdd->prepare($sql);
							$req->execute();
							$paises = $req->fetchAll();

							foreach($paises as $pais) {
							    $id = $pais['id'];
							    $nom = $pais['pais'];
							    echo '<option value="'.$id.'">'.$nom.'</option>';
							}
					 	?>
					 </select>
					</div>
				  </div>

				  
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-success">Crear usuario</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
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
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/grid.locale-en.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
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
    </script>
    <script>
			$(".usuarios").addClass("active");
	</script>
	</body>
</html>