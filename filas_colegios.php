<?php 
	require_once("php/aut.php");
	include("conexion/bdd.php");
	
	$sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='12345678' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

  $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='87654321' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

   $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='03736282' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

  $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='83028202' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

  $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='02038200' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

   $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='4589030' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

  $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='5891825' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

  $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='973030' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

  $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3' AND z.codigo='4063980' AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila_zona='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }

  $sql = "SELECT l.id as idlibro, p.id_colegio,p.fila,p.columna, l.id_grado,l.id_materia, p.precio, p.tasa_compra, p.descuento,p.tasa_compra_d,p.descuento_d,p.tasa_compra_d,p.descuento_d, c.colegio FROM presupuestos p JOIN libros l ON p.id_libro=l.id JOIN colegios c ON p.id_colegio=c.id JOIN zonas z ON z.codigo=c.cod_zona JOIN usuarios u ON u.cod_zona=z.codigo WHERE p.id_periodo='3'  AND (p.aprobado=1 OR p.definido=1) GROUP BY c.id";

	$req = $bdd->prepare($sql);
	$req->execute();
	$presupuestos = $req->fetchAll();

	$fila=2;
  
  foreach($presupuestos as $presupuesto) {

  	$sql_e="UPDATE presupuestos SET fila='".$fila."' WHERE id_colegio='".$presupuesto["id_colegio"]."' AND id_periodo='3' AND (aprobado=1 OR definido=1)";

  	$query_e = $bdd->prepare( $sql_e );
		if ($query_e == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_e = $query_e->execute();
		if ($sth_e == false) {
			print_r($query_e->errorInfo());
			die ('Erreur execute');
		}

  	$fila++;

  }
?>