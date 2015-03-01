<?php
defined("true-access") or die("Access denied!");

include_once("model/common.php");
include_once("model/users.php");
include_once("model/components.php");
include_once("model/modification.php");
include_once("view/layoutAdmin.php");


function get_view_enabled($view)
{
	if ($view == "") //this is the default view
		return "execute_main_view";
	else if ($view == "login")
		return "execute_login";
	else if ($view == "logout")
		return "execute_logout";
	else if ($view == "components")
		return "execute_components";
	else if ($view == "enableDisable")
		return "execute_modification";
	else if ($view == "sitename")
		return "execute_sitename";
	else
		return false;
}

function controller_route($view)
{
	if ($method = get_view_enabled($view))
	{
		$method(); //invocation of the right fonction
	}
	else
	{
		error404view(); //not good view parameter
	}
	
}

/*
* Main Page
* If admin logged in
* show what he can do
* otherwise just show the log in form
*/
function execute_main_view(){
	mainPage();
}

/*
* Check if the login and password entered are correct
* and log in the user
*/
function execute_login()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$success = admin_checkExists($username,$password);
	execute_main_view();	
}

/*
* Log out the user
*/
function execute_logout()
{
	unset($_SESSION['user']);
	execute_main_view();	
}

/*
* View the list of components
* Can enable or disable each one
*/
function execute_components(){
	include_once("view/components.php");
	$components = array();
	$components["component"] = getComponents();
	viewComponents($components);
}

/*
* Execute the modification of enabled components
* Show that the modification has been registered
*/
function execute_modification(){
	include_once("view/components.php");
	include_once("view/modification.php");
	$components = array();
	$status = array();
	$components["component"] = getComponents();
	$status["status"] = getStatus($components);
	setModification($components,$status);
	viewModification();
}

/*
* Form to change site name and site subtitle
* If form submitted, execute modification
*/
function execute_sitename(){
	include_once("view/sitename.php");
	if(empty($_POST['siteName'])){
		viewSitename();
	}else{
		configSitename();
		viewSitenameModif();
	}
}

?>