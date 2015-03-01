<?php
defined("true-access") or die("Access denied!");
include_once("common.php");

function getComponents()
{
	$components = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT * FROM components ;";
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($component = mysqli_fetch_array($result))
			{
				$components[] = $component;
			}
		}
	}
	return $components;
}
?>