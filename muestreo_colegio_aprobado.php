<?php require_once("php/aut.php"); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Muestreo aprobado</title>

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
		<style>
			@page{
	   			margin: 0;
	   	
			}
		@media print {
			a {display: none;}
			
			a[href]:after {
	    		content: none !important;
	 		}
			body{
				font-size: 9px;
			}
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
					<div class="breadcrumbs ace-save-state hidden-print" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Muestreo</a>
							</li>
							<li class="active">Aprobado</li>
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

						<div class="page-header hidden-print">
							<h1>
								Muestreo
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Aprobado
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

                                	
                                	$sql_pedido="SELECT id FROM muestreos WHERE id='".$_GET["id_pedido"]."'";

									$req_pedido = $bdd->prepare($sql_pedido);
									$req_pedido->execute();
									$pedido = $req_pedido->fetch();
									
                                	
                                	$sql_pedido="SELECT pe.fecha,pe.observaciones, z.zona, c.colegio, u.nombres, u.apellidos, e.estado FROM muestreos pe JOIN colegios c ON pe.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo JOIN estados_pedidos e ON e.id=pe.estado WHERE pe.id='".$pedido["id"]."'";

									$req_pedido = $bdd->prepare($sql_pedido);
									$req_pedido->execute();
									$pedido = $req_pedido->fetch();

                                	$sql = "SELECT pe.id, l.id, l.libro, lp.cantidad, lp.cantidad_aprob FROM muestreos pe JOIN libros_muestreos lp ON lp.cod_muestreo=pe.codigo JOIN libros l ON l.id=lp.id_libro  WHERE pe.id='".$_GET["id_pedido"]."'  GROUP BY l.id";

									$req = $bdd->prepare($sql);
									$req->execute();

                                
								$libros = $req->fetchAll();
                                
                            ?>
                            <table class="table table-bordered table-hover">
                            	<tr>
                            		<td># Muestreo: <?php echo $_GET["id_pedido"] ?></td>
                            		<td>Colegio: <?php echo $pedido["colegio"] ?></td>
                            		<td>Fecha: <?php echo $pedido["fecha"] ?></td>
                            	</tr>
                            	<tr>
                            		<td>Zona: <?php echo $pedido["zona"] ?></td>
                            		<td>Promotor: <?php echo $pedido["nombres"]." ".$pedido["apellidos"] ?></td>
                            	</tr>
                            </table>
                          
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                        	<th>Cantidad</th>
                                        	<th>Cantidad aprobada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        				
                                        <?php 
                                        	foreach($libros as $libro) {
                                           
                                        		$total_cantidad[]=$libro["cantidad"];
                                        		$total_cantidad_aprob[]=$libro["cantidad_aprob"];

                                                echo'<tr class="odd gradeX">';
                                                echo'<td class="">'.$libro["libro"].'</td>';
                                              
                                                echo'<td class="center">'.$libro["cantidad"].'</td>';
                                                echo'<td class="center">'.$libro["cantidad_aprob"].'</td>';
                                                   
                                               
                                            }
                                            
                                            $total_c=array_sum($total_cantidad);
                                            $total_c_aprob=array_sum($total_cantidad_aprob);
                                         ?>
                                        
                                        </tr>
                                       	<td class="center"><b>Total:</b></td>
                                       	<td class="center"><b><?php echo $total_c; ?></b></td>
                                       	<td class="center"><b><?php echo $total_c_aprob; ?></b></td>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" name="id_colegio" value="<?php echo $_GET["id_colegio"]; ?>">
                            <input type="hidden" name="periodo" value="<?php echo $_GET["periodo"]; ?>">

							<center>
								 <label for="observaciones">Observaciones:</label><br>
								 <textarea name="observaciones" id="observaciones" cols="70" rows="3" disabled><?php echo $pedido["observaciones"] ?></textarea><br><br>
								 <button type="button" id="imprimir" class="btn btn-info hidden-print">Imprimir</button> <br><br>
							<button class="btn btn-danger hidden-print" id="rechazar">Anular</button> 
                           <button class="btn btn-success hidden-print" id="entregar">Entregar</button><center>
                        </form>

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
			$(".abrir_muestreo").addClass("open");
			$(".muestreo_aprobados").addClass("active");

			$("#rechazar").click(function(){
				window.location="php/accion_muestreo.php?rechazar=<?php echo $_GET["id_pedido"] ?>";
			});

			$("#entregar").click(function(){
				var factura=$("#factura").val()
				window.location="php/accion_muestreo.php?entregado=<?php echo $_GET["id_pedido"] ?>&factura="+factura;
			});

			$("#imprimir").click(function(){
				window.print();
			})

	</script>
	</body>
</html>
