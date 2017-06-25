<?php
session_start();
include('connect.php');
include('config.php');
include('functions.php');
include('scripts/time_stamp.php');

//Obtener Info de el post
$i = $_GET['p'];
$nhiaeughlk = mysql_query("SELECT * FROM wposts WHERE seo_post='".$i."'");
$po = mysql_fetch_array($nhiaeughlk);

//Obtener Info de la categoria
$fjnaecaroid = mysql_query("SELECT * FROM categorias WHERE id_ct='".$po['cat_post']."'");
$cat = mysql_fetch_array($fjnaecaroid);

//Existe el post?
$niafue = mysql_num_rows($nhiaeughlk);

//Obtener Info de usuario
$naoeuhlk = mysql_query("SELECT * FROM admins WHERE id_u='".$po['id_usuario']."'");
$usu = mysql_fetch_array($naoeuhlk);

if($usu['av_u'] == NULL){
$avu = "http://source.wortit.com/i/bb.png";
}else{
$avu = $usu['av_u'];
}
//Obtener numero de comentarios de el usuario
$nafieuhl = mysql_query("SELECT * FROM coments WHERE u_co='".$usu['id_u']."'");
$enwieofu = mysql_num_rows($nafieuhl);

//Obtener numero de noticias de el usuario
$jnaiesufghsldk = mysql_query("SELECT * FROM wposts WHERE id_usuario='".$usu['id_u']."'");
$nfmaieuh = mysql_num_rows($jnaiesufghsldk);

//Obtener numero de comentarios
$jiaeufnhsecoco = mysql_query("SELECT * FROM coments WHERE post_co='".$po['id_post']."'");
$comesuei = mysql_num_rows($jiaeufnhsecoco);

//Obtener Noticias Relacionadas
$nfaieslbsdlfsh = mysql_query("SELECT * FROM wposts WHERE cat_post='".$po['cat_post']."' LIMIT 5");

$tstitle = wrecorte($po['title_post'], 40).' | '.$config['name_c'];
$tsdesc = wrecorte($po['cont_post'], 150);
$tskeywords = $po['tags_post'];
$tsurl = $config['url_c'];
$tsimg = $po['b_post'];
$tsextras = '
<script type="text/javascript">
  function loadcoemnts(){
     //Funcion para cargar el muro
     $("#coem").load("'.$config['url_c'].'/co/wall.php?p='.$po['id_post'].'");
     //Devuelve el campo message a vacio
     $("#msg").val("")
  }
  
  //Cuando el documento esta listo carga el muro
 $(document).ready(function(){
   loadcoemnts();
 });
  </script>
  ';
?>
<?php
include('header.php');
?>

<div class="contentvip" id="contentmedia">

<?php if($niafue > 0){ ?>

<div class="leftch">

<style>
#photo-display img { width: 100%; }
</style>

<!-- Empieza el post -->
<h2 style="font-family: Open sans; font-weight: 100;"><?=$po['title_post']?></h2>
<span style="margin-top:5px;margin-bottom:15px;font-size: 12px; font-family: Open sans; color: #777;border-top: 1px dashed #eee;width: 97%;display: inline-block;padding: 7px;font-size:12px;border-bottom: 1px dashed #eee;border-right: 1px dashed #eee;border-left: 2px solid #eee;">Publicado por <font color="#07f"><?=$usu['name_u']?> <?=$usu['ap_u']?></font> &middot; <?php echo time_stamp($po['hace_post']); ?></span>

<div style="padding: 0px 6px;">
<div style="display: inline-block; width: 100%;"><img src="" style="width: 100%;" /></div>
<span style="font-size: 12px; font-family: Arial; color: #666; line-height: 22px;"><div id="photo-display"><?php echo BBcode($po['cont_post']); ?></div></span>
</div>

<!-- NOTAS RELACIONADAS -->
<div style="background: #f5f5f5; padding: 7px 10px;font-size: 12px;color: #777; margin-top: 18px;">
<span>Notas relacionadas</span>
</div>
<div class="contentgadnseu" style="width: 100%; display: inline-block; border-bottom: none;">
<?php while($r = mysql_fetch_array($nfaieslbsdlfsh)){ ?>
<div class="minipostove" id="noticias-relacionadas">
<a href="<?=$config['url_c']?>noticia/<?=$r['seo_post']?>.html" id="portsehk"><img src="<?=$r['b_post']?>" style="width: 100%; display: inline-block;" /></a>
<span>
<a href="<?=$config['url_c']?>noticia/<?=$r['seo_post']?>.html"><?=wrecorte($r['title_post'], 50)?></a>

</span>
</div>
<?php } ?>
</div>
<!-- NOTAS RELACIONADAS -->

<div id="tagtotalpost" style="display: none;">
<?php
$valor_array = explode(',',$po['tags_post']); 
 
foreach($valor_array as $llave => $valores) 
{ 
    echo "<div class='tagstyle'><a href='#'>".$valores . "</a></div>"; 
}
?>
</div>
<br><br>

<div style="background: #f5f5f5; padding: 7px 10px;font-size: 12px;color: #777; margin-top: 18px;">
<span><?=$comesuei?> comentarios</span>
</div>

<div class="comentscome">
<div id="coem"></div>

<?php if(isset($_SESSION['id_u'])){ ?>
<div class="formenvicoco">
<form method="POST" action="javascript: addcocome();">
<span style="color: #777; font-size: 11px; line-height: 30px; font-family: Open sans;">BBcode: [code][/code] , [url=][/url] , [b][/b] , [u][/u] , [i][/i] , [img][/img] , [font=][/font] , [color=][/color] , [size=][/size] , [align=][/align] </span>
<textarea name="msg" id="msg"></textarea>
<input type="submit" name="submit" id="submit" value="Comentar" />
</form>
</div>
<script type="text/javascript">
   function addcocome(){
      
      //Tomas el valor del campo msg      
      var msg = $("#msg").val();
      
      //Se envian los datos a url y al completarse se recarga el muro
      //con la nueva informacion
      $.ajax({
         url: '<?=$config['url_c']?>/co/action.php?p=<?=$po['id_post']?>',
         data: 'msg='+ msg,
         type: 'POST',
         error: function(msg){
            alert(msg);
         },
         success: function(data){
            loadcoemnts();
         }
      });      
   };
</script>
<?php }else{ ?>
<div style="font-size: 12px; color: #777; font-family: Open sans; margin: 10px 0; width: 100%; text-align: center;">Para poder comentar <a href="<?=$config['url_c']?>/login" style="color: #0084B4;">Inicia Sesion</a> o <a href="<?=$config['url_c']?>/registro" style="color: #0084B4;">Crea una cuenta</a>.</div>
<?php } ?>
</div>

</div>

<div class="rightch" id="right-none">

<?php include('right.php'); ?>

</div>

<?php }else{ ?>
<h1>La noticia no existe.</h1>
<?php } ?>
</div>

</div>

<!-- FOOTER -->
<?php include('footer.php') ?>
<!-- FOOTER --> 

</body>
</html>