<?php

/* The necessary include files */
require("sql_db.php");

/* this class handles all the functions related to the menu */

class Menu {
	/* a 4x6 bidimensional array that holds the current state of the menu and allows it to translate into the interface */
	private $menuArray;

	/* List all updates done on the menu since the last save, so there's no problem with ambiguous updates */
	/* Thinking about using XML strings with SimpleXML parser 
		Strings specs: 
			type (of modification)
			from
			to
			date
	*/
	private $menuUpdates;

	/* The XML parser I said above */
	private $xmlParser;

	private $dbHandler = NULL;

	/* This function receives an already instantiated sqlBD */

	function __construct($sqlDB) {
		//Idea: use Reflection class to check if $sqlDB is of correct type
		$this->dbHandler = $sqlDB;

		this->getCurrentMenuFromDB();
	}

	private function getCurrentMenuFromDB() {
		if (!$this->dbHandler) {
			//handle error
		}

		/* have to wait =/ */
	}

	function updateMenuInDB() {
		/* To do */
	}

	
}

?>	

