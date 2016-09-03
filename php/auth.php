<?php
require_once 'core.php';
$auth = false;

if(isset($_COOKIE[COOKIE_NAME])){
	$db = new DB();
	/*
	$db->exe(
		'SELECT '.USERS_ID.','.USERS_EMAIL.','.USERS_TKN_TIME.' FROM '.USERS_INI.' WHERE '.USERS_TKN_ID.'=? AND '.USERS_TKN_IP.'=?;',
		[[ $_COOKIE[COOKIE_NAME], $_SERVER['REMOTE_ADDR'] ]]
	);
	*/
	$db->exe(
		'SELECT * FROM '.TKN_INI.' WHERE '.TKN_ID.'=? AND '.TKN_IP.'=?;',
		[[
			$_COOKIE[COOKIE_NAME],
			$_SERVER['REMOTE_ADDR']
		]]
	);
	$ret = $db->fetch();
	if(count($ret) != 0){
		if(time() - strtotime($ret[0][TKN_TIME]) < COOKIE_TO){
			$auth = true;
			$cur_email = $ret[0][TKN_EMAIL];
		}
		else{
			$db = new DB();
			$db->exe('UPDATE '.USERS_INI.' SET '.USERS_TKN_ID.'=? WHERE '.USERS_TKN_ID.'=?;', [['', $_COOKIE[COOKIE_NAME]]]);
			$db->close();
			setcookie(COOKIE_NAME, '', -1, SERVER_PATH, SERVER_NAME, 1, 1);
		}
	}
	$db->close();
}

?>