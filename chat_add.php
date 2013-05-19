<?php
session_start(); 


if ($_POST["says"] == "/clear") {
$xmlstr = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<chat event="just for fun">
<msg><date>1368215674</date><user>darrell dupas</user><txt color="#FFFF66">
 set your name and color below, use /clear msg to restart</txt></msg></chat>
XML;
$fp = fopen('./xmlf/chat.xml','w');
$write = fwrite($fp,$xmlstr);
header('Location: chatxml.php'); 	
}
else {

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
}
?>
