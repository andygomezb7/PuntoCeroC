<?php
session_start();
include('connect.php');
include('config.php');
$avisol = "";
//vemos que obtenga el POST
if(isset($_POST['login'])){
//Verificamos que esten llenos los campost
if(empty($_POST['user']) || empty($_POST['pass'])){
//Sino lo estan mostramos un aviso
$avisol = "El Campo usuario o contraseña no han sido llenados. <a href='javascript:history.back();'>Reintentar</a>";
//si lo estan seleccionarmos y asignamos las variables _SESSION
}else{
//Vemos que sea informacion Valida
$user = mysql_real_escape_string($_POST['user']);
$pass = mysql_real_escape_string($_POST['pass']);
$pas = md5($pass);
$conmpew = mysql_query("SELECT * FROM admins WHERE nick_u='".$user."' AND pass_u='".$pas."'");
//Verificamos esto
if($r = mysql_fetch_array($conmpew)){
//Lo ponemos en Online
mysql_query("update admins set on_u='1' where nick_u='".$r['nick_u']."'");
$_SESSION['id_u'] = $r['id_u'];
$_SESSION['nick_u'] = $r['nick_u'];
$_SESSION['nombre'] = $r['name_u'].' '.$r['ap_u'];
$_SESSION['name_u'] = $r['name_u'];
header("location: index.php");
}else{
//Sino son validos los campos mostramos otra pagina
$avisol = "El nombre o contraseña no son validos.";
}

}
}else{}
?>
<?php
if(isset($_SESSION['id_u'])){
header("location: index.php");
}else{
$tstitle = 'Login | '.$config['name_c'];
$tsdesc = '';
$tskeywords = '';
$tsurl = $config['url_c'];
$tsimg = $tsurl.'/i/bb.png';

include('header.php');
?>

<div class="contentvip" style="margin: 0 auto; width: 75%;">

<div class="leftch">
<?php echo $avisol; ?>
<form method="POST" action="<?=$config['url_c']?>/login" class="login" style="text-align: left;">
<b style="font-size: 12px;">Nombre de usuario</b><br>
<input id="text" type="text" name="user" placeholder="Nick de usuario" style="margin-bottom: 12px; border-radius: 3px;" /><br>
<b style="font-size: 12px;">Contrase&ntilde;a</b><br>
<input id="text" type="password" name="pass" placeholder="Password" style="border-radius: 3px; margin-bottom: 12px;" /><br>
<input type="submit" style="float: left; box-shadow: none;background: #309dbe; color: #fff; font-size: 12px; padding: 10px 15px;border: none;border-radius: 3px;" name="login" value="Iniciar Sesion" />
</form>
</div>

<style>
.list li { list-style: inherit !important; font-size: 13px; font-family: open sans; padding: 5px 0; }
</style>

<div class="rightch">
<div id="ayudaregis">
<div style="display: inline-block; width: 100%; text-align: center;"><img src="http://www.paraguaywarez.com/Themes/default/images/people/login.jpg" style="width: 80%;" /></div>
</div>
</div>

</div>
</div>

</body>
</html>
<?php
}
?>