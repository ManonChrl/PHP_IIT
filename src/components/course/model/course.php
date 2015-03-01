<?php
defined("true-access") or die("Access denied!");


function getCourses()
{
	$courses = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT courseNo,description FROM course ;";
		
		
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
?>