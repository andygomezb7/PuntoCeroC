<?php
session_start();
include('../connect.php');
include('../config.php');

//veo si esta el GET
$i = $_GET['p'];
$naioeuh = mysql_query("SELECT * FROM wposts WHERE id_post='".$i."'");
$pp = mysql_fetch_array($naioeuh);

$msg = (nl2br(htmlspecialchars($_POST['msg'])));

//Si no esta vacia
if(!empty($msg)){

//Defino las variables
$u = $_SESSION['id_u'];
$f = date("d/m/Y H:i:s");
$h = time();
$ppo = $pp['id_post'];

   //Inserto el mensaje al tabla
   mysql_query("INSERT INTO coments (u_co, con_co, f_co, h_co, post_co, activo_co) VALUES ('".$u."', '".$msg."', '".$f."', '".$h."', '".$ppo."', '1')");
}
?>