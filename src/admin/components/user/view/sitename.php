<?php
defined("true-access") or die("Access denied!");
include_once("view/layoutAdmin.php");

function sitenameForm()
{
	echo '<div align=center>' .PHP_EOL;
	echo '<form role="form" action="index.php?option=user&view=sitename" method="post">' .PHP_EOL;
  	echo '	<div class="form-group">' .PHP_EOL;
    echo '		<label for="siteName">Enter site name : </label>' .PHP_EOL;
    echo '		<input type="text" class="form-control" id="siteName" name="siteName">' .PHP_EOL;
  	echo '	</div>' .PHP_EOL;
 	echo '	<div class="form-group">' .PHP_EOL;
   	echo '		 <label for="siteSubtitle">Enter site subtitle : </label>' .PHP_EOL;
   	echo '		 <input type="text" class="form-control" id="siteSubtitle" name="siteSubtitle">' .PHP_EOL;
  	echo '	</div>' .PHP_EOL;
  	echo '	<button type="submit" class="btn btn-default">Submit</button>' .PHP_EOL;
	echo '</form>' .PHP_EOL;
	echo '</div>' .PHP_EOL;
}


function viewSitename()
{
	startOfPage();
	adminForm();
	sitenameForm();
	echo '<a href="index.php?option=user">Back to home page</a>' .PHP_EOL;
	endOfPage();
}


/*
* Show that modification has been registered
*/
function viewSitenameModif()
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