<?php
session_start();
$user=$_SESSION['user'];
$password=$_SESSION['password'];
//echo "estas son las variables de estado..." . $user . $password;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>
FavoDitos, nuestro del.icio.us particular
</title>
<link rel="stylesheet" type="text/css" href=" estilo.css">
</head>
<body>
<h1><span class="favoDitos">FavoDitos</span><span class="nuestro">, nuestro <span class="delicious">del.icio.us</span> particular</span></h1>
<?php
include_once 'funciones.php';
inicializaBBDD();

echo '<div class="subheader"><span class="favoDitos">favoDito</span> borrado.<br>';


//echo $user . '<br>';
//echo $password . '<br>';
//echo $_GET['titulo'] . '<br>';
//echo $_GET['URL'] . '<br>';
//echo $_GET['comentario'] . '<br>';
//echo $_GET['categories'] . '<br>';

borraLink($_GET['linkId']);

echo '</div>';
mysql_close($link);
?>
<div class="formulario">
<form name="aceptar" action="userlinks.php" method="get">
<input type="submit" value="Aceptar">
</form>
</div>


</body>
</html>
