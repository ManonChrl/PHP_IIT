<?php
defined("true-access") or die("Access denied!");

function users_render($user)
{
  	echo '		<tr>'.PHP_EOL;
  	echo '			<td>'.$user['username'].'</td>'.PHP_EOL;
  	echo '			<td>'.$user['email'].'</td>'.PHP_EOL;
  	echo '			<td><a href="index.php?option=user&view=enrolment&username='.$user['username'].'">Course enroled </td>'.PHP_EOL;
  	echo '		</tr>'.PHP_EOL;
}


function viewUser($users)
{
	startOfPage();
	userForm();
	$users = $users["user"];
	if (!empty($users))
	{
		echo '<table class="table table-hover">'.PHP_EOL;
	  	echo '	<thead>'.PHP_EOL;
		echo '  		<tr>'.PHP_EOL;
		echo '  			<td>Username</td>'.PHP_EOL;
		echo '  			<td>Email</td>'.PHP_EOL;
		echo '  			<td>Enrolment</td>'.PHP_EOL;
		echo '  		</tr>'.PHP_EOL;
	  	echo '	</thead>'.PHP_EOL;
	  	echo '	<tbody>'.PHP_EOL;
		foreach ($users as $user)
		{
			users_render($user);
		}
		echo '	<tbody>'.PHP_EOL;
		echo '</table>'.PHP_EOL;
	}
	echo '<a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
	endOfPage();

}
?>