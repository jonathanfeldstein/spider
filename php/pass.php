<?php
	require 'core.php';
	require 'auth.php';
	
	if($auth !== true){
		out('No Permission', 'e');
		die();
	}
	if(!isset($_POST[USERS_P_USER]) || !isset($_POST[USERS_P_CONF]) || !isset($_POST[USERS_P_CUR])){
		out('Missing Data', 'w');
		die();
	}
	$db = new DB();
	$db->exe(
		'SELECT '.USERS_P_USER.' from '.USERS_INI.' WHERE '.USERS_USER.'=?;',
		[[ $cur_user ]]
	);
	$cur_pass = $db->fetch();
	if(strlen($_POST[USERS_P_USER]) > 254){
		out('Invalid Data', 'w');
		die();
	}
	if($_POST[USERS_P_USER] !== $_POST[USERS_P_CONF]){
		out('Passwords don\'t match', 'w');
	}
	$cur_pass = decrypt_sym($cur_pass[0][USERS_P_USER], $_POST[USERS_P_CUR]);
	if($cur_pass === false){
		out('Wrong Password', 'e');
		die();
	}
	$db->exe(
		'UPDATE '.USERS_INI.' SET '.USERS_P_USER.'=?;',
		[[ encrypt_sym($cur_pass, $_POST[USERS_P_USER]) ]]
	);
	out('Password Changed', 's');
	$db->close();
?>