<?php 
	include("../conexion/bdd.php");
	
	$sql_p = "UPDATE visitas SET efectiva='".$_POST["efectiva"]."' WHERE id_plan_trabajo='".$_POST["plan_id"]."'";
				
				//echo $sql_z;
				
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

	

	header('Location: ../visita_detallado_semanal.php?planid='.$_POST["plan_id"].'');

?>