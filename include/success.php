<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/SQLConnection.php';

class Authorization
{
	public $success = false;

	private  function GetUsersData($globalArray)
	{
		return (new DataBaseManager)->ExecuteRequest("SELECT login, password, role FROM lessons.users WHERE login =" . $globalArray['login'])[0];
	}
	private function CheckUserData()
	{

		if (!empty($_SESSION)) {
			$userData = $this->GetUsersData($_SESSION);
			if ($_SESSION['login'] == $userData['login'] && $_SESSION['password'] == $userData['password'] && $userData != NULL) {
				$this->success = true;
				ini_set('session.cookie_lifetime', 1200);
			}
		}
		if (!empty($_POST) && $this->success == false) {
			$userData = $this->GetUsersData($_POST);
			if ($_POST['login'] == $userData['login'] && $_POST['password'] == $userData['password'] && $userData != NULL) {
				$this->success = true;
				$_SESSION['login'] = $userData['login'];
				$_SESSION['password'] = $userData['password'];
				$_SESSION['role'] = $userData['role'];
			}
		}
		return $this->success;
	}
	public function Log_in()
	{
		$this->CheckUserData();
		if ($this->success) {
			ini_set('session.cookie_lifetime', 1200);
		}
		return $this->success;
	}
	public function GetUserRole()
	{
		return $_SESSION['role'];
	}
}
session_start();
$lastLogin = $_POST['login'];
$lastPassword = $_POST['password'];
