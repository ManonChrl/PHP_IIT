<?php
defined("true-access") or die("Access denied!");


function getCourses($username)
{
	$courses = array();
	list($dbc,$error) = connect_to_database();
	print_r($error);
	if ($dbc)
	{
		$query = "SELECT course_courseNo FROM course_user where user_username='$username';";

		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($course = mysqli_fetch_array($result))
			{
				$courses[] = $course;
			}
		}
	}
	return $courses;
}

function getDescription($courses)
{
	$descriptions = array();
	list($dbc,$error) = connect_to_database();
	print_r($error);
	if ($dbc)
	{
		foreach ($courses as $course)
		{

			//echo $course['course_courseNo'];
			$query = "SELECT description FROM course where courseNo='".$course['course_courseNo']."';";

			$result = mysqli_query($dbc,$query);
			if ($result)
			{
				while ($description = mysqli_fetch_array($result))
				{
					$descriptions[] = $description;
				}
			}
		}
		
	}
	return $descriptions;
}
?>