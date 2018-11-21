<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="viewport" content="width=device-width" />
<meta name="title" content="Info Panel" />
<style>
body {background:#000000 url(images/fondo.jpg) center center fixed;font:normal 14px/14px sans-serif;color:#FFFFFF}
#cont {background:#000000;position:absolute;top:40px;right:40px;width:480px;height:auto;padding:16px;opacity:0.68;-moz-opacity:0.68;-khtml-opacity:0.68;filter:alpha(opacity=68)}
#bckg {position:fixed;top:0px;left:0px;right:0px;bottom:0px;min-width:100%;min-height:100%;width:auto;height:auto;border:0px;z-index:-100;}
input {background:#000000;border:0px none;border-bottom:1px solid #DEDEDE;color:#FFFFFF;width:100%;height:24px}
</style>
<script>
var imgs=new Array("imgs/img_01.jpg","imgs/img_02.jpg","imgs/img_03.jpg","imgs/img_04.jpg");

function slidebg(){
if (document.images)document.images["bckg"].src=imgs[(Math.floor(Math.random()*imgs.length))];
}

setInterval("slidebg()", 8000);
</script>
</head>
<body>
<img id="bckg" name="bckg" src="imgs/img_00.jpg" border="0">
<div id="cont">
<h2>Mensajes:</h2>

<?php
$pass = htmlspecialchars($_POST["pass"], ENT_QUOTES);
$text = htmlspecialchars($_POST["text"], ENT_QUOTES);
$file = "info.txt";
$date = date("H:i");
$post = "<b>$date</b> : $text <hr size='1' color='#DEDEDE' noshade> \n";
if ($text !="" && $pass =="Test") file_put_contents($file, $post, FILE_APPEND | LOCK_EX);
$todo = file_get_contents($file);
echo "$todo \n";
?>

<form name="form" method="POST">
<br><br>
<input type="password" value="" name="pass" maxlength="16" placeholder="Password">
<br><br>
<input type="text" value="" name="text" maxlength="68" placeholder="Escribe un mensaje ...">
<br><br>
<input type="submit" value="Enviar" style="visibility:visible">
<br><br>
</form>
</div>
</body>
</html>