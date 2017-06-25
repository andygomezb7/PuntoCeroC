<?php
session_start();
include('connect.php');
include('config.php');
include('functions.php');
$tstitle = 'Nuevo Post | '.$config['name_c'];
$tsdesc = '';
$tskeywords = '';
$tsurl = $config['url_c'];
$tsimg = $tsurl.'/i/bb.png';

//obtener todas las categorias
$naiegaeulh = mysql_query("SELECT * FROM categorias");
?>
<?php
if(isset($_POST['sbw'])){

function limpiar($cadena){
    $cadena = str_replace(' ', '-', $cadena);
	$cadena = str_replace('ñ', 'n', $cadena);
	$cadena = str_replace('Ñ', 'N', $cadena);
	$cadena = str_replace('Û', 'u', $cadena);
	$cadena = str_replace('û', 'u', $cadena);
	$cadena = str_replace('Ù', 'U', $cadena);
	$cadena = str_replace('ù', 'u', $cadena);
	$cadena = str_replace('Ü', 'u', $cadena);
	$cadena = str_replace('ü', 'u', $cadena);
	$cadena = str_replace('Ú', 'u', $cadena);
	$cadena = str_replace('ú', 'u', $cadena);
	$cadena = str_replace('Ô', 'O', $cadena);	
	$cadena = str_replace('ô', 'o', $cadena);
	$cadena = str_replace('Ò', 'O', $cadena);
	$cadena = str_replace('ò', 'o', $cadena);
	$cadena = str_replace('Ö', 'O', $cadena);
	$cadena = str_replace('ö', 'o', $cadena);
	$cadena = str_replace('Ó', 'O', $cadena);
	$cadena = str_replace('ó', 'o', $cadena);
	$cadena = str_replace('Î', 'I', $cadena);
	$cadena = str_replace('î', 'I', $cadena);
	$cadena = str_replace('Ì', 'I', $cadena);
	$cadena = str_replace('ì', 'i', $cadena);
	$cadena = str_replace('Ï', 'I', $cadena);
	$cadena = str_replace('ï', 'i', $cadena);
	$cadena = str_replace('Í', 'I', $cadena);
	$cadena = str_replace('í', 'i', $cadena);
	$cadena = str_replace('Ê', 'E', $cadena);
	$cadena = str_replace('ê', 'e', $cadena);
	$cadena = str_replace('È', 'E', $cadena);
	$cadena = str_replace('è', 'e', $cadena);
	$cadena = str_replace('Ë', 'E', $cadena);
	$cadena = str_replace('ë', 'e', $cadena);
	$cadena = str_replace('à', 'a', $cadena);
	$cadena = str_replace('É', 'E', $cadena);
	$cadena = str_replace('é', 'e', $cadena);
	$cadena = str_replace('Â', 'A', $cadena);
	$cadena = str_replace('â', 'a', $cadena);
	$cadena = str_replace('À', 'A', $cadena);
	$cadena = str_replace('à', 'a', $cadena);
	$cadena = str_replace('Ä', 'A', $cadena);
	$cadena = str_replace('ä', 'a', $cadena);
	$cadena = str_replace('Á', 'A', $cadena);
	$cadena = str_replace('á', 'a', $cadena);
	$cadena = str_replace('Ç', 'C', $cadena);
	$cadena = str_replace('ç', 'c', $cadena);
    $cadena = str_replace('@', 'a', $cadena);
	$cadena = str_replace('★', 'estrella', $cadena);
	$cadena = str_replace('+', 'plus', $cadena);
	$cadena = str_replace('&', 'y', $cadena);
	$cadena = str_replace('!', 'i', $cadena);
	$cadena = str_replace('¡', 'i', $cadena);
	$cadena = str_replace('"', '-', $cadena);
		$cadena = str_replace('?', '', $cadena);
	$cadena = str_replace('¿', '', $cadena);
	$cadena = str_replace('.', '', $cadena);
	$cadena = str_replace(':', '', $cadena);
	$cadena = str_replace(';', '', $cadena);
	$cadena = str_replace(']', '', $cadena);
	$cadena = str_replace('[', '', $cadena);
	$cadena = str_replace('}', '', $cadena);
	$cadena = str_replace('{', '', $cadena);
	$cadena = str_replace('(', '', $cadena);
	$cadena = str_replace(')', '', $cadena);
	$cadena = str_replace("'", '', $cadena);
	$cadena = str_replace('"', '', $cadena);
	$cadena = str_replace(',', '', $cadena);
	$cadena = str_replace('.', '', $cadena);
	$cadena = str_replace('', '', $cadena);
	$cadena = str_replace('[^ A-Za-z0-9_-ñÑ]', '', $cadena);
	$cadena = str_replace('[ \t\n\r]+', '-', $cadena);
    return $cadena;
}

$b = $_POST['banner'];
$t = $_POST['title'];
$c = (nl2br(htmlspecialchars($_POST['contenido'])));
$ct = $_POST['ct'];
$u = $_SESSION['id_u'];
$f = date("d/m/Y H:i:s");
$h = time();
$tg = $_POST['tags'];
$seo = limpiar(wrecorte($_POST['title'], 68));
		
		$sql = mysql_query("INSERT INTO wposts (title_post, cont_post, cat_post, tags_post, id_usuario, b_post,fecha_post, hace_post, seo_post) VALUES('".$t."', '".$c."', '".$ct."', '".$tg."', '".$u."', '".$b."', '".$f."', '".$h."', '".$seo."')");
   
}else{}
?>
<?php
include('header.php');
?>

