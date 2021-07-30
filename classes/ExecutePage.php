<?php

class ExecutePage
{
    protected $router;

    public function __construct()
    {
        $this->router = Router::GetPagesInfoArray();
    }
    public function Execute(ContentForPage $contentForPage)
    {

        foreach ($this->router as $page) {
            if ($_SERVER['REQUEST_URI'] == $page['path']) {
                (new PageBuilder($page['title'], $page['description'], $contentForPage->GetContent()))->BuildPage();
                exit;
            }
        }
        (new PageBuilder())->BuildPage();
    }
}
