<!-- LO MAS LEIDO -->
<div style="display: inline-block; width: 100%; margin-bottom: 25px;">

<div style="font-family: Oswald; color: #333; font-size: 14px;">
<span>LO MAS LEIDO</span>
</div>

<div class="contgg" style="margin-top: 5px;">
<?php
$ppoularg = mysql_query("SELECT * FROM wposts ORDER BY rand() DESC LIMIT 5");
while($pp = mysql_fetch_assoc($ppoularg)){

 //Obtener Nombre de el usuario o mas contenido
 $ueoibl = mysql_query("SELECT * FROM admins WHERE id_u='".$pp['id_usuario']."'");
 $u = mysql_fetch_array($ueoibl);
 //Obtener informacion sobre la categoria
 $ewnfiauehca = mysql_query("SELECT * FROM categorias WHERE id_ct='".$pp['cat_post']."'");
 $c = mysql_fetch_array($ewnfiauehca);
 //Obtener Numero de comentarios
 $jiaeufnhsecoco = mysql_query("SELECT * FROM coments WHERE post_co='".$pp['id_post']."'");
$comesuei = mysql_num_rows($jiaeufnhsecoco);
?>
<!--- VERSION DE ENTRADAS --->
<div class="enpost">
<!--- Titulo --->
<div style="display: inline-block; width: 100%; font-family: Open sans; padding: 7px 0;">
<img src="http://s1.wp.com/wp-content/themes/premium/modern-news/images/list.png" style="float: left;" />
<a href="<?=$config['url_c']?>noticia/<?=$pp['seo_post']?>.html" style="float: left; width: 95%; color: #0094d2; text-decoration: none; font-size: 12px;"><?=wrecorte($pp['title_post'], 50)?></a>
</div>
</div>
<!---- FIN: VERSION DE ENTRADAS ----->
<?php
}
?>
</div>

</div>

<!-- ULTIMOS COMENTARIOS -->
<div style="display: inline-block; width: 100%; margin-bottom: 25px;">

<div style="font-family: Oswald; color: #333; font-size: 14px;">
<span>ULTIMOS COMENTARIOS</span>
</div>
<?php 
$commquery = mysql_query("SELECT * FROM coments LIMIT 8");
while($c = mysql_fetch_assoc($commquery)){
$u  = mysql_fetch_assoc(mysql_query("SELECT * FROM admins WHERE id_u='".$c['u_co']."'"));
 ?>
<div style="display: inline-block; width: 100%; font-family: Open sans; padding: 7px 0;">
<a style="float: left; color: #0094d2; text-decoration: none; font-size: 12px;"><?=$u['name_u']?></a><img src="http://s1.wp.com/wp-content/themes/premium/modern-news/images/list.png" style="float: left;" />
<a style="float: left; width: 88%; color: #0094d2; text-decoration: none; font-size: 12px;"><?=wrecorte($c['con_co'], 140)?></a>
</div>
<?php
}
?>
</div>

<!-- PUBLICIDAD -->
<div style="display: inline-block; width: 100%;">

<div style="font-family: Oswald; color: #333; font-size: 14px;">
<span>Publicidad</span>
</div>

</div>