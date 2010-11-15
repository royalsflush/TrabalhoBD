<?php
	// This is the page responsible for the menu editing 
	// Written by Luiza
	// Last updated in 13/11/10

	// This page has to do a few things: 
	// 1. It has to load the current menu from the database (that's kinda easy)
	// 2. For starters, it displays the menu in a 6x4 table (no cute interface, for now)
	// 3. It has to be able to create pages
	// 4. Rename them
	// 5. And delete them
	// 6. For each one of the three, it should send the data to the server, where it will
	//	be held until the user presses the save button
	// 7. Then, it should send all the changes to the database

	// The PHP includes
	require_once("../includes/sql_db.php");
	require_once("../includes/menu.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<!-- Charset declaration -->
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />			

		<!-- Including blueprint framework (in the layout folder) -->
		<link rel="stylesheet" type="text/css" href="../layout/blueprint/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="../layout/blueprint/print.css" media="print" />
		<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="../layout/blueprint/ie.css" media="screen, projection" /><![endif]-->

		<!-- jQuery UI CSS -->
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.6.custom.css" rel="stylesheet" />

		<!-- Including our CSS-->
		<link rel="stylesheet" type="text/css" href="../layout/template.css" media="screen" />

		<!-- jQuery javascript files -->
		<script type="text/javascript" src="../includes/jquery.js"></script>
		<script type="text/javascript" src="../includes/jquery-ui-1.8.6.custom.min.js"></script>

		<title>Menu Edit Page</title>		
	</head>

	<body>
		<div class="container">
			<div class="span-24" id="header">
				<!-- that has to be the user header --> 
				##HEADER_GOES_HERE##
			</div>  
			<div class="span-24" id="menu">
				<!-- and here, the user's menu -->
				##MENU_GOES_HERE##
			</div>  
			<div class="span-24" id="main">  
				<div class="span-1"><!--empty div to align everything--></div>
				<div class="span-16 colborder edit">
					<h2 class="center">Here's your menu:</h2>
					
				</div>
				<div class="span-5 colborder edit"></div>
			</div>  
		</div>
	</body>
</html>
