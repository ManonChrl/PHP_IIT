<?php
defined("true-access") or die("Access denied!");
include_once("view/layout.php");


function components_render($component)
{
	echo '<p align=center><u>' .PHP_EOL;
	echo '	<a href="index.php?option='.$component['name'].'&view=list">Click here to see '.$component['name'].' list !</a><br/>';
	echo '</u></p>' .PHP_EOL;
}


function view($components)
{
	startOfPage();
	userForm();
	$components = $components["component"];
	if (!empty($components))
	{
		foreach ($components as $component)
		{
			components_render($component);
		}
	}
	endOfPage();
}
?>