<?php
// only displays the current chat, will parametarize
// chat.xml so that its the value of event.xml/event/@chatid
$xml = new DOMDocument;
$xml->load('xmlf/chat.xml');

$xsl = new DOMDocument;
$xsl->load('xmlf/lastmsg.xsl');

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);

?>
