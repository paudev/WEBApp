<?php

class Index extends Controller {

	public function login($msg = '') {
		$this->view('home/login', ['bhref' => "/WEBApp/public/", 'msg' => $msg]);
	}

	public function login_attempt($login_attempt = '') {
		$details = User::where('username', '=', $_POST['username'])->first() ;
		$hash = $details['password'];
		$valid = crypt($_POST['password'], '$2y$12$' . $details['salt_password']);
		if($hash == $valid) {
			header('Location: /WEBApp/public/Index/setSession/' . $details['user_id'] );
		} else {
			header('Location: /WEBApp/public/login_failed');
		}
	}

	public function setSession($user_id = '') {
		session_start();
		$credentials = User::getInfo($user_id);
		$_SESSION['user_id'] = $credentials['user_id'] ;
		$_SESSION['user_type'] = $credentials['user_type'] ;
		$_SESSION['username'] = $credentials['username'] ;
		$_SESSION['first_name'] = $credentials['first_name'] ;
		$_SESSION['last_name'] = $credentials['last_name'] ;
		header('Location: /WEBApp/public/Home/Dashboard');
	}

	public function register($register_message = '') {
		if (!User::where('username', '=', $_POST['username'])->exists()) {
			$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
			$password = $_POST['password'] ;
			$hash = crypt($password, '$2y$12$' . $salt);
			$arr = array (
				'username' => $_POST['username'],
				'password' => $hash,
				'salt_password' => $salt,
				'email'=> $_POST["email"],
				'first_name' => $_POST["fname"],
				'date_registered' => date("Y-m-d H:i:s"),
				'last_name' => $_POST["lname"]
			);

			if($create = User::register($arr)) {
				header('Location: /WEBApp/public/registration_success/');
			} else {
				header('Location: /WEBApp/public/registration_failed');
			}
		} else {
			header('Location: /WEBApp/public/username_taken');
		}
	}
}

?>
