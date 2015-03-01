<?php
defined("true-access") or die("Access denied!");

define(SALT,"someOtherWorld!!8ht@##$*");


function admin_checkExists($username, $password)
{
	
	list($dbc,$error) = connect_to_database();
	
	$success = false;
	if ($dbc)
	{
		$username_safe = mysqli_real_escape_string($dbc,$username);
		$password_safe = mysqli_real_escape_string($dbc,sha1($password.SALT));
	
		$query = "SELECT * from user where username='$username_safe' AND password='$password_safe' AND admin=1";	
		$result = mysqli_query($dbc,$query);
		
		if ($result)
		{
			while($admin = mysqli_fetch_array($result,MYSQLI_BOTH))
			{
				$_SESSION['user'] = $admin;
				$success = true;
			}
		}
	}
	return $success;
}
?>