<?php
// Is there any input?
//<scr<script>ipt>alert("xssmid")</script>
//<SCRIPT>alert("xssmid")</script>
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Get input
  //It filters out the <script>, replaced by ''
	$name = str_replace( '<script>', '', $_GET[ 'name' ] );
	// Feedback for end user
	//Then print Hello user
	$html .= "<pre>Hello ${name}</pre>";
}
?>
