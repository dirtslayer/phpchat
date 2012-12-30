<?php

 session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Chat</title>
<link rel="stylesheet" type="text/css" href="chatxml.css">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

<div class="chat" >


</div>
<div class="send">

<form name="input" action="chat_add.php" method="post">
<input type="text" value="<?php echo $_SESSION['user_name'] ?>" name="user" maxlength="10" size="10">
<a id="colorpick" href="colorpick" style="color:<?php echo $_SESSION['color'] ?>">Says</a> <input class="txtinput" autofocus="true" type="text" name="says" maxlength="70" >
<input style="display: none" id="colorhex" type="text" name="color" maxlength="10" value="<?php echo $_SESSION['color'] ?>" >
<input type="submit" value="Submit">
</form> 

</div>

<div id="w3cpicker"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>
<script>
(function(e){e.fn.autofocus=function(){return this.first().autofocus!==true?this.focus():this}})(jQuery);var timehandler=function(){$(".chat").load("./chat.php?r="+Math.random()*99999+" .msgs ")};var anotherhandler=function(){$("[autofocus]").autofocus();$(".chat").load("./chat.php?r="+Math.random()*99999+" .msgs ",function(){$(document).scrollTop($(document).height()+500)});$("#colorpick").click(function(){$("#w3cpicker").load("./w3cpicker.html",function(){$(document).scrollTop($(document).height()+500)});return false});setInterval(timehandler,5e3)};$(document).ready(anotherhandler)
<?php
/*
 * 
 * http://jscompress.com/
 * 
(function($){ $.fn.autofocus=function(){return (this.first().autofocus!==true)?this.focus():this;};})(jQuery);
var timehandler = function () {
    $('.chat').load("./chat.php?r=" + Math.random()*99999 + " .msgs ");
} 
var anotherhandler = function() { 
	$('[autofocus]').autofocus();
    $('.chat').load("./chat.php?r=" + Math.random()*99999 + " .msgs ", function() {
    	$(document).scrollTop($(document).height() + 500);
    });
   
   
   $("#colorpick").click( function (){
   		$("#w3cpicker").load("./w3cpicker.html", function () {
   			$(document).scrollTop($(document).height() + 500);
   		});
   		return false;
   });
   
   
    setInterval( timehandler, 5000); 
} 
$(document).ready( anotherhandler );
*/
?>
</script>




</body>
</html>
