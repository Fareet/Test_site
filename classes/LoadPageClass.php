<?php

require_once $_SERVER['DOCUMENT_ROOT'] . './main_menu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/PageBuilder.php';

class LoadPage
{
	protected $PagesInfoArray;

	public function __construct()
	{
		$this->PagesInfoArray = [
			'MainPage' =>[
				'path' => '/',
				'title' => 'Главное меню',
				'description' => 'Главная страница содержит основные сведения',
				'content' => (new PrintAllPostsInMainMenu())->GetInformationAboutAllPosts(),
			],
			'AboutUs' =>[
				'path' => '/About',
				'title' => 'О нас',
				'description' => 'Страница содержит информацию о нашей деятельности',
				'content' => null,
			],
			'Catalog' =>[
				'path' => '/Catalog',
				'title' => 'Каталог',
				'description' => 'Страница содержит каталог',
				'content' => [(new PElement('',"Какой-то контент"))],
			],
			'Posts' =>[
				'path' => '/Posts',
				'title' => 'Posts',
				'description' => '',
				'content' => (new PrintAllPostsInMainMenu())->GetInformationAboutAllPosts(),
			],
			'News' =>[
				'path' => '/News',
				'title' => '',
				'description' => '',
				'content' => null
			]
		];
	}

	public function Render()
	{
		foreach($this->PagesInfoArray as $Pages)
		if ($_SERVER['REQUEST_URI'] == $Pages['path']){
			(new PageBuilder($Pages['title'],$Pages['description'],$Pages['content']))->BuildPage();
			exit;
		}
		(new PageBuilder())->BuildPage();
	}
}