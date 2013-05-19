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
<div class="scrollcontainer">
	<div class="content">
<div class="chat" >


</div>
<div class="send">

<form name="input" action="chat_add.php" method="post">

<input type="text" style="display:none" id="colorhex"  name="color" value="<?php echo $_SESSION['color'] ?>" maxlength="20" >

<input class="txtinput" autofocus="true" type="text" name="says" maxlength="170" >
<input class="submitbtn" type="submit" value="send msg" >

<a id="namepick" href="namepick" style="color:<?php echo $_SESSION['color'] ?>">change your name, <?php echo $_SESSION['user_name'] ?> </a> 
<input type="text" style="display:none" id="nameinput" name="user"  value="<?php echo $_SESSION['user_name'] ?>"  maxlength="20" >
<a id="colorpick" href="colorpick" style="color:<?php echo $_SESSION['color'] ?>">select your color</a> 
</form> 

</div>

<div id="w3cpicker"></div>
<div id="bang"> . </div>

</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>
<script>

(function($){ $.fn.autofocus=function(){return (this.first().autofocus!==true)?this.focus():this;};})(jQuery);

var glb_last_load = "now";
var last_msg = "nower";
var timehandler = function () {
	$.get("./lastmsg.php?r=" + Math.random()*99999, function(data) {
  		last_msg = data;
	});	
	if ( last_msg == glb_last_load ) return false;
	glb_last_load = last_msg;
	$('.chat').load("./chat.php?r=" + Math.random()*99999 , function() {
      		$("html, body").animate({ scrollTop: $(document).height() - $(window).height()  }, 2000);
  	});
} 
$(document).ready( function() { 
	$('[autofocus]').autofocus();
	 $('.chat').load("./chat.php?r=" + Math.random()*99999, function() {
 	$("html, body").animate({ scrollTop: $(document).height() - $(window).height()  }, 2000);   	
});
$("#colorpick").click( function (){
	$("#w3cpicker").load("./w3cpicker.html", function () {
   	$("html, body").animate({ scrollTop: $(document).height() - $(window).height()  }, 2000);
		applyclickhandler();
	});
   	return false;
});
$("#namepick").click( function (){
	$("#w3cpicker").load("./namepicker.html", function () {
   		$("#nameinput").fadeIn("slow");
   	});
   	return false;
});
    setInterval( timehandler, 6000); 
});

</script>




</body>
</html>