<?php
defined("true-access") or die("Access denied!");

function startOfPage() {
	echo "<!doctype html>  ".PHP_EOL;
	echo "<html>           ".PHP_EOL;
	echo "<head>           ".PHP_EOL;
	echo '<meta name="author" content="Manon Chancereul">'.PHP_EOL;
	echo '<link href="content/css/bootstrap.css" rel="stylesheet">'.PHP_EOL;
	list($siteName,$siteSubtitle) = siteName();
	echo '<title>'.$siteName.'</title>'.PHP_EOL;
	echo "</head>          ".PHP_EOL;
	echo "<body>           ".PHP_EOL;
	navbarHome();
	echo '<h1 align=center>'.$siteSubtitle.'</h1>' .PHP_EOL;
	
}


function endOfPage() {

	echo '<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>'.PHP_EOL;
	echo '<script src="content/js/bootstrap.js"></script>'.PHP_EOL;
	echo "</body>          ".PHP_EOL;
	echo "</html>          ".PHP_EOL;
}

function navbarHome(){
	echo '	<ul class="nav nav-tabs" role="tablist">'.PHP_EOL;
	echo '      <li class="active"><a href="index.php">Home</a></li>'.PHP_EOL;
	echo '      <li><a href="admin/index.php">Admin</a></li>'.PHP_EOL;
	echo '  </ul>'.PHP_EOL;
}


function user_loggedIn()
{
	return (isset($_SESSION['user']));
}

function userForm()
{
	if (!user_loggedIn()) {
		echo'<fieldset style="border:1px solid grey;margin-right: 3000px;padding:15px; padding-bottom:1px;border-radius:40px;">' .PHP_EOL;
		echo '<form class="form-horizontal" action="index.php?option=user&view=login" method="post">                          '.PHP_EOL;
		echo '	<div class="form-group"><input type="text" placeholder="username" name="username"/></div>'.PHP_EOL;
		echo '	<div class="form-group"><input type="password" placeholder="password" name="password"/></div>'.PHP_EOL;
		echo '	<div class="form-group" align=center><input type="submit" value="Login"/></div>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
		echo '</fieldset>' .PHP_EOL;
	}
	else
	{
		echo'<fieldset style="border:1px solid grey;margin-right: 1200px;padding:15px; padding-bottom:1px;border-radius:40px;">' .PHP_EOL;
		echo "Welcome user ".$_SESSION['user']['username']." !";
		echo '<form action="index.php?option=user&view=logout" method="post">                          '.PHP_EOL;
		echo '	<input type="submit" value="Logout"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
		echo '</fieldset>' .PHP_EOL;
	}
}

/*
* View if option is not a valid param
*/
function error404option()
{
	startOfPage();
	userForm();
	echo '<div align=center style="border:2px solid red"><b><h3>' .PHP_EOL;
	echo 'Error 404 : Page not found<br/>' .PHP_EOL;
	echo 'Wrong option parameter' .PHP_EOL;
	echo '</h3></b></div>' .PHP_EOL;
	endOfPage();
}

/*
* View if view is not a valid param
*/
function error404view()
{
	startOfPage();
	userForm();
	echo '<div align=center style="border:2px solid red"><b><h3>' .PHP_EOL;
	echo 'Error 404 : Page not found<br/>' .PHP_EOL;
	echo 'Wrong view parameter' .PHP_EOL;
	echo '</h3></b></div>' .PHP_EOL;
	endOfPage();
}

/*
* View if database not installed
*/
function error404Database()
{
	startOfPage();
	userForm();
	echo '<div align=center style="border:2px solid red"><b><h3>' .PHP_EOL;
	echo 'Error 404 : Database not found<br/>' .PHP_EOL;
	echo 'Please install the database' .PHP_EOL;
	echo '<a href=installation.php>here</a>' .PHP_EOL;
	echo '</h3></b></div>' .PHP_EOL;
	endOfPage();
}

?>