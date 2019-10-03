<?php
session_start();
  
  date_default_timezone_set('America/Bogota');

    if ($_SESSION["autentificado"] != "SI") {
      //si no está logueado lo envío a la página de autentificación
      header("location:./login.html");
    }
    else {
      //sino, calculamos el tiempo transcurrido
      $fechaGuardada = $_SESSION["ultimoAcceso"];
      $ahora = date("Y-n-j H:i:s");
      $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
          //comparamos el tiempo transcurrido
  
        if($tiempo_transcurrido >= 1800) {
          //si pasaron 30  minutos o más
          session_destroy(); // destruyo la sesión
          echo "<script>alert('Su sesión a caducado por inactividad');window.location='login.html';</script>";
          //header("Location: login.php"); //envío al usuario a la pag. de autenticación
          //sino, actualizo la fecha de la sesión
        }
        else {
          $_SESSION["ultimoAcceso"] = $ahora;
        }
     
          
    }

?>