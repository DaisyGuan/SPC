<?php
//<img src=x onError = alert("xsshigh")>
// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Get input
  //It filters out all the script tags, regex filter
  //It replaces all the characters from <script>
	$name = preg_replace( '/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i', '', $_GET[ 'name' ] );
	// Feedback for end user
	//Then print hello user
	$html .= "<pre>Hello ${name}</pre>";
}
?>
