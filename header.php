<?php
$baeiuhlk = mysql_query("SELECT * FROM admins WHERE id_u='".$_SESSION['id_u']."'");
$w = mysql_fetch_array($baeiuhlk);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta content="utf-8">
<title><?=$tstitle?></title>
<link rel="shortcut icon" href="favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="title" content="<?=$tstitle?>" />
<meta property="og:site_name" content="<?=$tstitle?>" />
<meta property="og:title" content="<?=$tstitle?>" />
<meta name="description" content="<?=$tsdesc?>" />
<meta name="keywords" content="<?=$tskeywords?>" />
<meta property="og:description" content="<?=$tsdesc?>" />
<meta property="og:image" content="<?=$tsimg?>" />
<meta name="msapplication-TileImage" content="<?=$tsimg?>" />
<meta property="og:url" content="<?=$tsurl?>" />
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="ISO-8859-1">
<meta name="robots" content="all">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="http://wortit.tk/new/jquery.js"></script>
<script type="text/javascript" src="http://wortit.tk/new/jquery.watermarkinput.js"></script>
<script type="text/javascript" src="<?=$tsurl?>/scripts/menu_jquery.js"></script>
<script src="http://cf.ads.kontextua.com/container/tags/48717.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=$tsurl?>/c/vip.css" type="text/css" />
<link rel="stylesheet" href="<?=$tsurl?>/c/style.css" type="text/css" />
<link rel="stylesheet" href="<?=$tsurl?>/c/menu.css" type="text/css" />
<link rel="stylesheet" href="<?=$tsurl?>/c/media.css" type="text/css" />
<?php
echo $tsextras;
?>
</head>
<body>
<div>
<!------------ CONT OFICIAL INICIO ---------->

<!-- ENCABEZADO -->
<div id="encabezado">
<div id="content">
<!-- ENCABEZADO -->

<!-- LOGO -->
<div id="logo" style="margin: 20px 0;"><img style="height: 70px; width: 306px;" src="<?=$config['url_c']?>/images/logo.png" /></div>
<!-- LOGO -->

<?php
// Obtenemos y traducimos el nombre del día
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miercoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";

// Obtenemos el número del día
$dia2=date("d");

// Obtenemos y traducimos el nombre del mes
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";

// Obtenemos el año
$ano=date("Y");
?>

<!-- ENCABEZADO DERECHO -->
<div id="menu-top">
<div id="top">
<?php if(isset($_SESSION['id_u'])){ ?>
<a href="<?=$config['url_c']?>"><span style="cursor: pointer; font-weight: bold; color: #DC0A0A; display: inline-block; font-family: Arial; font-size: 11px; border-right: 1px dotted #bababa; padding-right: 10px; text-transform: uppercase;"><?=$_SESSION['nombre']?></span></a>
<a href="<?=$config['url_c']?>logout"><span style="cursor: pointer; font-weight: bold; color: #333; display: inline-block; font-family: Arial; font-size: 11px; padding-left: 10px;">CERRAR SESION</span></a>
<?php }else{ ?>
<a href="<?=$config['url_c']?>login"><span style="cursor: pointer; font-weight: bold; color: #DC0A0A; display: inline-block; font-family: Arial; font-size: 11px; border-right: 1px dotted #bababa; padding-right: 10px;">INICIAR SESION</span></a>
<a href="<?=$config['url_c']?>registro"><span style="cursor: pointer; font-weight: bold; color: #333; display: inline-block; font-family: Arial; font-size: 11px; padding-left: 10px;">CREAR CUENTA</span></a>
<?php } ?>
<span id="none" style="background: #DC0A0A; padding: 2px 9px; position: relative; color: #FFF; text-transform: uppercase; text-align: center; border-radius: 3px; font-size: 11px; margin-left: 12px; margin-top: -3px;"><?php echo "$dia $dia2 de $mes"; ?></span>
<span id="none" style="cursor: pointer; font-weight: bold; color: #0394CB; font-family: Arial; font-size: 11px; padding-left: 10px;"><?php echo date("h:m"); ?> HS</span>

</div>
<div id="bottom">
<span style="cursor: pointer; color: #0394CB; float: right; display: inline-block; font-family: Arial; font-size: 10px; padding-left: 5px;">ONLINE: <font color="#333">1</font></span>
<span style="cursor: pointer; color: #0394CB; float: right; display: inline-block; font-family: Arial; font-size: 10px; padding-right: 5px; border-right: 1px dotted #bababa;">LECTORES REGISTRADOS: <font color="#333">37</font></span>
<a href="https://plus.google.com/102809594307600111981" rel="publisher">Google+</a>
</div>
</div>
<!-- ENCABEZADO DERECHO -->

