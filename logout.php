<?php
    session_start();
    include('connect.php');
    include('config.php');
    // comprobamos que se haya iniciado la sesi¢n
    if(isset($_SESSION['id_u'])) {
	$id = $_SESSION['id_u'];
   $envio = mysql_query("update admins set on_u='0' where id_u='".$id."'");
        session_destroy();
        header("Location: index.php");
    }else {
       ?>
	   <META HTTP-EQUIV="Refresh" CONTENT="1; URL=<?=$config['url_c']?>/index.php">
	   <?php
    }
?>