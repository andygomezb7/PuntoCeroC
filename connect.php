<?php
    $host_db = "localhost"; // Host de la BD
    $usuario_db = "andyesau_plus"; // Usuario de la BD
    $clave_db = "fansclubane"; // Contraseña de la BD
    $nombre_db = "andyesau_plusw"; // Nombre de la BD
    
    //conectamos y seleccionamos db
 $link =  mysql_connect($host_db, $usuario_db, $clave_db);
           mysql_select_db($nombre_db);
?>