<?php
defined("true-access") or die("Access denied!");

function viewEnrolment($courseNo)
{
	startPage();
	formUser();
	echo '<br/><blockquote> ' . PHP_EOL;
  	p1('Congratulation, you just enrolled to the '.$courseNo.' course !');
	echo '</blockquote> ' . PHP_EOL;
	echo '<a href="index.php?option=course&view=list">Back to course list</a>' .PHP_EOL;
	echo '<br/><br/><a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
	endPage();
}


function viewEnrolmentExist($courseNo)
{
	startPage();
	formUser();
	echo '<br/><blockquote> ' . PHP_EOL;
  	p2('You were already enrolled to the '.$courseNo.' course !');
  	echo '</blockquote> ' . PHP_EOL;
  	echo '<a href="index.php?option=course&view=list">Back to course list</a>' .PHP_EOL;
  	echo '<br/><br/><a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
  	endPage();
}
?>