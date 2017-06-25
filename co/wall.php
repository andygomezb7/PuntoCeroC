<?php
include('../connect.php');
include('../config.php');
include('../time_stamp.php');

function BBcode($texto){ 
   $a = array( 
      "/\[i\](.*?)\[\/i\]/is", 
	  "/\[code\](.*?)\[\/code\]/is", 
      "/\[b\](.*?)\[\/b\]/is", 
      "/\[u\](.*?)\[\/u\]/is", 
      "/\[img\](.*?)\[\/img\]/is", 
      "/\[url=(.*?)\](.*?)\[\/url\]/is", 
	  "/\[font=(.*?)\](.*?)\[\/font\]/is", 
	  "/\[color=(.*?)\](.*?)\[\/color\]/is", 
	  "/\[size=(.*?)\](.*?)\[\/size\]/is", 
	  "/\[align=(.*?)\](.*?)\[\/align\]/is" 
   ); 

   $b = array( 
      "<i>$1</i>", 
	  "<div id=\"highlighter_714048\" class=\"syntaxhighlighter htmlscript\">$1</div>",
      "<b>$1</b>", 
      "<u>$1</u>", 
      "<img src=\"$1\" />", 
      "<a href=\"$1\" target=\"_blank\">$2</a>",
      "<font face=\"$1\" >$2</font>",
      "<font color=\"$1\">$2</font>",
      "<font size=\"$1\">$2</font>",
      "<div style=\"text-align:$1;\">$2</div>"	  
   ); 
   $texto = preg_replace($a, $b, $texto); 
   return $texto; 
} 

$i = $_GET['p'];
$query = mysql_query("SELECT * FROM coments WHERE post_co='".$i."' ORDER BY id_co DESC");

if($query == true){

   while ($r = mysql_fetch_array($query)){
   //Info de usuario
   $naioeuhkmn = mysql_query("SELECT * FROM admins WHERE id_u='".$r['u_co']."'");
   $u = mysql_fetch_array($naioeuhkmn);
   if($u['av_u'] == NULL){
   $av = "http://pluswort.tk/i/bb.png";
   }else{
   $av = $u['av_u'];
   }
   ?>
   <div class="cocomentya">
   
   <div style="width: 100%; display: inline-block;">
   <div style="float: left; border-radius: 50%; width: 10%; margin-right: 2%;"><a href="#"><img src="<?=$av?>" style="border-radius: 50%;" /></a></div>
   
   <div style="float: left; width: 88%;">
   <div style="width: 100%; display: inline-block;"><span style="color: #0084B4; font-size: 13px;"><?php echo $u['name_u']; ?></span><span style="color: #999; font-size: 11px;"> &middot; <?=time_stamp($r['h_co'])?></span></div>
   <div style="color: #666; margin-top: 5px; font-size: 12px;">
   <?php
   echo BBcode($r['con_co']);
   ?>
   </div>
   </div>
   
   </div>
   
   </div>
   <?php
   }
   
}
?>