<?php
if(!defined('true-access')) {
    die('Direct access not permitted');
} 

function configDatabase(){

	
	$_POST['dbname']=htmlspecialchars($_POST['dbname']);
	$_POST['dbhost']=htmlspecialchars($_POST['dbhost']);
	$_POST['uname']=htmlspecialchars($_POST['uname']);
	$_POST['pwd']=htmlspecialchars($_POST['pwd']);
	$inputData = $_POST['dbname'] ."+". $_POST['dbhost']."+". $_POST['uname']."+". $_POST['pwd'];
	unlink("database.txt");
	file_put_contents("database.txt",htmlspecialchars($inputData),FILE_APPEND | LOCK_EX);
}

function first_connect_to_database()
{
	$data = file_get_contents("database.txt");
	$arrayData = explode("+", $data);

	$db_name = $arrayData[0];
	$db_host = $arrayData[1];
	$db_user = $arrayData[2];
	$db_pwd = $arrayData[3];

	$dbc = mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
	$error = "";
	
	if ($dbc)
	{
		mysqli_set_charset($dbc,"utf8");
	}
	else
	{
		$error = mysqli_connect_error();
		echo $error;
	}
	
	return array($dbc,$error);
}

function startOfPage() {
	echo "<!doctype html>  ".PHP_EOL;
	echo "<html>           ".PHP_EOL;
	echo "<head>           ".PHP_EOL;
	echo '<meta name="author" content="Manon Chancereul">'.PHP_EOL;
	echo '<link href="content/css/bootstrap.css" rel="stylesheet">'.PHP_EOL;
	echo '<title>Installation</title>'.PHP_EOL;
	echo "</head>          ".PHP_EOL;
	echo "<body>           ".PHP_EOL;
	
}


function endOfPage() {

	echo '<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>'.PHP_EOL;
	echo '<script src="content/js/bootstrap.js"></script>'.PHP_EOL;
	echo "</body>          ".PHP_EOL;
	echo "</html>          ".PHP_EOL;
}

function installForm(){

	echo'<fieldset>'.PHP_EOL;
	echo'<legend> Database information </legend>'.PHP_EOL;
	echo'<form method="post" action="#">'.PHP_EOL;
	echo'	<p>Please enter your database connection details.</p>'.PHP_EOL;
	echo'	<table class="form-table">'.PHP_EOL;
	echo'		<tr>'.PHP_EOL;
	echo'			<th scope="row"><label for="dbname"><b>Database Name : </b></label></th>'.PHP_EOL;
	echo'			<td><input type="text" name="dbname" id="dbname" size="25" placeholder="database" /></td>'.PHP_EOL;
	echo'			<td>The name of the database you want to run.</td>'.PHP_EOL;
	echo'		</tr>'.PHP_EOL;
	echo'		<tr>'.PHP_EOL;
	echo'			<th scope="row"><label for="uname"><b>User Name : </b></label></th>'.PHP_EOL;
	echo'			<td><input type="text" name="uname" id="uname" size="25" placeholder="username" /></td>'.PHP_EOL;
	echo'			<td>Your MySQL username</td>'.PHP_EOL;
	echo'		</tr>'.PHP_EOL;
	echo'		<tr>'.PHP_EOL;
	echo'			<th scope="row"><label for="pwd"><b>Password : </b></label></th>'.PHP_EOL;
	echo'			<td><input type="password" name="pwd" id="pwd" size="25" placeholder="password" autocomplete="off" /></td>'.PHP_EOL;
	echo'			<td>Your MySQL password.</td>'.PHP_EOL;
	echo'		</tr>'.PHP_EOL;
	echo'		<tr>'.PHP_EOL;
	echo'			<th scope="row"><label for="dbhost"><b>Database Host : </b></label></th>'.PHP_EOL;
	echo'			<td><input type="text" name="dbhost" id="dbhost" size="25" value="localhost" /></td>'.PHP_EOL;
	echo'			<td>Your host</td>'.PHP_EOL;
	echo'		</tr>'.PHP_EOL;
	echo'		<tr>'.PHP_EOL;
	echo'			<th></th>'.PHP_EOL;
	echo'			<td align=center><input type="submit" name="submit" value="Submit" class="button button-large" /></td>'.PHP_EOL;
	echo'			<td></td>'.PHP_EOL;
	echo'		</tr>'.PHP_EOL;
	echo'	</table>'.PHP_EOL;
	echo'</form>'.PHP_EOL;
	echo'</fieldset>'.PHP_EOL;
}


?>