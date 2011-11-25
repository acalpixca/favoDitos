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
}


function validaUsuario($user,$password)

{
$query='SELECT US.userId, US.password FROM userTable US WHERE US.userId ="' .$user . '" AND US.password="' .$password . '"';

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
$query='SELECT categoryId from category where categoryId="'.$category.'"';

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
}

function getLinkId($userId, $URL, $date)
{
$query='SELECT linkId from link where userId="' . $userId .'" and date=\''.$date.'\' and URL="' . $URL . '"';

//echo $query ."<br>";
$resulta = mysql_query($query) or die('getLinkId query failed: ' . mysql_error());

$linea = mysql_fetch_array($resulta, MYSQL_BOTH);

mysql_free_result($resulta);
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
$query='SELECT categoryId FROM category WHERE userId ="' . $user . '" order by categoryId asc' ;
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
$query= 'select LI.linkId, LI.title, LI.URL, LI.comment, LI.date from link LI, catlink CA where LI.linkId=CA.linkId and CA.categoryId="'.$category.'" ORDER BY LI.date DESC';
//$query='select linkId, title, URL, comment, date from link where userId = "'. $user .'" ORDER BY date DESC';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// echo '<div class="subheader"><span class="usuario">'. $user. '</span>, estos son tus <span class="favoDitos">favoDitos</span>. (<a href="nuevolink.php?user=' . $user . '">Añade un link</a>)</div>';
echo '<div class="linklist">';

while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

echo '<p class="link"><a href="' .$line[2]. '">' . $line[1] .'</a></p>';
echo '<p class="resumen">' . $line[3] .'</p>';

echo '<p>Categorías: <span class="categoria">';

$query2='select categoryId from catlink where linkId=' . $line[0] . ' order by categoryId asc';
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
while ($line2 = mysql_fetch_array($result2, MYSQL_BOTH)) {

echo '<a class="categoria" href="categorylinks.php?user=' .$user .'&category='. $line2[0] .'">'.$line2[0] .'</a> ';
}
echo '</span>';

echo '<p class="fecha">Guardado el ' . $line[4] .'</p>';
}

echo '</div>';

}

function generaLinksUsuario($user)

{
$query='select linkId, title, URL, comment, date from link where userId = "'. $user .'" ORDER BY date DESC';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo '<div class="subheader"><span class="usuario">'. $user. '</span>, estos son tus <span class="favoDitos">favoDitos</span>. (<a href="nuevolink.php?user=' . $user . '">Añade un link</a>)</div>';
echo '<div class="linklist">';

while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

echo '<p class="link"><a href="' .$line[2]. '">' . $line[1] .'</a></p>';
echo '<p class="resumen">' . $line[3] .'</p>';

echo '<p>Categorías: <span class="categoria">';

$query2='select categoryId from catlink where linkId=' . $line[0] . ' order by categoryId asc';
$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
while ($line2 = mysql_fetch_array($result2, MYSQL_BOTH)) {

echo '<a class="categoria" href="categorylinks.php?user=' .$user .'&category='. $line2[0] .'">'.$line2[0] .'</a> ';
}
echo '</span>';

echo '<p class="fecha">Guardado el ' . $line[4] .'</p>';
}

echo '</div>';

}

function buscafoto($idarticulo, $idedicion)
{

$query='SELECT FO.idfoto FROM foto FO, edicionxarticulo EXA WHERE EXA.idarticulo =' .$idarticulo . ' AND EXA.idedicion=' .$idedicion .' AND EXA.idfoto=FO.idfoto';

$resulta = mysql_query($query) or die('Query failed: ' . mysql_error());

$linea = mysql_fetch_array($resulta, MYSQL_BOTH);

mysql_free_result($resulta);

if ($linea[0]==FALSE) {
	$res=FALSE;
}
else {
	$res=TRUE;
}
// return ($res);
return(TRUE); // cuando pongas datos en la tabla user, cambia esta linea por la de arriba

}

function generacabecera($idedicion)
{
$query='SELECT max(idedicion) from edicion';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$line=mysql_fetch_array($result, MYSQL_BOTH);
$max=$line[0];
mysql_free_result($result);

if ($idedicion==FALSE or $idedicion>$max or $idedicion<1) {
	$idedicion=$max;
	if ($idedicion==FALSE) {$idedicion=1;}
}
//aquí busco la fecha de la edicion
$query='SELECT fecha from edicion where idedicion='.$idedicion;
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$line=mysql_fetch_array($result, MYSQL_BOTH);
$fecha=$line[0];
mysql_free_result($result);

// para poner la fecha vas a necesitar esto si quieres que sea estándar de RSS echo date(DATE_RFC822);
// Note:  To generate a timestamp from a string representation of the date, you may be able to use strtotime().
// ver fechas.php
// es esta linea nueva-... $sellofecha

$sellofecha=strtotime($fecha);

setlocale(LC_TIME, "es_ES");
echo "<a class=\"linkcabecera\" href=\"portada.php?idedicion=" . $max ."\"><img src=\"pics/azotadorbanner.jpg\"></a>";
// echo "<a class=\"linkcabecera\" href=\"portada.php?idedicion=" . $max ."\"><div id=\"logotipo\"><img src=\"pics/azotador.jpg\" align=\"middle\">El Azotador de Xochimilco</div></a>";
echo"<a class=\"linkcabecera\" href=\"portada.php?idedicion=". $idedicion ."\"><h3>Edición " . $idedicion . ", " . strftime("%A %d de %B, %Y", $sellofecha) ."</h3></a>";

/*
echo "
<div id=\"logotipo\"><img src=\"pics/azotador.jpg\" align=\"middle\">El Azotador de Xochimilco</div>
";*/
return $idedicion;
}

