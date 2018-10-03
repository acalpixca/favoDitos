<?php
session_start();
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
FavoDitos, nuestro del.icio.us particular
</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div class="row">
<div class="col-12 col-m-12">
<h1><span class="favoDitos">FavoDitos</span><span class="nuestro">, nuestro <span class="delicious">del.icio.us</span> particular</span></h1>
</div>
</div>
<?php
include_once 'funciones.php';
//session_start();

if (!empty($_POST['user']) && !empty($_POST['password']))
{
	$_SESSION['user']=$_POST['user'];
	$_SESSION['password']=$_POST['password'];
	ChromePhp::log('Contraseña y password en el formulario no vacíos');
}

$user=$_SESSION['user'];
$password=$_SESSION['password'];
ChromePhp::log($password);


inicializaBBDD();

$resul=validaUsuario($user,$password);

if ($resul!=1)
{
	echo '</div>';
	echo '<div class="row">';
	echo '<div class="col-6 col-m-12">La combinaci&oacute;n de usuario y contrase&ntilde;a no es correcta. Int&eacute;ntalo de nuevo...</div>';
	formularioValidacion();
	echo '</div>';
}
else
{
	echo '<div class="row">';
	generaCajaBusqueda();
	echo '<div class="row">';
	generaLinksUsuario($user);
	generaCategorias($user);
}

mysql_close($link);
?>

</body>
</html>
