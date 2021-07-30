<?php

class ContentForPage
{
    protected $content;
    protected $router;
    protected static $contentContainer;

    public function __construct()
    {
        self::$contentContainer = [
            'MainPage' => [
                'Content' => (new PrintAllPostsInMainMenu())->GetContent()
            ],
            'AboutUs' => [
                'Content' => [(new PElement('', "Какой-то контент"))]
            ],
            'Catalog' => [
                'Content' => null
            ],
            'Posts' => [
                'Content' => (new PrintAllPostsInMainMenu())->GetContent()
            ],
            'News' => [
                'Content' => null
            ],
            'Profile' => [
                'Content' => (new Profile)->RenderProfileInfo()
            ],
        ];
    }

    private function SetRouter()
    {
        $this->router = Router::GetPagesInfoArray();
    }
    public function SelectContent()
    {
        $this->SetRouter();
        foreach ($this->router as $key => $page) {
            if ($_SERVER['REQUEST_URI'] == $page['path'] && array_key_exists($key, self::$contentContainer)) {
                $this->content = self::$contentContainer[$key]['Content'];
                return $this->content;
            }
        }
        return $this->content;
    }
    public function GetContent()
    {
        return $this->content;
    }

    public static function AddContent($PageName, Renderable $addedElement)
    {
        static::$contentContainer[$PageName]['Content'][] = $addedElement;
    }
}
