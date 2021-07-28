<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';

class NavigateMenu
{
	public $title;
	public $url;
	public $success;
	public $menu = [
		[
			'title' => 'Главная',
			'path' => '/'
		],
		[
			'title' => 'О нас',
			'path' => '/About'
		],
		[
			'title' => 'Контакты',
			'path' => '/Contacts'
		],
		[
			'title' => 'Новости',
			'path' => '/News'
		],
		[
			'title' => 'Каталог',
			'path' => '/Catalog'
		],
		[
			'title' => 'Профиль',
			'path' => '/route/Profile/'
		],
		[
			'title' => 'Сообщения',
			'path' => '/route/Posts/'
		],
	];
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
