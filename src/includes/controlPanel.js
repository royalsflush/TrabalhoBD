//
// Control Panel Javascript Code
// Written by Luiza Silva
// Last updated in 18/11/10
//
// Requires: jQuery

$(function() {
	$( "#cpTag, #cpPanel" ).mouseenter( function() {
		$( "#cpWrapper" ).height(145);	
	});

	$( "#cpPanel, #cpTag" ).mouseleave( function() {
		$( "#cpWrapper" ).height(25);
	}); 
});

