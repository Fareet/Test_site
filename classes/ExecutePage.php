<?php

class ExecutePage
{
    protected $router;
    protected $currentPage;

    public function __construct(DataForPage $contentForPage, $router)
    {
        $this->router = $router;
        $this->currentPage = new PageBuilder ($contentForPage->GetTitle(), $contentForPage->GetDescription(), $contentForPage->GetContent());
    }
    public function Execute()
    {
        return $this->currentPage->BuildPage($this->router);
    }
}
