<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/PrintAllPostsInMainMenu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/ElementBuildingPattern.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/CheckAuthorization.php';

class Page
{
    protected $title;
    protected $content;
    protected $description;

    function SetTitle ($title)
    {
        $this->title = $title;
    }
    function SetDescription ($description)
    {
        $this->description = $description;
    }
    function SetContent ($content)
    {
        $this->content = $content;
    }
    private function ShowContent()
    {
        if ($this->content != null){
           $content = new DivElement();
           foreach($this->content as $contentBlocks){
            $content->addElement(
                $contentBlocks
            );
        }
            return $content;
        } else  {
           return  (new DivElement());
        }
    }
    private function ShowButtonForCreatePost()
    {

        if((new Authorization)->GetUserRole() == 'Admin'){
            return new AElement('addInBlog', '/include/CreatePost.php', 'Добавить пост');
        } else {
            return new PElement();
        }
    }

    function Render()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        echo (new TableElement('Table'))
            ->addElement(
                (new TRElement())
                    ->addElement(
                        (new TDElement('left-collum-index'))
                            ->addElement(new H1Element('', "$this->title"))
                            ->addElement(new PElement('', "$this->description"))
                            ->addElement(
                                $this->ShowContent()
                            )
                    )
                    ->addElement(
                        (new TDElement('right-collum-index'))
                            ->addElement(
                                (new DivElement('project-folders-menu'))
                                    ->addElement(
                                        (new FormElement('', '', '', 'post'))
                                            ->addElement(
                                                (new ULElement('project-folders-v'))
                                                    ->addElement(
                                                        Authorization()
                                                    )
                                                    ->addElement(
                                                        (new LIElement())
                                                            ->addElement(new AElement('', '#', 'Регистрация'))
                                                    )
                                                    ->addElement(
                                                        (new LIElement())
                                                            ->addElement(new AElement('', '#', 'Забыли пароль?'))
                                                    )
                                            )
                                            ->addElement(new DivElement('clearfix'))
                                    )
                            )
                            ->addElement($this->ShowButtonForCreatePost())
                    )
            )
            ->render();
            require_once  $_SERVER['DOCUMENT_ROOT'] . './templates /footer.php';
    }
}

