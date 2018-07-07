<?php
  
    if ($_SESSION["tipo"] !=1) {
      //si no está logueado lo envío a la página de autentificación
      header("location:./index.php");
    }

?>