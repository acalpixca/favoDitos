<?php
session_start();
?>
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
//$category=' '.trim($_GET['category']);
$category=trim($_GET['category']);
$user=trim($_SESSION['user']);
//echo '<div class="subheader"><span class="usuario">'.$user.'</span>, estos son tus <span class="favoDitos">favoDitos</span> para la categor&iacute;a <span class="categoria">'. $category.'</span>. (<a href="nuevolink.php?user=' . $user . '">A&ntilde;ade un link</a>)   (<a href="http://www.lavigilanta.info/favoditos/userlinks.php?user='.$_SESSION['user'].'&password='.$_SESSION['password'].'">todos tus links</a>)</div>';

//echo '<div class="subheader"><span class="usuario">'.$user.'</span>, estos son tus <span class="favoDitos">favoDitos</span> para ';
//echo 'la categor&iacute;a <span class="categoria">'. $category.'</span>. (<a href="nuevolink.php?user=' . $user . '">A&ntilde;ade un link</a>)   (<a href="userlinks.php">todos tus links</a>)</div>';

inicializaBBDD();

echo '<div class="row">';
generaCajaBusqueda();
echo '<div class="row">';
generaLinksCat($user,$category);
generaCategorias($user);
mysql_close($link);

?>
</body>
</html>
