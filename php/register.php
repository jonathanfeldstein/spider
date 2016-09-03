<?php
	require 'core.php';
	
	if(
		!isset($_POST[USERS_PASS]) || $_POST[USERS_PASS] == '' ||
		!isset($_POST[USERS_PASS.'_conf']) || $_POST[USERS_PASS.'_conf'] == '' ||
		!isset($_POST[USERS_EMAIL]) || $_POST[USERS_EMAIL] == '' ||
		!isset($_POST[USERS_F_NAME]) || $_POST[USERS_F_NAME] == '' ||
		!isset($_POST[USERS_L_NAME]) || $_POST[USERS_L_NAME] == '' ||
		!isset($_POST[USERS_T_NAME]) || $_POST[USERS_T_NAME] == '' ||
		!isset($_POST[USERS_ADDRESS]) || $_POST[USERS_ADDRESS] == '' ||
		!isset($_POST[USERS_ZIP]) || $_POST[USERS_ZIP] == '' ||
		!isset($_POST[USERS_CITY]) || $_POST[USERS_CITY] == '' ||
		!isset($_POST[USERS_COUNTRY]) || $_POST[USERS_COUNTRY] == '' ||
		!isset($_POST[USERS_COMPANY]) || $_POST[USERS_COMPANY] == ''
	){
		out('Missing Data', 'w');
		die();
	}
	$db = new DB();
	$db->exe(
		'SELECT * from '.USERS_INI.' WHERE '.USERS_EMAIL.'=?;',
		[[ $_POST[USERS_EMAIL] ]]
	);
	if(count($db->fetch()) == 0){
		if(filter_var($_POST[USERS_EMAIL], FILTER_VALIDATE_EMAIL) === false || strlen($_POST[USERS_EMAIL]) > 128){
			out('Invalid Email', 'w');
			die();
		}
		if($_POST[USERS_PASS] !== $_POST[USERS_PASS.'_conf']){
			out('Passwords don\'t match', 'w');
			die();
		}
		if(strlen($_POST[USERS_PASS]) < 8){
			out('Password to short', 'w');
			die();
		}
		$hash = create_hash($_POST[USERS_PASS]);
		$db->exe(
			'INSERT INTO '.USERS_INI.' ('.USERS_EMAIL.', '.USERS_PASS.', '.USERS_F_NAME.', '.USERS_L_NAME.', '.USERS_T_NAME.', '.USERS_ADDRESS.', '.USERS_ZIP.', '.USERS_CITY.', '.USERS_COUNTRY.', '.USERS_COMPANY.') VALUES(?,?,?,?,?,?,?,?,?,?);',
			[[
				$_POST[USERS_EMAIL],
				$hash,
				$_POST[USERS_F_NAME],
				$_POST[USERS_L_NAME],
				$_POST[USERS_T_NAME],
				$_POST[USERS_ADDRESS],
				$_POST[USERS_ZIP],
				$_POST[USERS_CITY],
				$_POST[USERS_COUNTRY],
				$_POST[USERS_COMPANY]
			]]
		);
		if($db->error()[0] == '0000')
			out('User created', 's');
		else
			out('DB Error', 'd');
	}
	else{
		out('User already exists', 'e');
	}
	$db->close();
?>