<?php require_once("php/aut.php"); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Libros</title>

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

							<li class="active">Libros</li>
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
								Libros
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Libros
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
							<?php if ( ($_SESSION["tipo"] ==1) ) {?>
							<button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">Crear libro</button><br><br>
							<?php } ?>
							<?php 
                                include("conexion/bdd.php");

                                $sql = "SELECT l.id,l.libro, l.id_grado, l.pri_sec, l.precio, l.pri_sec, l.presupuesto, m.materia, g.grado FROM libros l JOIN materias m ON l.id_materia=m.id JOIN grados g ON l.id_grado=g.id";

								$req = $bdd->prepare($sql);
								$req->execute();

								$libros = $req->fetchAll();
                                

                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Título <small style="color: red;">*</small></th>
                                            <th>Materia <small style="color: red;">*</small></th>
                                            <th>Grado</th>
                                            <th>¿Es serie?</th>
                                            <th>Serie</th>
                                            <th>Precio $</th>
                                            <th>¿Presup?</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        	foreach($libros as $libro) {
                                            	

                                            	   $sql_serie = "SELECT libro FROM libros WHERE id='".$libro["pri_sec"]."'";

													$req_serie = $bdd->prepare($sql_serie);
													$req_serie->execute();
													$serie = $req_serie->fetch();

                                                echo'<tr class="odd gradeX">';
                                                echo '<form action="php/modificar_libro.php" method="POST">';
                                                echo'<td class=""><input type="text" name="libro" value="'.$libro["libro"].'" required></td>';
                                                
                                                echo'<td class="">'.$libro["materia"].'</td>';
                                                echo'<td class="">'.$libro["grado"].'</td>';
                                                if ($libro["id_grado"] == 15 || $libro["id_grado"] == 16) {
                                                	
                                                	echo'<td class="">Si</td>';
                                                } else {

                                                	echo'<td class="">No</td>';
                                                }
                                                echo'<td class="">'.$serie["libro"].'</td>';
                                                 if ($libro["id_grado"] == 15 || $libro["id_grado"] == 16) {

                                                 	echo'<td class=""></td>';

                                                 }else {

                                                 	echo'<td class=""><input type="number" name="precio" value="'.$libro["precio"].'" size="3" required></td>';
                                                 }

                                                 if ($libro["presupuesto"]==1) {

                                                 	echo'<td class=""> <select name="presupuesto" id="" required>
														<option value="1" selected>SI</option>
														<option value="0">No</option>

                                                 	</select></td>';

                                                 }else {
                                                 	echo'<td class=""> <select name="presupuesto" id="" required>
														<option value="1">SI</option>
														<option value="0" selected>No</option>

                                                 	</select></td>';
                                                 }
                                      			

                                                echo '<input type="hidden" name="id_libro" value="'.$libro["id"].'">';
                                                
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
																		<input type="hidden" name="id_usuario" value="">
																	</li></form>
																</ul>
															</div>
														</div>
													</td>
													
													</form>';
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
			<form class="form-horizontal" method="POST" action="php/crear_libro.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Crear Libro</h4>
			  </div>
			  <div class="modal-body">
				
				   <div class="form-group">
					<label for="libro" class="col-sm-2 control-label">Título<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <input type="text" name="libro" id="libro" class="form-control" id="profesor" placeholder="" required>
					</div>
				  </div>
					
				  <div class="form-group">
					<label for="materia" class="col-sm-2 control-label">Matería<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <select name="materia" id="materia" required>
					  <option value="">Seleccione</option>
					  <?php 
					  	$sql = "SELECT id, materia FROM materias";

						$req = $bdd->prepare($sql);
						$req->execute();

						$materias = $req->fetchAll();

						foreach ($materias as $materia) {
							echo'<option value="'.$materia["id"].'">'.$materia["materia"].'</option>';
						}
					   ?>	
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="grado" class="col-sm-2 control-label">Grado<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <select name="grado" id="grado" required>
					  <option value="">Seleccione</option>
					  <?php 
					  	$sql = "SELECT id, grado FROM grados";

						$req = $bdd->prepare($sql);
						$req->execute();

						$grados = $req->fetchAll();

						foreach ($grados as $grado) {
							echo'<option value="'.$grado["id"].'">'.$grado["grado"].'</option>';
						}
					   ?>	
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="serie" class="col-sm-2 control-label">serie</label>
					<div class="col-sm-10">
					  <select name="serie" id="serie">
					 	<option value="">Ninguna</option>
					 </select>
					</div>
				  </div>

				   <div class="form-group">
					<label for="precio" class="col-sm-2 control-label">Precio $</label>
					<div class="col-sm-10">
					  <input type="number" name="precio" id="precio" class="form-control" id="profesor" placeholder="">
					</div>
				  </div>

				  <div class="form-group">
					<label for="presupuesto" class="col-sm-2 control-label">¿Presupuesto?<small style="color:red;"> *</small></label>
					<div class="col-sm-10">
					  <select name="presupuesto" id="presupuesto" required>
					  <option value="">Seleccione</option>
						  <option value="1">Si</option>
						  <option value="0">No</option>
					  </select>
					</div>
				  </div>
					
					
				  
				
			  </div>

			  <div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-success">Crear libro</button>
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
			$(".libros").addClass("active");

			$('#grado').on('change',function(){
		            var valor = $(this).val();
		            var materia=$("#materia").val();
		             //alert(valor);
		            if (valor  < 15) {

			            var dataString = 'mat_gra='+materia+"/"+valor;
			            $.ajax({

		                url: "ajax/buscar_serie.php",
		                type: "POST",
		                data: dataString,
		                success: function (resp) {
		               
		                    $("#serie").html(resp);                        
		                    //console.log(resp);
		                    if(valor =="") {
		            			$("#serie").html("");
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
		        } else {
		        	$("#serie").html("<option value=''>Ninguna</option>");
		        }
                
       		});
	</script>
	</body>
</html>