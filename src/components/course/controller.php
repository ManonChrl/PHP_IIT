<?php
defined("true-access") or die("Access denied!");

include_once("model/common.php");
include_once("model/course.php");
include_once("model/detail.php");
include_once("model/enrolment.php");
include_once("view/layout.php");


function get_view_enabled($view)		// No default view here 
{
	if ($view == "list")	
		return "execute_list";
	else if ($view == "login")
		return "execute_login";
	else if ($view == "logout")
		return "execute_logout";
	else if ($view == "detail")
		return "execute_detail";
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
		errorView404(); // not a good view parameter
	}
	
}

/*
* View list of courses
*/
function execute_list(){
	include_once("view/course.php");
	$courses = array();
	$courses["course"] = getCourses();
	viewCourse($courses);
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
	execute_list();	
}

/*
* Log out the user
*/
function execute_logout()
{
	unset($_SESSION['user']);
	execute_list();	
}

/*
* View the detail of one specific course
*/
function execute_detail()
{
	include_once("view/detail.php");
	$courseNo = $_GET["courseNo"];
	$details = array();
	$details["detail"] = getDetails($courseNo);
	viewDetail($details);
}

/*
* Function only visible if the user is logged in
* User can enroll a course
* View of the enrolment if not existed yet
* or message explaining the user was already enroled in that course
*/
function execute_enrolment()
{
	include_once("view/enrolment.php");
	$courseNo = $_POST["courseNo"];
	$username = $_POST["username"];
	$result=userAlreadyEnroled($courseNo,$username);
	if(!userAlreadyEnroled($courseNo,$username)){
		setEnrolment($courseNo,$username);
		viewEnrolment($courseNo);
	}else{
		viewEnrolmentExist($courseNo);
	}
	
}

?>