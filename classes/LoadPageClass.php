<?php

require_once $_SERVER['DOCUMENT_ROOT'] . './main_menu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/PageBuilder.php';

class LoadPage
{
	protected $PagesInfoArray;
	protected $Page;

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
				'title' => 'Блог',
				'description' => '',
				'content' => (new PrintAllPostsInMainMenu())->GetInformationAboutAllPosts(),
			],
			'News' =>[
				'path' => '/News',
				'title' => 'Новости',
				'description' => '',
				'content' => null
			],
		];
		$this->Page = new PageBuilder();
	}

	public function GetPagesInfoArray():array
	{
		return $this->PagesInfoArray;
	}

	public function Render()
	{
		foreach($this->PagesInfoArray as $Pages)
		if ($_SERVER['REQUEST_URI'] == $Pages['path']){
			$this->Page = (new PageBuilder($Pages['title'],$Pages['description'],$Pages['content']))->BuildPage();
			exit;
		}
		$this->Page->BuildPage();
	}
	public function AddContent($PageName, Renderable $element)
    {
		if ($_SERVER['REQUEST_URI'] == $this->PagesInfoArray[$PageName]['path']){
			$this->PagesInfoArray[$PageName]['content'][] = $element;
		}
    }
	public function SetTitle($PageName, String $element)
    {
		if ($_SERVER['REQUEST_URI'] == $this->PagesInfoArray[$PageName]['path']){
			$this->PagesInfoArray[$PageName]['title'] = $element;
		}
    }
	public function SetDescription($PageName, String $element)
    {
		if ($_SERVER['REQUEST_URI'] == $this->PagesInfoArray[$PageName]['path']){
			$this->PagesInfoArray[$PageName]['description'] = $element;
		}
    }
}