function generalateralsecciones($idedicion)
{
// Performing SQL query
$query = 'SELECT * FROM seccion ORDER BY seccion.orden';

$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<h3>Secciones</h3>";
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {
   echo "\t<tr>\n";

	echo "<td><a class=\"menuseccion\" href=\"seccion.php?idedicion=".$idedicion."&idseccion=". $line[0] . "\">". $line[1] . "</a></td>";

   echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);
}

function generatitulares($idedicion)
{
$query='SELECT AR.titulo, TI.idarticulo, AR.resumen from titular TI, articulo AR WHERE TI.idedicion=' .$idedicion .' and AR.idarticulo=TI.idarticulo ORDER BY TI.orden';


$result = mysql_query($query) or die('Query failed: ' . mysql_error());
echo "<table>\n";
$i=0;
while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {
   echo "\t<tr>\n";
	if ($i==0) {

		  $idfoto=buscafoto($line[1],$idedicion);
		// echo "<strong>edicion $idedicion, articulo $line[1], el id de la foto es $idfoto</strong><br>";
		if ($idfoto!=FALSE) {

				//aquí busco el string con el nombre del fichero de la foto
				$query='SELECT FO.fichero FROM foto FO where FO.idfoto='. $idfoto;
				$resulta = mysql_query($query) or die('Query failed: ' . mysql_error());
				$linea = mysql_fetch_array($resulta, MYSQL_BOTH);
				$ficherofoto = $linea[0];

				// Free resultset
				mysql_free_result($resulta);
		}

	}
	echo "<td><a class=\"linkarticulo\" href=\"articulo.php?idedicion=".$idedicion."&idarticulo=". $line[1] . "\"><h3>". $line[0] . "</h3></a>";
	if ($i==0) {
		if ($idfoto!=FALSE){
			echo "<img src=\"pics/edicion".$idedicion . "/".$ficherofoto . "\"><br>";
		}
	}
	echo $line[2];
	echo "</td>";

   echo "\t</tr>\n";
   $i=$i+1;
}
echo "</table>\n";

mysql_free_result($result);
}

function generalateralherramientas()
{
echo "<table><tr><td>";
echo "<a href=\"titulares.xml\"><img src=\"pics/syndicated-feed-icon.gif\"> Titulares RSS</a>";
echo "</td></tr>";

echo "<tr><td>";
/*
echo "
<form action=\"portada.php\" method=\"post\">
 Núm edición:<br>
 <input type=\"text\" name=\"idedicion\" size=4 />
 <br>
 <input type=\"submit\" value=\"Acceder\" />
 </form>";

 */

 // formulario que va a dar un desplegable de ediciones anteriores
 $query='SELECT ED.idedicion, ED.fecha from edicion ED ORDER BY ED.fecha DESC' ;
 $result = mysql_query($query) or die('Query failed: ' . mysql_error());

 setlocale(LC_TIME, "es_ES");
 echo "Ediciones anteriores:<br>";
 echo "<form action=\"portada.php\" method=\post\">
 <select name=\"idedicion\">";

 while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

		$sellofecha=strtotime($line[1]);
		$strfecha=strftime("%d %B %Y", $sellofecha);
		echo "<option value=\"$line[0]\">$strfecha";

}


echo "</select>
  <input type=\"submit\" value=\"Acceder\" />
 </form>
 ";

 echo "</td></tr>";

 echo "<tr><td>Se dice de Xochimilco:
 			<ul class=\"sinpuntos\">
 			<li><a href=\"http://www.google.com.mx/search?hl=es&q=xochimilco&btnG=B%C3%BAsqueda&meta=\">En Google</a></li>
 			<li><a href=\"http://a9.com/xochimilco\">En A9</a></li>
 			<li><a href=\"http://clusty.com/search?query=xochimilco\">En Clusty</a></li>
 			<li><a href=\"http://www.live.com/?x=0&y=0#q=xochimilco&offset=1\">En Live</a></a>
 			</ul>
		</td></tr>";

		echo "<tr><td><a href=\"http://es.wikipedia.org/wiki/Xochimilco\">Xochimilco en la Wikipedia</a></td></tr>";

		echo "<tr><td><a href=\"\">Xochimilco desde el aire</a></td></tr>";
  echo "</table>";

 mysql_free_result($result);
}


?>
