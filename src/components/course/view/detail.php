<?php
defined("true-access") or die("Access denied!");

function details_render($detail)
{
  	echo '		<tr>'.PHP_EOL;
  	echo '			<td>'.$detail['courseNo'].'</td>'.PHP_EOL;
  	echo '			<td>'.$detail['description'].'</td>'.PHP_EOL;
  	echo '			<td>'.$detail['creditHours'].'</td>'.PHP_EOL;
  	if(user_logged()){
  		echo '<td>'.PHP_EOL;
		echo '<form action="index.php?option=course&view=enrolment" method="post">                          '.PHP_EOL;
		echo '	<input type="hidden" name="username" value="'.$_SESSION['user']['username'].'" />'.PHP_EOL;
		echo '	<input type="hidden" name="courseNo" value="'.$detail['courseNo'].'"/>'.PHP_EOL;
		echo '	<input type="submit" value="Enroll"/>                       '.PHP_EOL;
		echo '</form>                                                      '.PHP_EOL;
		echo '</td>'.PHP_EOL;
		}
  	echo '		</tr>'.PHP_EOL;
}



function viewDetail($details)
{
	startPage();
	formUser();
	$details = $details["detail"];
	if (!empty($details))
	{
		echo '<table class="table table-hover">'.PHP_EOL;
	  	echo '	<thead>'.PHP_EOL;
		echo '  		<tr>'.PHP_EOL;
		echo '  			<td>Course Number</td>'.PHP_EOL;
		echo '  			<td>Description</td>'.PHP_EOL;
		echo '  			<td>Credit Hours</td>'.PHP_EOL;
		if(user_logged()){
			echo '<td>Enroll</td>'.PHP_EOL;
		}
		echo '  		</tr>'.PHP_EOL;
	  	echo '	</thead>'.PHP_EOL;
	  	echo '	<tbody>'.PHP_EOL;
		foreach ($details as $detail)
		{
			details_render($detail);
		}
		echo '	<tbody>'.PHP_EOL;
		echo '</table>'.PHP_EOL;

		echo '<a href="index.php?option=course&view=list">Back to course list</a>' .PHP_EOL;
		echo '<br/><br/><a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
	}
	endPage();
}
?>