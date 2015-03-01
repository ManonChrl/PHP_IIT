<?php
defined("true-access") or die("Access denied!");
include_once("view/layoutAdmin.php");


function components_render($component)
{
	echo '<tr>'.PHP_EOL;
  	echo '	<td>'.$component['name'].'</td>'.PHP_EOL;
  	echo '	<td>'.PHP_EOL;
  	if($component['enabled']){
  		echo '		<input type="radio" name="status'.$component['name'].'" value="1" checked>Enable</input>'.PHP_EOL;
  		echo '		<input type="radio" name="status'.$component['name'].'" value="0">Disable</input>'.PHP_EOL;
  	} else {
  		echo '		<input type="radio" name="status'.$component['name'].'" value="1">Enable</input>'.PHP_EOL;
  		echo '		<input type="radio" name="status'.$component['name'].'" value="0" checked>Disable</input>'.PHP_EOL;
  	}
   	echo '	</td>'.PHP_EOL;
  	echo '</tr>'.PHP_EOL;
}


function viewComponents($components)
{
	startOfPage();
	adminForm();
	$components = $components["component"];
	if (!empty($components))
	{
		echo '<form action="index.php?option=user&view=enableDisable" method="post"> '.PHP_EOL;
		echo '<table class="table table-hover">'.PHP_EOL;
	  	echo '	<thead>'.PHP_EOL;
		echo '  		<tr>'.PHP_EOL;
		echo '  			<td>Components name</td>'.PHP_EOL;
		echo '  			<td>Status</td>'.PHP_EOL;
		echo '  		</tr>'.PHP_EOL;
	  	echo '	</thead>'.PHP_EOL;
	  	echo '	<tbody>'.PHP_EOL;
		foreach ($components as $component)
		{
			components_render($component);
		}
		echo '  		<tr>'.PHP_EOL;
		echo '  			<td></td>'.PHP_EOL;
		echo '  			<td><input type="submit" value="Submit"/></td>'.PHP_EOL;
		echo '  		</tr>'.PHP_EOL;
		echo '	<tbody>'.PHP_EOL;
		echo '</table>'.PHP_EOL;
		echo '</form>' .PHP_EOL;

		echo '<a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
		
	}
	endOfPage();
}
?>