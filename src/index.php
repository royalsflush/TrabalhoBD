<?php
	/* Testing the page class */
	$pageId = $_GET['pageId'];

	if (empty($pageId)) $pageId = 'Index';	

	require('includes/page.php');
	require_once('includes/sql_db.php');

	$dbHandler = new SqlBD();	
	$thisPage = new Page($pageId, $dbHandler);
	$thisPage->echoPage(); 
?>
