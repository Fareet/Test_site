<?php

class PageBuilder
{
    protected $title;
    protected $content;
    protected $description;
    protected $page;

    public function __construct($title = null, $description = null , $content = Null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->description = $description;
        $this->page = new Page();
    }
    private function CheckDataForNull()
    {
        if($this->title == null)
        {
            $this->title = "Ошибка 404";
            $this->description = "Не удалось найти страницу " . substr($_SERVER['REQUEST_URI'], 1);
        }
    }
    public function BuildPage($router)
    {
        $this->CheckDataForNull();

        $this->page->SetTitle($this->title);
        $this->page->SetContent($this->content);
        $this->page->SetDescription($this->description);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        $this->page->Render();
        require_once  $_SERVER['DOCUMENT_ROOT'] . './templates /footer.php';
    }
}
