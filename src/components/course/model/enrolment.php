<?php
defined("true-access") or die("Access denied!");

function userAlreadyEnroled($courseNo,$username)
{
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT * FROM course_user WHERE user_username = '$username' AND course_courseNo = $courseNo;";
		$result = mysqli_query($dbc,$query);
		$row = mysqli_num_rows($result);
		if ($row)
		{
			return true;
		}
		else {
			return false;
		}
	}
}


function setEnrolment($courseNo,$username)
{
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "INSERT INTO course_user values ('$username','$courseNo');";
		mysqli_query($dbc,$query);
	}
}
?>