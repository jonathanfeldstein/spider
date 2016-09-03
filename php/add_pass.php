<?php
	require 'auth.php';
	
	if($auth !== true){
		out('Operation Denied', 'e');
		die();
	}
	if(!isset($_POST[DB_MSG]) || !isset($_POST[DB_USER]) || !isset($_POST[DB_PASS]) || !isset($_POST[DB_URL])){
		out('Missing Data', 'e');
		die();
	}
	$db = new DB();
	$db->exe('SELECT '.USERS_P_PUBLIC.' FROM '.USERS_INI.' WHERE '.USERS_USER.'=?;', [[ $cur_user ]]);
	$ret = $db->fetch();
	$db->exe('INSERT INTO '.DB_INI.$cur_user.' ('.DB_MSG.', '.DB_URL.', '.DB_USER.', '.DB_PASS.') VALUES(?,?,?,?);',
		[[ $_POST[DB_MSG], $_POST[DB_URL], $_POST[DB_USER], encrypt_asym($_POST[DB_PASS], $ret[0][USERS_P_PUBLIC]) ]]);
	out('Password Added', 's');
	$db->close();
	
?>