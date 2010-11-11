<?php
	/* Testing the page class */
	require('lib/page.php');
	require_once('lib/sql_db.php');

	$dbHandler = new SqlBD();
	$thisPage = new Page("TestPage", $dbHandler);
	$thisPage->echoPage(); 
?>
