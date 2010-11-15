<?php
	// This is the class that makes the page ready for displaying
	// Written by Luiza
	// Last update:	13/11/10

	// This class needs to
	// 1. Read the template file (seems ok)
	// 2. Get the page content, title, menu and header from the database (based on the pageId)
	// 3. Replace some flags by the info from the database
	// 4. Show the page


	/* includes */
	require_once("sql_db.php");
	require_once("menu.php");

	class Page {
		// Receives the content from the database already formatted in XHTML 
		private $content = NULL;

		// Page's title (that appears between title tags)
		private $title = NULL;

		// Instance of a class that handles DB connections
		private $dbHandler = NULL;

		// Read from a pre-defined template file that has some special tags
		// that will be replaced with user content - template.inc
		private $template = NULL;

		// Read from a file named menu.inc (in the includes folder)
		private $menu = NULL;

		private function getContentFromDB() {
			$this->content = 'Hi!';
		}

		private function buildPage() {
			$this->template = file_get_contents('includes/template.inc');
			if (!$this->template) echo 'Error while loading the file!';		

			$this->getContentFromDB();
			//Have to work on the menu part right here

			$this->template = str_replace('##TITLE_GOES_HERE##', $this->title, $this->template);
			$this->template = str_replace('##MENU_GOES_HERE##', 'Menu', $this->template);
			$this->template = str_replace('##HEADER_GOES_HERE##', 'Header', $this->template);
			$this->template = str_replace('##MAIN_CONTENT_GOES_HERE##', $this->content, $this->template); 	
		} 

		/* Constructor receives a string containing page name, exactly as it is on the DB
		   and an already instantiated SqlBD */  

		function __construct($pageName, $sqlDB) {
			//Handle errors

			$this->title = $pageName;
			$this->dbHandler = $sqlDB; 	
			$this->buildPage();
		}

		/* Self-explanatory */

		function echoPage() {
			echo $this->template;
		}
	}

?>
