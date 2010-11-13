<?php

/* includes */
require_once("sql_db.php");

class Page {
	private $content = NULL;
	private $title = NULL;
	private $dbHandler = NULL;
	private $template = NULL;

	private function getContentFromDB() {
		$this->content = 'Hi!';
	}

	private function buildPage() {
		$this->template = file_get_contents('template.inc');
		if (!$this->template) echo 'Error while loading the file!';		

		$this->getContentFromDB();
		//Have to work on the menu part right here

		//Here I'm assuming that str_replace has a low constant and is O(N)
		//on the size of template. If not (I' can't find this information), it might be worth
		//it to implement KMP for this specific function, since we're gonna use it a
		// lot
		$this->template = str_replace('##MAIN_CONTENT_GOES_HERE##', $this->content, $this->template); 	
		$this->template = str_replace('##TITLE_GOES_HERE##', $this->title, $this->template);
		$this->template = str_replace('##MENU_GOES_HERE##', 'Menu', $this->template);
		$this->template = str_replace('##HEADER_GOES_HERE##', 'Header', $this->template);
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
