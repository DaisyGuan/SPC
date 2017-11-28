<?php
header ("X-XSS-Protection: 0");

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
        // Get input
        $name = preg_replace( array('/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i','/<(.*)i(.*)m(.*)g/i','/<(.*)s(.*)v(.*)g/i'), '', $_GET['name']);
	//$name = preg_replace( '/<(.*)i(.*)m(.*)g/i', '', $_GET['name']);
	// Feedback for end user
        $html .= "<pre>Hello ${name}</pre>";
}
?>
