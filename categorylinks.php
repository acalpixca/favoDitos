<?php
session_start();
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
//$category=' '.trim($_GET['category']);
$category=trim($_GET['category']);
$user=trim($_SESSION['user']);
echo '<div class="subheader"><span class="usuario">'.$user.'</span>, estos son tus <span class="favoDitos">favoDitos</span> para la categor&iacute;a <span class="categoria">'. $category.'</span>. (<a href="nuevolink.php?user=' . $user . '">A&ntilde;ade un link</a>)   (<a href="http://www.lavigilanta.info/favoditos/userlinks.php?user='.$_SESSION['user'].'&password='.$_SESSION['password'].'">todos tus links</a>)</div>';

inicializaBBDD();

generaLinksCat($user,$category);
generaCategorias($user);
mysql_close($link);

?>
</body>
</html>
