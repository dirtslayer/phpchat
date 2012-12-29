<?php
// display the current chat by reloading using jquery load
// provide input box to submit to an addtxt.php
// 
// only reason this is php is to maintain a session
// variable to retain name of chatter, hmm wondering
// if jqery could handle that too, if somehow it
// could fork a post and just clear the form text box
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
<!--
// link with username, when click link have
// popup show and set username, replacing username in
// hidden textbox on form, also set username cookie / session var:w
-->
<form name="input" action="chat_add.php" method="post">
<input type="text" value="<?php echo $_SESSION['user_name'] ?>" name="user" maxlength="10" size="10">
Says <input class="txtinput" autofocus="true" type="text" name="says" maxlength="70" >
<input type="submit" value="Submit">
</form> 

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>
<script>
(function($){ $.fn.autofocus=function(){return (this.first().autofocus!==true)?this.focus():this;};})(jQuery);
var timehandler = function () {
    $('.chat').load("./chat.php?r=" + Math.random()*99999 + " .msgs ");
 } 
        var anotherhandler = function() { 
        	$('[autofocus]').autofocus();
        	
            $('.chat').load("./chat.php?r=" + Math.random()*99999 + " .msgs ", function() {$(document).scrollTop($(document).height());}  );
                    setInterval( timehandler, 5000); 
                     } 
$(document).ready( anotherhandler );
</script>

</body>
</html>
