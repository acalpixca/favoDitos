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

echo '<div class="subheader"><span class="favoDitos">favoDito</span> añadido.<br>';


//echo $user . '<br>';
//echo $password . '<br>';
//echo $_GET['titulo'] . '<br>';
//echo $_GET['URL'] . '<br>';
//echo $_GET['comentario'] . '<br>';
//echo $_GET['categories'] . '<br>';

//$fecha=mktime(date("m/d/y h:i:s"));
$fecha=time();

//echo 'esta será la fecha del link...' . mktime(date("m/d/y H:i:s",$fecha)) . '<br>';

$query='insert into link (userId,title,URL,comment,date) values ("' .$user .'", "' . $_GET['titulo'].'", "'.$_GET['URL']. '", "'. $_GET['comentario']. '", \'' . date("y/m/d H:i:s",$fecha) . '\')';
//echo $query .'<br>';
$resulta = mysql_query($query) or die('Insert into link failed: ' . mysql_error());
//echo "insert into link completo<br>";
// ya hemos creado el registro en link
// aquí dividimos las categorías separadas por comas, le quitamos los espacios en blanco
//$cat_list = preg_split( '[/., -]', $_GET['categories']); //split por espacio,coma, punto,slash,dash
$cat_list = preg_split("/[\s,.;-]+/", $_GET['categories']); //split por espacio,coma, punto,slash,dash

// if el último elemento de cat_list es un vacío, entonces quítalo de la lista. Es para el caso de que la lista acabe en terminador (.,;-)
if (empty($cat_list[count($cat_list)-1])) {
	array_pop($cat_list);
}


//echo "llamo a getLinkId...<br/>";
$linkId=getLinkId($user,$_GET['URL'], date("y/m/d H:i:s",$fecha)); // obtenemos el linkId que acabamos de insertar
//echo 'he hecho bien getLinkId con fecha '. date("y/m/d H:i:s",$fecha).' , devuelve '.$linkid . '<br/>';
$i=0;
//echo '<br/>total categories '. count($cat_list) . '<br/>';
//echo '<br/>La lista de categorías, en variable GET: ' . $_GET['categories'] . '<br/>';
//echo '<br/>La lista de categorías, en array ya splitteado: ' . $cat_list . '<br/>';
//var_dump($cat_list);
while ($i<count($cat_list))
{
	$category=trim($cat_list[$i]);
	//echo 'Bucle. Categoría ' . $i . ' es, una vez trimmeada: ' . $category . '<br/>';
	if (categoryExists($category)==-1)
	{
		//añadir la categoría a category (userId, categoryId)
		$query2='insert into category (categoryId) values ("' . $category.'")';
		//echo $query2 .'<br>';
		$resulta2 = mysql_query($query2) or die('Insert into category failed: ' . mysql_error());
		//echo "insert into category completado<br>";
	}
	// insertar el par $category,$linkId en catlink
	//$query2='insert into catlink (categoryId,linkId) values (" '.$category.'",'.$linkId.')' ;
	// Aquí abajo insertamos el resultado de categoryExists para no evitar quasi duplicaciones, como "categoria" y "Categoría"
	$query2='insert into catlink (categoryId,linkId) values ("'. categoryExists($category).'",'.$linkId.')' ;
	//echo $query2 .'<br>';
	$resulta2 = mysql_query($query2) or die('Insert into catlink failed: ' . mysql_error());
	//echo "insert into catlink completado<br>";
	//echo 'element ' .$i . ' ' . trim($cat_list[$i]) .'<br>';
	$i=$i+1;
}

echo '</div>';
mysql_close($link);
?>
<div class="formulario">
<form name="aceptar" action="userlinks.php" method="get">
<input type="submit" value="&#161;Aceptar">
</form>
</div>


</body>
</html>
