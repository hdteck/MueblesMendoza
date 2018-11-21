<?php
if(isset($_POST["enviar"]))
{
    $clave = $_POST["clave"];
    echo "Seguridad de la clave: " . verificar_seguridad_clave($clave);
}
 
/**
 * Funcion que devuelve la seguridad de una constraseña en %
 */
function verificar_seguridad_clave($string){
    $h    = 0;
    $size = strlen($string);
 
    # obtenemos la cantidad de caracteres repetidos en la cadena
    foreach(count_chars($string, 1) as $v){
        $p = $v / $size;
        $h -= $p * log($p) / log(2);
    }
    $strength = ($h / 4) * 100;
    if($strength > 100){
        $strength = 100;
    }
    return $strength;
}
?>
<html>
<body>
<form action="" method="POST">
    <p>Clave:</p>
    <p><input type="password" name="clave"></p>
    <p><input type="submit" name="enviar" value="Verificar"></p>
</form>
</body>
</html>