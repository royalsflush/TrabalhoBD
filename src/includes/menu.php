<?php
	// Represents a menu - handles all about it
	// Written by Luiza
	// Last updated: 13/11/10

	// This class has to
	// 1. Get the current menu from the database and transform it into an 2D array
	// 2. Represent that menu as a table (6x4 table)
	// 3. Generate the code to the dropdown menu and put it in the 'menu.inc' file
	// 4. Update the database with a new menu
	// 5. Handles changes in the current menu (in the edition page)

	// "Optimization" note: instead of generating the menu on the fly (getting from the database and
	// formatting it), it only generates the code once (after the menu has been modified somehow 
	// by the user) and paste it to a file named menu.inc - this way, the database has less queries
	
	/* The necessary include files */
	require_once("sql_db.php");

	class Menu {
		// Represents the menu, with menu[i][j] = pageId
		private $menuArray;

		// Gets an object that handles DB connections
		private $dbHandler = NULL;

		// Associative array pageId => pageTitle
		private $mapIdName;

		// Tracks the already existing IDs (including this session deleted pages)
		private $availableIDs;

		function __construct($sqlDB) {
			//Idea: use Reflection class to check if $sqlDB is of correct type
			$this->dbHandler = $sqlDB;

			$this->getCurrentMenuFromDB();
		}

		private function getCurrentMenuFromDB() {
			if (!$this->dbHandler) {
				//handle error
			}

			for ($i=1; $i<=6; $i++) {
				for ($j=1; $j<=4; $j++)
					$this->menuArray[$i][$j]=-1;
			}

			// Test situation
			$this->menuArray[1][1]=0;
			$this->menuArray[2][1]=5;
			$this->menuArray[4][1]=3;

			$this->mapIdName[0]='Index';
			$this->mapIdName[5]='Photos';
			$this->mapIdName[3]='Something else';
			//End of test situation

			// To do!!!
		}

		function updateMenuInDB() {
			/* To do */
		}

		function printToMenuIncFile() {
			// To do
		}

		function generateMenuTable() {
			$menuTable = '<div id="menuTable">'."\n".
						"\t".'<table border="1">'."\n";

			for ($i=1; $i<=4; $i++) {
				$menuTable .= "\t\t<tr>\n";

				for ($j=1; $j<=6; $j++) {
					$currId = $this->menuArray[$j][$i];
					$menuTable .= "\t\t\t<td>".'<div class="drop">';
										

					if ($currId == -1) $menuTable .= '&nbsp;&nbsp;';
					else $menuTable .= '<div class="drag">'.$this->mapIdName[$currId].'</div>';

					$menuTable .= "</div></td>\n";
				}

				$menuTable .= "\t\t</tr>\n";
			}

			$menuTable.="\t</table>\n
					</div>\n";
		
			return $menuTable;
		}

		function renamePage($posX, $posY, $newName) {
			$renamePageId = $this->menuArray[$posX][$posY];
			$this->mapIdName[$renamePageId] = $newName;
		}

		function createPage($posX, $posY) {
		}
	}
?>	

