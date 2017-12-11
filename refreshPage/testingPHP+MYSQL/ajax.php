<?php

include './lib/Auth.class.php';
include './lib/AjaxRequest.class.php';

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class AuthorizationAjaxRequest extends AjaxRequest
{
    public $actions = array(
        "login" => "login",
        "logout" => "logout",
        "register" => "register",
    );

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }
        setcookie("sid", "");

        $login = $this->getRequestParam("login");
        $password = $this->getRequestParam("password");
        $remember = !!$this->getRequestParam("remember-me");

        if (empty($login)) {
            $this->setFieldError("login", "Enter the login");
            return;
        }

        if (empty($password)) {
            $this->setFieldError("password", "Enter the password");
            return;
        }

        $user = new Auth\User();
        $auth_result = $user->authorize($login, $password, $remember);

        if (!$auth_result) {
            $this->setFieldError("password", "Invalid login or password");
            return;
        }

        $this->status = "ok";
        $this->setResponse("redirect", ".");
        $this->message = sprintf("Hello, %s! Access granted.", $login);
    }

    public function logout()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");

        $user = new Auth\User();
        $user->logout();

        $this->setResponse("redirect", ".");
        $this->status = "ok";
    }
    
    private function fillDataFromRequest($nameField)
    {
		$result = null;
		if($nameField){
			$data = [];
			foreach($nameField as $key => $pattern){
				$data = array_merge(
							$data,
							[$key => [$this->getRequestParam($key), $pattern]]
				);
			}	
			$result = $data;
		}else{
			error_log("array data is empty", 0);
		}
		return $result;
	}

	private function isEmptyField($data)
	{
		if($data){
			foreach($data as $key => $d){
					$field = $d[0];
					if(empty($field)){
						$this->setFieldError($field, "Enter the " . $field);
						return true;
					}
			}
		}else {
			error_log("array data is empty", 0);
			return true;
		}
		return false;
	}
	
	private function isInvalidDataForPattern($data)
	{
		if($data){
			foreach($data as $key => $d){
					$pattern = $d[1];
					if($pattern != ""){
						$field = $d[0];
						$p = sprintf("/^%s$/u", $pattern);
						if(preg_match($p, $field) == false){
							$this->setFieldError($field, $field . " is not match a pattern");
							return true;
						}
					}
			}
		}else{
			error_log("array data is empty", 0);
			return true;
		}
		return false;
	}
	
	private function isLink($url)
	{
		$path = parse_url($url, PHP_URL_PATH);
		$encoded_path = array_map('urlencode', explode('/', $path));
		$url = str_replace($path, implode('/', $encoded_path), $url);

		return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
	}

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");
        
        $patternPassword = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}";
        $patternName = "[А-Я]{1}[а-я]{1,50}";
        $nameRequiryFields = array(
				"login" 	=> 	"[a-z0-9]{6,25}",
				"password1" =>	$patternPassword, 	
				"password2"	=>	$patternPassword, 
				"firstName"	=>	$patternName, 	
				"secondName"=>	$patternName, 	
				"thirdName"	=>	$patternName,
				"phone"		=>	"(\d{3}-){2}\d{2}-\d{2}", 		
				"mail"		=>	"[^@]+@[^@]+\.[a-zA-Z]{2,3}", 		
				"passport"	=>	"\d{4}-\d{6}",
				"card"		=>	"(\d{4}-){3}\d{4}", 		
				"birthDay"	=>	"\d{4}-\d{2}-\d{2}"
		);
		
		$dataRequiry = $this->fillDataFromRequest($nameRequiryFields);
		
		if($this->isEmptyField($dataRequiry)){
			return;
		}

//проверяем обязательные данные
		$password1 = $dataRequiry['password1'][0];
		$password2 = $dataRequiry['password2'][0];		
        if ($password1 !== $password2) {
            $this->setFieldError("password2", "Confirm password is not match");
            return;
        }
        
        if($this->isInvalidDataForPattern($dataRequiry)){
			return;
		}

//проверяем дополнительные данные
		$nameAdditionalFields = [
				"height" 		=> "\d{2,3}",
				"os"			=> "",
				"loveBrowser"	=> "",
				"LP"			=> "",
				"P"				=> "",
				"nativeLang"	=> "",
				"site"			=> ""		
		];
		
		$dataAdditionalRequiry = $this->fillDataFromRequest($nameAdditionalFields);
		
		if($this->isEmptyField($dataRequiry)){
			return;
		}
		
		$url = $dataAdditionalRequiry['site'][0];
		if(!$this->isLink($url)){
			$this->setFieldError("site", "Site is not found");
            return;
        }
        
        if($this->isInvalidDataForPattern($dataAdditionalRequiry)){
			return;
		}
		
		$height = $dataAdditionalRequiry['height'][0];
		$minHeight = 40;
		$maxHeight = 300;
		if(!($minHeight <= $height && $height <= $maxHeight)){
			$this->setFieldError("height", "Height is invalid");
            return;
        }
        
		$this->setFieldError("login", "Обработали все данные по маске, теперь нужно записать все данные по таблицам, если в обязательные таблицы не получилось записать, то запись прекращается");
        return;

//заносим данные по таблицам
        $user = new Auth\User();
		$login = $dataRequiry['login'][0];
        try {
            $new_user_id = $user->create($login, $password1);
            $base_user_info = $user->createBaseInfo($login, $dataRequiry);
            $addit_user_info = $user->createAdditInfo($login, $dataAdditionalRequiry);
        } catch (\Exception $e) {
			$this->setFieldError("login", $e->getMessage());
            return;
        }
        $user->authorize($login, $password1);

        $this->message = sprintf("Hello, %s! Thank you for registration.", $login);
        $this->setResponse("redirect", "/");
        $this->status = "ok";
    }
}

$ajaxRequest = new AuthorizationAjaxRequest($_REQUEST);
$ajaxRequest->showResponse();
