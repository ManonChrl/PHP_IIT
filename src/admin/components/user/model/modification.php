<?php
defined("true-access") or die("Access denied!");
include_once("common.php");

function getStatus($components)
{
	$status = array();
	$components = $components["component"];
	foreach ($components as $component) {
		$status[] = $_POST['status'.$component['name']];
	}
	return $status;
}

function setModification($components,$status)
{
	$components = $components["component"];
	$status = $status["status"];
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$i=0; // counter to update the status related to the component name
		foreach ($components as $component) {
			$query = "UPDATE components SET enabled = '".$status[$i]."' WHERE name = '".$component['name']."';";
			mysqli_query($dbc,$query);
			$i++;
		}
	}
}

/*
* Update siteName value and subTitle value in the database
*/
function configSitename()
{
	$siteName = $_POST['siteName'];
	$siteSubtitle = $_POST['siteSubtitle'];
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "UPDATE siteInfos SET value = '$siteName' WHERE name = 'siteName';";
		mysqli_query($dbc,$query);
		$query = "UPDATE siteInfos SET value = '$siteSubtitle' WHERE name = 'siteSubtitle';";
		mysqli_query($dbc,$query);
	}
}

?>