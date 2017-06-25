<?php
include('connect.php');
include('config.php');
include('scripts/time_stamp.php');	
include('functions.php');

	/* HACEMOS LA CONSULTA */
	$sql = "SELECT * FROM wposts LIMIT 15";
	$query = mysql_query($sql);

	/*++++++++++++++++++++++++++++++++++ */
	function size_text($string,$length=80){
	$string = str_replace('?', '', $cadena);
		$total = strlen($string);
		if($total > $length){
			return substr($string, 0, $length)."...";
		}
		else{
			return $string;
		}
	}
	echo '<?xml version="1.0"?>';
?>
<rss version="2.0"> 
	<channel>
		<title><?=$config['name_c']?> - Ultimas noticias</title>
		<description>Ultimas noticias en <?=$config['name_c']?></description>
		<image>
			<title><?=$config['name_c']?></title>
			<link><?=$config['url_c']?></link>

			<url><?=$config['url_c']?>i/source.png</url>
		</image>
		<generator><?php echo $config['url_c'];?></generator>
		<language>es</language>
		<link><?=$config['url_c']?></link>
<?php while($rss = mysql_fetch_array($query)){
	//Obtener Info de la categoria
$fjnaecaroid = mysql_query("SELECT * FROM categorias WHERE id_ct='".$rss['cat_post']."'");
$cat = mysql_fetch_array($fjnaecaroid);

//Obtener Info de usuario
$naoeuhlk = mysql_query("SELECT * FROM admins WHERE id_u='".$rss['id_usuario']."'");
$usu = mysql_fetch_array($naoeuhlk);
 ?>
		<item>
			<title><?php echo $rss['title_post'];?></title>
			<link><?php echo $config['url_c'];?>/noticia/<?php echo $rss['seo_post'];?>.html</link>
			<pubDate><?php echo strftime("%a, %d %b %Y %H:%M:%S",$rss['fecha_post']);?> -0300</pubDate>
			<category><![CDATA[<?php echo $cat['seo_ct'];?>]]></category>
			<comments><?php echo $config['url_c'];?>/noticia/<?php echo $rss['seo_post'];?>.html#comments</comments>
			<description><![CDATA[<?php echo size_text(BBcode($rss['cont_post']),'650');?><p><strong><a href='<?php echo $config['url_c'];?>/noticia/<?php echo $rss['seo_post'];?>.html'>Seguir leyendo... >></a></strong></p>]]></description>
		</item>
<?php } ?>
	</channel>
</rss>