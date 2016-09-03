<?php
	require 'core.php';
	if(isset($_POST[USERS_EMAIL]) && isset($_POST[USERS_PASS])){
		$db = new DB();
		$db->exe('SELECT * FROM '.USERS_INI.' WHERE '.USERS_EMAIL.'=?', [[$_POST[USERS_EMAIL]]]);
		$ret = $db->fetch();
		if(count($ret) == 1){
			$ret = $ret[0];
			if(!validate_password($_POST[USERS_PASS], $ret[USERS_PASS])){
				out('Access Denied', 'e');
			}
			else{
				$tkn = '';
				$max_try = 10;
				while($tkn == '' && $max_try>0){
					$tmp = genPass();
					$db->exe(
						'SELECT * from '.TKN_INI.' WHERE '.TKN_ID.'=?;',
						[[ $tmp ]]
					);
					if(count($db->fetch()) == '0')
						$tkn = $tmp;
					$max_try++;
				}
				if($tkn == '')
					out('Timeout, try again', 'e');
				if($db->exe(
					'INSERT INTO '.TKN_INI.' ('.TKN_ID.','.TKN_IP.','.TKN_TIME.','.TKN_EMAIL.') VALUES(?,?,?,?);',
					[[
						$tkn,
						$_SERVER['REMOTE_ADDR'],
						date('Y-m-d H:i:s'),
						$_POST[USERS_EMAIL]
					]]
				)){
					setcookie(COOKIE_NAME, $tkn, time() + COOKIE_LIFE, SERVER_PATH, SERVER_NAME, 1, 1);
					out('Access Granted', 's');
				}
				else
					out('DB Error: '.$db->error()[0], 'e');
			}
		}
		else
			out('Access Denied', 'e');
	}	
	else{
		out('Wrong Data', 'w');
	}
	$db->close();
?>