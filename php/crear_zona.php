<?php
	include("../conexion/bdd.php");
	do {
	    $caracteres = "1234567890"; //posibles caracteres a usar
	    $numerodeletras=8; //numero de letras para generar el texto
	    $cod_zona =""; //variable para almacenar la cadena generada
	    for($i=0;$i<$numerodeletras;$i++)
	    {
	       $cod_zona .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	    }
	    $sql = "SELECT codigo FROM zonas";

		$req = $bdd->prepare($sql);
		$req->execute();
		$codigos = $req->fetchAll();

	    foreach($codigos as $codigo) {
			if ($cod_zona !="") {
				if (($codigo["codigo"]==$cod_zona)) $cod_zona="";
			}
		}
	   
	} while ($cod_zona=="");
	

		$sql_z = "INSERT INTO zonas(codigo,zona) values ($cod_zona,'".$_POST["zona"]."')";
		
		//echo $sql_z;
		
		$query_z = $bdd->prepare( $sql_z );
		if ($query_z == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth_z = $query_z->execute();
		if ($sth_z == false) {
		 print_r($query_z->errorInfo());
		 die ('Erreur execute');
		}


		$sql_z = "UPDATE usuarios SET cod_zona='".$cod_zona."' WHERE id='".$_POST["promo"]."'";
		
		//echo $sql_z;
		
		$query_z = $bdd->prepare( $sql_z );
		if ($query_z == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth_z = $query_z->execute();
		if ($sth_z == false) {
		 print_r($query_z->errorInfo());
		 die ('Erreur execute');
		}

?>
<script>alert('Zona creada correctamente');window.location="../agregar_zonas.php";</script>;