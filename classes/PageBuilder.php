<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/PagePattern.php';
Class PageBuilder
{
    protected $title;
    protected $content;
    protected $description;

    public function __construct($title = "Ошибка 404", $description = "Не удалось найти страницу ", $content = Null)
    {
        $this->title = $title;
        $this->content = $content;
        $this->description = $description;
    }
    public function AddContent(Renderable $element)
    {
        $this->content[] = $element;
    }
    public function BuildPage()
    {



        $page = new Page();

        $page->SetTitle($this->title);
        $page->SetContent($this->content);
        $page->SetDescription($this->description);
        $page->Render();
    }
}