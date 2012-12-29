<?php

INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ; 
$xml = simplexml_load_file("$path_dir");
$myValue = $_GET["value"];
$indexOfChildOne = 0;
foreach($xml as $key0 => $value){
	if ( $indexOfChildOne == $myValue ) {
		$saveNodeIndexOfChildOne = $indexOfChildOne;
		// break?
	}
	$indexOfChildOne++;
}
// dd: looks like the above for each loops through ALL children and marks child to delete 
// then, the below code relies on member function to index into the xml node set, so, it looks
// member set (member is the name of the many elements), since there are 5 children before the member set
// he subtracts 5
// this doesnt seem like the most efficient way to do this, i would rather write a xsl rewrite 
// or at least stop the above for look (possibly insert break)
if ($saveNodeIndexOfChildOne > 4) {
	$saveNodeIndexOfChildOneFix = $saveNodeIndexOfChildOne - 5;
	unset($xml->member[$saveNodeIndexOfChildOneFix]);
}
$xml = $xml->asXML();
$fp = fopen($path_dir,'w');
$write = fwrite($fp,$xml);
header('Location: chatxml.php'); 
//http_redirect("chatxml.php", array("name" => "value"), true, 1);
//require_once("chatxml.php");
?>
