<?php
// <script> alert("xsslow")</script>
// Is there any input
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Feedback for end user
	$html .= '<pre>Hello ' . $_GET[ 'name' ] . '</pre>';
	// No restrctions on get name here, user input is directly render the site
	// No user input validation here
}
?>
