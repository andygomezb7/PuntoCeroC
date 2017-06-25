 <?php
function wrecorte($texto, $limite=100){   
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if($tamano <= $limite){
        return $texto;
    }else{
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }   
    return $resultado;
}

//Extrae codigo fuente de una URL como funcion(http://pagina.com)

function wfuente($url){
    $url = file($url);
    $codigo = '';
    foreach ($url as $numero => $linea) { 
        $codigo .= '<strong>' . $numero . '</strong> : ' . htmlspecialchars($linea) . '<br />';
    }
    return $codigo;
}

//Extraer Nombre del URL o Dominio . Con o sin http y con o sin www.

function wdominio($url){
    $url = explode('/', str_replace('www.', '', str_replace('http://', '', $url)));
    return $url[0];
}

//Obtener Signo Zodiaco Como wzodiaco(año-mes-dia) 

function wzodiaco($fecha){ 

   $zodiaco = ''; 
         
   list ( $ano, $mes, $dia ) = explode ( "-", $fecha ); 
   
   if     ( ( $mes == 1 && $dia > 19 )  || ( $mes == 2 && $dia < 19 ) )  { $zodiaco = "Acuario"; }
   elseif ( ( $mes == 2 && $dia > 18 )  || ( $mes == 3 && $dia < 21 ) )  { $zodiaco = "Piscis"; } 
   elseif ( ( $mes == 3 && $dia > 20 )  || ( $mes == 4 && $dia < 20 ) )  { $zodiaco = "Aries"; } 
   elseif ( ( $mes == 4 && $dia > 19 )  || ( $mes == 5 && $dia < 21 ) )  { $zodiaco = "Tauro"; } 
   elseif ( ( $mes == 5 && $dia > 20 )  || ( $mes == 6 && $dia < 21 ) )  { $zodiaco = "Géminis"; } 
   elseif ( ( $mes == 6 && $dia > 20 )  || ( $mes == 7 && $dia < 23 ) )  { $zodiaco = "Cáncer"; } 
   elseif ( ( $mes == 7 && $dia > 22 )  || ( $mes == 8 && $dia < 23 ) )  { $zodiaco = "Leo"; } 
   elseif ( ( $mes == 8 && $dia > 22 )  || ( $mes == 9 && $dia < 23 ) )  { $zodiaco = "Virgo"; } 
   elseif ( ( $mes == 9 && $dia > 22 )  || ( $mes == 10 && $dia < 23 ) ) { $zodiaco = "Libra"; } 
   elseif ( ( $mes == 10 && $dia > 22 ) || ( $mes == 11 && $dia < 22 ) ) { $zodiaco = "Escorpio"; } 
   elseif ( ( $mes == 11 && $dia > 21 ) || ( $mes == 12 && $dia < 22 ) ) { $zodiaco = "Sagitario"; } 
   elseif ( ( $mes == 12 && $dia > 21 ) || ( $mes == 1 && $dia < 20 ) )  { $zodiaco = "Capricornio"; } 

   return $zodiaco; 

}

//Calcular edad como wedad(AÑO-MES-DIA) 

function wedad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
    return $ano_diferencia;
}

//Funcion BBCODE 

