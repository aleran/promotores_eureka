<?php
	 	require_once("../php/aut.php");
		include("../conexion/bdd.php");


		$sql_eliminar="DELETE  FROM areas_objetivas WHERE id_libro_eureka='".$_GET["id_libro"]."' AND id_colegio='".$_GET["id_colegio"]."' AND id_periodo='".$_GET["periodo"]."'";

		$req_eliminar = $bdd->prepare($sql_eliminar);
		$req_eliminar->execute();


		$sql = "SELECT id_grado FROM libros WHERE id='".$_GET["id_libro"]."'";
												
		$req = $bdd->prepare($sql);
		$req->execute();
		$grado = $req->fetch();

		  if ($grado["id_grado"] == 15 || $grado["id_grado"] == 16) {
		  	
		  	$sql_p = "SELECT id FROM libros WHERE pri_sec='".$_GET["id_libro"]."'";
												
			$req_p = $bdd->prepare($sql_p);
			$req_p->execute();
			$pri_sec = $req_p->fetchAll();

			foreach ($pri_sec as $pri) {

				$sql_elim_p="DELETE  FROM presupuestos WHERE id_libro='".$pri["id"]."' AND id_colegio='".$_GET["id_colegio"]."' AND id_periodo='".$_GET["periodo"]."'";

				$req_elim_p = $bdd->prepare($sql_elim_p);
				$req_elim_p->execute();
				
			}

		  }else {

		  		$sql_elim_p="DELETE  FROM presupuestos WHERE id_libro='".$_GET["id_libro"]."' AND id_colegio='".$_GET["id_colegio"]."' AND id_periodo='".$_GET["periodo"]."'";

				$req_elim_p = $bdd->prepare($sql_elim_p);
				$req_elim_p->execute();

		  }
                                                	
		  header('Location: ../colegio.php?codigo='.$_GET["cod_colegio"].'&periodo='.$_GET["periodo"].'');
?>
