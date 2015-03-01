<?php
defined("true-access") or die("Access denied!"); 


function startOfPage() {
	echo "<!doctype html>  ".PHP_EOL;
	echo "<html>           ".PHP_EOL;
	echo "<head>           ".PHP_EOL;
	echo '<meta name="author" content="Manon Chancereul">'.PHP_EOL;
	echo '<link href="../content/css/bootstrap.css" rel="stylesheet">'.PHP_EOL;
	list($siteName,$siteSubtitle) = siteName();
	echo '<title>'.$siteName.'</title>'.PHP_EOL;
	echo "</head>          ".PHP_EOL;
	echo "<body>           ".PHP_EOL;
	navbarAdmin();
	echo '<h1 align=center>'.$siteSubtitle.'</h1>' .PHP_EOL;
	
}


function endOfPage() {
	echo '<div style="background-color:lightgray">' . PHP_EOL;
	echo '<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>'.PHP_EOL;
	echo '<script src="../content/js/bootstrap.js"></script>'.PHP_EOL;
	echo "</body>          ".PHP_EOL;
	echo "</html>          ".PHP_EOL;
}


function navbarAdmin(){
	echo '	<ul class="nav nav-tabs" role="tablist">'.PHP_EOL;
	echo '      <li><a href="../index.php">Home</a></li>'.PHP_EOL;
	echo '      <li class="active"><a href="index.php">Admin</a></li>'.PHP_EOL;
	echo '  </ul>'.PHP_EOL;
}

function admin_loggedIn()
{
	return (isset($_SESSION['user']) && $_SESSION['user']['admin']);
}

function adminForm()
{
	if (!admin_loggedIn()) {
		echo'Log in to access admin page :';
		echo'<fieldset style="border:1px solid grey;margin-right: 3000px;padding:15px; padding-bottom:1px;border-radius:40px;">' .PHP_EOL;
		echo '<form class="form-horizontal" action="index.php?option=user&view=login" method="post">                          '.PHP_EOL;
		echo '	<div class="form-group"><input type="text" placeholder="username" name="username"/></div>'.PHP_EOL;
		echo '	<div class="form-group"><input type="password" placeholder="password" name="password"/></div>'.PHP_EOL;
		echo '	<div class="form-group" align=center><input type="submit" value="Login"/></div>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
		echo'</fieldset>' .PHP_EOL;
	}
	else
	{
		echo'<fieldset style="border:1px solid grey;margin-right: 1200px;padding:15px; padding-bottom:1px;border-radius:40px;">' .PHP_EOL;
		echo 'Welcome admin '.$_SESSION['user']['username'].' !';
		echo '<form action="index.php?option=user&view=logout" method="post">                          '.PHP_EOL;
		echo '	<input type="submit" value="Logout"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
		echo '</fieldset>'.PHP_EOL;
	}
}

function mainPage()
{

	startOfPage();
	adminForm();
	if (admin_loggedIn()){
		echo '<p align=center><u>' .PHP_EOL;
		echo '	<a href="index.php?option=user&view=components">Click here to enable or disable components</a><br/><br/>';
		echo '	<a href="index.php?option=user&view=sitename">Click here to change the site name and subtitle</a>';
		echo '<u></p>' .PHP_EOL;
	}
	endOfPage();

}

/*
* View if option is not a valid param
*/
function error404option()
{
	startOfPage();
	adminForm();
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
	adminForm();
	echo '<div align=center style="border:2px solid red"><b><h3>' .PHP_EOL;
	echo 'Error 404 : Page not found<br/>' .PHP_EOL;
	echo 'Wrong view parameter' .PHP_EOL;
	echo '</h3></b></div>' .PHP_EOL;
	endOfPage();
}
?>
