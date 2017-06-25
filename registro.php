<?php
session_start();
    include('connect.php');
	include('config.php');
    if(isset($_POST['enviar'])) { 
	
        function valida_email($correo) {
            if (eregi("^[_.0-9a-z-]+@[0-9a-z._-]+.[a-z]{2,4}$", $correo)) return true;
            else return false;
        }
        // Procedemos a comprobar que los campos del formulario no estén vacíos
        $sin_espacios = count_chars($_POST['nombre'], 1);
        if(!empty($sin_espacios[32])) { // comprobamos que el campo usuario_nombre no tenga espacios en blanco
            echo "El campo <em>usuario_nombre</em> no debe contener espacios en blanco. <a href='javascript:history.back();'>Reintentar</a>";
        }elseif(empty($_POST['nombre'])) { // comprobamos que el campo usuario_nombre no esté vacío
            echo "No haz ingresado tu usuario. <a href='javascript:history.back();'>Reintentar</a>";
        }elseif(empty($_POST['clave'])) { // comprobamos que el campo usuario_clave no esté vacío
            echo "No haz ingresado contraseña. <a href='javascript:history.back();'>Reintentar</a>";
        }elseif($_POST['clave'] != $_POST['reclave']) { // comprobamos que las contraseñas ingresadas coincidan
            echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
        }elseif(!valida_email($_POST['email'])) { // validamos que el email ingresado sea correcto
            echo "El email ingresado no es válido. <a href='javascript:history.back();'>Reintentar</a>";
        }else {
            // "limpiamos" los campos del formulario de posibles códigos maliciosos
            $usuario_nombre = mysql_real_escape_string($_POST['nombre']);
            $usuario_clave = mysql_real_escape_string($_POST['clave']);
            $usuario_email = mysql_real_escape_string($_POST['email']);
			$pais = mysql_real_escape_string($_POST['pais']);
			$sexo = mysql_real_escape_string($_POST['sexo']);
			$original = mysql_real_escape_string($_POST['original']);
			$ap = mysql_real_escape_string($_POST['ap']);
			$identi = time();
		
            // comprobamos que el usuario ingresado no haya sido registrado antes
            $sql = mysql_query("SELECT nick_u FROM admins WHERE nick_u='".$usuario_nombre."'");
			$email = mysql_query("SELECT mail_u FROM admins WHERE mail_u='".$usuario_email."'");
            $emaill = mysql_num_rows($email);
			if(mysql_num_rows($sql) > 0) {
                $registromsg = "El nombre usuario elegido ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>";
            }else if($emaill > 0){
			   $registromsg = "La Direccion De Emaio elegida ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>";
			}else {
                $usuario_clave = md5($usuario_clave); // encriptamos la contraseña ingresada con md5
                // ingresamos los datos a la BD
                $reg = mysql_query("INSERT INTO admins (nick_u, pass_u, mail_u, freg_u, pais_u, sexo_u, name_u, ap_u, hace_u) VALUES ('".$usuario_nombre."', '".$usuario_clave."', '".$usuario_email."', NOW(), '".$pais."', '".$sexo."', '".$original."', '".$ap."', '".$identi."')");
				if($reg) {
                    $registromsg = "Felicidades Te has registrado correctamente. <a href='index.php'>Inicia sesion</a> ahora.";
                }else {
                    $registromsg = "ha ocurrido un error y no se registraron los datos. <a href='javascript:history.back();'>intenta de nuevo.</a>";
                }
            }
        }
    }
