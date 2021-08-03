<?php
class Router
{
	protected $PagesInfoArray;
	protected $subPath;

		public function __construct()
		{
			$this->findSubPath();
			$this->PagesInfoArray= [
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
					'subname' => 'Post',
					'subpath' => 'Page',
					'subtitle' => 'Пост',
				],
				'News' => [
					'path' => '/News',
					'title' => 'Новости',
				],
				'Profile' => [
					'path' => '/Profile',
					'title' => 'Профиль',
				],
				'Messages' => [
					'path' => '/Messages',
					'title' => 'Сообщения',
					'subname' => 'Message',
					'subpath' => 'Page',
					'subtitle' => ' ',
				]

			];
		}
	public function getPageData()
	{
		foreach ($this->PagesInfoArray as $key => $page) {
            if ($_SERVER['REQUEST_URI'] == $page['path']) {
				return [
					$key => $this->PagesInfoArray[$key]
				];
            } else if ($this->subPath != null) {
				if (key($this->subPath) == $page['subpath'] && substr($_SERVER["REDIRECT_URL"], 1) == $key){
					return [
						$page['subname'] =>
						[
							'title' => $page['subtitle'],
							'detail' => true,
						]
					];
				}
			}
        }
	}

	public function findSubPath()
	{
			$subPathTmp = explode("=", $_SERVER["REDIRECT_QUERY_STRING"]);
			if(!empty($subPathTmp[0]) && !empty($subPathTmp[1])){
				$this->subPath[$subPathTmp[0]] = $subPathTmp[1];
			}
	}
	public function getSubPathID()
	{
		if($this->subPath != null){
			return $this->subPath[key($this->subPath)];
		}
	}

	public function getPagesInfoArray(): array
	{
		return $this->PagesInfoArray;
	}
}

$router = new Router();
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';
