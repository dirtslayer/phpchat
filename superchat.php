<?php
    
    
    // start session
    session_start(); 
    // source the passwd.php file
    include 'passwd.php';
    
    if ($_GET['logout'] == 'ok') {
    	$_SESSION['user_name'] =  '';
     	$_SESSION['auth_ok'] = '';
		show_login_form();
		return;
    }
    
    if ( $superusers[$_POST['user_name']] == $_POST['passwd'] ) {
		$_SESSION['user_name'] = $_POST['user_name'];
     	$_SESSION['auth_ok'] = 'ok';
		show_su_app();
		return;
	}
	
    if ( $superusers[$_SESSION['user_name']] == '' ) {
    	show_login_form();
		return;
    }
	
	if ( $superusers[$_SESSION['auth_ok']] !== '' ) {
    	show_su_app();
		return;
    }
	
	
	return;
	
	
	function show_login_form()
{
	?>	
	<h1>login form</h1>
	
<form action="superchat.php" method="post">
Name: <input type="text" name="user_name">
Password: <input type="password" name="passwd">
<input type="submit">
</form>
	<?php
} 


function show_su_app() {
	?>	
	<h1>su app</h1>
	<a href="superchat.php?logout=ok">logout</a>
	<?php
}
     
?>
