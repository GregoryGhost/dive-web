<?php

namespace Auth;

class User
{
    private $id;
    private $login;
    private $db;
    private $user_id;

    private $db_host = "localhost";
    private $db_name = "dota_live";
    private $db_user = "user_dotalive";
    private $db_pass = "qwerty1234";

    private $is_authorized = false;

    public function __construct($login = null, $password = null)
    {
        $this->login = $login;
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public static function isAuthorized()
    {
        if (!empty($_SESSION['user_id'])) {
            return (bool) $_SESSION['user_id'];
        }
        return false;
    }

	private function getIdUser($login)
	{
		$query = "select id_user from auth_user where login = :login limit 1";
		$sth = $this->db->prepare($query);
        $sth->execute(
                array(
                    ":login" => $login
                )
        );

        $row = $sth->fetch();
        if (!$row) {
            return false;
        }
        return $row['id_user'];
    }
		
    public function passwordHash($password, $salt = null, $iterations = 10)
    {
        $salt || $salt = uniqid();
        $hash = md5(md5($password . md5(sha1($salt))));

        for ($i = 0; $i < $iterations; ++$i) {
            $hash = md5(md5(sha1($hash)));
        }

        return array('hash' => $hash, 'salt' => $salt);
    }

    public function getSalt($login) 
    {
        $query = "select salt from auth_user where login = :login limit 1";
        $sth = $this->db->prepare($query);
        $sth->execute(
            array(
                ":login" => $login
            )
        );
        $row = $sth->fetch();
        if (!$row) {
            return false;
        }
        return $row['salt'];
    }

    public function authorize($login, $password, $remember=false)
    {
        $query = "select id_user, login from auth_user where
            login = :login and password = :password limit 1";
        $sth = $this->db->prepare($query);
        $salt = $this->getSalt($login);

        if (!$salt) {
            return false;
        }

        $hashes = $this->passwordHash($password, $salt);
        $sth->execute(
            array(
                ':login' => $login,
                ':password' => $hashes['hash'],
            )
        );
        $this->user = $sth->fetch();
        
        if ($this->user == null) {
            $this->is_authorized = false;
        } else {
            $this->is_authorized = true;
            $this->user_id = $this->user['id_user'];
            $this->saveSession($remember);
        }

        return $this->is_authorized;
    }

    public function logout()
    {
        if (!empty($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);
        }
    }

    public function saveSession($remember = false, $http_only = true, $days = 7)
    {
        $_SESSION["user_id"] = $this->user_id;

        if ($remember) {
            // Save session id in cookies
            $sid = session_id();

            $expire = time() + $days * 24 * 3600;
            $domain = ""; // default domain
            $secure = false;
            $path = "/";

            $cookie = setcookie("sid", $sid, $expire, $path, $domain, $secure, $http_only);
        }
    }

    public function create($login, $password) 
    {
        $user_exists = $this->getSalt($login);

        if ($user_exists) {
            throw new \Exception("User exists: " . $login, 1);
        }

        $query = "insert into auth_user (login, password, salt)
            values (:login, :password, :salt)";
        $hashes = $this->passwordHash($password);
        $sth = $this->db->prepare($query);

        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                array(
                    ':login' => $login,
                    ':password' => $hashes['hash'],
                    ':salt' => $hashes['salt'],
                )
            );
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }

        if (!$result) {
            $info = $sth->errorInfo();
            printf("Database error %d %s", $info[1], $info[2]);
            die();
        } 

        return $result;
    }
    
    public function createBaseInfo($login, $baseUserInfo)
    {
		$id_user = $this->getIdUser($login);
		if(!$id_user){
			//error_log("id_user not found", 0);
			throw new \Exception("User not found: " . $login, 2);
			return;
		}
		//error_log("runing code away id_user type=" . gettype($id_user), 0);
		//return;
        $query = "insert into base_user_info (id_user, firstName, secondName, thirdName, phoneNumber, email, passport, card, birthDay)
							  values (:id_user, :firstName, :secondName, :thirdName, :phone, :mail, :passport, :card, :birthDay)";
        $sth = $this->db->prepare($query);
        
		$dateBirthDay = strtotime($baseUserInfo['birthDay'][0]);
		$dateBirthDay = date("Y-m-d", $dateBirthDay);
		
        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                array(
					':id_user'		=> intval($id_user),
                    ':firstName' 	=> $baseUserInfo['firstName'][0],
                    ':secondName' 	=> $baseUserInfo['secondName'][0],
                    ':thirdName'	=> $baseUserInfo['thirdName'][0],
                    ':phone'		=> $baseUserInfo['phone'][0],
                    ':mail'			=> $baseUserInfo['mail'][0],
                    ':passport'		=> $baseUserInfo['passport'][0],
                    ':card'			=> $baseUserInfo['card'][0],
                    ':birthDay'		=> $dateBirthDay
                )
            );
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }

        if (!$result) {
            $info = $sth->errorInfo();
            printf("Database error %d %s", $info[1], $info[2]);
            die();
        } 

        return $result;
    }
    
    public function createAdditInfo($login, $additUserInfo)
    {
		$id_user = $this->getIdUser($login);
		if(!$id_user){
			//error_log("id_user not found", 0);
			throw new \Exception("User not found: " . $login, 2);
			return;
		}
        $query = "insert into additional_user_info 
									 (id_user, growth_of_user, os, browser, lang_programming, love_paradigm, language, site)
							  values (:id_user, :growth_of_user, :os, :browser, :lang_programming, :love_paradigm, :language, :site)";
        $sth = $this->db->prepare($query);
		
        try {
            $this->db->beginTransaction();
            $result = $sth->execute(
                array(
					':id_user'			=> intval($id_user),
					':growth_of_user' 	=> $additUserInfo['height'][0],
					':os'				=> "{$additUserInfo['os'][0]}",
					/*TODO: исправить проблему с параметром браузер - приходит пустым судя по echoPostRegitration.php*/
					':browser'			=> /*'opera'*/"{$additUserInfo['loveBrowser'][0]}",
					':lang_programming'	=> "{$additUserInfo['LP'][0]}",
					':love_paradigm'	=> "{$additUserInfo['P'][0]}",
					':language'			=> "{$additUserInfo['nativeLang'][0]}",
					':site'				=> $additUserInfo['site'][0]
                )
            );
            $this->db->commit();
        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }

        if (!$result) {
            $info = $sth->errorInfo();
            printf("Database error %d %s", $info[1], $info[2]);
            die();
        } 

        return $result;
	}

    public function connectdb($db_name, $db_user, $db_pass, $db_host = "localhost")
    {
        try {
            $this->db = new \pdo("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (\pdoexception $e) {
            echo "database error: " . $e->getmessage();
            die();
        }
        $this->db->query('set names utf8');

        return $this;
    }
}
