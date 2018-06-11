<?php
	require_once('../conexion/bdd.php');
	$pass=$_POST['clave'];
	$pass=md5($pass);
	
	$sql = "SELECT * FROM usuarios WHERE correo='".$_POST["correo"]."'";

	$req = $bdd->prepare($sql);
	$req->execute();
	$num=$req->rowCount();

	if ($num !== 1) echo "<script>alert('Correo no registrado');window.location='../login.html';</script>";

	$usuario = $req->fetch();
		
	if($pass==$usuario['clave']){
			session_start();
	    	// inicio la sesión
	    	$_SESSION["autentificado"]= "SI";
	    	//defino la sesión que demuestra que el usuario está autorizado
	    	$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

			$_SESSION['id']=$usuario['id'];
			$_SESSION['tipo']=$usuario['tipo'];
			$_SESSION['zona']=$usuario['cod_zona'];
			$_SESSION['pais']=$usuario['id_pais'];

			header("location:../index.php");
	}
	else echo "<script>alert('Clave Invalida');window.location='../login.html';</script>";
	mysqli_close($mysqli);
?>