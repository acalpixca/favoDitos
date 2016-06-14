<?php
// Connecting, selecting database

//$urlita="http://azotador.webcindario.com";
//$pathito="/home/webcindario/azotador";

//$urlita="http://localhost/favoditos/";
// $urlita="http://www.lavigilanta.info/favoditos/";
//$pathito="E:/xampplite/htdocs/azotador";

function inicializaBBDD()
{
global $link;

/*
$servidorBBDD = "favoditos.db.3597201.hostedresource.com";
$BBDDuser = "favoditos";
$BBDDpwd = "Moscu80";
$BBDDname = "favoditos";
*/

$servidorBBDD = "localhost";
$BBDDuser = "root";
$BBDDpwd = "barcelona";
$BBDDname = "favoditos";


$link = @mysql_connect($servidorBBDD, $BBDDuser, $BBDDpwd) or die('Could not connect: ' . mysql_error());
mysql_select_db($BBDDname) or die('Could not select database');
// esta instrucción es nueva, es para el problema de los tags con acentos, pero no va bien
//@mysql_query("SET NAMES 'utf8'",$link);
}


function validaUsuario($user,$password)
{
	$query=sprintf('SELECT US.userId, US.password FROM userTable US WHERE US.userId ="' . mysql_real_escape_string($user) . '" AND US.password="' . mysql_real_escape_string(md5($password)) . '"');

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
		$res=$linea[0];
	}

	return($res);
}

function getLinkId($userId, $URL, $date)
{
	$query=sprintf('SELECT linkId from link where userId="' . mysql_real_escape_string($userId) .'" and date=\''. mysql_real_escape_string($date).'\' and URL="' . mysql_real_escape_string($URL) . '"');

	$resulta = mysql_query($query) or die('getLinkId query failed: ' . mysql_error());

	$linea = mysql_fetch_array($resulta, MYSQL_BOTH);

	mysql_free_result($resulta);

	return ($linea[0]);
}

function formularioValidacion()
{
	echo '<div class="col-6 col-m-12">';
	echo '<form name="login" action="userlinks.php"';
	echo 'method="POST">';
	echo 'Usuario: <br>';
	echo '<input type="text" name="user"><br>';
	echo 'Contrase&ntilde;a:<br>';
	echo '<input type="password" name="password"><br>';
	echo '<input type="submit" value="&#161;Dale!">';
	echo '</form>';
	echo '</div>';
}

function generaCajaBusqueda()
{
	echo '<div class="cajaBusqueda col-4 col-m-12">';
	echo '<form name="cajaBusqueda" action="busqueda.php"';
	echo 'method="POST">';
	echo '&iquest;Qu&eacute; buscas?: ';
	echo '<input type="text" name="textoBusqueda">    ';
	echo '<input type="submit" value="&#161;Dale!">';
	echo '</form><br/>';
	echo '</div>';
}

function generaCategorias($user)
{
	$query='SELECT DISTINCT catlink.categoryID FROM catlink,link WHERE link.userId="'. mysql_real_escape_string($user) .'" AND catlink.linkId=link.linkId ORDER BY categoryId ASC';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	echo '<div class="categorylist col-4 col-m-12">';
	echo '<a href="index.php">Desconectar</a><br>';
	echo '<ul class="listanostyle">';

	while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

		echo '<li><a href="categorylinks.php?user='. $user . '&category='.$line[0].'">'. $line[0] .'</a></li>';
	}
	echo '</div>';
	echo '</div>';

}


