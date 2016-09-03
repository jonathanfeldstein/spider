<?php
	require 'core.php';
	$db = new DB();
	$db->exe('DELETE FROM '.TKN_INI.' WHERE '.TKN_ID.'=?;', [['', $_COOKIE[COOKIE_NAME]]]);
	$db->close();
	setcookie(COOKIE_NAME, '', -1, SERVER_PATH, SERVER_NAME, 1, 1);
	out('Logged out', 's');
?>