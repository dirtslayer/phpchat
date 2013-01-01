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

<input type="text" style="display:none" id="colorhex"  name="color" value="<?php echo $_SESSION['color'] ?>" maxlength="10" >

<input class="txtinput" autofocus="true" type="text" name="says" maxlength="170" >
<input class="submitbtn" type="submit" value="Submit" >

<a id="namepick" href="namepick" style="color:<?php echo $_SESSION['color'] ?>">change your name, <?php echo $_SESSION['user_name'] ?> </a> 
<input type="text" style="display:none" id="nameinput" name="user"  value="<?php echo $_SESSION['user_name'] ?>"  maxlength="10" >
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
var timehandler = function () {
    $('.chat').load("./chat.php?r=" + Math.random()*99999 + " .msgs ");
   // $("html, body").animate({ scrollTop: $("#bang").offset().top }, 2000);
   $("html, body").animate({ scrollTop: $(document).height() - $(window).height()  }, 2000);
} 
var anotherhandler = function() { 
	$('[autofocus]').autofocus();
    $('.chat').load("./chat.php?r=" + Math.random()*99999 + " .msgs ", function() {
    	// $("#bang").offsetParent().scrollTop($("#bang").offset().top);
    	// $("html, body").animate({ scrollTop: $("#bang").offset().top }, 1);
    	$("html, body").animate({ scrollTop: $(document).height() - $(window).height()  }, 2000);
    	
    });
   
 //  $(window).height();   // returns height of browser viewport
//$(document).height(); // returns height of HTML document
   
   $("#colorpick").click( function (){
   		$("#w3cpicker").load("./w3cpicker.html", function () {
   				// $("#bang").offsetParent().scrollTop($("#bang").offset().top);
   				//$("html, body").animate({ scrollTop: $("#bang").offset().top }, 2000);
   				$("html, body").animate({ scrollTop: $(document).height() - $(window).height()  }, 2000);
   				applyclickhandler();
   		});
   		return false;
   });
   
   $("#namepick").click( function (){
   		$("#w3cpicker").load("./namepicker.html", function () {
   				// $("#bang").offsetParent().scrollTop($("#bang").offset().top);
   				$("#nameinput").fadeIn("slow");
   		});
   		return false;
   });
   
    setInterval( timehandler, 10000); 
} 
$(document).ready( anotherhandler );

</script>




</body>
</html>