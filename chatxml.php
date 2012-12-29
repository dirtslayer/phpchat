<?php
// display the current chat by reloading using jquery load
// provide input box to submit to an addtxt.php
// 
// only reason this is php is to maintain a session
// variable to retain name of chatter, hmm wondering
// if jqery could handle that too, if somehow it
// could fork a post and just clear the form text box
?>
<html>
<head>
<title>Chat</title>
<link rel="stylesheet" type="text/css" href="chatxml.css">
<link jquery >
</head>
<body>

<?php
$indexOfChildOne = 0;
echo '<table cellpadding="0" cellspacing="0" >';

foreach($xml as $key0 => $value){
	if ($rowColor == "ab") {$rowColor = "ba";} else {$rowColor = "ab";}
	if ($indexOfChildOne < 1) {
		foreach($xml->attributes() as $attributeskey0 => $attributesvalue1){
			echo '<tr class="'.$rowColor.'"><td class="keytext">'.$attributeskey0.': </td><td colspan="2">'.utf8_decode($attributesvalue1).'</td>';
			echo '<td>';
			echo '<a href="./chatxml_edit.php?key=xxx&value='.$indexOfChildOne.'"><img src="./gfx/application_edit.png" alt="'.$lng_change.'"></a>';
			echo '</td>';
			echo '<td></td>';
			$rowColor = "ab";
		}
	}
	echo '<tr class="'.$rowColor.'"><td class="keytext">'.$key0.': </td>';
	if ($indexOfChildOne < 5) {echo '<td colspan="2">'.utf8_decode($value).'</td>';}
	
	foreach($value->attributes() as $attributeskey0 => $attributesvalue1){
		echo '<td>';
		echo '<span  class="keytext">'.$attributeskey0.'</span>: <b>'.utf8_decode($attributesvalue1).'</b>';
		echo '</td>';
	}
	echo '<td>';
	echo '<a href="./chatxml_edit.php?key='.$key0.'&value='.$indexOfChildOne.'"><img src="./gfx/application_edit.png" alt="'.$lng_change.'"></a>';
	echo '</td>';
	if ($indexOfChildOne > 4) {
		echo '<td>';
		echo '<a href="./chatxml_del.php?value='.$indexOfChildOne.'" onclick="return confirm(\''.$lng_deleteMessage.'\');"><img src="./gfx/cross.png" alt="'.$lng_delete.'"></a>';
		echo '</td>';
	} else {echo '<td></td>';}
	echo "</tr>\r\n";
	$indexOfChildOne++;
	////////////////////////////////////////////////
	if ($indexOfChildOne > 5) {
	echo '<tr class="'.$rowColor.'"><td></td><td colspan="4">';
	foreach($value as $key => $value2){
		echo '<span  class="keytext">'.$key.'</span>: '.utf8_decode($value2).'<span  class="keytext"> , </span>';
		foreach($value2->attributes() as $attributeskey => $attributesvalue2){
			echo '<td>'.$attributeskey.': '.utf8_decode($attributesvalue2).'</td>';
		}
	}
	echo "</td></tr>\r\n";
	}
echo '<tr><td colspan="5" class="hrpart"></td></tr>';	
}

echo '</table>';
$indexOfChildOne + 1;
echo '<br/><a href="./chatxml_edit.php?key='.$key0.'&value='.$indexOfChildOne.'"><img src="./gfx/add.png" alt="'.$lng_add.'"> '.$lng_add.'</a>';
?>


<?php
echo "<pre>";
foreach($xml as $key0 => $value){
	
		echo "key: ".$key0." value: ".$value." type:". gettype($value)."\n";	
		var_dump($value);
	
}
echo"</pre>";
?>	
	


</body>
</html>
