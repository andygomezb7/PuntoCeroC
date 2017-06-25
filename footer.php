<?php
//254 Caracteres entran en la caja de contenido previo al post
$tstitle = $config['name_c'].' | '.$config['lema_c'];
$tsdesc = '';
$tskeywords = '';
$tsurl = $config['url_c'];
$tsimg = $tsurl.'/i/bb.png';

//obtener los posts
$uaieughj = mysql_query("SELECT * FROM wposts ORDER BY id_post DESC LIMIT 10");
?>

<!-- MOSTRAMOS Y SACAMOS EL FOOTER DEPENDIENDO LA PANTALLA -->
<div id="footer-ubicacion">
<!-- MOSTRAMOS Y SACAMOS EL FOOTER DEPENDIENDO LA PANTALLA -->

<!-- FOOTER -->
<div id="footer">
<!-- FOOTER -->

<!-- CONTENT -->
<div id="contentmedia" style="margin-top: 0px;">
<!-- CONTENT -->

<!-- ULTIMAS NOTICIAS -->
<div id="footer-noticias">
<div>ULTIMAS NOTICIAS</div>
<ul class="noticias">
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
<li><a href="<?=$config['url_c']?>noticia/<?=$p['seo_post']?>.html"><img src="http://s1.wp.com/wp-content/themes/premium/modern-news/images/list.png" style="float: left;"><?=wrecorte($p['title_post'], 50)?></a></li>
<!---- FIN: VERSION DE ENTRADAS ----->
<?php } ?>
</ul>
</div>
<!-- ULTIMAS NOTICIAS -->

<!-- DESGIN BY BLEE -->
<a href="http://blee-design.com" target="_blank"><img src="../images/footer.png" style="float: left; margin-top: -1px;" /></a>
<!-- DESIGN BY BLEE -->

<!-- ULTIMOS COMENTARIOS -->
<div id="footer-comentarios">
<div>ULTIMOS COMENTARIOS</div>
<ul class="comentarios">
<?php 
$commquery = mysql_query("SELECT * FROM coments LIMIT 8");
while($c = mysql_fetch_assoc($commquery)){
$u  = mysql_fetch_assoc(mysql_query("SELECT * FROM admins WHERE id_u='".$c['u_co']."'"));
 ?>
<li>
<a style="float: left;"><?=$u['name_u']?></a> <img src="http://s1.wp.com/wp-content/themes/premium/modern-news/images/list.png" style="float: left;">
<a style="float: left;"><?=wrecorte($c['con_co'], 140)?></a>
</li>
<?php
}
?>
</ul>
</div>
<!-- ULTIMOS COMENTARIOS -->

<!-- FIN CONTENT -->
</div>
<!-- FIN CONTENT -->

<!-- FIN FOOTER -->
</div>
<!-- FIN FOOTER -->

<!-- TERMINAMOS DE MOSTRAR Y SACAR EL FOOTER DEPENDIENDO LA PANTALLA -->
</div>
<!-- TERMINAMOS DE MOSTRAR Y SACAR EL FOOTER DEPENDIENDO LA PANTALLA -->

<!-- BOTTOM -->
<div id="bottom">
<div id="contentmedia" style="margin: 0 auto;">
<span style="float: left;">Puntoceroc &copy; 2014</span>
<span style="float: right;">Todos los derechos reservados</span>
</div>
</div>
<!-- BOTTOM -->

<!-- BOTTOM 2 -->
<div id="bottom2">
<div id="contentmedia" style="margin: 0 auto;">
<span style="float: left;">Puntoceroc &copy; 2014</span>
<span style="float: right;">Design by blee</span>
</div>
</div>
<!-- BOTTOM -->

<!-------- CONT OFICIAL FIN ------>
</div>