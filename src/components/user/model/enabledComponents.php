<?php
defined("true-access") or die("Access denied!");

include_once("common.php");


function getEnabledComponents()
{
	$components = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT components.name FROM components where components.enabled = 1;";
		
		
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