<?php
session_start();
include('connect.php');
include('config.php');
include('functions.php');
include('scripts/time_stamp.php');
//254 Caracteres entran en la caja de contenido previo al post
$tstitle = $config['name_c'].' | '.$config['lema_c'];
$tsdesc = '';
$tskeywords = '';
$tsurl = $config['url_c'];
$tsimg = $tsurl.'/i/bb.png';

$noRegistros = 7; //Registros por página
if($_GET["p"]){ $pagina = $_GET["p"]; }else{ $pagina = 1; }
//obtener los posts
$uaieughj = mysql_query("SELECT * FROM wposts ORDER BY id_post DESC LIMIT ".($pagina-1)*$noRegistros.",".$noRegistros."");
?>
<?php
include('header.php');
?>

<div class="contentvip" id="contentmedia">

<div class="leftch">

<div class="openentradas">
<?php
 while($p = mysql_fetch_array($uaieughj)){ 
 //Obtener Nombre de el usuario o mas contenido
 $ueoibl = mysql_query("SELECT * FROM admins WHERE id_u='".$p['id_usuario']."'");
 $u = mysql_fetch_array($ueoibl);
 //Obtener informacion sobre la categoria
 $ewnfiauehca = mysql_query("SELECT * FROM categorias WHERE id_ct='".$p['cat_post']."'");
 $c = mysql_fetch_array($ewnfiauehca);
 //Obtener Numero de comentarios
 $jiaeufnhsecoco = mysql_query("SELECT * FROM coments WHERE post_co='".$p['id_post']."'");
$comesuei = mysql_num_rows($jiaeufnhsecoco);
?>
<!--- VERSION DE ENTRADAS --->
<div class="enpost" style="display: inline-block; border-bottom: 1px solid #eee; padding: 15px 0;">
<!--- banner --->
<div id="img"><a href=""><img src="<?=$p['b_post']?>" style="width: 100%; height: 220px; border: 4px solid #eee;" /></a></div>
<!-- Contenido -->
<div id="contposts" style="float: left; width: 70%; margin-left: 15px;">
<!--- Titulo --->
<div id="titlepost" style="background: #fff; padding: 0;"><a href="<?=$config['url_c']?>noticia/<?=$p['seo_post']?>.html" style="font-family: Oswald; font-size: 24px; line-height: 30px; color: #333;"><?=wrecorte($p['title_post'], 50)?></a></div>
<!-- Info -->
<div class="conteiuwewlh" style="width: 100%; float: none; display: inline-block; margin-bottom: 25px;overflow: hidden;"> 
<!-- Vista previa del post -->
<div id="wrecorteopenh" style="margin-top: 15px;">
<span class="catopencheo" style="background: #ff5a00;"><a target="_blank" href="<?=$config['url_c']?>categoria/<?=$c['seo_ct']?>"><?=$c['name_ct']?></a></span>
<span><?=wrecorte(BBcode($p['cont_post']), 450)?></span>
</div>
</div>

<!-- Seccion Informacion -->
<div style="width: 100%; display: inline-block;">
<span style="float: left; color: #999; font-family: Open sans; font-size: 12px;">Publicado por @Andy &middot; hace 15 minutos</span>
<span id="cantidad-comentarios" style="float: right; color: #999; font-family: Open sans; font-size: 12px;"><?=$comesuei?> comentarios</span>
</div>

</div>

</div>
<!---- FIN: VERSION DE ENTRADAS ----->
<?php } ?>
</div>

<?php
//Imprimiendo páginas
$sSQL = "SELECT count(*) FROM wposts"; //Cuento el total de registros
$result = mysql_query($sSQL);
$row = mysql_fetch_array($result);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable
 
echo "<hr>Total registros: ".$totalRegistros.", Pagina: ";
 
$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de páginas
for($i=1; $i<$noPaginas+1; $i++) { //Imprimo las páginas
    if($i == $pagina)
        echo "$i "; //A la página actual no le pongo link
    else
        echo "<a href=\"?p=".$i."\">".$i."</a> ";
}
?>

</div>

<div class="rightch" id="right-none">
<?php
include('right.php');
?>
</div>

</div>

</div>

<!-- FOOTER -->
<?php include('footer.php') ?>
<!-- FOOTER --> 

</body>
</html>