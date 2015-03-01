<?php
defined("true-access") or die("Access denied!");

include_once("view/layoutAdmin.php");

function viewModification()
{
	startOfPage();
	adminForm();
	echo '<br/><blockquote> ' . PHP_EOL;
  	echo '<p>Your modication has been registered !</p>';
	echo '</blockquote> ' . PHP_EOL;
	echo '<a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
	endOfPage();

}
?>