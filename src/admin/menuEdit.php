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
	require_once("../lib/sql_db.php");
	require_once("../lib/menu.php");
?>


<html>
	<head>
		<!-- No blueprint for now, we're trying to keep it as simple as possible -->
		
		<!-- But we'll use a hell lot of jQuery, so we can perform AJAX requests without much trouble -->
		
	</head>

	<body>
	</body>
<html>
