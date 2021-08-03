<?php

class CCatalog
{
    public function GetObject()
    {
        return (new DivElement(''))
        ->addElement((new PElement('','Какой-то контент')));
    }
}