?> 
<?php
 if(isset($_SESSION['id_u'])){ 
?>
<META HTTP-EQUIV="Refresh" CONTENT="1; URL=<?=$config['url_c']?>/index.php">
<?php
}else{
?>
<?php
$tstitle = 'Registro | '.$config['name_c'];
$tsdesc = '';
$tskeywords = '';
$tsurl = $config['url_c'];
$tsimg = $tsurl.'/i/bb.png';

include('header.php');
?>

<div class="contentvip" style="margin: 0 auto; width: 75%;">

<div class="leftch">
<form method="post" action="<?=$config['url_c']?>/registro" class="registro">
<?php
if(isset($registromsg)){
?>
<b style="color: red; font-size: 18px;"><?=$registromsg?></b>
<?php
}else{
?>
<li>
<h2>Nick de usuario:</h2>
<input name="nombre" class="input" placeholder="Nick (Sin Espacios En Blanco)" type="text" /><br />
</li>
<li>
<h2>Nombres:</h2>
<input name="original" class="input" placeholder="Nombres" type="text" /><br />
</li>
<li>
<h2>Apellidos:</h2>
<input name="ap" class="input" placeholder="Apellidos" type="text" /><br />
</li>
<li>
<h2>Contraseña:</h2>
<input name="clave" class="input" placeholder="Password" type="password" /><br />
</li>
<li>
<h2>Confirma tu contraseña:</h2>
<input name="reclave" class="input" placeholder="Repita Password" type="password" /><br />
</li>
<li>
<h2>Direccion De Email:</h2>
<input name="email" class="input" type="text" placeholder="Direccion de Email" /><br />
</li>
<li>
<h2>Pais:</h2>
<select tabindex="4" name="pais" class="input" style="width: 262px;">
						<option value="">Seleccionar País</option>
													<option value="AF">Afganistán</option>
													<option value="AL">Albania</option>
													<option value="DE">Alemania</option>
													<option value="DZ">Argelia</option>
													<option value="AD">Andorra</option>
													<option value="AO">Angola</option>
													<option value="AI">Anguila</option>
													<option value="AG">Antigua y Barbuda</option>
													<option value="AQ">Antártida</option>
													<option value="SA">Arabia Saudita</option>
													<option value="AR">Argentina</option>
													<option value="AM">Armenia</option>
													<option value="AW">Aruba</option>
													<option value="AU">Australia</option>
													<option value="AT">Austria</option>
													<option value="AZ">Azerbaiyán</option>
													<option value="BS">Bahamas</option>
													<option value="BH">Bahréin</option>
													<option value="BD">Bangladesh</option>
													<option value="BB">Barbados</option>
													<option value="BZ">Belice</option>
													<option value="BJ">Benin</option>
													<option value="BM">Bermudas</option>
													<option value="BY">Bielorrusia</option>
													<option value="BO">Bolivia</option>
													<option value="BA">Bosnia y Herzegovina</option>
													<option value="BW">Botswana</option>
													<option value="BR">Brasil</option>
													<option value="BN">Brunéi</option>
													<option value="BG">Bulgaria</option>
													<option value="BF">Burkina Faso</option>
													<option value="BI">Burundi</option>
													<option value="BT">Bután</option>
													<option value="BE">Bélgica</option>
													<option value="CV">Cabo Verde</option>
													<option value="KH">Camboya</option>
													<option value="CM">Camerún</option>
													<option value="CA">Canadá</option>
													<option value="TD">Chad</option>
													<option value="CL">Chile</option>
													<option value="CN">China</option>
													<option value="CY">Chipre</option>
													<option value="VA">Ciudad del Vaticano</option>
													<option value="CO">Colombia</option>
													<option value="KM">Comoras</option>
													<option value="KP">Corea del Norte</option>
													<option value="KR">Corea del Sur</option>
													<option value="CR">Costa Rica</option>
													<option value="CI">Costa de Marfil</option>
													<option value="HR">Croacia</option>
													<option value="CU">Cuba</option>
													<option value="DK">Dinamarca</option>
													<option value="DM">Dominica</option>
													<option value="EC">Ecuador</option>
													<option value="EG">Egipto</option>
													<option value="SV">El Salvador</option>
													<option value="AE">Emiratos árabes Unidos</option>
													<option value="ER">Eritrea</option>
													<option value="SK">Eslovaquia</option>
													<option value="SI">Eslovenia</option>
													<option value="ES">España</option>
													<option value="US">Estados Unidos</option>
													<option value="EE">Estonia</option>
													<option value="ET">Etiopía</option>
													<option value="PH">Filipinas</option>
													<option value="FI">Finlandia</option>
													<option value="FJ">Fiyi</option>
													<option value="FR">Francia</option>
													<option value="GA">Gabón</option>
													<option value="GM">Gambia</option>
													<option value="GE">Georgia</option>
													<option value="GH">Ghana</option>
													<option value="GI">Gibraltar</option>
													<option value="GD">Granada</option>
													<option value="GR">Grecia</option>
													<option value="GL">Groenlandia</option>
													<option value="GP">Guadalupe</option>
													<option value="GU">Guam</option>
													<option value="GT">Guatemala</option>
													<option value="GF">Guayana Francesa</option>
													<option value="GG">Guernsey</option>
													<option value="GN">Guinea</option>
													<option value="GQ">Guinea Ecuatorial</option>
													<option value="GW">Guinea-Bissau</option>
													<option value="GY">Guyana</option>
													<option value="HT">Haití</option>
													<option value="HN">Honduras</option>
													<option value="HK">Hong Kong</option>
													<option value="HU">Hungría</option>
													<option value="IN">India</option>
													<option value="ID">Indonesia</option>
													<option value="IQ">Iraq</option>
													<option value="IE">Irlanda</option>
													<option value="IR">Irán</option>
													<option value="BV">Isla Bouvet</option>
													<option value="IM">Isla de Man</option>
													<option value="CX">Isla de Navidad</option>
													<option value="IS">Islandia</option>
													<option value="KY">Islas Caimán</option>
													<option value="CC">Islas Cocos</option>
													<option value="CK">Islas Cook</option>
													<option value="FO">Islas Feroe</option>
													<option value="GS">Islas Georgias del Sur y Sandwich del Sur</option>
													<option value="HM">Islas Heard y McDonald</option>
													<option value="MP">Islas Marianas del Norte</option>
													<option value="MH">Islas Marshall</option>
													<option value="PN">Islas Pitcairn</option>
													<option value="SB">Islas Salomón</option>
													<option value="TC">Islas Turcas y Caicos</option>
													<option value="VG">Islas Vírgenes Británicas</option>
													<option value="VI">Islas Vírgenes Estadounidenses</option>
													<option value="UM">Islas ultramarinas de Estados Unidos</option>
													<option value="IL">Israel</option>
													<option value="IT">Italia</option>
													<option value="JM">Jamaica</option>
													<option value="JP">Japón</option>
													<option value="JE">Jersey</option>
													<option value="JO">Jordania</option>
													<option value="KZ">Kazajistán</option>
													<option value="KE">Kenia</option>
													<option value="KG">Kirguistán</option>
													<option value="KI">Kiribati</option>
													<option value="KW">Kuwait</option>
													<option value="LA">Laos</option>
													<option value="LS">Lesoto</option>
													<option value="LV">Letonia</option>
													<option value="LR">Liberia</option>
													<option value="LY">Libia</option>
													<option value="LI">Liechtenstein</option>
													<option value="LT">Lituania</option>
													<option value="LU">Luxemburgo</option>
													<option value="LB">Líbano</option>
													<option value="MO">Macao</option>
													<option value="MG">Madagascar</option>
													<option value="MY">Malasia</option>
													<option value="MW">Malaui</option>
													<option value="MV">Maldivas</option>
													<option value="MT">Malta</option>
													<option value="ML">Malí</option>
													<option value="MA">Marruecos</option>
													<option value="MQ">Martinica</option>
													<option value="MU">Mauricio</option>
													<option value="MR">Mauritania</option>
													<option value="YT">Mayotte</option>
													<option value="FM">Micronesia</option>
													<option value="MD">Moldavia</option>
													<option value="MN">Mongolia</option>
													<option value="ME">Montenegro</option>
													<option value="MS">Montserrat</option>
													<option value="MZ">Mozambique</option>
													<option value="MM">Myanmar</option>
													<option value="MX">México</option>
													<option value="MC">Mónaco</option>
													<option value="NA">Namibia</option>
													<option value="NR">Nauru</option>
													<option value="NP">Nepal</option>
													<option value="NI">Nicaragua</option>
													<option value="NE">Niger</option>
													<option value="NG">Nigeria</option>
													<option value="NU">Niue</option>
													<option value="NF">Norfolk</option>
													<option value="NO">Noruega</option>
													<option value="NC">Nueva Caledonia</option>
													<option value="NZ">Nueva Zelanda</option>
													<option value="OM">Omán</option>
													<option value="PK">Pakistán</option>
													<option value="PW">Palaos</option>
													<option value="PA">Panamá</option>
													<option value="PG">Papúa Nueva Guinea</option>
													<option value="PY">Paraguay</option>
													<option value="NL">Países Bajos</option>
													<option value="PE">Perú</option>
													<option value="PF">Polinesia Francesa</option>
													<option value="PL">Polonia</option>
													<option value="PT">Portugal</option>
													<option value="PR">Puerto Rico</option>
													<option value="QA">Qatar</option>
													<option value="GB">Reino Unido</option>
													<option value="CF">República Centroafricana</option>
													<option value="CZ">República Checa</option>
													<option value="CD">República Democrática del Congo</option>
													<option value="DO">República Dominicana</option>
													<option value="MK">República de Macedonia</option>
													<option value="CG">República del Congo</option>
													<option value="EH">República árabe Saharaui Democrática</option>
													<option value="RE">Reunión</option>
													<option value="RW">Ruanda</option>
													<option value="RO">Rumania</option>
													<option value="RU">Rusia</option>
													<option value="MF">Saint-Martin</option>
													<option value="WS">Samoa</option>
													<option value="AS">Samoa Americana</option>
													<option value="BL">San Bartolomé</option>
													<option value="KN">San Cristóbal y Nieves</option>
													<option value="SM">San Marino</option>
													<option value="PM">San Pedro y Miquelón</option>
													<option value="VC">San Vicente y las Granadinas</option>
													<option value="SH">Santa Helena</option>
													<option value="LC">Santa Lucía</option>
													<option value="ST">Sao Tomé y Principe</option>
													<option value="SN">Senegal</option>
													<option value="RS">Serbia</option>
													<option value="SC">Seychelles</option>
													<option value="SL">Sierra Leona</option>
													<option value="SG">Singapur</option>
													<option value="SY">Siria</option>
													<option value="SO">Somalia</option>
													<option value="LK">Sri Lanka</option>
													<option value="SZ">Suazilandia</option>
													<option value="ZA">Sudáfrica</option>
													<option value="SD">Sudán</option>
													<option value="SE">Suecia</option>
													<option value="CH">Suiza</option>
													<option value="SR">Surinam</option>
													<option value="SJ">Svalbard y Jan Mayen</option>
													<option value="TH">Tailandia</option>
													<option value="TW">Taiwán</option>
													<option value="TZ">Tanzania</option>
													<option value="TJ">Tayikistán</option>
													<option value="IO">Territorio Británico del Océano índico</option>
													<option value="TF">Territorios Australes Franceses</option>
													<option value="PS">Territorios palestinos</option>
													<option value="TL">Timor Oriental</option>
													<option value="TG">Togo</option>
													<option value="TK">Tokelau</option>
													<option value="TO">Tonga</option>
													<option value="TT">Trinidad y Tobago</option>
													<option value="TM">Turkmenistán</option>
													<option value="TR">Turquía</option>
													<option value="TV">Tuvalu</option>
													<option value="TN">Túnez</option>
													<option value="UA">Ucrania</option>
													<option value="UG">Uganda</option>
													<option value="UY">Uruguay</option>
													<option value="UZ">Uzbekistán</option>
													<option value="VU">Vanuatu</option>
													<option value="VE">Venezuela</option>
													<option value="VN">Vietnam</option>
													<option value="WF">Wallis y Futuna</option>
													<option value="YE">Yemen</option>
													<option value="DJ">Yibuti</option>
													<option value="ZM">Zambia</option>
													<option value="ZW">Zimbabue</option>
											</select>
</li>
<li>
<h2>Sexo:</h2>
<select tabindex="5" class="input" name="sexo" style="width: 262px;">
						<option value="">Seleccionar Sexo</option>
							<option value="1">Mujer</option>
							<option value="0">Hombre</option>
					</select>
</li>
<li>
<p style="color: #7A7A7A; font-size: 15px;">Al registrarme acepto los <a href="<?=$config['direccion_url']?>/terminos-y-condiones">términos y condiciones</a> del sitio</p>
<input type="submit" name="enviar" value="Registrarme" />
</li>
<?php
}
?>
</form>
</div>

<style>
.list li { list-style: inherit !important; font-size: 13px; font-family: open sans; padding: 5px 0; }
</style>

<div class="rightch">
<div id="ayudaregis">
<div style="display: inline-block; width: 100%; text-align: center;"><img src="http://www.paraguaywarez.com/Themes/default/images/people/login.jpg" style="width: 80%;" /></div>
<div style="position: relative; background: url(https://l.t26.net/img/dotccc.gif) repeat-x 0 12px; text-align: center;"><p style="color: #777; font-size: 13px; font-family: Open sans; background: #fff; width: 160px; margin: 0 auto;">¿Ya tienes una cuenta?</p></div>
<div style="margin: 15px auto; width: 94px;"><a href="<?=$config['url_c']?>login" style="background: #0394CB;  color: #fff; border-radius: 3px;font-size: 13px;font-family: Open sans;padding: 5px 9px;">Iniciar sesi&oacute;n</a></div>
<div style="position: relative; background: url(https://l.t26.net/img/dotccc.gif) repeat-x 0 12px; text-align: center;"><p style="color: #777; font-size: 13px; font-family: Open sans; background: #fff; width: 175px; margin: 0 auto;">Al crear tu cuenta podr&aacute;s</p></div>
<div class="list" style="width: 100%; display: inline-block; margin-top: 7px;">
<li>Dejar tu opini&oacute;n en las noticias</li>
<li>Enviar una petici&oacute;n para poder ser publicador</li>
<li>Votar las noticias que m&aacute;s te gusten</li>
<li>Comunicarte con los administradores y dem&aacute;s publicadores</li>
</div>
</div>
</div>

</div>

</div>
</body>
</html>
<?php
}
?>