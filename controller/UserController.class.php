<?php

class UserController {
	public function add() {
			include "./view/user/add.html";
	}
	public function doAdd() {
		$name  = $_POST['username'] ? $_POST['username'] : '';
 		$age   = $_POST['age'] ? $_POST['age'] : 0 ;
 		$password = $_POST['password'] ? $_POST['password'] : 0;	
		if (empty($name) || empty($age) ||empty($password)) {       
       		header ('Refresh:3,Url=index.php?c=User&a=lists');//三秒后跳转
       		echo "发布失败,3秒后跳转到list";
       		die();
   		}   
 	  	$userModel = new UserModel();
		$status = $userModel->addUser($name, $age, $password);
		if ($status) {
			header('Refresh:1,Url=index.php?c=User&a=lists');
			echo '发布成功，1秒后跳转到list';
			die();
		}	
	}
	public function lists() {
			$userModel = new UserModel();
			$data = $userModel->getUserLists();
			include "./view/user/lists.html";
	}
	public function login() {
		include "./view/user/login.html";
	}
	public function doLogin() {
		$name = $_POST['username'];
		$password = $_POST['password'];
		$userModel =  new UserModel();
				$userInfo = $userModel->getUserInfoByName($name);
			if ($userInfo['password'] == $password) {
				unset($userInfo['password']); //一般来说 密码对外开放
				$_SESSION['me'] = $userInfo;
				header('Refresh:1,Url=index.php?c=User&a=lists');
				echo '登录成功';
				die();
			} else {
				header('Refresh:2,Url=index.php?c=USer&a=lists');
				echo '登录不成功';
				die();
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
	public function logout() {
		unset($_SESSION['me']);
		header('Refresh:3,Url=index.php?c=User&a=login');
		echo '注销成功';
		die();
		}	


}