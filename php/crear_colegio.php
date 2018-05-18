<?php
	if (isset($_POST["colegio"])) {
	 	require_once("../php/aut.php");
		include("../conexion/bdd.php");

		do {
	    $caracteres = "1234567890"; //posibles caracteres a usar
	    $numerodeletras=8; //numero de letras para generar el texto
	    $cod_colegio ="1-".""; //variable para almacenar la cadena generada
	    for($i=0;$i<$numerodeletras;$i++)
	    {
	       $cod_colegio .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	    }
	    $sql = "SELECT codigo FROM colegios";

		$req = $bdd->prepare($sql);
		$req->execute();
		$codigos = $req->fetchAll();

	    foreach($codigos as $codigo) {
			if ($cod_colegio !="") {
				if (($codigo["codigo"]==$cod_colegio)) $cod_colegio="";
			}
		}
	   
	} while ($cod_colegio=="");

		$sql = "INSERT INTO colegios(colegio,codigo,direccion,barrio,telefono,web,cumpleaños,id_usuario,cod_zona) VALUES('".$_POST["colegio"]."', '".$cod_colegio."', '".$_POST["direccion"]."', '".$_POST["barrio"]."', '".$_POST["telefono"]."', '".$_POST["web"]."', '".$_POST["cumple_colegio"]."','".$_SESSION['id']."','".$_POST["cod_zona"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}
?>
<script>alert('Colegio creado correctamente');window.location="../colegio.php?codigo=<?php echo $cod_colegio;?>";
</script>;