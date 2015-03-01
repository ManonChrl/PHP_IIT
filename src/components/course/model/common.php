<?php
defined("true-access") or die("Access denied!");

define(SALT,"someOtherWorld!!8ht@##$*");

function connect_to_database()
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


function user_checkExists($username, $password)
{

	list($dbc,$error) = connect_to_database();
	
	$success = false;
	if ($dbc)
	{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
	
		$query = "SELECT * from user where username='$username_safe' AND password='$password_safe'";	
		$result = mysqli_query($dbc,$query);
		
		
		if ($result)
		{
			while($user = mysqli_fetch_array($result,MYSQLI_BOTH))
			{
				$_SESSION['user'] = $user;
				$success = true;
			}
		}
	}
	return $success;
}


/*
* Function that returns the sitename 
* and the site subtitle from the database
*/
function siteNameModif(){
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$siteNameArray=array();
		$query = "SELECT value FROM siteInfos WHERE name = 'siteName';";
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($res = mysqli_fetch_array($result))
			{	
				$siteNameArray[] = $res;
				$siteName=$siteNameArray[0];
			}
		}
		$siteSubtitleArray=array();
		$query = "SELECT value FROM siteInfos WHERE name = 'siteSubtitle';";
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($res = mysqli_fetch_array($result))
			{	
				$siteSubtitleArray[] = $res;
				$siteSubtitle=$siteSubtitleArray[0];
			}
		}
	}
	return array($siteName[0],$siteSubtitle[0]);
}
?>