<?php


class Page
{
    protected $title;
    protected $content;
    protected $description;

    function SetTitle($title)
    {
        $this->title = $title;
    }
    function SetDescription($description)
    {
        $this->description = $description;
    }
    function SetContent($content)
    {
        $this->content = $content;
    }
    private function ShowContent()
    {
        $content = new DivElement();
        if ($this->content != null) {
            $content->addElement(
                $this->content
            );

        }
        return $content;
    }
    private function ShowButtonForCreatePost()
    {
        if ((new Authorization)->GetUserRole() == 'Admin' && $_SERVER['REQUEST_URI'] == '/') {
            return new AElement('addInBlog', '/include/CreatePost.php', 'Добавить пост');
        } else {
            return new PElement();
        }
    }

    public function Render()
    {

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

    }
}
