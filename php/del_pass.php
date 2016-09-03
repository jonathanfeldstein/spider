<?php
	require 'auth.php';
	
	if($auth !== true){
		out('Operation Denied', 'e');
		die();
	}
	if(!isset($_POST[DB_ID])){
		out('Missing Data', 'e');
		die();
	}
	$db = new DB();
	$db->exe('DELETE FROM '.DB_INI.$cur_user.' WHERE '.DB_ID.'=?;', [[ $_POST[DB_ID] ]]);
	out('Password Deleted', 's');
	$db->close();
	
?>