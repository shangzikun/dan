<?php

class UserController {
	public function login() {
		include "./view/user/login.html";
	}
	public function doLogin() {
		$name = $_POST['username'];
		$password = $_POST['password'];
		header('Refresh:1,Url=index.php?c=Blog&a=lists');
		echo '登录成功';
		
	}
	public function reg() {
		include "./view/user/reg.html";
	}
	public function doReg() {
		$name 	= $_POST['username'];
		$age 	= $_POST['age'] ? $_POST['age'] : 0;
		$password = $_POST['password'];
		header('Refresh:1,Url=index.php?c=User&a=login');
		echo '注册成功，1秒后跳转到list';
	}
	public function logout () {
		unset($_SESSION['me']);
		header('Refresh:3,Url=index.php?c=User&a=lists');
		echo '注销成功';
		die();
		}	


}