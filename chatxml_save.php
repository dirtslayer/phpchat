<?php


INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ; 
if(isset($_POST['create_xml'])){
	$xml = simplexml_load_file("$path_dir");
	$saveNodeIndexOfChildOne = $_POST["indexOfChildOne"];
	$saveNodeId = $_POST["id"];
	$saveNodeNick = $_POST["nick"];
	$saveNodeName = $_POST["name"];
	$saveNodeEmail = $_POST["email"];
	$saveNodeIcq = $_POST["icq"];
	$saveNodeRemark = $_POST["remark"];
	$superMeta = $_POST["supermeta"];

	
	if ($saveNodeIndexOfChildOne == -1) {
		$xml[nick] = utf8_encode($superMeta);
	}
	if ($saveNodeIndexOfChildOne == 0) {
		$xml->name = utf8_encode($superMeta);
	}
	if ($saveNodeIndexOfChildOne == 1) {
		$xml->email = utf8_encode($superMeta);
	}
	if ($saveNodeIndexOfChildOne == 2) {
		$xml->web = utf8_encode($superMeta);
	}
	if ($saveNodeIndexOfChildOne == 3) {
		$xml->picture = utf8_encode($superMeta);
	}
	if ($saveNodeIndexOfChildOne == 4) {
		$xml->title = utf8_encode($superMeta);
	}
	if ($saveNodeIndexOfChildOne > 4) {
		$saveNodeIndexOfChildOneFix = $saveNodeIndexOfChildOne - 5;
		$xml->member[$saveNodeIndexOfChildOneFix]['id'] = utf8_encode($saveNodeId);
		$xml->member[$saveNodeIndexOfChildOneFix]['nick'] = utf8_encode($saveNodeNick);
		$xml->member[$saveNodeIndexOfChildOneFix]->name = utf8_encode($saveNodeName);
		$xml->member[$saveNodeIndexOfChildOneFix]->email = utf8_encode($saveNodeEmail);
		$xml->member[$saveNodeIndexOfChildOneFix]->icq = utf8_encode($saveNodeIcq);
		$xml->member[$saveNodeIndexOfChildOneFix]->remark = utf8_encode($saveNodeRemark);
	}
$xml = $xml->asXML();
$fp = fopen($path_dir,'w');
$write = fwrite($fp,$xml);
require_once("chatxml.php");
}
?>