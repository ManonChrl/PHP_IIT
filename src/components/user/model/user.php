<?php
defined("true-access") or die("Access denied!");

define(SALT,"someOtherWorld!!8ht@##$*");

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


function getUsers()
{
	$users = array();
	list($dbc,$error) = connect_to_database();
	print_r($error);
	if ($dbc)
	{
		$query = "SELECT username,email FROM user ;";
		
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($user = mysqli_fetch_array($result))
			{
				$users[] = $user;
			}
		}
	}
	return $users;
}
?>