<script type="text/javascript">
function instag(tag){
var input = document.form1.contenido;
if(typeof document.selection != 'undefined' && document.selection) {
var str = document.selection.createRange().text;
input.focus();
var sel = document.selection.createRange();
sel.text = "[" + tag + "]" + str + "[/" +tag+ "]";
sel.select();
return;
}else if(typeof input.selectionStart != 'undefined'){
var start = input.selectionStart;
var end = input.selectionEnd;
var insText = input.value.substring(start, end);
input.value = input.value.substr(0, start) + '['+tag+']' + insText + '[/'+tag+']'+ input.value.substr(end);
input.focus();
input.setSelectionRange(start+2+tag.length+insText.length+3+tag.length,start+2+tag.length+insText.length+3+tag.length);
return;
}else{
input.value+=' ['+tag+']Reemplace este texto[/'+tag+']';
return;
}
}
function wal(tag,tagd){
var input = document.form1.contenido;
if(typeof document.selection != 'undefined' && document.selection) {
var str = document.selection.createRange().text;
input.focus();
var sel = document.selection.createRange();
sel.text = "[" + tag + "]" + str + "[/" +tagd+ "]";
sel.select();
return;
}else if(typeof input.selectionStart != 'undefined'){
var start = input.selectionStart;
var end = input.selectionEnd;
var insText = input.value.substring(start, end);
input.value = input.value.substr(0, start) + '['+tag+']' + insText + '[/'+tagd+']'+ input.value.substr(end);
input.focus();
input.setSelectionRange(start+2+tag.length+insText.length+3+tag.length,start+2+tag.length+insText.length+3+tag.length);
return;
}else{
input.value+=' ['+tag+']Reemplace este texto[/'+tagd+']';
return;
}
}
function inslink(){
var input = document.form1.contenido;
if(typeof document.selection != 'undefined' && document.selection) {
var str = document.selection.createRange().text;
input.focus();
var my_link = prompt("Enter URL:","http://");
if (my_link != null) {
if(str.length==0){
str=my_link;
}
var sel = document.selection.createRange();
sel.text = "[url=" + my_link + "]" + str + "[/url]";
sel.select();
}
return;
}else if(typeof input.selectionStart != 'undefined'){
var start = input.selectionStart;
var end = input.selectionEnd;
var insText = input.value.substring(start, end);
var my_link = prompt("Enter URL:","http://");
if (my_link != null) {
if(insText.length==0){
insText=my_link;
}
input.value = input.value.substr(0, start) +"[url=" + my_link + "]" + insText + "[/url]"+ input.value.substr(end);
input.focus();
input.setSelectionRange(start+11+my_link.length+insText.length+4,start+11+my_link.length+insText.length+4);
}
return;
}else{
var my_link = prompt("Ingresar URL:","http://");
var my_text = prompt("Ingresar el texto del link:","");
input.value+=" [url=" + my_link + "]" + my_text + "[/url]";
return;
}
}
function wimg(){
var input = document.form1.contenido;
if(typeof document.selection != 'undefined' && document.selection) {
var str = document.selection.createRange().text;
input.focus();
var my_link = prompt("Ingresa URL De La Imagen:","http://");
if (my_link != null) {
if(str.length==0){
str=my_link;
}
var sel = document.selection.createRange();
sel.text = "[img]" + my_link + "[/img]";
sel.select();
}
return;
}else if(typeof input.selectionStart != 'undefined'){
var start = input.selectionStart;
var end = input.selectionEnd;
var insText = input.value.substring(start, end);
var my_link = prompt("Ingresa URL De La Imagen:","http://");
if (my_link != null) {
if(insText.length==0){
insText=my_link;
}
input.value = input.value.substr(0, start) +"[img]" + my_link + "[/img]"+ input.value.substr(end);
input.focus();
input.setSelectionRange(start+11+my_link.length+insText.length+4,start+11+my_link.length+insText.length+4);
}
return;
}else{
return;
}
}
</script>

<div class="contentvip">

