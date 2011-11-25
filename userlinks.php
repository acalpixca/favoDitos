<?php
session_start();
?>
<html>
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

if (!empty($_GET['user']) && !empty($_GET['password']))
{
	$_SESSION['user']=$_GET['user'];
	$_SESSION['password']=$_GET['password'];
}

	$user=$_SESSION['user'];
	$password=$_SESSION['password'];
	//echo 'usuario/password: ' .$user .$password;
inicializaBBDD();

$resul=validaUsuario($user,$password);

if ($resul!=1)
{
echo 'La combinación de usuario y contraseña no es correcta. Inténtalo de nuevo...';
formularioValidacion();
}
else
{
	generaLinksUsuario($user);
	generaCategorias($user);
}

mysql_close($link);
?>

</body>
</html>
