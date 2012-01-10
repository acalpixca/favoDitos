<?php
// Connecting, selecting database

//$urlita="http://azotador.webcindario.com";
//$pathito="/home/webcindario/azotador";

$urlita="http://localhost";
$pathito="E:/xampplite/htdocs/azotador";

function inicializaBBDD()
{
global $link;


$servidorBBDD = "favoditos.db.3597201.hostedresource.com";
$BBDDuser = "favoditos";
$BBDDpwd = "Moscu80";
$BBDDname = "favoditos";


$link = mysql_connect($servidorBBDD, $BBDDuser, $BBDDpwd)
   or die('Could not connect: ' . mysql_error());
mysql_select_db($BBDDname) or die('Could not select database');
// esta instrucción es nueva, es para el problema de los tags con acentos, pero no va bien
//@mysql_query("SET NAMES 'utf8'",$link);
}


function validaUsuario($user,$password)

{
$query=sprintf('SELECT US.userId, US.password FROM userTable US WHERE US.userId ="' . mysql_real_escape_string($user) . '" AND US.password="' . mysql_real_escape_string($password) . '"');

//$query='SELECT US.userId, US.password FROM userTable US WHERE US.userId ="' .$user . '" AND US.password="' .$password . '"';

$resulta = mysql_query($query) or die('Query failed: ' . mysql_error());

$linea = mysql_fetch_array($resulta, MYSQL_BOTH);

mysql_free_result($resulta);

if ($linea[0]==FALSE) {
	$res=-1;
}
else {
	$res=1;
}

return($res);
//return (1); //devuelve la línea de arriba cuando ya tengas datos en la BBDD...
}

function categoryExists($category)
{
//Si la categoría existe, la devuelve.
//Si no existe, devuelve -1.
// $query='SELECT categoryId from category where categoryId="'.$category.'"';

$query=sprintf('SELECT categoryId from category where categoryId="'. mysql_real_escape_string($category) .'"');

$resulta = mysql_query($query) or die('Query failed: ' . mysql_error());

$linea = mysql_fetch_array($resulta, MYSQL_BOTH);

mysql_free_result($resulta);

if ($linea[0]==FALSE) {
	$res=-1;
}
else {
	//$res=1;
	$res=$linea[0];
}

return($res);
}

function getLinkId($userId, $URL, $date)
{
// $query='SELECT linkId from link where userId="' . $userId .'" and date=\''.$date.'\' and URL="' . $URL . '"';

$query=sprintf('SELECT linkId from link where userId="' . mysql_real_escape_string($userId) .'" and date=\''. mysql_real_escape_string($date).'\' and URL="' . mysql_real_escape_string($URL) . '"');

//echo 'query en getLinkId es ' . $query ."<br>";
$resulta = mysql_query($query) or die('getLinkId query failed: ' . mysql_error());

$linea = mysql_fetch_array($resulta, MYSQL_BOTH);

mysql_free_result($resulta);
//echo 'getLinkId para fecha ' . $date.' y usuario ' .$userId .' es ' . $linea[0] .'<br>';
return ($linea[0]);
}

function formularioValidacion()

{
echo '<div class="formulario">';
echo '<form name="login" action="userlinks.php"';
echo 'method="get">';
echo 'Usuario: <br>';
echo '<input type="text" name="user"><br>';
echo 'Contrase&ntilde;a:<br>';
echo '<input type="password" name="password"><br>';
echo '<input type="submit" value="&#161;Dale!">';
echo '</form>';
echo '</div>';
}



function generaCategorias($user)
{
//$query='SELECT categoryId FROM category WHERE userId ="' . $user . '" order by categoryId asc' ;
$query='SELECT DISTINCT catlink.categoryID FROM catlink,link WHERE link.userId="'. mysql_real_escape_string($user) .'" AND catlink.linkId=link.linkId ORDER BY categoryId ASC';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo '<div class="categorylist">';
echo '<a href="index.php">Desconectar</a><br>';
echo '<ul class="listanostyle">';

while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

	echo '<li><a href="categorylinks.php?user='. $user . '&category='.$line[0].'">'. $line[0] .'</a></li>';
}
echo '</div>';

}

