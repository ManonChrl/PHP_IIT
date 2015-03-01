<?php
define("true-access", true);
session_start();
ob_start();

function get_option_enabled($option)
{
	if ($option == "user") //this is the default option
		return "user/controller.php";
	else if ($option == "course")
		return "course/controller.php";
	else
		return false;
}


function route()
{

		//get params from URL
		$option = empty($_GET["option"]) ? "user" : $_GET["option"];
		$view = empty($_GET["view"]) ? "" : $_GET["view"];

		//get the good controller
		if ($controller = get_option_enabled($option))
		{
			
			//include correct controller
			include_once('components/'.$controller);
			controller_route($view); 
		}
		else
		{
			error404option(); // not good option parameter
		}
}

//go to the right controller with the view in param
route();


ob_end_flush();


?>