<?php 
	require_once('../conexion/bdd.php');
	
		$sql_periodo="SELECT id FROM periodos WHERE id='".$_POST["periodo"]."'";


		$req_periodo = $bdd->prepare($sql_periodo);
		$req_periodo->execute();
		$gp_periodo = $req_periodo->fetch();

		$libs_2=[];
		foreach ($_POST["libs_aod"] as $libros => $libro) {

			list($materia,$grado,$lib) = explode("/", $libro);


			$sql_p="INSERT INTO areas_objetivas(id_periodo,id_colegio,id_materia,id_grado,id_libro_eureka,definicion) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."', '".$materia."', '".$grado."', '".$lib."','1')";

			$query_p = $bdd->prepare( $sql_p );
			if ($query_p == false) {
			 print_r($bdd->errorInfo());
			 die ('Erreur prepare');
			}
			$sth_p = $query_p->execute();
			if ($sth_p == false) {
			 print_r($query_p->errorInfo());
			 die ('Erreur execute');
			}
		

			if ($grado > 14 ) {
				$sq_l2 = "SELECT id FROM libros WHERE pri_sec='".$lib."'";
															
				$req_l2 = $bdd->prepare($sq_l2);
				$req_l2->execute();
				$libros2 = $req_l2->fetchAll();

				foreach ($libros2 as $libro2) {

					$libs_2[]=$libro2["id"];
					

				}

			}else {

				$sql_e = "INSERT INTO presupuestos(id_periodo,id_colegio, id_libro, precio, tasa_compra_d,descuento_d,aprobado,pre_definido) values ('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','".$lib."','0', '0', '0.20','0','1')";

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

		if(!empty($libs_2)) {

			$libs_2=array_unique($libs_2);

			foreach ($libs_2 as $lib2) {

				$sql_e = "INSERT INTO presupuestos(id_periodo,id_colegio, id_libro, precio, tasa_compra_d,descuento_d,aprobado,pre_definido) values ('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','".$lib2."','0', '0', '0.20','0','1')";

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
		


		

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'&periodo='.$_POST["periodo"].'');
	
?>