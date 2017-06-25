<?php
session_start();
include('connect.php');
include('config.php');
include('functions.php');
include('scripts/time_stamp.php');

$naeu = $_GET['c'];
$eiofuhlkjact = mysql_query("SELECT * FROM categorias WHERE seo_ct='".$naeu."'");
$niueuh = mysql_num_rows($eiofuhlkjact);
$cat = mysql_fetch_array($eiofuhlkjact);

$tstitle = $cat['name_ct'].' | '.$config['name_c'];
$tsdesc = '';
$tskeywords = '';
$tsurl = $config['url_c'];
$tsimg = $tsurl.'/i/bb.png';

//obtener los posts
$uaieughj = mysql_query("SELECT * FROM wposts WHERE cat_post='".$cat['id_ct']."' ORDER BY id_post DESC");

?>
<?php
include('header.php');
?>

<div class="contentvip" style="margin: 25px auto; width: 75%;">
<?php if($niueuh > 0){ ?>
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
<div id="imgpostb" style="float: left; width: 26%;"><a href=""><img src="<?=$p['b_post']?>" style="width: 100%; height: 220px; border: 4px solid #eee;" /></a></div>
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
<span style="float: right; color: #999; font-family: Open sans; font-size: 12px;"><?=$comesuei?> comentarios</span>
</div>

</div>

</div>
<!---- FIN: VERSION DE ENTRADAS ----->
<?php } ?>
</div>

</div>

<div class="rightch">

<?php include('right.php'); ?>

</div>

<?php }else{ ?>
<div style="padding: 50px 0 36%; text-align: center;"><h1 style="text-align: center;">La Categoría No Existe.</h1></div>
<?php } ?>
</div>

<?php include('footer.php'); ?>

</div>

</body>
</html>