function BBcode($texto){ 
   $a = array( 
      "/\[i\](.*?)\[\/i\]/is", 
	  "/\[php\](.*?)\[\/php\]/is", 
	  "/\[java\](.*?)\[\/java\]/is", 
	  "/\[css\](.*?)\[\/css\]/is", 
      "/\[b\](.*?)\[\/b\]/is", 
      "/\[u\](.*?)\[\/u\]/is", 
      "/\[img\](.*?)\[\/img\]/is", 
      "/\[url=(.*?)\](.*?)\[\/url\]/is", 
	  "/\[font=(.*?)\](.*?)\[\/font\]/is", 
	  "/\[color=(.*?)\](.*?)\[\/color\]/is", 
	  "/\[size=(.*?)\](.*?)\[\/size\]/is", 
	  "/\[align=(.*?)\](.*?)\[\/align\]/is",
      "/\[youtube\](.*?)\[\/youtube\]/is"	  
   ); 

   $b = array( 
      "<i>$1</i>", 
	  "<pre class=\"brush:php\">$1</pre>",
	  "<pre class=\"brush:java\">$1</pre>",
	  "<pre class=\"brush:css\">$1</pre>",
      "<b>$1</b>", 
      "<u>$1</u>", 
      "<img src=\"$1\" />", 
      "<a href=\"$1\" target=\"_blank\">$2</a>",
      "<font face=\"$1\" >$2</font>",
      "<font color=\"$1\">$2</font>",
      "<font size=\"$1\">$2</font>",
      "<div style=\"text-align:$1;\">$2</div>",
      "<object width=\"480\" height=\"315\"><param name=\"movie\" value=\"//www.youtube-nocookie.com/v/$1?hl=es_ES&amp;version=3\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><embed src=\"//www.youtube-nocookie.com/v/$1?hl=es_ES&amp;version=3\" type=\"application/x-shockwave-flash\" width=\"480\" height=\"315\" allowscriptaccess=\"always\" allowfullscreen=\"true\"></embed></object>"	  
   ); 
   $texto = preg_replace($a, $b, $texto); 
   return $texto; 
} 

//Funcion Hashtag y menciones

function parse_twitter($text) { 
    //Comprobamos las Menciones 
    preg_match_all ("/[@]+([A-Za-z0-9-_]+)/",$text, $users); 
    $mentions  = $users[1]; 
     
    foreach($mentions  as $key => $user){ 
        $uid = 1; // comprobamos si existe en nuestra database, modificar segun su script  
        if(!empty($uid)) { 
		include('acceso_db.php');
	include('wconfig.php');
            $find = '@'.$user; 
            $replace = "<a target='_blank' href='".$config['direccion_url']."/".$user."' >".$user."</a>"; 
            $text = str_replace($find, $replace, $text); 
        } 
    } 
	 
	 
    //Comprobamos los Hashtag 
    preg_match_all('/#([A-Za-z0-9_-ñÑçÇáÁäÄàÀâÂéÉëËèÈêÊíÍïÏìÌîÎóÓöÖòÒôÔúÚüÜùÙûÛ]+)/',$text, $hash); 
    $hashtag = $hash[1]; 
     
    foreach($hashtag  as $key => $hash){ 
	include('acceso_db.php');
	include('wconfig.php');
        //Aqui podemos hacer que lo agrege a la database 
        $find = '#'.$hash; 
        $replace = "<a target='_blank' href='".$config['direccion_url']."/search.php?q=%23".$hash."'>#".$hash."</a> "; 
        $text = str_replace($find, $replace, $text); 
    } 
     
    return $text; 
} 


//Limpia espacios casero como cwlimpia(cadena)

				function cwlimpia($cadena){
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
	$cadena = str_replace("'", '"', $cadena);
	$cadena = str_replace("_", '-', $cadena);
	$cadena = str_replace(":", '', $cadena);
    return $cadena;
}

//Limpia Signos raros de una cadena Profesional como wlimpia(cadena)

function wlimpia_espacios($cadena) {
     return (ereg_replace('[^ A-Za-z0-9_-ñÑ]', '', $cadena));
}

//URL AMIGABLE wlimpia(cadena)

function wlimpia($cadena) {
   // Sepadador de palabras que queremos utilizar
   $separador = "-";
   // Eliminamos el separador si ya existe en la cadan actual
   $cadena = str_replace($separador, "",$cadena);
   // Convertimos la cadena a minusculas
   $cadena = strtolower($cadena);
   // Remplazo tildes y eñes
   $cadena = strtr($cadena, "áéíóúÁñÑ", "aeiouAnN");
   // Remplazo cuarquier caracter que no este entre A-Za-z0-9 por un espacio vacio
   $cadena = trim(ereg_replace("[^ A-Za-z0-9]", "", $cadena));
   // Inserto el separador antes definido
   $cadena = preg_replace("[ \t\n\r]+", $separador, $cadena);
   
   return $cadena; 
}

//Obtener IP Original

function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}

//Saber si existe una imagen


 ?>