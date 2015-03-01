<?php
defined("true-access") or die("Access denied!");

function courses_render($course)
{
  	echo '		<tr>'.PHP_EOL;
	echo '			<td><a href="index.php?option=course&view=detail&courseNo='.$course['courseNo'].'">'.$course['courseNo'].'</td>'.PHP_EOL;
  	echo '			<td>'.$course['description'].'</td>'.PHP_EOL;
  	echo '		</tr>'.PHP_EOL;
}



function viewCourse($courses)
{
	startPage();
	formUser();
	$courses = $courses["course"];
	if (!empty($courses))
	{
		echo '<table class="table table-hover">'.PHP_EOL;
	  	echo '	<thead>'.PHP_EOL;
		echo '  		<tr>'.PHP_EOL;
		echo '  			<td>Course Number</td>'.PHP_EOL;
		echo '  			<td>Description</td>'.PHP_EOL;
		echo '  		</tr>'.PHP_EOL;
	  	echo '	</thead>'.PHP_EOL;
	  	echo '	<tbody>'.PHP_EOL;
		foreach ($courses as $course)
		{
			courses_render($course);
		}
		echo '	<tbody>'.PHP_EOL;
		echo '</table>'.PHP_EOL;

		echo '<a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
	}
	endPage();
}
?>