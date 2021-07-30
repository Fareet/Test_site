<?php

class PageBuilder
{
    protected $title;
    protected $content;
    protected $description;
    protected $page;

    public function __construct($title = "Ошибка 404", $description = "Не удалось найти страницу ", $content = Null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->description = $description;
        $this->page = new Page();
    }
    public function BuildPage()
    {
        $this->page->SetTitle($this->title);
        $this->page->SetContent($this->content);
        $this->page->SetDescription($this->description);
        $this->page->Render();
    }
}
