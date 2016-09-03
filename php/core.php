<?php
set_time_limit(5);

define('SERVER_NAME', 'nicco.io');
define('SERVER_PATH', '/');

define('USERS_ID', 'id');
define('USERS_EMAIL', 'email');
define('USERS_PASS', 'pass');
define('USERS_F_NAME', 'first_name');
define('USERS_L_NAME', 'last_name');
define('USERS_T_NAME', 'name_title');
define('USERS_ADDRESS', 'address');
define('USERS_ZIP', 'zip_code');
define('USERS_COUNTRY', 'country');
define('USERS_CITY', 'city');
define('USERS_COMPANY', 'company');
define('USERS_TKN_ID', 'token_id');
define('USERS_TKN_IP', 'token_ip');
define('USERS_TKN_TIME', 'token_time');
define('USERS_LS', 'last_seen');
define('USERS_INI', 'users');

define('TKN_ID', 'tkn_id');
define('TKN_IP', 'tkn_ip');
define('TKN_EMAIL', 'tkn_email');
define('TKN_TIME', 'tkn_time');
define('TKN_INI', 'tkn');

define('COOKIE_NAME', 'tkn_id');
define('COOKIE_LENGTH', 128);
define('COOKIE_LIFE', 60*60*24);
define('COOKIE_TO', 60*60*24);

define('PASS_MIN_LEN', 8);

function isAssoc(array $array){
	return array_keys(array_merge($array)) !== range(0, count($array) - 1);
}

function genPass($len = 128){
	$genPass_chars = '23456789ABCDEFGHJKLMNPRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
	$genPass_chars_len = strlen($genPass_chars) - 1;
	$genPass_pass = '';
	for($genPass_i=0; $genPass_i<$len; $genPass_i++)
		$genPass_pass .= $genPass_chars[mt_rand(0, $genPass_chars_len)];
	return $genPass_pass;
}

function out($m, $s, $d = null){
	header('Content-Type: application/json');
	echo(json_encode(['status'=>$s, 'msg'=>$m, 'data'=>$d]));
	fastcgi_finish_request();
}

class DB {
	private $conn = null, $stmt, $ini = false, $ini_file = 'db.ini';
	
	function __construct(){
		if($ini_res = parse_ini_file($this->ini_file)){
			$this->conn = new PDO(
				$ini_res['driver'].':host='.$ini_res['host'].';dbname='.$ini_res['db'].';charset=utf8;',
				$ini_res['username'],
				$ini_res['password'],
				array(
					PDO::ATTR_EMULATE_PREPARES => false,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				)
			);
			$this->ini = true;
		}
		else{
			return false;
		}			
	}
	
	public function exe($sql, $data = null){
		if($this->ini && !is_null($sql)){
			try{
				$this->stmt = $this->conn->prepare($sql);
			}catch(PDOException $e){
				return false;
			}
			if(is_array($data)){
				for($i=0; $i<count($data); $i++)
					if(is_array($data[$i])){
						if(isAssoc($data)){
							foreach($data[$i] as $key => $val)
								$this->stmt->bindValue($data[$i][$key], $val);
						}
						else{
							foreach($data[$i] as $key => $val)
								$this->stmt->bindValue($key+1, $val);
						}
					}
					else
						return false;
			}
			$this->stmt->execute();
			return true;
		}
		else return false;
	}
	
	public function fetch(){
		if($this->ini){
			if($this->stmt)
				return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
			}
		else
			return false;
	}
	
	public function error(){
		return $this->conn->errorInfo();
	}
	
	public function close(){
		$this->conn=null;
		return true;
	}
}

/*
*	Password Hashing
*/
define("PBKDF2_HASH_ALGORITHM", "sha512");
define("PBKDF2_ITERATIONS", 2048);
define("PBKDF2_SALT_BYTE_SIZE", 64);
define("PBKDF2_HASH_BYTE_SIZE", 64);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);

function create_hash($password)
{
    $salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
    return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" .
        base64_encode(pbkdf2(
            PBKDF2_HASH_ALGORITHM,
            $password,
            $salt,
            PBKDF2_ITERATIONS,
            PBKDF2_HASH_BYTE_SIZE,
            true
        ));
}

function validate_password($password, $correct_hash)
{
    $params = explode(":", $correct_hash);
    if(count($params) < HASH_SECTIONS)
       return false;
    $pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
    return slow_equals(
        $pbkdf2,
        pbkdf2(
            $params[HASH_ALGORITHM_INDEX],
            $password,
            $params[HASH_SALT_INDEX],
            (int)$params[HASH_ITERATION_INDEX],
            strlen($pbkdf2),
            true
        )
    );
}

function slow_equals($a, $b)
{
    $diff = strlen($a) ^ strlen($b);
    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
    {
        $diff |= ord($a[$i]) ^ ord($b[$i]);
    }
    return $diff === 0;
}

function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
{
    $algorithm = strtolower($algorithm);
    if(!in_array($algorithm, hash_algos(), true))
        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
    if($count <= 0 || $key_length <= 0)
        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

    if (function_exists("hash_pbkdf2")) {
        if (!$raw_output) {
            $key_length = $key_length * 2;
        }
        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
    }

    $hash_length = strlen(hash($algorithm, "", true));
    $block_count = ceil($key_length / $hash_length);

    $output = "";
    for($i = 1; $i <= $block_count; $i++) {
        $last = $salt . pack("N", $i);
        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
        for ($j = 1; $j < $count; $j++) {
            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
        }
        $output .= $xorsum;
    }

    if($raw_output)
        return substr($output, 0, $key_length);
    else
        return bin2hex(substr($output, 0, $key_length));
}

function create_hash_array($password){
	$tmp = explode(':', create_hash($password));
	return array('alg' => $tmp[0], 'rounds' => $tmp[1], 'salt' => $tmp[2], 'hash' => $tmp[3]);
}
?>