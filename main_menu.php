<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/LoadPageClass.php';

class NavigateMenu
{
	public $title;
	public $url;
	public $success;
	public $menu;

	public function __construct()
	{
		$this->menu = (new LoadPage)->GetPagesInfoArray();
	}

	function showMenu($path)
	{
		$this->url = $_SERVER['REQUEST_URI'];
		$this->success = (new Authorization)->Log_in();
		if ($path == 'header') {
			$this->HeaderNavMenu();
		} else if ($path  == 'footer') {
			$this->FooterNavMenu();
		}
	}
	function HeaderNavMenu()
	{
		$this->menu[] = [
			'title' => 'Профиль',
			'path' => '/route/Profile/'
		];
		$this->menu[] = [
			'title' => 'Сообщения',
			'path' => '/route/Posts/'
		];
		foreach ($this->menu as $key) {
			if (!$this->success) {
				$path = '/route/Authorization/';
			} else {
				$path = $key["path"];
			}
			if ($key["path"] == $this->url) {
				ini_set('session.cookie_lifetime', 1200);
				$this->title = $key["title"];
				echo '<li style = "text-decoration :underline; font-size: 16px""><a  href = ' . $path . '>' . $key["title"] . '</a></li>';
			} else {
				echo '<li style = "font-size: 16px"><a href = ' . $path . '>' . $key["title"] . '</a></li>';
			}
		}
	}
	function FooterNavMenu()
	{
		foreach ($this->menu as $key) {
			if (!$this->success) {
				$path = '/route/Authorization/';
			} else {
				$path = $key["path"];
			}
			echo '<li style = "font-size: 12px"><a href = ' . $path . '>' . $key["title"] . '</a></li>';
		}
	}
}
