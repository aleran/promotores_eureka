<?php
	
		include("../conexion/bdd.php");

		$sql = "UPDATE zonas SET zona='".$_POST["zona"]."' WHERE id='".$_POST["id_zona"]."'";


			$query = $bdd->prepare( $sql );
				if ($query == false) {
				 print_r($bdd->errorInfo());
				 die ('Erreur prepare');
				}
				$sth = $query->execute();
				if ($sth == false) {
				 print_r($query->errorInfo());
				 die ('Erreur execute');
				}
		
		if ($_POST["promo"] !="") {

			$sql = "UPDATE usuarios SET cod_zona='".$_POST["cod_zona"]."' WHERE id='".$_POST["promo"]."'";


			$query = $bdd->prepare( $sql );
				if ($query == false) {
				 print_r($bdd->errorInfo());
				 die ('Erreur prepare');
				}
				$sth = $query->execute();
				if ($sth == false) {
				 print_r($query->errorInfo());
				 die ('Erreur execute');
				}
		}



		$sql = "SELECT id, cod_zona FROM colegios WHERE cod_zona='".$_POST["cod_zona"]."'";

			$req = $bdd->prepare($sql);
			$req->execute();

			$colegios = $req->fetchAll();

			
			foreach($colegios as $cole) {
				if (!in_array($cole, $_POST["colegios"])) {
    			
				if ($_POST["cod_zona"]==$cole["cod_zona"]) {
					$sql = "UPDATE colegios SET cod_zona='' WHERE id='".$cole["id"]."'";

					$query = $bdd->prepare( $sql );
					if ($query == false) {
					 print_r($bdd->errorInfo());
					 die ('Erreur prepare');
					}
					$sth = $query->execute();
					if ($sth == false) {
					 print_r($query->errorInfo());
					 die ('Erreur execute');
					}
					//echo "entro";
				}
					
				}
			}

		foreach ($_POST["colegios"] as $colegio => $valor) {

			

			echo $valor;
			$sql = "UPDATE colegios SET cod_zona='".$_POST["cod_zona"]."' WHERE id='".$valor."'";


			$req = $bdd->prepare($sql);
			$req->execute();

				
			}
			
			

		


?>
<script>alert('Datos actualizados correctamente');window.location="../ver_zonas.php";</script>;