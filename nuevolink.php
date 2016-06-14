<?php
session_start();
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
FavoDitos, nuestro del.icio.us particular
</title>
<link rel="stylesheet" type="text/css" href=" estilo.css">
</head>
<body>
<h1><span class="favoDitos">FavoDitos</span><span class="nuestro">, nuestro <span class="delicious">del.icio.us</span> particular</span></h1>

<div class="subheader">A?ade un nuevo <span class="favoDitos">favoDito</span>:</div>

<div class="formulario">

<form name="newlink" action="adding.php" method="get">
T?tulo (obligatorio):<br>
<input type="text" name="titulo" size="127"><br>
Link o URL (obligatorio):<br>
<input type="text" name="URL" size="127"><br>
Descripci?n:<br>
<textarea rows="5" cols="50" name="comentario" wrap="physical"></textarea><br>
Categor?as (separadas por coma):<br>
<input type="text" name="categories" size="80"><br>
<input type="submit" value="&#161;Dale!">
</form>
</div>
<?php
$user=$_SESSION['user'];
$password=$_SESSION['password'];
// echo 'yo soy una crack'. $user .$password;
?>
</body>
</html>
