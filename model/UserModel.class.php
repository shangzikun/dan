<?php

class UserModel {
	public $mysqli;
	public function __construct() {
		header("Content-type: text/html;charset=utf-8");//显示汉字
		$this->mysqli = new mysqli("localhost", "root","","zustu");
	}
	public function addUser($name,$age,$password) {
			$sql = "insert into user(name,age,password) value ('{$name}', {$age}, '{$password}')";
			$res = $this->mysqli->query($sql);
			return $res;
	}
	public function getUserLists() {
			$sql = "select * from user";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return $data;
	}
	public function getUserInfoById($id) {
			$sql = "select * from user where id = {$id}";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return $data[0];
		}
	public function getUserInfoByName($name) {
			$sql = "select * from user where name = '{$name}'";
			$res = $this->mysqli->query($sql);
			$data = $res->fetch_all(MYSQL_ASSOC);
			return $data[0];
		}

}