function generaLinksCat($user,$category)
{
//$query =sprintf('select LI.linkId, LI.title, LI.URL, LI.comment, LI.date from link LI, catlink CA where LI.linkId=CA.linkId and CA.categoryId="'. mysql_real_escape_string($category). " AND LI.userId=" . $user . '" ORDER BY LI.date DESC');

//$query ="select LI.linkId, LI.title, LI.URL, LI.comment, LI.date from link LI, catlink CA where LI.linkId=CA.linkId and CA.categoryId=\"". mysql_real_escape_string($category) . "\" AND LI.userId=\" . $user . "\" ORDER BY LI.date DESC";

$query=sprintf('SELECT LI.linkId, LI.title, LI.URL, LI.comment, LI.date FROM link LI, catlink CL WHERE LI.linkId=CL.linkId AND CL.categoryId="' . mysql_real_escape_string($category) . '" AND LI.userId="' . $user . '" ORDER BY LI.date DESC');
//$query='select linkId, title, URL, comment, date from link where userId = "'. $user .'" ORDER BY date DESC';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// echo '<div class="subheader"><span class="usuario">'. $user. '</span>, estos son tus <span class="favoDitos">favoDitos</span>. (<a href="nuevolink.php?user=' . $user . '">Añade un link</a>)</div>';
echo '<div class="linklist">';

while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

echo '<p class="link"><a href="' .$line[2]. '" target="_blank">' . $line[1] .'</a></p>';
echo '<p class="resumen">' . $line[3] .'</p>';

echo '<p>Categor&iacute;as: <span class="categoria">';

//$query2='select categoryId from catlink where linkId=' . $line[0] . ' order by categoryId asc';

$query2=sprintf('select categoryId from catlink where linkId=' . mysql_real_escape_string($line[0]) . ' order by categoryId asc');

$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
while ($line2 = mysql_fetch_array($result2, MYSQL_BOTH)) {

echo '<a class="categoria" href="categorylinks.php?user=' .$user .'&category='. $line2[0] .'">'.$line2[0] .'</a> ';
}
echo '</span>';

echo '<p class="fecha">Guardado el ' . $line[4] .' <a href="deleting.php?linkId=' . $line[0] . '">borrar</a></p>';
}

echo '</div>';

}

function generaLinksUsuario($user)

{
//$query='select linkId, title, URL, comment, date from link where userId = "'. $user .'" ORDER BY date DESC';

$query=sprintf('select linkId, title, URL, comment, date from link where userId = "'. mysql_real_escape_string($user) .'" ORDER BY date DESC');


$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo '<div class="subheader"><span class="usuario">'. $user. '</span>, estos son tus <span class="favoDitos">favoDitos</span>. (<a href="nuevolink.php?user=' . $user . '">Añade un link</a>)</div>';
echo '<div class="linklist">';

while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

echo '<p class="link"><a href="' .$line[2]. '" target="_blank">' . $line[1] .'</a></p>';
echo '<p class="resumen">' . $line[3] .'</p>';

echo '<p>Categorías: <span class="categoria">';

//$query2='select categoryId from catlink where linkId=' . $line[0] . ' order by categoryId asc';

$query2=sprintf('select categoryId from catlink where linkId=' . mysql_real_escape_string($line[0]) . ' order by categoryId asc');

$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
while ($line2 = mysql_fetch_array($result2, MYSQL_BOTH)) {

echo '<a class="categoria" href="categorylinks.php?user=' .$user .'&category='. $line2[0] .'">'.$line2[0] .'</a> ';
}
echo '</span>';

echo '<p class="fecha">Guardado el ' . $line[4] .' <a href="deleting.php?linkId=' . $line[0] . '">borrar</a></p>';
}

echo '</div>';

}

function borraLink($linkId)
{

// identifica si existe el linkId
//$query='SELECT linkId from link where linkId='.$linkId;

$query=sprintf('SELECT linkId from link where linkId='. mysql_real_escape_string($linkId));


//echo $query .'<br>';
$resulta = mysql_query($query) or die('getLinkId query failed: ' . mysql_error());
$linea = mysql_fetch_array($resulta, MYSQL_BOTH);
mysql_free_result($resulta);
if ($linea[0]==FALSE) {
	$existeLink=-1;
}
else {
	$existeLink=1;
}

// si existe
if ($existeLink==1)
{
//	busca sus categorías
$query2='select categoryId from catlink where linkId=' . $linkId;
//echo $query2 . '<br>';
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
// 	para cada categoría del link
while ($line2 = mysql_fetch_array($result2, MYSQL_BOTH)) {
// 		borra sus catlink correspondientes
$query1='delete from catlink where categoryId="'.trim($line2[0]) . '" and linkId='. $linkId;
//echo $query1 . '<br>';
$result1 = mysql_query($query1) or die('Borrado de catlink failed: ' . mysql_error());
// 		si no queda esa categoría en catlink
$query1='select categoryId from catlink where categoryId="' . trim($line2[0]) .'"';
//echo $query1 . '<br>';
$result1 = mysql_query($query1) or die('Query failed: ' . mysql_error());
$linea = mysql_fetch_array($result1, MYSQL_BOTH);
mysql_free_result($result1);
//echo 'borrar la categoría ' . $line2[0].'? la query da ' . $linea[0] .'<br>';
if ($linea[0]==FALSE) {
// 			borra esa categoría en category
$query3='delete from category where categoryID="'.trim($line2[0]) .'"'; //and userId="'. $_SESSION[user].'"';
$result3 = mysql_query($query3) or die('Borrado de categoria failed: ' . mysql_error());
//echo $query3 . '<br>';
//echo "el borrado devuelve " . $result3 . " y ha afectado a este núm de records:" .mysql_affected_rows() ."<br>";
//		fin si
}
//	fin para
}
//	borra el link
$query='delete from link where linkId='.$linkId;
//echo $query . '<br>';
$result = mysql_query($query) or die('Borrado de link failed: ' . mysql_error());
// fin si
}
}


?>
