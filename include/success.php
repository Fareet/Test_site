<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/SQLConnection.php';

class Authorization
{
	public $success = false;

	private  function GetUsersData($globalArray)
	{
		return (new DataBaseManager)->ExecuteRequest("SELECT login, password FROM lessons.users WHERE login =" . $globalArray['login'])[0];
	}

	private function CheckUserData()
	{

		if (!empty($_SESSION)) {
			$userData = $this->GetUsersData($_SESSION);
			if ($_SESSION['login'] == $userData['login'] and $_SESSION['password'] == $userData['password']) {
				$this->success = true;
				ini_set('session.cookie_lifetime', 1200);
			} else {
				$this->success = false;
			}
		} else if (!empty($_POST)) {
			$userData = $this->GetUsersData($_POST);
			if ($_POST['login'] == $userData['login'] and $_POST['password'] == $userData['password']) {
				$this->success = true;
				$_SESSION['login'] = $userData['login'];
				$_SESSION['password'] = $userData['password'];
			} else {
				$this->success = false;
			}
		}
		return $this->success;
	}
	public function Log_in()
	{
		$this->CheckUserData();
		if ($this->success) {
			ini_set('session.cookie_lifetime', 1200);
			return $this->success;
		}
	}
}
session_start();
$lastLogin = $_POST['login'];
$lastPassword = $_POST['password'];