function generaLinksBusqueda($user,$textoBusqueda){
// copia la función generaLinksCat y cambia ligeramente el código para que busque el texto en cualquier campo de la tabla links.	

	$textoBusqueda=mysql_real_escape_string($textoBusqueda);
	
	$query="select LI.linkId, LI.title, LI.URL, LI.comment, LI.date FROM link LI WHERE LI.title LIKE '%{$textoBusqueda}%' OR LI.comment LIKE '%{$textoBusqueda}%' "; 

	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	
	echo '<div class="subheader col-8 col-m-12"><span class="usuario">'.$user.'</span>, estos son tus <span class="favoDitos">favoDitos</span> para ';
	echo 'la b&uacute;squeda <span class="categoria">'. $textoBusqueda .'</span>. (<a href="nuevolink.php?user=' . $user . '">A&ntilde;ade un link</a>)   (<a href="userlinks.php">todos tus links</a>)</div>';
	echo '</div>';

	echo '<div class="row">';
	echo '<div class="linklist subheader col-8 col-m-12">';

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

function generaLinksCat($user,$category)
{
	$query=sprintf('SELECT LI.linkId, LI.title, LI.URL, LI.comment, LI.date FROM link LI, catlink CL WHERE LI.linkId=CL.linkId AND CL.categoryId="' . mysql_real_escape_string($category) . '" AND LI.userId="' . $user . '" ORDER BY LI.date DESC');

	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	
	echo '<div class="subheader col-8 col-m-12"><span class="usuario">'.$user.'</span>, estos son tus <span class="favoDitos">favoDitos</span> para ';
	echo 'la categor&iacute;a <span class="categoria">'. $category.'</span>. (<a href="nuevolink.php?user=' . $user . '">A&ntilde;ade un link</a>)   (<a href="userlinks.php">todos tus links</a>)</div>';

		echo '</div>';
	echo '<div class="row">';
	echo '<div class="linklist subheader col-8 col-m-12">';

	while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

		echo '<p class="link"><a href="' .$line[2]. '" target="_blank">' . $line[1] .'</a></p>';
		echo '<p class="resumen">' . $line[3] .'</p>';

		echo '<p>Categor&iacute;as: <span class="categoria">';

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

	$query=sprintf('select linkId, title, URL, comment, date from link where userId = "'. mysql_real_escape_string($user) .'" ORDER BY date DESC');

	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	echo '<div class="subheader col-8 col-m-12"><span class="usuario">'. $user. '</span>, estos son tus <span class="favoDitos">favoDitos</span>. (<a href="nuevolink.php?user=' . $user . '">A&ntilde;ade un link</a>)</div>';
	echo '</div>';
	echo '<div class="row">';
	echo '<div class="linklist subheader col-8 col-m-12">';

	while ($line = mysql_fetch_array($result, MYSQL_BOTH)) {

		echo '<p class="link"><a href="' .$line[2]. '" target="_blank">' . $line[1] .'</a></p>';
		echo '<p class="resumen">' . $line[3] .'</p>';

		echo '<p>Categor&iacute;as: <span class="categoria">';

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

	$query=sprintf('SELECT linkId from link where linkId='. mysql_real_escape_string($linkId));

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

		$result2 = mysql_query($query2) or die('Query failed: ' . mysql_error());
	// 	para cada categoría del link
		while ($line2 = mysql_fetch_array($result2, MYSQL_BOTH)) {
	// 		borra sus catlink correspondientes
			$query1='delete from catlink where categoryId="'.trim($line2[0]) . '" and linkId='. $linkId;

			$result1 = mysql_query($query1) or die('Borrado de catlink failed: ' . mysql_error());
	// 		si no queda esa categoría en catlink
			$query1='select categoryId from catlink where categoryId="' . trim($line2[0]) .'"';

			$result1 = mysql_query($query1) or die('Query failed: ' . mysql_error());
			$linea = mysql_fetch_array($result1, MYSQL_BOTH);
			mysql_free_result($result1);

			if ($linea[0]==FALSE) {
	// 			borra esa categoría en category
				$query3='delete from category where categoryID="'.trim($line2[0]) .'"'; //and userId="'. $_SESSION[user].'"';
				$result3 = mysql_query($query3) or die('Borrado de categoria failed: ' . mysql_error());

	//echo "el borrado devuelve " . $result3 . " y ha afectado a este núm de records:" .mysql_affected_rows() ."<br>";
	//		fin si
			}
	//	fin para
		}
	//	borra el link
		$query='delete from link where linkId='.$linkId;

		$result = mysql_query($query) or die('Borrado de link failed: ' . mysql_error());
	// fin si
	}
}


?>
