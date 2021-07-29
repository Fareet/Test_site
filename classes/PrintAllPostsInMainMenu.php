<?php
class PrintAllPostsInMainMenu
{
    private $id;
    private $text;
    private $image;
    private $title;
    private $date;


    public function GetInformationAboutAllPosts()
    {
        $FlexBlockForPosts = new DivElement('blog') ;
        foreach ((new DataBaseManager())->getAll("blog.blog") as $row) {
            $this->id = $row["id"];
            $this->title = $row["title"];
            $this->image = $row["image"];
            $this->text = $row["text"];
            $this->date = $row["date_time"];

            $FlexBlockForPosts->addElement($this->RenderAllPosts());
        }
        return [$FlexBlockForPosts];
    }

    private function RenderAllPosts()
    {
        return (new DivElement('block'))
            ->addElement(
                (new DivElement('image'))
                    ->addElement(new ImageElement('', "/image/$this->image"))
            )
            ->addElement(
                (new DivElement('content'))
                    ->addElement(
                        (new DivElement('PostTitleBlock'))
                            ->addElement(new H2Element('content-text', $this->title))
                            ->addElement(new PElement('content-text', $this->date))
                    )
                    ->addElement(new PElement('content-text', $this->text))
                    ->addElement(new AElement('Blog-link', "/route/Posts/write/posts.php?Page=$this->id", 'Подробнее'))
            );
    }
}
