<?php

class Router
{
	protected static $PagesInfoArray;

	public function __construct()
	{
		self::$PagesInfoArray = [
			'MainPage' => [
				'path' => '/',
				'title' => 'Главная страница',
			],
			'AboutUs' => [
				'path' => '/About',
				'title' => 'О нас',
			],
			'Catalog' => [
				'path' => '/Catalog',
				'title' => 'Каталог',
			],
			'Posts' => [
				'path' => '/Posts',
				'title' => 'Блог',
			],
			'News' => [
				'path' => '/News',
				'title' => 'Новости',
			],
			'Profile' => [
				'path' => '/Profile',
				'title' => 'Профиль',
			],
		];
	}

	public static function GetPagesInfoArray(): array
	{
		return self::$PagesInfoArray;
	}

	public static function SetDescription($PageName, String $newDescription)
	{
		if(array_key_exists($PageName,self::$PagesInfoArray))
		{
			self::$PagesInfoArray[$PageName]['description'] = $newDescription;
		}
	}

	public static function SetTitle($PageName, String $newTitle)
	{
		if(array_key_exists($PageName,self::$PagesInfoArray))
		{
			self::$PagesInfoArray[$PageName]['title'] = $newTitle;
		}
	}
}

$router = new Router();
