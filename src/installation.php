<?php

define("true-access",true);

include("configuration.php");

define(SALT,"someOtherWorld!!8ht@##$*");

startOfPage();

if(!empty($_POST)){

	configDatabase();
	list($dbc,$error) = first_connect_to_database();

	if($dbc){

		//Drop tables if already existing

		$query = "ALTER TABLE course_user DROP FOREIGN KEY FK_course_user_course_courseNo";	
		$result = mysqli_query($dbc,$query);
		$query = "ALTER TABLE course_user DROP FOREIGN KEY FK_course_user_user_username";	
		$result1 = mysqli_query($dbc,$query);
		$query = "DROP TABLE user";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table User dropped<br/>';
		}
		$query = "DROP TABLE course";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table course dropped<br/>';
		}
		$query = "DROP TABLE components";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table components dropped<br/>';
		}
		$query = "DROP TABLE siteInfos";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table siteInfos dropped<br/>';
		}
		$query = "DROP TABLE course_user";	
		$result2 = mysqli_query($dbc,$query);
		if($result && $result1 && $result2)
		{
			echo 'table course_user dropped<br/>';
		}

		//Create tables
		$query = "CREATE TABLE course (courseNo INTEGER NOT NULL UNIQUE, description VARCHAR(2000), creditHours INTEGER, PRIMARY KEY (courseNo))";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table Course created<br/>';
		}
		$query = "CREATE TABLE user (username VARCHAR(20) NOT NULL UNIQUE, password VARCHAR(50), email VARCHAR(50),admin BOOLEAN, PRIMARY KEY (username))";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table User created<br/>';
		}
		$query = "CREATE TABLE components (name VARCHAR(30) NOT NULL UNIQUE, enabled BOOLEAN,PRIMARY KEY (name))";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table components created<br/>';
		}
		$query = "CREATE TABLE siteInfos (name VARCHAR(30) NOT NULL UNIQUE, value VARCHAR(30) NOT NULL,PRIMARY KEY (name))";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table siteInfos created<br/>';
		}
		$query = "CREATE TABLE course_user (user_username VARCHAR(20) NOT NULL, course_courseNo INTEGER NOT NULL, PRIMARY KEY (user_username, course_courseNo))";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'table course_user created<br/>';
		}
		$query = "ALTER TABLE course_user ADD CONSTRAINT FK_course_user_course_courseNo FOREIGN KEY (course_courseNo) REFERENCES course (courseNo)";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'first part of course_user updated<br/>';
		}
		$query = "ALTER TABLE course_user ADD CONSTRAINT FK_course_user_user_username FOREIGN KEY (user_username) REFERENCES user (username)";	
		$result = mysqli_query($dbc,$query);
		if($result)
		{
			echo 'second part of course_user updated<br/>';
		}

		//Insert values in table
		$result = mysqli_query($dbc,"INSERT INTO course values(515,'Advanced Software Programmming',3)");
		if($result)
		{
			echo 'course number 515 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course values(562,'Web Site App Development',3)");
		if($result)
		{
			echo 'course number 562 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course values(563,'Intermediate Web App Development',3)");
		if($result)
		{
			echo 'course number 563 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course values(581,'Consulting for Technical Professional',3)");
		if($result)
		{
			echo 'course number 581 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO components values('course',true)");
		if($result)
		{
			echo 'component course added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO components values('user',true)");
		if($result)
		{
			echo 'component user added<br/>';
		}
		$password = sha1("mchancer".SALT);
		$result = mysqli_query($dbc,"INSERT INTO user values('mchancer','$password','chancereul.manon@gmail.com',0)");
		if($result)
		{
			echo 'user mchancer added<br/>';
		}
		$password = sha1("spyrison".SALT);
		$result = mysqli_query($dbc,"INSERT INTO user values('spyrison','$password','scott.spyrison@iit.edu',0)");
		if($result)
		{
			echo 'user spyrison added<br/>';
		}
		$password = sha1("jlambert".SALT);
		$result = mysqli_query($dbc,"INSERT INTO user values('jlambert','$password','jason.lambert@iit.edu',1)");
		if($result)
		{
			echo 'user jlambert added<br/>';
		}
		$password = sha1("rkrishnan".SALT);
		$result = mysqli_query($dbc,"INSERT INTO user values('rkrishnan','$password','raj.krishnan@iit.edu',0)");
		if($result)
		{
			echo 'user rkrishnan added<br/>';
		}
		$password = sha1("bgoins".SALT);
		$result = mysqli_query($dbc,"INSERT INTO user values('bgoins','$password','bonnie.goins@iit.edu',0)");
		if($result)
		{
			echo 'user bgoins added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('bgoins',581)");
		if($result)
		{
			echo 'bgoins enroled in course 581 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('rkrishnan',563)");
		if($result)
		{
			echo 'rkrishnan enroled in course 563 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('jlambert',562)");
		if($result)
		{
			echo 'jlambert enroled in course 562 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('spyrison',515)");
		if($result)
		{
			echo 'spyrison enroled in course 515 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('mchancer',562)");
		if($result)
		{
			echo 'mchancer enroled in course 562 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('mchancer',515)");
		if($result)
		{
			echo 'mchancer enroled in course 515 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('mchancer',581)");
		if($result)
		{
			echo 'mchancer enroled in course 581 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO course_user values('mchancer',563)");
		if($result)
		{
			echo 'mchancer enroled in course 563 added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO siteInfos values('siteName','BlackBoard')");
		if($result)
		{
			echo 'siteInfos siteName added<br/>';
		}
		$result = mysqli_query($dbc,"INSERT INTO siteInfos values('siteSubtitle','Welcome on BlackBoard')");
		if($result)
		{
			echo 'siteInfos site subtitle added<br/>';
		}
		echo '<div align=center><b><h2>' .PHP_EOL;
		echo '<a href="index.php"> Go to home page</a>' . PHP_EOL;
		echo '</h2></b></div>' . PHP_EOL;
	} else {
		echo 'wrong datas';
	}



} else {
	installForm();
}


endOfPage();

?>