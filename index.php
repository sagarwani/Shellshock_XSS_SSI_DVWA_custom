<?php


define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Good Luck!' . $page[ 'title_separator' ].$page[ 'title' ];
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

function cow($data)
{
    $input = str_replace("<", "&lt;", $data);
    $input = str_replace(">", "&gt;", $input);
    $input = urldecode($input);
   
    return $input;
}

function ip_addr1($data, $encoding = "UTF-8")
{
$data = str_replace( "<s", "donthackme", $data );
$data = str_replace( "<i", "donthackme", $data );
$data = str_replace( "<i", "donthackme", $data );
$data = str_replace( "<b", "donthackme", $data );
$data = str_replace( "<t", "donthackme", $data );
$data = str_replace( "<k", "donthackme", $data );
$data = str_replace( "<v", "donthackme", $data );
$data = str_replace( "<f", "donthackme", $data );
$data = str_replace( "<d", "donthackme", $data );
$data = str_replace( "<a", "donthackme", $data );
$data = str_replace( "<m", "donthackme", $data );
return $data;
}

if($_COOKIE[ 'security' ] == 'low' )
	{
require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/spc/source/{$vulnerabilityFile}";
	$page[ 'body' ] .= "
	<div class=\"body_padded\">
		<h1>Lookup your IP address...</h1>
		<p>Please enter your name here:</p>

		<div class=\"Do not attemp XSS:\">

			<form name=\"IP_Address\" action=\"#\" method=\"POST\">
	
	<p><label for=\"firstname\">First name:</label><br />
        <input type=\"text\" id=\"firstname\" name=\"firstname\"></p>

        <p><label for=\"lastname\">Last name:</label><br />
        <input type=\"text\" id=\"lastname\" name=\"lastname\"></p>

        <button type=\"submit\" name=\"form\" value=\"submit\">Lookup</button>  
				</form>
				<br />
		
				\n";

		    if($field_empty == 1)
		    {
			$page[ 'body' ] .= "<font color=\"red\">Please enter both fields...</font>";
		    }
		    else
		    {
			$page[ 'body' ] .= "";
		    }
	}

elseif ($_COOKIE[ 'security' ] == 'medium')

	{
require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/spc/source/{$vulnerabilityFile}";
	$page[ 'body' ] .= "
	<div class=\"body_padded\">
		<h1>IMDB</h1>
		<h3>Check if movie exists in database:</h3>
		<div class=\"Hints Hints!! !! !!:\">

			<form name=\"Movies\" action=\"#\" method=\"GET\">
				<p>
	   				<label for=\"title\">Name of the movie:</label>
	 			        <input type=\"text\" id=\"title\" name=\"title\"> 
					<button type=\"submit\" name=\"action\" value=\"search\">Search</button>
				
				</p>
				</form>
					<div id=\"result\"></div>

					    <script>
					
						var ResponseString = ' $string ';
					
						 //var Response = eval (\"(\" + ResponseString + \")\");
					
						var Response = JSON.parse(ResponseString);
					
						document.getElementById(\"result\").innerHTML=Response.movies[0].response;

					    </script>		
				\n";
	}
else
	{
		$page[ 'body' ] .= "
			<div class=\"body_padded\">
			<div class=\"HINT: 8E674BA65A682F1C83A3A789BFE0CC9D. Do you like hashes? :p:\">
					<h1>Do you see any vulnerability here?</h1>
    		";
require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/spc/source/{$vulnerabilityFile}";
	}



$page[ 'body' ] .= "{$html}</div></div>\n";

dvwaHtmlEcho( $page );

?>
