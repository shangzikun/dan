<?php

class UserModel {
	public $mysqli;
	public function __construct() {
		header("Content-type: text/html;charset=utf-8");//显示汉字
		$this->mysqli = new mysqli("localhost", "root","","zustu");
	}


}