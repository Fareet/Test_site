<?php

class CPost
{
    private function FindInformationAboutThisPost($id)
    {
        $sql = " WHERE id = " . $id;
        foreach ((new DataBaseManager())->getAll("blog.blog", $sql) as $row) {
            $this->id = $row["id"];
            $this->title = $row["title"];
            $this->image = $row["image"];
            $this->text = $row["text"];
        }
    }

    public function GetObject($id)
    {
        $this->FindInformationAboutThisPost($id);
        return (new DivElement('PostsImageBlock'))
            ->addElement(new ImageElement('', "/image/$this->image"))
            ->addElement(
                (new DivElement('PostsImageBlock'))
                    ->addElement(new H2Element('', $this->title))
                    ->addElement(new PElement('', $this->text))
            );
    }
}
