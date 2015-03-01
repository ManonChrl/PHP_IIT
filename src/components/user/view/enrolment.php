<?php
defined("true-access") or die("Access denied!");

function courses_render($course,$descriptions,$i)
{
			echo '		<tr>'.PHP_EOL;
		  	echo '			<td>'.$course['course_courseNo'].'</td>'.PHP_EOL;
		  	echo '			<td> '.$descriptions[$i]['description'].' </td>'.PHP_EOL;
		  	echo '		</tr>'.PHP_EOL;
}


function viewCourses($courses,$username,$descriptions)
{

	startOfPage();
	userForm();
	$courses = $courses["course"];
	$descriptions = $descriptions["description"];
	if (!empty($courses))
	{
		echo '<h2>'.$username.'</h2>'.PHP_EOL;
		echo '<table class="table table-hover">'.PHP_EOL;
	  	echo '	<thead>'.PHP_EOL;
		echo '  		<tr>'.PHP_EOL;
		echo '  			<td>Course number</td>'.PHP_EOL;
		echo '  			<td>Description</td>'.PHP_EOL;
		echo '  		</tr>'.PHP_EOL;
	  	echo '	</thead>'.PHP_EOL;
	  	echo '	<tbody>'.PHP_EOL;
	  	$i=0; // counter for displaying description array as course array
		foreach ($courses as $course)
		{
			courses_render($course,$descriptions,$i);
			$i++;
		}
		echo '	<tbody>'.PHP_EOL;
		echo '</table>'.PHP_EOL;
		
		echo '<a href="index.php?option=user&view=list">Back to user list</a>' .PHP_EOL;
		echo '<br/><br/><a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
	}
	endOfPage();

}
?>