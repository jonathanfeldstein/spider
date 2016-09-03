<?php
	require 'auth.php';
	
	if($auth !== true){
		out('Operation Denied', 'e');
		die();
	}
	if(!isset($_POST[DB_ID]) || !isset($_POST[USERS_P_USER])){
		out('Missing Data', 'e');
		die();
	}
	$db = new DB();
	$db->exe('SELECT '.DB_PASS.' FROM '.DB_INI.$cur_user.' WHERE '.DB_ID.'=?;',
		[[ $_POST[DB_ID] ]]);
	$pass = $db->fetch();
	if(is_array($pass)){
		$db->exe('SELECT '.USERS_P_USER.' FROM '.USERS_INI.' WHERE '.USERS_USER.'=?;',
			[[ $cur_user ]]);
		$privKey = $db->fetch();
		$privKey = decrypt_sym($privKey[0][USERS_P_USER], $_POST[USERS_P_USER]);
		if($privKey){
			$pass = decrypt_asym($pass[0][DB_PASS], $privKey);
			out('Password Decrypted', 's', $pass);
		}
		else{
			out('Wrong Password', 'w');
		}
	}
	else{
		out('No Password Available', 'e');
	}
	$db->close();
?>