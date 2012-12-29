<?php
session_start(); 
$xml = simplexml_load_file("./xmlf/chat.xml");

$msg = $xml->addChild("msg");
$d = $msg->addChild("date");
$u = $msg->addChild("user");
$t = $msg->addChild("txt");
$d[0][0] = date(DATE_RFC1036);
$u[0][0] = utf8_encode($_POST["user"]);
$t[0][0] = utf8_encode($_POST["says"]);
$_SESSION['user_name'] = utf8_encode($_POST["user"]);
$xml = $xml->asXML();
$fp = fopen('./xmlf/chat.xml','w');
$write = fwrite($fp,$xml);
header('Location: chatxml.php'); 

?>
