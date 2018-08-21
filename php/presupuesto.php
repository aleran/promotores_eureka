<?php
	 	require_once("../php/aut.php");
		include("../conexion/bdd.php");

		
		foreach ($_POST["tasa"] as $tasas => $tasa) {

			

				foreach ($_POST["libro"] as $libros => $libro) {

					$sql_e = "INSERT INTO presupuestos(id_periodo,id_colegio, id_libro, tasa_compra,descuento) values ('".$_POST["periodo"]."','".$_POST["id_colegio"]."','".$libro."', '".$tasa."', '1')";

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
				}
			
		}


?>