<!-- NAVIGATION -->
<div id='cssmenu' style='display: none;'>
<ul>
<li class='active'><a href='<?=$config['url_c']?>/'><span>Inicio</span></a></li>
<li><a href='<?=$config['url_c']?>nosotros'><span>Sobre nosotros</span></a></li>
<li class='has-sub'><a href='#'><span>Categorias</span></a>
<ul>
<div style="border-color: transparent; border-bottom-color: #f5f5f5; border-style: dashed dashed solid; border-width: 0 8px 8px; display: -webkit-box; position: absolute; left: 30px; top: -8px; z-index: 1; height: 0; width: 0; -webkit-animation: gb__a .2s; animation: gb__a .2s;"></div>
<li class='has-sub'><a href='<?=$config['url_c']?>categoria/entretenimiento'><span>Entretenimientos</span></a></li>
<li class='has-sub'><a href='<?=$config['url_c']?>categoria/investigaciones' style='margin-top: 33px;'><span>Investigaciones</span></a></li>
<li class='has-sub'><a href='<?=$config['url_c']?>categoria/sistemas-operativos' style='margin-top: 66px;'><span>Sistemas operativos</span></a></li>
<li class='has-sub'><a href='<?=$config['url_c']?>categoria/tecnologia' style='margin-top: 99px;'><span>Tecnologia</span></a></li>
<li class='has-sub'><a href='<?=$config['url_c']?>categoria/tutoriales' style='margin-top: 132px;'><span>Tutoriales</span></a></li>
<li class='has-sub'><a href='<?=$config['url_c']?>categoria/varios' style='margin-top: 165px;'><span>Varios</span></a></li>
<li class='has-sub'><a href='<?=$config['url_c']?>categoria/webmasters' style='margin-top: 198px;'><span>Webmasters</span></a></li>
</ul>
</li>
<li class='last'><a href='<?=$config['url_c']?>/contacto'><span>Contacto</span></a></li>
</ul>

</div>

<div id="menusers" style="display: none;">
<?php if(isset($_SESSION['id_u'])){ ?>
<li><a href="#"><?=$_SESSION['nombre']?></a></li>
<li><a href="<?=$config['url_c']?>/logout">Salir</a></li>
<?php }else{ ?>
<li><a href="<?=$config['url_c']?>/registro">Registro</a></li>
<li><a href="<?=$config['url_c']?>/login">Login</a></li>
<?php } ?>
</div>
<!-- NAVIGATION -->

<!-- FIN ENCABEZADO -->
</div>
</div>
<!-- FIN ENCABEZADO -->

<!-- INTRO -->
<div id="intro">
<div id="content">
<li><a href='<?=$config['url_c']?>'><span>Noticias</span></a></li>
<li><a href='<?=$config['url_c']?>categoria/entretenimiento'><span>Entretenimientos</span></a></li>
<li><a href='<?=$config['url_c']?>categoria/investigaciones' style='margin-top: 33px;'><span>Investigaciones</span></a></li>
<li><a href='<?=$config['url_c']?>categoria/sistemas-operativos' style='margin-top: 66px;'><span>Sistemas operativos</span></a></li>
<li><a href='<?=$config['url_c']?>categoria/tecnologia' style='margin-top: 99px;'><span>Tecnologia</span></a></li>
<li><a href='<?=$config['url_c']?>categoria/tutoriales' style='margin-top: 132px;'><span>Tutoriales</span></a></li>
<li><a href='<?=$config['url_c']?>categoria/varios' style='margin-top: 165px;'><span>Varios</span></a></li>
<li><a href='<?=$config['url_c']?>categoria/webmasters' style='margin-top: 198px;'><span>Webmasters</span></a></li>
</div>
</div>
<!-- INTRO -->

<!-- INTRO 2 -->
<div id="intro2">
<select style="width: 80%;">
<option value="" selected="selected">Empieza!</option>
<option value="<?=$config['url_c']?>">Noticias</option>
<option value="<?=$config['url_c']?>categoria/entretenimiento">Entretenimiento</option>
<option value="<?=$config['url_c']?>categoria/investigaciones">Investigaciones</option>
<option value="<?=$config['url_c']?>categoria/sistemas-operativos">Sistemas operativos</option>
<option value="<?=$config['url_c']?>categoria/tecnologia">Tecnologia</option>
<option value="<?=$config['url_c']?>categoria/tutoriales">Tutoriales</option>
<option value="<?=$config['url_c']?>categoria/varios">Varios</option>
<option value="<?=$config['url_c']?>categoria/webmasters">Webmasters</option>
</select>
</div>
<!-- INTRO 2 -->

<div id="metacontent">

<div class="headerconto" style="display: none;">
<img src="<?=$config['url_c']?>/i/source.png" />

<div id="menusers">
<ul>
<?php if(isset($_SESSION['id_u'])){ ?>
<li><a href="#"><?=$_SESSION['nombre']?></a></li>
<li><a href="<?=$config['url_c']?>/logout">Salir</a></li>
<?php }else{ ?>
<li><a href="<?=$config['url_c']?>/registro">Registro</a></li>
<li><a href="<?=$config['url_c']?>/login">Login</a></li>
<?php } ?>
</ul>
</div>

</div>

<?php include('menu.php'); ?>