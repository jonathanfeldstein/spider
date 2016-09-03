<?php
	require 'core.php';
	require 'auth.php';
	
	if($auth !== true){
		out('No Permission', 'e');
		die();
	}
	if(!isset($_POST[USERS_EMAIL])){
		out('Missing Data', 'w');
		die();
	}
	if(filter_var($_POST[USERS_EMAIL], FILTER_VALIDATE_EMAIL) === false || strlen($_POST[USERS_EMAIL]) > 254){
		out('Invalid Email', 'w');
		die();
	}
	
	$db = new DB();
	$db->exe(
		'UPDATE '.USERS_INI.' SET '.USERS_EMAIL.'=?;',
		[[ $_POST[USERS_EMAIL], $cur_user ]]
	);
	out('E-Mail Changed', 's');
	$db->close();
?>