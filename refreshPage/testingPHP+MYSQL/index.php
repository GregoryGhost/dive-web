<?PHP

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}

session_start();
require_once './lib/Auth.class.php';

if (Auth\User::isAuthorized()) {
	include("view/editProfile.php");
}else {
	$redirect = $_GET['redirect'];
	switch($redirect){
		case "auth": 
			include("view/auth.php");
			break;
		case "registration":
			include("view/registration.php");
			break;
		default:
			header('Location: ../trollGaben.html', true, 301);
			exit();
	}
}
?>
