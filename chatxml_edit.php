<?php

INCLUDE 'setup.php' ; 
INCLUDE ($langinclude) ; 
$xml = simplexml_load_file("$path_dir");
$myKey = $_GET["key"];
$myValue = $_GET["value"];
$create_xml = true;
$indexOfChildOneFix = -1;
$showform1 = "inline";
$showform2 = "none";
$showform3 = "none";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="chatxml.css">
</head>
<body>
<?php
$indexOfChildOne = 0;
foreach($xml as $key0 => $value){
	if ( $indexOfChildOne == $myValue ) {
		$indexOfChildOneFix = $indexOfChildOne;
		//echo "..1..[$key0] => $value";
		$ii = 0;
		$memberSuperChild = utf8_decode($value);
		$memberSuperChildKey = $key0;
		foreach($value->attributes() as $attributeskey0 => $attributesvalue1){
			//echo "________[$attributeskey0] = $attributesvalue1";
			$memberChild[$ii] = utf8_decode($attributesvalue1);
			$ii++;
		}
		echo '<br />';
		////////////////////////////////////////////////
		$jj = 0;
		foreach($value as $key => $value2){
			//echo "....2.....[$key] => $value2";
			$memberNode[$jj] = utf8_decode($value2);
			$jj++;
		}
	}
	$indexOfChildOne++;
}
if ($indexOfChildOneFix == -1) {
	$indexOfChildOneFix = $myValue;
	echo '<h2>'.$lng_modeNew.'</h2>';
} else {
	echo '<h2>'.$lng_modeEdit.'</h2>';
}
if ($myValue < 5){
	$showform1 = "none";
	$showform2 = "inline";
	$showform3 = "none";
}
if ( ($myValue < 1) && ($myKey == 'xxx') ){
	$showform1 = "none";
	$showform2 = "none";
	$showform3 = "inline";
}
?>
<form style="display:<?php echo $showform1; ?>;" method="POST" action="chatxml_save.php">
	<input type="hidden" name="create_xml" value="<?php echo $create_xml;?>">
	<input type="hidden" name="indexOfChildOne" value="<?php echo $indexOfChildOneFix;?>">
	<table class="ab">
		<tr>
			<td class="keytext">id</td><td><input type="text" name="id" size="50" value="<?php echo $memberChild[0]; ?>"></td>
		</tr>
		<tr>
			<td class="keytext">nick</td><td><input type="text" name="nick" size="50" value="<?php echo $memberChild[1]; ?>"></td>
		</tr>
		<tr>
			<td class="keytext">name</td><td><input type="text" name="name" size="50" value="<?php echo $memberNode[0]; ?>"></td>
		</tr>
		<tr>
			<td class="keytext">email</td><td><input type="text" name="email" size="50" value="<?php echo $memberNode[1]; ?>"></td>
		</tr>
		<tr>
			<td class="keytext">icq</td><td><input type="text" name="icq" size="50" value="<?php echo $memberNode[2]; ?>"></td>
		</tr>
		<tr>
			<td class="keytext">remark</td><td><input type="text" name="remark" size="50" value="<?php echo $memberNode[3]; ?>"></td>
		</tr>
	</table>
	<p align="left">
	<input type="submit" value="<?php echo $lng_buttonSave; ?>" name="save">
	<input type="button"value="<?php echo $lng_buttonChancel; ?>" onclick="history.back()">
	</p>
</form>
<form style="display:<?php echo $showform2; ?>;" method="POST" action="chatxml_save.php">
	<input type="hidden" name="create_xml" value="<?php echo $create_xml;?>">
	<input type="hidden" name="indexOfChildOne" value="<?php echo $indexOfChildOneFix;?>">
	<table  class="ab">
		<tr>
			<td class="keytext"><?php echo $memberSuperChildKey; ?></td><td><input type="text" name="supermeta" size="50" value="<?php echo $memberSuperChild; ?>"></td>
		</tr>
	</table>
	<p align="left">
	<input type="submit" value="<?php echo $lng_buttonSave; ?>" name="save">
	<input type="button"value="<?php echo $lng_buttonChancel; ?>" onclick="history.back()">
	</p>
</form>
<form style="display:<?php echo $showform3; ?>;" method="POST" action="chatxml_save.php">
	<input type="hidden" name="create_xml" value="<?php echo $create_xml;?>">
	<input type="hidden" name="indexOfChildOne" value="-1">
	<table  class="ab">
		<tr>
			<td class="keytext">Nick</td><td><input type="text" name="supermeta" size="50" value="<?php echo utf8_decode($xml[nick]); ?>"></td>
		</tr>
	</table>
	<p align="left">
	<input type="submit" value="<?php echo $lng_buttonSave; ?>" name="save">
	<input type="button"value="<?php echo $lng_buttonChancel; ?>" onclick="history.back()">
	</p>
</form>

</body>
</html>