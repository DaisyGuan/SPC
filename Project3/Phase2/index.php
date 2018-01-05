<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'SPC' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'spc';
$page[ 'help_button' ]   = 'spc';
$page[ 'source_button' ] = 'spc';

dvwaDatabaseConnect();

$vulnerabilityFile = '';
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/spc/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
	<div class=\"body_padded\">
		<h1>SPC Custom Vulnerabilities</h1>
			<div class=\"vulnerable_code_area\">
				<form name=\"exec\" action=\"#\" method=\"post\">
			<p>
				What is your input?
				<input type=\"text\" name=\"ip\" size=\"30\">
				<input type=\"submit\" name=\"Submit\" value=\"Submit\">
			</p>
				</form>
				<form name=\"XSS\" action=\"#\" method=\"GET\">
			<p>
				What is your input?
				<input type=\"text\" name=\"name\" size=\"30\">
				<input type=\"submit\" value=\"Submit\">
			</p>

				</form>
				<form name=\"csrf\" action=\"#\" method=\"GET\">
                        <p>
                                What is your input?
				<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_new\">
				<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password_conf\">
                                <input type=\"submit\" name=\"Submit\" value=\"Submit\">
                        </p>\n";
if( $vulnerabilityFile == 'high.php' )
	$page[ 'body' ] .= "			" . tokenField();

$page[ 'body' ] .= "
		</form>
		{$html}
	</div>

	<h2>More Information</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Command_Injection')."</li>
	</ul>
</div>\n";

dvwaHtmlEcho( $page );
?>
