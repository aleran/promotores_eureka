<div id="sidebar" class="sidebar                  responsive                    ace-save-state sidebar-fixed sidebar-scroll">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				

				<ul class="nav nav-list">
					<li class="inicio">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<!--<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								UI &amp; Elements
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Layouts
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="top-menu.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Top Menu
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-1.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Two Menus 1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-2.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Two Menus 2
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="mobile-menu-1.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Default Mobile Menu
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="mobile-menu-2.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Mobile Menu 2
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="mobile-menu-3.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Mobile Menu 3
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<li class="">
								<a href="typography.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Typography
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Elements
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buttons.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Buttons &amp; Icons
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="content-slider.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Content Sliders
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="treeview.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Treeview
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jquery-ui.html">
									<i class="menu-icon fa fa-caret-right"></i>
									jQuery UI
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="nestable-list.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Nestable Lists
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Three Level Menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-leaf green"></i>
											Item #1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											4th level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Product
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-eye pink"></i>
													View Products
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Tables </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="tables.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Simple &amp; Dynamic
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									jqGrid plugin
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>-->
					<?php if ( ($_SESSION["tipo"] ==1) ) {?>
					<li class="abrir_periodos">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-time"></i>
							<span class="menu-text"> Periodos </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="crear_periodo">
								<a href="crear_periodo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Crear periodo
								</a>

								<b class="arrow"></b>
							</li>

							<li class="ver_periodos">
								<a href="ver_periodos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Ver Periodos
									
								</a>

								<b class="arrow"></b>
							</li>

							<!--<li class="">
								<a href="form-wizard.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Wizard &amp; Validation
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="wysiwyg.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Wysiwyg &amp; Markdown
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Dropzone File Upload
								</a>

								<b class="arrow"></b>
							</li>-->
						</ul>
						<li class="libros">
								<a href="libros.php">
									<i class="menu-icon fa fa-book"></i>

									<span class="menu-text">
										Libros

									</span>
								</a>

								<b class="arrow"></b>
							</li>
					</li>
					<?php } ?>
					<?php if ( ($_SESSION["tipo"] ==1 || $_SESSION["tipo"] ==2) ) {?>
					<li class="abrir_zonas">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-road"></i>
							<span class="menu-text"> Zonas </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="agregar_zona">
								<a href="agregar_zonas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Agregar Zonas
								</a>

								<b class="arrow"></b>
							</li>

							<li class="ver_zonas">
								<a href="ver_zonas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Ver Zonas
									
								</a>

								<b class="arrow"></b>
							</li>

							<!--<li class="">
								<a href="form-wizard.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Wizard &amp; Validation
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="wysiwyg.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Wysiwyg &amp; Markdown
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Dropzone File Upload
								</a>

								<b class="arrow"></b>
							</li>-->
						</ul>
					</li>
					<?php } ?>
					<?php if ( ($_SESSION["tipo"] !=2) ) {?>
					<li class="abrir_colegios">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-home"></i>
							<span class="menu-text"> Colegios </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="agregar_colegio">
								<a href="agregar_colegio.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Agregar Colegios
								</a>

								<b class="arrow"></b>
							</li>

							<li class="ver_colegios">
								<a href="ver_colegios.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Ver colegios
									
								</a>

								<b class="arrow"></b>
							</li>

							<!--<li class="">
								<a href="form-wizard.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Wizard &amp; Validation
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="wysiwyg.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Wysiwyg &amp; Markdown
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="dropzone.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Dropzone File Upload
								</a>

								<b class="arrow"></b>
							</li>-->
						</ul>
					</li>
					<?php } ?>

					<!--<li class="">
						<a href="widgets.html">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Widgets </span>
						</a>

						<b class="arrow"></b>
					</li>-->
					<?php if ( ($_SESSION["tipo"] !=2) ) {?>
					<li class="plan_trabajo">
						<a href="calendar.php">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Plan de trabajo

							</span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php } ?>
					<li class="abrir_pedidos">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-exchange"></i>
							<span class="menu-text"> Pedidos </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php if ($_SESSION["tipo"]==3) {?>
							<li class="solicitar_pedido">

								<a href="periodo_pedidos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Solicitar pedido
								</a>

								<b class="arrow"></b>
							</li>

							<li class="ver_pedidos">
								
								<a href="ver_pedidos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Ver pedidos
								</a>
							
							
								<b class="arrow"></b>
							
							</li>
						<?php  }else{?>
							<li class="lista_pedidos">
								
								<a href="lista_pedidos.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Pendientes
								</a>

								<b class="arrow"></b>
							</li>
							<li class="pedidos_aprobados">
								
								<a href="pedidos_aprobados.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Aprobados
								</a>

								<b class="arrow"></b>
							</li>
							<li class="pedidos_entregados">
								
								<a href="pedidos_entregados.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Entregados
								</a>

								<b class="arrow"></b>
							</li>
							<li class="pedidos_anulados">
								
								<a href="pedidos_anulados.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Anulados
								</a>

								<b class="arrow"></b>
							</li>
						<?php } ?>
							
							

						</ul>
					</li>
					<li class="abrir_reportes">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder"></i>
							<span class="menu-text"> Reportes </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="cubrimiento">
								<?php if ($_SESSION["tipo"]==3) {?>
								<a href="reporte_cubrimiento2.php">
								<?php }else{ ?>
								<a href="reporte_cubrimiento.php">
								<?php } ?>
									<i class="menu-icon fa fa-caret-right"></i>
									Cubrimiento
								</a>

								<b class="arrow"></b>
							</li>
							<?php if ($_SESSION["tipo"]==3) {?>
							<li class="presupuesto_p">
								<a href="reporte_presupuesto_promotor.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Presupuesto Zona
								</a>
							</li>
							<?php } ?>
							<?php if ($_SESSION["tipo"]!=3) {?>
							<li class="profesores">
								<a href="reporte_trabajadores.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Directorio
								</a>

								<b class="arrow"></b>
							</li>

							<li class="profesores2">
								<a href="reporte_profesores.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Profesores
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="visitas">
								<a href="reporte_visitas.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Visitas global
									
								</a>

								<b class="arrow"></b>
							</li>
							<li class="visitas_semanal">
								<a href="reporte_visitas_semanal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Visitas semanal
									
								</a>

								<b class="arrow"></b>
							</li>

							<li class="presupuesto">
								<a href="reporte_presupuesto.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Presupuestos
									
								</a>

								<b class="arrow"></b>
							</li>
							<!--<li class="trabajadores">
								<a href="reporte_trabajadores.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Trabajadores
								</a>

								<b class="arrow"></b>
							</li>-->
							<?php } ?>
							<li class="adopciones">
								<a href="reporte_adopcion.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Adopciones
									
								</a>

								<b class="arrow"></b>
							</li>
						</li>
					</ul>
					<?php if ( ($_SESSION["tipo"] ==1 || $_SESSION["tipo"] ==2) ) {?>
							<li class="usuarios">
								<a href="usuarios.php">
									<i class="menu-icon fa fa-users"></i>

									<span class="menu-text">
										Usuarios

									</span>
								</a>

								<b class="arrow"></b>
							</li>
						<?php } ?>



				
				</ul><!-- /.nav-list -->


				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>