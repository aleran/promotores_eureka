<?php
	require_once("../php/aut.php");
	include("../conexion/bdd.php");



	foreach ($_POST["presupuesto"] as $presups => $presup) {

		list($libro,$tasa_c,$descuento,$precio) = explode("/", $presup);
		
		$sql_cod = "SELECT p.id_libro, g.id_grado FROM presupuestos p JOIN libros g ON g.id=p.id_libro WHERE p.cod_area='".$libro."'";
		$req_cod = $bdd->prepare($sql_cod);
		$req_cod->execute();

		$row_cod = $req_cod->fetch();
		
		if ($row_cod["id_grado"] != 17) {

		$sql_e = "UPDATE presupuestos SET precio='".$precio."', tasa_compra='".$tasa_c."', descuento='".$descuento."', fecha='".date("Y-m-d")."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND (id_libro='".$libro."' OR cod_area='".$libro."')";


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
			echo "<br>".$descuento;
		}else{

			if ($libro !="") {
				$sql_e = "UPDATE presupuestos SET precio='".$precio."', tasa_compra='".$tasa_c."', descuento='".$descuento."', fecha='".date("Y-m-d")."' WHERE id_periodo='".$_POST["periodo"]."' AND id_colegio='".$_POST["id_colegio"]."' AND cod_area='".$libro."'";

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

				
	}
	header('Location: ../colegio.php?codigo='.$_POST["codigo"].'&periodo='.$_POST["periodo"].'');


?>