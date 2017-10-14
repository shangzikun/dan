<?php

class UserController {
	public function login() {
		include "./view/user/login.html";
	}
	public function dologin() {
		$name = $_POST['username'];
		$password = $_POST['password'];
		
	}
	public function reg() {
		include "./view/user/reg.html"
	}
	public function doreg() {
		$name 	= $_POST['username'];
		$age 	= $_POST['age'] ? $_POST['age'] : 0;
		$password = $_POST['password'];
	}
	public function logout () {
		unset($_SESSION['me']);
		header('Refresh:3,Url=index.php?c=Blog&a=lists');
		echo '注销成功';
		die();
		}	


}