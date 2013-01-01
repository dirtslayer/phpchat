<?php
session_start(); 
$xml = simplexml_load_file("./xmlf/chat.xml");

$msg = $xml->addChild("msg");
$d = $msg->addChild("date");
$u = $msg->addChild("user");
$t = $msg->addChild("txt");
date_default_timezone_set("America/Edmonton");
$d[0][0] = time();
$u[0][0] = utf8_encode($_POST["user"]);
$t[0][0] = utf8_encode($_POST["says"]);
$ta = $t->addAttribute("color",$_POST["color"]);
$_SESSION['user_name'] = utf8_encode($_POST["user"]);
$_SESSION['color'] = utf8_encode($_POST["color"]);
$xml = $xml->asXML();
$fp = fopen('./xmlf/chat.xml','w');
$write = fwrite($fp,$xml);
header('Location: chatxml.php'); 

?>
