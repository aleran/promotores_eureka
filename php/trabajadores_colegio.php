<?php
	include("../conexion/bdd.php");

	if (isset($_POST["nombre"])) {

		do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=10; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

		$sql = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre,telefono,email,cumpleaños) VALUES('".$cod_profesor."','".$_POST["id_colegio"]."', '1', '".$_POST["nombre"]."', '".$_POST["celular"]."', '".$_POST["email"]."', '".$_POST["cumpleaños"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre1"])) {

		do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=8; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

		$sql = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre,telefono,email,cumpleaños) VALUES('".$cod_profesor."','".$_POST["id_colegio"]."', '2', '".$_POST["nombre1"]."', '".$_POST["celular1"]."', '".$_POST["email1"]."', '".$_POST["cumpleaños1"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}
	if (isset($_POST["nombre2"])) {

		do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=8; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

		$sql = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre,telefono,email,cumpleaños) VALUES('".$cod_profesor."','".$_POST["id_colegio"]."', '3', '".$_POST["nombre2"]."', '".$_POST["celular2"]."', '".$_POST["email2"]."', '".$_POST["cumpleaños2"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre3"])) {

		do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=8; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

		$sql = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$cod_profesor."','".$_POST["id_colegio"]."', '5', '".$_POST["nombre4"]."', '3', '".$_POST["celular3"]."', '".$_POST["email3"]."', '".$_POST["cumpleaños3"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre4"])) {

		do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=8; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

		$sql = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$cod_profesor."','".$_POST["id_colegio"]."', '5', '".$_POST["nombre4"]."', '2', '".$_POST["celular4"]."', '".$_POST["email4"]."', '".$_POST["cumpleaños4"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre5"])) {

		do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=8; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

		$sql = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$cod_profesor."','".$_POST["id_colegio"]."', '5', '".$_POST["nombre5"]."', '6', '".$_POST["celular5"]."', '".$_POST["email5"]."', '".$_POST["cumpleaños5"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	if (isset($_POST["nombre6"])) {

		do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=8; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

		$sql = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre,area,telefono,email,cumpleaños) VALUES('".$cod_profesor."','".$_POST["id_colegio"]."', '5', '".$_POST["nombre6"]."', '7', '".$_POST["celular6"]."', '".$_POST["email6"]."', '".$_POST["cumpleaños6"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'');
?>