<?php 
if(isset($_SESSION['id_u'])){
if($w['rg_u'] == '1'){ 
?>
<div class="leftch">
<span><?=$status?></span><br>
<span><?=$statusimage?></span><br>
<form method="POST" name="form1" action="<?=$tsurl?>/admin" class="formadmin" enctype="multipart/form-data">
<b>Titulo:</b><br>
<input type="text" name="title" placeholder="Titulo Del Post" /><br>
<b>Contenido:</b><br>

<div class="editortt">
<ul>
<li class="buttonbbcode">
<a name="Submit" onclick="instag('b')" title="Negrita">B</a>
</li>
<li class="buttonbbcode">
<a name="Submit3" onclick="instag('u')" title="U">U</a>
</li>
<li class="buttonbbcode">
<a name="Submit4" onclick="instag('i')" title="Cursiva">I</a>
</li>
<li class="buttonbbcode">
<a name="Submit4" onclick="instag('code')" title="Cursiva">Codigo</a>
</li>
<li class="buttonbbcode">
<a name="Submit2" onclick="inslink();" title="Link / URL">URL</a>
</li>
<li class="buttonbbcode">
<a name="Submit2" onclick="wimg()" title="IMG / URL">IMG</a>
</li>

<li class="buttonbbcode">
<a name="Submit2" onclick="wal('align=center','align')" title="Centrar Texto">Aliniar</a>
<ul>
<li><a name="Submit2" onclick="wal('align=center','align')" title="Centrar Texto">Centrar</a></li>
<li><a name="Submit2" onclick="wal('align=right','align')" title="Aliniar a la izquierda">Izquierda</a></li>
<li><a name="Submit2" onclick="wal('align=left','align')" title="Aliniar a la derecha">Derecha</a></li>
</ul>
</li>


<li class="buttonbbcode">
<a title="Escoje Estilo De Fuente">Fuente</a>
<ul>
<li><a name="Submit2" onclick="wal('font=arial','font')" title="Arial" style="font-family: arial;">Arial</a></li>
<li><a name="Submit2" onclick="wal('font=georgia','font')" title="Georgia" style="font-family: georgia;">Georgia</a></li>
<li><a name="Submit2" onclick="wal('font=verdana','font')" title="Verdana" style="font-family: verdana;">Verdana</a></li>
</ul>
</li>

<li class="buttonbbcode">
<a title="Escoje Estilo De Fuente">Tama&ntilde;o</a>
<ul>
<li><a name="Submit2" onclick="wal('size=9','size')" title="Arial" >Peque&ntilde;a</a></li>
<li><a name="Submit2" onclick="wal('size=12','size')" title="Georgia" >Normal</a></li>
<li><a name="Submit2" onclick="wal('size=18','size')" title="Verdana" >Grande</a></li>
</ul>
</li>

<li class="buttonbbcode">
<a name="Submit2" onclick="wal('color=AQUI','color')" title="Color">Color</a>
<ul>
<li><a name="Submit2" onclick="wal('color=red','color')" title="Rojo" >Rojo</a></li>
<li><a name="Submit2" onclick="wal('color=#CCC','color')" title="Gris" >Gris</a></li>
<li><a name="Submit2" onclick="wal('color=red','color')" title="Verde" >Verde</a></li>
</ul>
</li>

</ul>
</div>

<textarea name="contenido" id="contenido" style="width: 96%;"></textarea><br>
<b>Categoria:</b><br>
<select name="ct">
<option selected="selected" value="">Seleccionar categoria</option>
<?php while($c = mysql_fetch_array($naiegaeulh)){ ?>
<option value="<?=$c['id_ct']?>"><?=$c['name_ct']?></option>
<?php } ?>
</select><br>
<b>Tags:<strong style="font-size: 10px; color: #727070;">Ej: tuto, tutorial, wortit, aviso</strong></b><br>
<input type="text" name="tags" /><br>
<b>Banner:</b><br>
<input type="text" name="banner" placeholder="Banner para tu post"/><br>
<input type="submit" name="sbw" value="Agregar Post" />
</form>

</div>

<div class="rightch">

<div class="rulesadmin">
<h3>Reglas</h3>
<span class="important"><b>Importante:</b>Ya que eres Author en <b>PlusWort</b> Necesitas saber algunas cosas para poder publicar noticias, tutoriales, entre otras cosas mas.</span>

<ul>
<br>
<b>Titulo</b>
<li class="correct">Que sea descriptivo y completo.</li>
<li>Con Muchos [signos] signos (en el titulo)! /gracias</li>
<li>TODO EN MAYUSCULA.</li>
<li>!!!!!!!Exagerados!!!!!!!!</li>
<li>PARCIALMENTE en mayuscula!</li>
</ul>

<ul>
<b>Contenido</b>
<li class="correct">Contenido Original.</li>
<li>Faltas de ortografia.</li>
<li>Contenido Racista y/o peyorativo.</li>
<li>Fotos de personas menores de edad.</li>
<li>Pirateria o contenidos ilegales.</li>
</ul>

<ul>
<b>Tags</b>
<li class="correct">Descriptivos</li>
<li>Links</li>
<li>Spam</li>
<li>Solo Letras y numeros.</li>
<li>Caracteres especiales.</li>
</ul>
</div>

</div>

<?php
 }else{
echo '<h1>No Tienes Permiso para entrar aqui.</h1>';
} 
}else{
echo "<h1><a href='".$config['url_c']."/login'>Inicia Sesion</a> o <a href='".$config['url_c']."/registro'>registrate</a> antes.</h1>";
}
?>

</div>

</div>

</body>
</html>