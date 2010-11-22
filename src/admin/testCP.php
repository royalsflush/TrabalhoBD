<!--
	Control Panel Interface Test Page
	Written by Luiza Silva
	Last Updated: 18/11/10
-->

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
		<link type="text/css" href="../layout/ui-lightness/jquery-ui-1.8.6.custom.css" rel="stylesheet" />

		<!-- Including our CSS-->
		<link rel="stylesheet" type="text/css" href="../layout/template.css" media="screen" />

		<!-- jQuery javascript files -->
		<script src="../includes/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="../includes/jquery-ui.js" type="text/javascript"></script>

		<!-- My javascript files -->
		<script type="text/javascript" src="../includes/controlPanel.js"></script>
		
		<title>Control Panel Test Page</title>		
	</head>

	<body>
		<div class="container">
			<div class="span-24 last" id="header">
				<!-- that has to be the user header --> 
			</div>  
			<div class="span-24 last" id="menu">
				<!-- and here, the user's menu -->
			</div>
			<div class="span-24 last" id="main">  
			</div>

			<?php require('../includes/controlPanel.inc'); ?>
		</div>
	</body>
</html>
