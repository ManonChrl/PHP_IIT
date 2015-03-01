<?php
defined("true-access") or die("Access denied!");

include_once("model/common.php");
include_once("model/user.php");
include_once("model/enrolment.php");
include_once("model/enabledComponents.php");
include_once("view/layout.php");


function get_view_enabled($view)
{
	if ($view == "") //default view
		return "execute_views_lists_enabled_components";
	else if ($view == "login")
		return "execute_login";
	else if ($view == "logout")
		return "execute_logout";
	else if ($view == "list")
		return "execute_list";
	else if ($view == "enrolment")
		return "execute_enrolment";
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
* See enable components
*/
function execute_views_lists_enabled_components(){
	include_once("view/enabledComponents.php");
	$components = array();
	$components["component"] = getEnabledComponents();
	if(!empty($components["component"]))
		view($components);
}


/*
* Check if the login and password entered are correct
* and log in the user
*/
function execute_login()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$success = user_checkExists($username,$password);
	execute_views_lists_enabled_components();
}

/*
* Log out the user
*/
function execute_logout()
{
	unset($_SESSION['user']);
	execute_views_lists_enabled_components();
}

/*
* View list of users
*/
function execute_list(){
	include_once("view/user.php");
	$users = array();
	$users["user"] = getUsers();
	viewUser($users);
}

/*
* View course enrolled by a specific user
*/
function execute_enrolment(){
	include_once("view/enrolment.php");
	$username = $_GET["username"];
	$courses = array();
	$description = array();
	$courses["course"] = getCourses($username);
	$descriptions["description"] = getDescription($courses["course"]);
	viewCourses($courses,$username,$descriptions);
}

?>