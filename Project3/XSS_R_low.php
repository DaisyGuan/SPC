<?php
// <script> alert("xsslow")</script>
// if there is any input in name
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Feedback for end user
	//print hello 'name' directly without any validation
	$html .= '<pre>Hello ' . $_GET[ 'name' ] . '</pre>';
	// No restrctions on get name here, user input is directly render the site
	// No user input validation here
}
?>
